<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Home Page';

include 'header.php';

?>

     <section>
            <header style="margin-top: 50px; display:flex; justify-content:center;">

            <div class="header-container">
                  <input type="text" placeholder="🔍 Região, empreendimento ou código" class="search-bar">
                  <select class="search-bar" style="width:150px"  id="filter-type">
                        <option value="comprar">Comprar</option>
                        <option value="alugar">Alugar</option>
                  </select>

                  <select class="search-bar" style="width:200px"  id="filter-type">
                        <option value="alugar">Tipo de Imóvel</option>
                  </select>

                  <select class="search-bar" style="width:200px" id="filter-type">
                        <option value="alugar">Preço</option>
                  </select>

                  <select class="search-bar" style="width:200px" id="filter-type">
                        <option value="alugar">Quartos</option>
                  </select>

                  <button class="filter-btn1" id="openFilterBtn">Mais filtros</button>
            </div>

            </header>

            <div>
                  <table width="100%">
                        <tr>
                              <td align="left">
                                    <div>
                                          <div class="titulo2" style="margin-top:40px;">Imóveis para comprar</div>
                                          <div class="titulo2" style="font-size: 20px;font-weight:500; margin-right:200px;">em Campo Grande - MS</div>
                                    </div>
                              </td>
                              <td align="right" style="padding-right:30px;">
                                    <span style="color:#9A9499">Visualizar:</span>
                                    
                                    <img id="map-img" src="../assets/img/map-grey.svg" alt="Mapa" style="position:relative; top:05px;">
                                    <a id="toggle-map-btn" onclick="toggleMap()" style="background:none; border:none; margin-right: 50px; color:#9A9499; cursor:pointer;">Mapa</a>
                              </td>
                        </tr>
                        </table>
            </div>

      </section>

      <section class="map-section">
             <div id="map"></div>
      </section>

      <?php include 'filtro-compra.php'; ?>


</html>