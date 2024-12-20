<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cadastro';
?>
<link rel="stylesheet" href="assets/css/style.css"/>


<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="cadastro-form">

    <div style="display:flex;">
        <img class="icon-logo" alt="" src="../assets/img/greenhouse.png">
        <img class="icon-logo" alt="" src="../assets/img/greenhouse-title.png">
    </div>

    <h1 style="font-size:40px;"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Nome']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'E-mail']) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true, 'placeholder' => 'Telefone']) ?>

    <?= $form->field($model, 'senha')->passwordInput(['maxlength' => true, 'placeholder' => 'Senha']) ?>

    <?= $form->field($model, 'senha_confirmacao')->passwordInput(['maxlength' => true, 'placeholder' => 'Confirmar Senha']) ?>

    <div class="form-group">
        <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <p>Já tem uma conta? <?= Html::a('Faça login aqui', ['area-usuario/login']) ?></p>
    
</div>

