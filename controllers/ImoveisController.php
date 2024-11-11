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
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/login']);
        }
        
        $model = new ImoveisCompra();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {

                $model->imagemUpload = UploadedFile::getInstance($model, 'imagemUpload');

                if ($model->validate() && $model->uploadImagem()) {
                    if ($model->save(false)) {
                        Yii::$app->session->setFlash('success', 'Imóvel cadastrado com sucesso!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Falha no cadastro do imóvel. Verifique os dados.');
                }
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Imóvel atualizado com sucesso!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Imóvel excluído com sucesso!');
        } else {
            Yii::$app->session->setFlash('error', 'Erro ao excluir o imóvel!');
        }

        return $this->redirect(['../home/index']);
    }

    protected function findModel($id)
    {
        if (($model = ImoveisCompra::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('O imóvel solicitado não foi encontrado.');
    }
}