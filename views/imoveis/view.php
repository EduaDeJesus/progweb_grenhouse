<?php
use yii\helpers\Html;

$this->title = 'Detalhes do Imóvel';
include('header.php');

/* @var $this yii\web\View */
/** @var app\models\ImoveisCompra $model */
/** @var array $imagens */

?>

<div class="imovel-view">
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <h1 class="imovel-title"><?= Html::encode($this->title) ?></h1>

    <a href="/home/comprar"><img src="../assets/img/back-arrow.png" style = "    position: absolute;top: 0;margin-top: 110px;text-align: left;width: 100%;max-width: 60px; margin-left: 30px;"></a>

    <div class="botoes">
        <?php         
        if (Yii::$app->user->isGuest == false) 
            if (Yii::$app->user->identity->funcao == 1): ?>
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn-view-editar']) ?>
                <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
                    'class' => 'btn-view-excluir',
                    'data' => [
                        'confirm' => 'Tem certeza de que deseja excluir este imóvel?',
                        'method' => 'post',
                    ],
                ]) ?>
        <?php endif; ?>
    </div>

    <div class="imovel-view-container">
        <div class="imovel-imagem">
        <?= Html::img(Yii::getAlias('@web') . '/' . $model->imagem, ['alt' => 'Imagem do Imóvel', 'class' => 'imagem-principal']) ?>
        <div class="imagens-atual">
            <p>Imagens atuais:</p>
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <?php foreach ($imagens as $imagem): ?>
                    <div style="position: relative; display: inline-block;">
                        <?= Html::a(
                            Html::img(Yii::getAlias('@web') . $imagem['caminho_imagem'], [
                                'alt' => 'Imagem do Imóvel',
                                'style' => 'width: 250px; height: 150px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px;',
                                'data-toggle' => 'modal',
                                'data-target' => '#imageModal-' . $imagem['id'],
                                'data-image' => Yii::getAlias('@web') . $imagem['caminho_imagem']
                            ]), 
                            '#'
                        ) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
        <div class="imovel-info">
            <h2 class="info-titulo"><?= Html::encode($model->nome) ?></h2>
            <p class="info-nome">Tipo do imóvel:  <?= ($model['tipo_imovel'] === 'casa') ? 'Casa' :
                    (($model['tipo_imovel'] === 'apartamento') ? 'Apartamento' :
                    (($model['tipo_imovel'] === 'condominio') ? 'Condomínio' :
                    (($model['tipo_imovel'] === 'area') ? 'Área' : ''))) ?></p>

            <br>

            <p class="info-endereco">Endereço: <?= Html::encode($model->endereco) ?></p>

            <br>


            <div class="info-itens">
                <h3>Detalhes</h3>
                <p class="info-descricao"><?= Html::encode($model->descricao) ?> </p>
                <br>
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
        <div class="imovel-info-2">
            <p class="info-preco"><strong>R$ <?= number_format($model->preco, 2, ',', '.') ?></strong></p>


            <?php
                if (Yii::$app->user->isGuest) {
            ?>
                       
            <a class='btn-visita btn-success' href="/login">Reservar visita</a>

            <?php } 
            
            if (Yii::$app->user->isGuest == false) {?>

            <?= Html::a('Reservar visita', ['registrar-compra', 'usuarioId' => Yii::$app->user->id, 'imovelId' => $model->id], [
                                'class' => 'btn-visita btn-success',
                                'data' => [
                                    'confirm' => 'Tem certeza que deseja agendar uma visita a este imóvel?',
                                    'method' => 'post',
                                ],
                            ]) ?>
            <?php }?>
        </div>
    </div>

    <?php foreach ($imagens as $imagem): ?>

    <div class="modal fade" id="imageModal-<?= $imagem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel-<?= $imagem['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage-<?= $imagem['id'] ?>" src="<?= Yii::getAlias('@web') . $imagem['caminho_imagem']?>" alt="Imagem ampliada" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>



</div>