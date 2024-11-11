<!-- header.php -->
<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>

<head>
      <meta charset="utf-8">
      <meta name="viewport">
      <link rel="icon" type="image/x-icon" href="<?= Yii::getAlias('@web') ?>/assets/img/favicon.ico">
      <link rel="stylesheet" href="../assets/css/style.css"/>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
      <script src="../assets/js/scripts.js"></script>
</head>

<div class="home-1" style="background-color: #121212;">
        <div class="home-2">
        <a href="<?= Url::to(['index']) ?>"><img class="icon-logo" alt="" src="../assets/img/greenhouse.png"></a>
        <div class="navigation">
                <a href="<?= Url::to(['comprar']) ?>">Ir para Comprar</a>
        </div>
        <div class="header-buttons">
                <div class="button21">
                        <div class="base">
                                <?php if (!$isLoggedIn): ?>
                                <div class="area-usuario-text" >
                                        <a href="<?= Url::to(['/login'])?>">Login</a>
                                </div>
                                <?php endif; ?>
                        
                                <?php if ($isLoggedIn): ?>
                                        <div class="user-area">
                                        <button class="area-usuario-text" style="color: white;background-color: #121212; border: 0;" onclick="toggleUserOptions()">Área do usuário</button>
                                        <div class="user-options" id="user-options">
                                                <ul>
                                                <li><a href="<?= Url::to(['usuario/preferencias']) ?>">Preferências</a></li>
                                                <li><a href="<?= Url::to(['usuario/minhas-compras']) ?>">Minhas compras</a></li>
                                                <li><a href="<?= Url::to(['site/logout']) ?>">Sair</a></li>
                                                </ul>
                                        </div>
                                        </div>
                                <?php endif; ?>

                        </div>
                </div>
                <a class="button23" href="<?= Url::to(['/imoveis/index']) ?>">Anuncie</a>
                </div>
        </div>
                <img class="navbar-menu" alt="" src="../assets/img/MenuOutlined.svg" onclick="openNav()">
        </div>
        </div>
</div>
<div id="navbar" class="navbar">
        <a href="javascript:void(0)" onclick="closeNav()">×</a>
        <a href="../Rent_Buy/alugar.html">Alugar</a>
        <a href="/home/comprar"">Comprar</a>
</div>
</div>
