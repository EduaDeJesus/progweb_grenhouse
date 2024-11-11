<?php
use yii\helpers\Html;

$this->title = 'Detalhes do Imóvel';
?>

<div class="imovel-view">
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <h1 class="imovel-title"><?= Html::encode($this->title) ?></h1>
    
    <div class="imovel-container">
        <div class="imovel-imagem">
            <?= Html::img(Yii::getAlias('@web') . '/' . $model->imagem, ['alt' => 'Imagem do Imóvel', 'class' => 'imagem-principal']) ?>
        </div>

        <div class="imovel-info">
            <h2 class="info-titulo"><?= Html::encode($model->nome) ?></h2>
            <p class="info-nome">Tipo do imóvel: <?= Html::encode($model->tipo_imovel) ?></p>
            <p class="info-endereco">Endereço: <?= Html::encode($model->endereco) ?></p>

            <div class="info-itens">
                <h3>Detalhes</h3>
                <p class="info-preco">Preço: <strong>R$ <?= number_format($model->preco, 2, ',', '.') ?></strong></p>
                <p class="info-quartos">Quartos: <?= Html::encode($model->quartos) ?></p>
                <p class="info-vagas">Vagas de Garagem: <?= Html::encode($model->vagas_garagem) ?></p>
                <p class="info-banho">Banheiros: <?= Html::encode($model->banheiros) ?></p>
                <p class="info-area">Área Total: <?= Html::encode($model->area_total) ?> m²</p>
            </div>

            <div class="info-itens">
                <h3>Itens do Imóvel</h3>
                <ul>
                    <li>Ar Condicionado: <?= $model->ar_condicionado ? 'Sim' : 'Não' ?></li>
                    <li>Área de Serviço: <?= $model->area_servico ? 'Sim' : 'Não' ?></li>
                    <li>Armário na Cozinha: <?= $model->armario_cozinha ? 'Sim' : 'Não' ?></li>
                </ul>
            </div>

            <div class="info-condominio">
                <h3>Itens do Condomínio</h3>
                <ul>
                    <li>Academia: <?= $model->academia ? 'Sim' : 'Não' ?></li>
                    <li>Piscina: <?= $model->piscina ? 'Sim' : 'Não' ?></li>
                    <li>Playground: <?= $model->playground ? 'Sim' : 'Não' ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="botoes">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este imóvel?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
</div>