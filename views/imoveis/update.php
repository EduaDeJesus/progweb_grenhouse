<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

include 'header.php';

$this->title = 'Editar Imóvel';

/* @var $this yii\web\View */
/** @var app\models\ImoveisCompra $model */
/** @var array $imagens */

?>
<link rel="stylesheet" href="/../assets/css/style.css"/>

<div class="imovel-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

    <h3>Imagens do Imóvel</h3>

    <div class="imagens-atual">
        <p>Imagens atuais:</p>
        <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
            <?php foreach ($imagens as $imagem): ?>
                <div style="position: relative; display: inline-block;">
                    <img src="<?= Yii::getAlias('@web') . $imagem['caminho_imagem']; ?>" alt="Imagem do Imóvel" style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px;">
                    <a href="<?= Yii::$app->urlManager->createUrl(['imoveis/delete-imagem', 'id' => $imagem['id']]) ?>" 
                       class="btn-delete btn-danger btn-sm" 
                       style="position: absolute; top: 5px; right: 5px;">
                       X
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <br>

    <?= $form->field($model, 'imagensUpload[]', ['labelOptions' => ['style' => 'margin-bottom: 10px; display: block;']])
        ->fileInput(['multiple' => true]) ?>
    <p class="text-muted">Você pode adicionar novas imagens (PNG, JPG, JPEG).</p>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
