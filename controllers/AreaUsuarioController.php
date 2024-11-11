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
    
    public function actionPreferencias()
    {
        return $this->render('preferencias');
    }

    public function actionMinhasCompras()
    {
        return $this->render('minhas-compras');
    }
}