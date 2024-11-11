<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cadastro de Imóvel';
?>
<link rel="stylesheet" href="../assets/css/style.css"/>

<div class="imovel-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <?= $form->field($model, 'nome', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Nome do Local']) ?>
    <br>

    <?= $form->field($model, 'endereco', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->textInput(['maxlength' => true, 'placeholder' => 'Endereço']) ?>
    <br>

    <?= $form->field($model, 'imagemUpload', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->fileInput() ?>
    <br>

    <?= $form->field($model, 'tipo_imovel', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->dropDownList([
            'apartamento' => 'Apartamento',
            'casa' => 'Casa',
            'condominio' => 'Casa em condomínio',
            'area' => 'Área'
        ], ['prompt' => 'Selecione o tipo do imóvel']) ?>
    <br>

    <?= $form->field($model, 'preco', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->input('number', ['step' => 0.01, 'min' => 0]) ?>
    <br>

    <?= $form->field($model, 'quartos', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->input('number', ['min' => 0]) ?>
    <br>

    <?= $form->field($model, 'vagas_garagem', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->input('number', ['min' => 0]) ?>
    <br>

    <?= $form->field($model, 'banheiros', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->input('number', ['min' => 0]) ?>
    <br>

    <?= $form->field($model, 'area_total', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->input('number', ['step' => 1, 'min' => 0]) ?>
    <br>

    <?= $form->field($model, 'mobiliado', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->radioList([1 => 'Sim', 0 => 'Não']) ?>
    <br>

    <?= $form->field($model, 'aceita_pets', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->radioList([1 => 'Sim', 0 => 'Não']) ?>

    <h3>Itens do Imóvel</h3>
    <?= $form->field($model, 'ar_condicionado')->checkbox() ?>
    <?= $form->field($model, 'area_servico')->checkbox() ?>
    <?= $form->field($model, 'armario_cozinha')->checkbox() ?>

    <h3>Itens do Condomínio</h3>
    <?= $form->field($model, 'academia')->checkbox() ?>
    <?= $form->field($model, 'piscina')->checkbox() ?>
    <?= $form->field($model, 'playground')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Cadastrar Imóvel', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>