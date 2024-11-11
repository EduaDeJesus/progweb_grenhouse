<?php

    return [
        'id' => 'basic',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log'],
        'components' => [
            'request' => [
                'cookieValidationKey' => 'a8f12d0f2d364b9a836d8fbb7f1f6ed2',
                'baseUrl' => '',
            ],
            'db' => require __DIR__ . '/db.php',
            'urlManager' => [
                'enablePrettyUrl' => true, 
                'showScriptName' => false,
                'rules' => [
                    '' => 'home/index',
                    'login' => 'area-usuario/login',
                    'cadastro' => 'area-usuario/cadastro',
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ],
                
            ],
            'log' => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'user' => [
                'identityClass' => 'app\models\Usuario',
                'enableAutoLogin' => true,
                'loginUrl' => ['area-usuario/login'],
            ],
           'assetManager' => [
                'bundles' => [
                    'yii\bootstrap4\BootstrapAsset' => [
                        'css' => [
                            '/node_modules/bootstrap/dist/css/bootstrap.min.css',
                        ],
                        'js' => [
                            '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
                        ],
                    ],
                    'yii\web\JqueryAsset' => [
                        'sourcePath' => null, // indica que o jQuery será fornecido via npm
                        'js' => [
                            '/node_modules/jquery/dist/jquery.min.js', // caminho correto para o jQuery
                        ],
                    ],
                ],
            ],
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
        ],
    ];
