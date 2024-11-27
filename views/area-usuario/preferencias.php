
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Preferências do Usuário';

include 'header.php';

?>


<div class="preferencias-form">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Atualize seus dados pessoais abaixo:</p>
    <div class="form-container">
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nome')->textInput(['maxlength'=> true, 'placeholder' => 'Digite seu nome']) ?>
            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Digite seu email']) ?>
            <?= $form->field($model, 'telefone')->textInput(['maxlength'=> true, 'placeholder' => 'Digite seu telefone']) ?>
            <?= $form->field($model, 'senha')->passwordInput(['placeholder' => 'Digite sua senha' , 'value' => '',]) ?>
            <?= $form->field($model, 'senha_confirmacao')->passwordInput(['maxlength' => true, 'placeholder' => 'Confirmar Senha']) ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar Alterações', ['class' => 'btn btn-primary']) ?>
        </div>
            <?php ActiveForm::end(); ?>
        </div>
</div>
