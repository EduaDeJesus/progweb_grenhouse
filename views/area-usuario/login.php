<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
?>
<link rel="stylesheet" href="assets/css/style.css"/>

<div class="login-form">

    <div style="display:flex;">
        <img class="icon-logo" alt="" src="../assets/img/greenhouse.png">
        <img class="icon-logo" alt="" src="../assets/img/greenhouse-title.png">
    </div>

    <h1 style="font-size:40px;"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email',['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])->textInput(['maxlength' => true, 'placeholder' => 'E-mail']) ?>

    <br>

    <?= $form->field($model, 'senha',['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])->passwordInput(['maxlength' => true, 'placeholder' => 'Senha', 'style' => 'margin-bottom: 10px;']) ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p>Não tem uma conta? <?= Html::a('Cadastre-se aqui', ['area-usuario/cadastro']) ?></p>

</div>

