<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->title = 'Imóveis';
include 'header.php';

?>

<script 
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFJsyX2884FeaK5XHJ0WML0w8Y4KRuO_8&libraries=places&callback=initMap" 
  async 
  defer>
</script>
<html>
      <section>
            <div>
                  <table width="100%">
                        <tr>
                        <td align="left">
                              <div>
                                    <div class="titulo2" style="margin-top:40px;">Imóveis disponíveis</div>
                                    <div class="titulo2" style="font-size: 20px;font-weight: 500;">em Campo Grande - MS</div>
                              </div>
                        </td>
                        <td align="right" style="padding-right:30px;">
                              <span style="color:#9A9499">Visualizar:</span>

                              <img id="map-img" src="../assets/img/map-grey.svg" alt="Mapa" style="position:relative; top:05px;">
                              <a id="toggle-map-btn" onclick="toggleMap()" style="background:none; border:none; margin-right: 50px; color:#9A9499; cursor:pointer;">Mapa</a>
                              <button class="filter-btn1" id="openFilterBtn">Mais filtros</button>
                        </td>
                        </tr>
                  </table>
            </div>
      </section>

      <section class="map-section">
            <div id="map"></div>
      </section>

      <?php include 'filtro-compra.php'; ?>

      <div class="imovel-resultados">

      <div class="imovel-compra-container">
            <?php foreach ($imoveisFiltrados as $imovel):?>
            <a href="<?= \yii\helpers\Url::to(['/imoveis/view', 'id' => $imovel['id']]) ?>">
                  <div class="imovel-card">
                  <div class="imovel-banner">
                        <img src="<?= Yii::getAlias('@web') . '/' . Html::encode($imovel['imagem']) ?>" alt="Imagem do Imóvel">
                  </div>
                  <div class="imovel-comprar-info">
                        <?php if ($imovel['tipo_imovel'] === 'casa') {?>
                              <div class="imovel-tag">Casa</div>
                        <?php } ?>
                        <?php if ($imovel['tipo_imovel'] == 'apartamento') { ?>
                              <div class="imovel-tag">Apartamento</div>
                        <?php }; ?>
                        <?php if ($imovel['tipo_imovel'] == 'condominio') {?>
                              <div class="imovel-tag">Condomínio</div>
                        <?php }; ?>
                        <?php if ($imovel['tipo_imovel'] == 'area') { ?>
                              <div class="imovel-tag">Área</div>
                        <?php }; ?>

                        <h3><?= Html::encode($imovel['nome']) ?></h3>
                        <p><strong>📍Endereço:</strong> <?= Html::encode($imovel['endereco']); ?></p>
                        <p>🛏️ <?= Html::encode($imovel['quartos']) ?> quartos</p>
                        <p>🚗 <?= Html::encode($imovel['vagas_garagem']) ?> vagas</p>
                        <p>🛁 <?= Html::encode($imovel['banheiros']) ?> banheiros</p>
                        <p><?= Html::encode($imovel['descricao']) ?></p>

                              <div class="imovel-det-preco">
                                    <a class="btn-detalhes btn-info" style="color:white" data-toggle="modal" data-target="#modal_<?= $imovel['id']; ?>">Detalhes</a>
                                    <h4>💰R$ <?= number_format($imovel['preco'], 2, ',', '.') ?></h4>
                              </div>
                        </div>
                  </div>

                  <div class="modal fade" id="modal_<?= Html::encode($imovel['id']); ?>" tabindex="-1" aria-labelledby="modalDetalhesLabel_<?= Html::encode($imovel['id']); ?>" aria-hidden="true">
                  <div class="modal-dialog">
                        <div class="modal-content">
                              <div class="modal-header">
                              <h4 class="modal-title" id="modalDetalhesLabel_<?= $imovel['id']; ?>" style="text-align: center; width: 100%;"><strong><?= Html::encode($imovel['nome']); ?></strong></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body" style="text-align: center;">
                              
                              <p>📐 <?= Html::encode($imovel['area_total']) ?> m²</p>

                                    <div class="imovel-bool">
                                          <?php if ($imovel['mobiliado']): ?>
                                                <div class="imovel-bool-items">🛋️ Mobiliado</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['aceita_pets']): ?>
                                                <div class="imovel-bool-items">🐶 Aceita Pets</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['ar_condicionado']): ?>
                                                <div class="imovel-bool-items">🌬️ Ar-Condicionado</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['area_servico']): ?>
                                                <div class="imovel-bool-items">🪠 Área de Serviço</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['academia']): ?>
                                                <div class="imovel-bool-items">🏋️‍♀️Academia</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['piscina']): ?>
                                                <div class="imovel-bool-items">🤽‍♂️ Piscina</div>
                                          <?php endif; ?>
                                          <?php if ($imovel['playground']): ?>
                                                <div class="imovel-bool-items">🪁 Playground</div>
                                          <?php endif; ?>
                                    </div>
                              </div>
                        </div>
                  </div>
                  </div>
            </a>
            <?php endforeach; ?>
      </div>
      </div>

</html>