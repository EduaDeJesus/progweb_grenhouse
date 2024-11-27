<?php

namespace app\controllers;

use Yii;
use app\models\ImoveisCompra;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ImoveisController extends Controller
{
    public function actionIndex()
    {
        $isLoggedIn = !Yii::$app->user->isGuest;

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/login']);
        }

        $model = new ImoveisCompra();
        $usuarioId = Yii::$app->user->id;

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                

                $model->situacao = 'D';
                $model->imagensUpload = UploadedFile::getInstances($model, 'imagensUpload');
                $model->imagemUpload = UploadedFile::getInstance($model, 'imagemUpload');

                if ($model->validate() && $model->uploadImagem()) {
                    if ($model->save(false)) {
                        Yii::$app->db->createCommand()->insert('imovel_usuario', [
                            'usuario_id' => $usuarioId,
                            'imovel_id' => $model->id,
                            'data_criacao' => date('Y-m-d H:i:s'),
                        ])->execute();

                        if ($model->imagensUpload) {
                            $imagePaths = $model->uploadImagens($model->id);
                            foreach ($imagePaths as $path) {
                                Yii::$app->db->createCommand()->insert('imovel_imagens', [
                                    'imovel_id' => $model->id,
                                    'caminho_imagem' => $path,
                                    'data_criacao' => date('Y-m-d H:i:s'),
                                ])->execute();
                            }
                        }

                        Yii::$app->session->setFlash('success', 'Imóvel cadastrado com sucesso!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Falha no cadastro do imóvel. Verifique os dados.');
                }
            }
        }

        return $this->render('index', [
            'model' => $model,
            'isLoggedIn' => $isLoggedIn,
            ]);
    }

        public function actionFiltrar()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $filtros = Yii::$app->request->post();
        $imoveis = $this->getImoveisFiltrados($filtros);

        return $imoveis;
    }

    public function actionView($id)
    {
        $isLoggedIn = !Yii::$app->user->isGuest;

        $imagens = Yii::$app->db->createCommand('SELECT * FROM imovel_imagens WHERE imovel_id = :id')
            ->bindValue(':id', $id)
            ->queryAll();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'imagens' => $imagens,
            'isLoggedIn' => $isLoggedIn,
        ]);
    }

    public function actionRegistrarCompra($usuarioId, $imovelId)
    {

        $transaction = Yii::$app->db->beginTransaction();

        try {
            Yii::$app->db->createCommand()->insert('usuario_compra', [
                'usuario_id' => $usuarioId,
                'imovel_id' => $imovelId,
                'data_compra' => date('Y-m-d H:i:s'),
            ])->execute();

            Yii::$app->db->createCommand()->update('imoveis_compra', [
                'situacao' => 'R',
            ], [
                'id' => $imovelId,
            ])->execute();

            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Compra registrada com sucesso!');
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Erro ao registrar a compra: ' . $e->getMessage());
        }

        return $this->goHome();
    }

    public function actionUpdate($id)
    {
        $isLoggedIn = !Yii::$app->user->isGuest;

        if (Yii::$app->user->identity->funcao != 1) {
            return $this->redirect(['../home/index']);
        }

        $model = $this->findModel($id);
        
        $imagens = Yii::$app->db->createCommand('SELECT * FROM imovel_imagens WHERE imovel_id = :id')
            ->bindValue(':id', $id)
            ->queryAll();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->imagensUpload) {
                $imagePaths = $model->uploadImagens($model->id);
                foreach ($imagePaths as $path) {
                    Yii::$app->db->createCommand()->insert('imovel_imagens', [
                        'imovel_id' => $model->id,
                        'caminho_imagem' => $path,
                        'data_criacao' => date('Y-m-d H:i:s'),
                    ])->execute();
                }
            }

            Yii::$app->session->setFlash('success', 'Imóvel atualizado com sucesso!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'imagens' => $imagens,
            'isLoggedIn' => $isLoggedIn,
        ]);
    }

    public function actionDelete($id)
{
    if (Yii::$app->user->identity->funcao != 1) {
        return $this->redirect(['../home/index']);
    }

    try {
        $model = $this->findModel($id);

        Yii::$app->db->createCommand()
            ->delete('imovel_imagens', ['imovel_id' => $id])
            ->execute();

        Yii::$app->db->createCommand()
            ->delete('imovel_usuario', ['imovel_id' => $id])
            ->execute();

        Yii::$app->db->createCommand()
            ->delete('usuario_compra', ['imovel_id' => $id])
            ->execute();

        Yii::$app->db->createCommand()
            ->delete('imoveis_compra', ['id' => $id])
            ->execute();

        if (!$model->delete()) {
            throw new \Exception('Erro ao excluir o imóvel principal!');
        }

        Yii::$app->session->setFlash('success', 'Imóvel excluído com sucesso!');
    } catch (\Exception $e) {
        Yii::$app->session->setFlash('error', 'Erro ao excluir o imóvel: ' . $e->getMessage());
    }

    return $this->goHome();
}

    
    public function actionDeleteImagem($id)
    {
        $imagem = Yii::$app->db->createCommand('SELECT * FROM imovel_imagens WHERE id = :id')
            ->bindValue(':id', $id)
            ->queryOne();

        if ($imagem) {
            @unlink($imagem['caminho_imagem']);
            
            Yii::$app->db->createCommand()
                ->delete('imovel_imagens', ['id' => $id])
                ->execute();

            Yii::$app->session->setFlash('success', 'Imagem excluída com sucesso!');
        } else {
            Yii::$app->session->setFlash('error', 'Erro ao excluir a imagem!');
        }

        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    protected function findModel($id)
    {
        if (($model = ImoveisCompra::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('O imóvel solicitado não foi encontrado.');
    }

}