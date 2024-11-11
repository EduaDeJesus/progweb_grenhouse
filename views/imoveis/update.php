<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Editar Imóvel';
?>
<link rel="stylesheet" href="../assets/css/style.css"/>

<div class="imovel-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_imovel')->dropDownList([
        'apartamento' => 'Apartamento',
        'casa' => 'Casa',
        'condominio' => 'Casa em condomínio',
        'area' => 'Área'
    ], ['prompt' => 'Selecione o tipo do imóvel']) ?>

    <?= $form->field($model, 'preco')->input('number', ['step' => 0.01, 'min' => 0]) ?>

    <?= $form->field($model, 'quartos')->input('number', ['min' => 0]) ?>

    <?= $form->field($model, 'vagas_garagem')->input('number', ['min' => 0]) ?>

    <?= $form->field($model, 'banheiros')->input('number', ['min' => 0]) ?>

    <?= $form->field($model, 'area_total')->input('number', ['step' => 1, 'min' => 0]) ?>

    <?= $form->field($model, 'mobiliado')->radioList([1 => 'Sim', 0 => 'Não']) ?>

    <?= $form->field($model, 'aceita_pets')->radioList([1 => 'Sim', 0 => 'Não']) ?>

    <h3>Itens do Imóvel</h3>
    <?= $form->field($model, 'ar_condicionado')->checkbox() ?>
    <?= $form->field($model, 'area_servico')->checkbox() ?>
    <?= $form->field($model, 'armario_cozinha')->checkbox() ?>

    <h3>Itens do Condomínio</h3>
    <?= $form->field($model, 'academia')->checkbox() ?>
    <?= $form->field($model, 'piscina')->checkbox() ?>
    <?= $form->field($model, 'playground')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>