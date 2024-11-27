<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Minhas Compras';

include 'header.php';

?>

<a href="/home/comprar"><img src="../assets/img/back-arrow.png" style = "    position: absolute;top: 0;margin-top: 110px;text-align: left;width: 100%;max-width: 60px; margin-left: 30px;"></a>

<div class="area-usuario-view">
    <h1><?= Html::encode($this->title) ?></h1>


    <h2>Imóveis Comprados</h2>
    <?php if (!empty($compra)): ?>
        <?php foreach ($compra as $index => $imoveis): ?>
            <h3>Imóvel #<?= $index + 1 ?></h3>
            <?= DetailView::widget([
                'model' => $imoveis,
                'attributes' => [
                    [
                        'label' => 'Imagem',
                        'value' =>  Html::img(Yii::getAlias('@web') . '/' . $imoveis['imagem'], ['alt' => 'Imagem do Imóvel', 'class' => 'imagem-principal', 'style' => 'max-width:200px;']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Nome do Imóvel',
                        'value' => Html::encode($imoveis['nome']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Tipo',
                        'value' => Html::encode($imoveis['tipo_imovel']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Endereço',
                        'value' => Html::encode($imoveis['endereco']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Preço',
                        'value' => 'R$ ' . number_format($imoveis['preco'], 2, ',', '.'),
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Você ainda não comprou nenhum imóvel.</p>
    <?php endif; ?>

    <hr style="margin-top:40px;">

    <h2>Outros Imóveis Associados</h2>
    <?php if (!empty($criados)): ?>
        <?php foreach ($criados as $index => $imovel): ?>
            <h3>Imóvel #<?= $index + 1 ?></h3>
            <?= DetailView::widget([
                'model' => $imovel,
                'attributes' => [
                    [
                        'label' => 'Imagem',
                        'value' =>  Html::img(Yii::getAlias('@web') . '/' . $imovel['imagem'], ['alt' => 'Imagem do Imóvel', 'class' => 'imagem-principal', 'style' => 'max-width:200px;']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Nome do Imóvel',
                        'value' => Html::encode($imovel['nome']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Tipo',
                        'value' => Html::encode($imovel['tipo_imovel']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Endereço',
                        'value' => Html::encode($imovel['endereco']),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Preço',
                        'value' => 'R$ ' . number_format($imovel['preco'], 2, ',', '.'),
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Situação',
                        'value' => $imovel['situacao'] === 'R' ? 'Reservado' : 'Disponível',
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum outro imóvel associado a você.</p>
    <?php endif; ?>
</div>
