<?php
    namespace app\controllers;

    use Yii;
    use yii\web\Controller;

    class HomeController extends Controller
    { 
        public $layout = 'main';

        public function actionIndex()
        {
            $isLoggedIn = !Yii::$app->user->isGuest;
        
            return $this->render('index', [
                'isLoggedIn' => $isLoggedIn,
            ]);
        
        }

        public function actionComprar()
        {
            $isLoggedIn = !Yii::$app->user->isGuest;

            return $this->render('comprar', [
                'isLoggedIn' => $isLoggedIn,
            ]);
        }

    }
    
?>