<?php
    namespace app\controllers;

    use Yii;
    use yii\web\Controller;
    use app\models\ImoveisCompra;

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
            
            $defaultFiltros = [
                'tipo_imovel' => '',
                'preco' => 0,
                'quartos' => 0,
                'vagas_garagem' => 0,
                'banheiros' => 0,
                'area_total' => 0,
                'descricao' => '',
            ];

            if (Yii::$app->request->post('limpar_filtros') === 'true') {
                $filtros = $defaultFiltros;
            } else {
                foreach ($defaultFiltros as $key => $valor) {
                    $filtros = Yii::$app->request->post();
                    if (!isset($filtros[$key])) {
                        $filtros[$key] = $valor;
                    }
                }
            }


            $imoveis = new ImoveisCompra();
            $imoveisFiltrados = $imoveis->getImoveisFiltrados($filtros);

            return $this->render('comprar', [
                'imoveisFiltrados' => $imoveisFiltrados,
                'filtros' => $filtros,
                'isLoggedIn' => $isLoggedIn,
            ]);
        }

        public function actionGetEnderecos()
        {
            $imoveis = imoveisCompra::find()
                ->select(['nome', 'endereco'])
                ->asArray()
                ->all();

            return $this->asJson($imoveis);
        }

    }
    
?>