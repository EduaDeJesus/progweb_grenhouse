<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use yii\web\Controller;

class AreaUsuarioController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['login', 'cadastro'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'cadastro'],
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionMeusImoveis($usuarioID)
    {

        $isLoggedIn = !Yii::$app->user->isGuest;

        $imoveisComprados = Yii::$app->db->createCommand('SELECT * FROM usuario_compra WHERE usuario_id = :usuarioID')->bindValue(':usuarioID', $usuarioID)
        ->queryAll();

        $imoveisCriados = Yii::$app->db->createCommand('SELECT * FROM imovel_usuario WHERE usuario_id = :usuarioID')->bindValue(':usuarioID', $usuarioID)
        ->queryAll();

        foreach ($imoveisComprados as $imovel){
            $compra = Yii::$app->db->createCommand('SELECT * FROM imoveis_compra WHERE id = :imovel_id')->bindValue(':imovel_id', $imovel['imovel_id'])->queryAll();
        }
        foreach ($imoveisComprados as $imovel){
            $criados = Yii::$app->db->createCommand('SELECT * FROM imoveis_compra WHERE id = :imovel_id')->bindValue(':imovel_id', $imovel['imovel_id'])->queryAll();
        }

        return $this->render('meus-imoveis', [
            'compra' => $compra,
            'criados' => $criados,
            'isLoggedIn' => $isLoggedIn,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post())) {
            $usuario = Usuario::findOne(['email' => $model->email]);

            if ($usuario && Yii::$app->getSecurity()->validatePassword($model->senha, $usuario->senha)) {
                if (Yii::$app->user->login($usuario)) {
                    return $this->goHome();
                }
            } else {
                Yii::$app->session->setFlash('error', 'Email ou senha incorretos.');
            }
        }
        return $this->render('login', ['model' => $model]);
    }

    public function actionPreferencias()
    {

        $isLoggedIn = !Yii::$app->user->isGuest;

        $id = Yii::$app->user->id;
        $model = Usuario::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('Usuário não encontrado.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!empty($model->senha)) {
                $model->senha = Yii::$app->security->generatePasswordHash($model->senha);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Dados atualizados com sucesso.');
                return $this->redirect(['preferencias']);
            } else {
                Yii::$app->session->setFlash('error', 'Erro ao salvar os dados.');
            }
        }

        return $this->render('preferencias', [
            'model' => $model,
            'isLoggedIn' => $isLoggedIn,
        ]);
    }

    public function actionCadastro()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Usuario();

        $model->funcao = 20;

        if ($model->load(Yii::$app->request->post()) && $model->createUsuario()) {

            Yii::$app->session->setFlash('success', 'Cadastro realizado com sucesso!');
            return $this->redirect(['login']);
        }
        return $this->render('cadastro', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}