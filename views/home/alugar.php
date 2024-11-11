<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
      <meta name="viewport">
      <link rel="stylesheet" href="../css/index.css" />
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
      <script src="../js/scripts.js"></script>
</head>

<body> 

      <section>
            <body>
                  <div class="home-1">
                        <div class="home-2">
                              <a href="../Home/index.html"><img class="icon-logo" alt="" src="../assets/perez-lopes.png"></a>
                              <div class="navigation">
                                    <a href="../Rent_Buy/alugar.html"><div class="text-ban">Alugar</div></a>
                                    <a href="../Rent_Buy/comprar.html"><div class="text-ban">Comprar</div></a>
                                    <div class="text-ban">Lançamentos</div>
                                    <div class="text-ban">Para investir</div>
                                    <div class="text-ban">Built to Suit</div>
                                    <div class="mais-parent">
                                          <div class="mais">Mais</div>
                                          <img class="icons" alt=""
                                                src="../assets/KeyboardArrowDownOutlined.svg">
            
                                    </div>
                              </div>
                              <div class="button19">
                                    <div class="button20">
                                          <div class="button21">
                                                <div class="base">
                                                      <img class="masked-icon" alt="">
                                                      <a href="#"><div class="button-text">Área do cliente</div></a>
                                                      <img class="masked-icon" alt="">
            
                                                </div>
                                          </div>
                                          <div class="button23">
                                                <div class="base">
                                                      <img class="masked-icon" alt="">
                                                                          <a href="#"><div class="button-text">Anuncie</div></a>
                                                      <img class="masked-icon" alt="">
                                                </div>
                                          </div>
                                    </div>
                                    <img class="mapoutlined-icon" alt="" src="../assets/MenuOutlined.svg">
                              </div>
                        </div>
                  </div>
                  <div class="home">
            </div>

     </section>

     <section>
            <header style="margin-top: 50px; display:flex; justify-content:center;">

            <div class="header-container">
                  <input type="text" placeholder="🔍 Região, empreendimento ou código" class="search-bar">
                  <select class="search-bar" style="width:150px"  id="filter-type">
                        <option value="alugar">Alugar</option>
                        <option value="comprar">Comprar</option>
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
                                    <div class="titulo2" style="margin-top:40px;">125 Imóveis para alugar</div>
                                    <div class="titulo2" style="font-size: 20px;font-weight:500; margin-right:250px;">em Campo Grande - MS</div>
                                    </div>
                              </td>
                              <td align="right" style="padding-right:30px;">
                                    <span style="color:#9A9499">Visualizar em:</span>
                                    
                                    <img id="grid-img" src="../assets/grid-gray.svg" alt="Grade" style="position:relative; top:05px;">
                                    <a id="toggle-grid-btn" onclick="toggleGrid()" style="background:none; border:none; color:#9A9499; cursor:pointer;">Grade</a>
                                    
                                    <img id="map-img" src="../assets/map-grey.svg" alt="Mapa" style="position:relative; top:05px;">
                                    <a id="toggle-map-btn" onclick="toggleMap()" style="background:none; border:none; margin-right: 50px; color:#9A9499; cursor:pointer;">Mapa</a>
                              </td>
                        </tr>
                        </table>
            </div>

      </section>

      <section class="map-section">
                  <div id="map"></div>
              </section>

            <div class="filter-nav" id="filterNav">
                  <button class="close-btn" id="closeFilterBtn">X</button>
              
                  <div class="filter-section">
                    <h3>Tipo do imóvel</h3>
                    <div class="filter-options">
                      <input type="checkbox" id="apartamento" hidden>
                      <label for="apartamento">Apartamento</label>
              
                      <input type="checkbox" id="casa" hidden>
                      <label for="casa">Casa</label>
              
                      <input type="checkbox" id="condominio" hidden>
                      <label for="condominio">Casa em condomínio</label>
              
                      <input type="checkbox" id="area" hidden>
                      <label for="area">Área</label>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Preço (R$)</h3>
                    <input type="range" min="0" max="5000" step="100">
                    <p>Máximo: R$ 5.000</p>
                  </div>
              
                  <div class="filter-section">
                    <h3>Quartos</h3>
                    <div class="filter-options">
                      <div class="button-option">Tanto faz</div>
                      <div class="button-option">1+</div>
                      <div class="button-option">2+</div>
                      <div class="button-option">3+</div>
                      <div class="button-option">4+</div>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Vagas na garagem</h3>
                    <div class="filter-options">
                      <div class="button-option">Tanto faz</div>
                      <div class="button-option">1+</div>
                      <div class="button-option">2+</div>
                      <div class="button-option">3+</div>
                      <div class="button-option">4+</div>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Banheiros</h3>
                    <div class="filter-options">
                      <div class="button-option">Tanto faz</div>
                      <div class="button-option">1+</div>
                      <div class="button-option">2+</div>
                      <div class="button-option">3+</div>
                      <div class="button-option">4+</div>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Área total (m²)</h3>
                    <input type="range" min="0" max="500" step="10">
                    <p>Máximo: 500m²</p>
                  </div>
              
                  <div class="filter-section">
                    <h3>Mobiliado</h3>
                    <div class="filter-options">
                      <input type="radio" id="mobiliado-tantofaz" name="mobiliado" hidden>
                      <label for="mobiliado-sim">Tanto faz</label>

                      <input type="radio" id="mobiliado-sim" name="mobiliado" hidden>
                      <label for="mobiliado-sim">Sim</label>
              
                      <input type="radio" id="mobiliado-nao" name="mobiliado" hidden>
                      <label for="mobiliado-nao">Não</label>
                    </div>
              
                    <h3>Aceita pets?</h3>
                    <div class="filter-options">
                      <input type="radio" id="pets-tantofaz" name="pets" hidden>
                      <label for="pets-sim">Tanto faz</label>

                      <input type="radio" id="pets-sim" name="pets" hidden>
                      <label for="pets-sim">Sim</label>
              
                      <input type="radio" id="pets-nao" name="pets" hidden>
                      <label for="pets-nao">Não</label>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Itens do imóvel</h3>
                    <div class="filter-options">
                      <input type="checkbox" id="ar-condicionado" hidden>
                      <label for="ar-condicionado">Ar condicionado</label>
              
                      <input type="checkbox" id="area-servico" hidden>
                      <label for="area-servico">Área de serviço</label>
              
                      <input type="checkbox" id="armario-cozinha" hidden>
                      <label for="armario-cozinha">Armário na cozinha</label>
                    </div>
                  </div>
              
                  <div class="filter-section">
                    <h3>Itens do condomínio</h3>
                    <div class="filter-options">
                      <input type="checkbox" id="academia" hidden>
                      <label for="academia">Academia</label>
              
                      <input type="checkbox" id="piscina" hidden>
                      <label for="piscina">Piscina</label>
              
                      <input type="checkbox" id="playground" hidden>
                      <label for="playground">Playground</label>
                    </div>
                  </div>
              
                  <div class="filter-section filter-buttons">
                    <button class="button clear-button">Limpar filtros</button>
                    <button class="button apply-button">Aplicar filtros</button>
                  </div>
                </div>
      </section>

      <section>
            <div class="card">
              
                  <div class="card-row">
                        <div class="card-row1">
                              <div class="destaques">
                                    <div class="container">
                                                <div class="base2"></div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="card">
                              <div class="card-row">
                                    <div class="card-row1">
                                          <div class="apartamento">
                                                <div class="content-auto-layout">
                                                      <img class="image-icon" alt="" src="../assets/image4.png">
                                                      <div class="content">
                                                            <div class="head">
                                                                  <div class="name">
                                                                        <div class="tags">
                                                                              <div class="tag">
                                                                                    <div class="martese">CASA DE CONDOMÍNIO
                                                                                    </div>
                                                                              </div>
                                                                              <div class="patrocinado">
                                                                                    <div class="patrocinado-child">
                                                                                    </div>
                                                                                    <div class="r-1207000-wrapper">
                                                                                          <b class="r-1207000">patrocinado</b>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="primeira-linha">
                                                                              <div class="verified">
                                                                              </div>
                                                                              <div class="martese1">Rua Antônio Maria Coelho
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="adress">
                                                                        <div class="status-endereo">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/MapOutlined.svg">
      
                                                                              <div class="pronto-para-morar">Vivendas do
                                                                                    Bosque, Campo Grande </div>
                                                                        </div>
                                                                        <div class="segunda-linha"> </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <div class="mapoutlined-icon">
                                                                                    <img class="ruler-icon" alt=""
                                                                                          src="../assets/ruler.png">

                                                                              </div>
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">223,4m²</div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BedOutlined.svg">
      
                                                                              <div class="text-ban">2 Dorms (1 Suíte)</div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BathtubOutlined.svg">
      
                                                                              <div class="text-ban">2 Banh</div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/DirectionsCarOutlined.svg">
      
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">1 vaga</div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="bottom">
                                                                  <div class="price">
                                                                        <div class="price1">
                                                                              <div class="apartamento-overrides-vend">
                                                                                    <div class="text-price">ALUGUEL POR</div>
                                                                              </div>
                                                                              <div class="price-horizontal">
                                                                                    <div class="apartamento-overrides-pric">
                                                                                          <div class="price2">R$ 5.456,87
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="actions">
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/ri_whatsapp-fill.svg">
      
                                                      </div>
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/FavoriteBorderOutlined.svg">
      
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="apartamento">
                                                <div class="content-auto-layout">
                                                      <img class="image-icon" alt="" src="../assets/image5.png">
      
                                                      <div class="content">
                                                            <div class="head">
                                                                  <div class="name">
                                                                        <div class="tags">
                                                                              <div class="tag">
                                                                                    <div class="martese">APARTAMENTO</div>
                                                                              </div>
                                                                              <div class="patrocinado">
                                                                                    <div class="patrocinado-child">
                                                                                    </div>
                                                                                    <div class="r-1207000-wrapper">
                                                                                          <b class="r-1207000">patrocinado</b>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="primeira-linha">
                                                                              <div class="verified">
                                                                              </div>
                                                                              <div class="martese1">Residencial Vila Nova
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="adress">
                                                                        <div class="status-endereo">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/MapOutlined.svg">
      
                                                                              <div class="pronto-para-morar">Trancoso, Campo
                                                                                    Grande </div>
                                                                        </div>
                                                                        <div class="segunda-linha"> </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <div class="mapoutlined-icon">
                                                                                    <img class="ruler-icon" alt=""
                                                                                          src="../assets/ruler.png">
      
      
                                                                              </div>
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">223,4m²</div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BedOutlined.svg">
      
                                                                              <div class="text-ban">2 Dorms (1 Suíte)</div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BathtubOutlined.svg">
      
                                                                              <div class="text-ban">2 Banh</div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/DirectionsCarOutlined.svg">
      
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">1 vaga</div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="bottom">
                                                                  <div class="price">
                                                                        <div class="price1">
                                                                              <div class="apartamento-overrides-vend">
                                                                                    <div class="text-price">VENDA A PARTIR DE
                                                                                    </div>
                                                                              </div>
                                                                              <div class="price-horizontal">
                                                                                    <div class="apartamento-overrides-pric">
                                                                                          <div class="price2">R$ 640.000,00
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="actions">
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/ri_whatsapp-fill.svg">
      
                                                      </div>
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/FavoriteBorderOutlined.svg">
      
                                                      </div>
                                                      <div class="comparar">
                                                            <img class="mapoutlined-icon" alt="" src="../assets/copy.svg">
      
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="apartamento">
                                                <div class="content-auto-layout">
                                                      <img class="image-icon" alt="" src="../assets/image6.png">
      
                                                      <div class="content">
                                                            <div class="head">
                                                                  <div class="name">
                                                                        <div class="tags">
                                                                              <div class="tag">
                                                                                    <div class="martese">CASA DE CONDOMÍNIO
                                                                                    </div>
                                                                              </div>
                                                                              <div class="patrocinado">
                                                                                    <div class="patrocinado-child">
                                                                                    </div>
                                                                                    <div class="r-1207000-wrapper">
                                                                                          <b class="r-1207000">patrocinado</b>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="primeira-linha">
                                                                              <div class="verified">
                                                                              </div>
                                                                              <div class="martese1">Edifício Montes Claros
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="adress">
                                                                        <div class="status-endereo">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/MapOutlined.svg">
      
                                                                              <div class="pronto-para-morar">Cidade Jardim,
                                                                                    Campo Grande</div>
                                                                        </div>
                                                                        <div class="segunda-linha"> </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <div class="mapoutlined-icon">
                                                                                    <img class="ruler-icon" alt=""
                                                                                          src="../assets/ruler.png">
                                                                              </div>
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">223,4m²</div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BedOutlined.svg">
      
                                                                              <div class="text-ban">2 Dorms (1 Suíte)</div>
                                                                        </div>
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/BathtubOutlined.svg">
      
                                                                              <div class="text-ban">2 Banh</div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="items">
                                                                        <div class="metro">
                                                                              <img class="mapoutlined-icon" alt=""
                                                                                    src="../assets/DirectionsCarOutlined.svg">
      
                                                                              <div class="text-m2-parent">
                                                                                    <div class="text-ban">1 vaga</div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="bottom">
                                                                  <div class="price">
                                                                        <div class="price1">
                                                                              <div class="apartamento-overrides-vend">
                                                                                    <div class="text-price">VENDA A PARTIR DE
                                                                                    </div>
                                                                              </div>
                                                                              <div class="price-horizontal">
                                                                                    <div class="apartamento-overrides-pric">
                                                                                          <div class="price2">R$ 890.000,00
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="actions">
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/ri_whatsapp-fill.svg">
                                                      </div>
                                                      <div class="chat">
                                                            <img class="mapoutlined-icon" alt=""
                                                                  src="../assets/FavoriteBorderOutlined.svg">
                                                      </div>
                                                      <div class="comparar">
                                                            <img class="mapoutlined-icon" alt="" src="../assets/copy.svg">
      
                                                      </div>
                                                </div>            
                                          </div>
                                    </div>
                              <div class="card-child">
                        </div>
                  </div>
            </div>
      </section>

      <section style="margin-top:200px">

            <div class="titulo2">Os imóveis mais procurados do momento.</div>
            <div class="titulo2" style="font-size: 20px;font-weight:500">São inúmeras opções para você encontrar o lar dos seus sonhos</div> 

            <div class="accordions" style="margin-top:100px;padding: 0px 100px 0px 100px;"> 
                  <div class="accordion-item">
                      <input type="radio" name="accordion" checked="checked" id="accordion-1"/>
                      <label for= "accordion-1">Imóveis para alugar em Campo Grande (MS)</label>
                      <div class="accordion-content">
                        
                        <table>
                              <tr>
                                    <td>
                                          <p class="imoveis-procurados">Imóveis em Centro</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim dos Estados</p>
                                          <p class="imoveis-procurados">Imóveis em Vila Sobrinho</p>
                                          <p class="imoveis-procurados">Imóveis em Monte Castelo</p>
                                          <p class="imoveis-procurados">Imóveis em Tiradentes</p>
                                          <p class="imoveis-procurados">Imóveis em Amambaí</p>
                                          <p class="imoveis-procurados">Imóveis em Aero Rancho</p>
                                          <p class="imoveis-procurados">Imóveis em Guanandi</p>
                                          <p class="imoveis-procurados">Imóveis em Carandá Bosque</p>
                                          <p class="imoveis-procurados">Imóveis em Coophavila II</p>
                                    </td>
                                    <td>
                                          <p class="imoveis-procurados">Imóveis em Chácara Cachoeira</p>
                                          <p class="imoveis-procurados">Imóveis em Itanhangá Park</p>
                                          <p class="imoveis-procurados">Imóveis em Mata do Jacinto</p>
                                          <p class="imoveis-procurados">Imóveis em Nova Lima</p>
                                          <p class="imoveis-procurados">Imóveis em Taveirópolis</p>
                                          <p class="imoveis-procurados">Imóveis em São Francisco</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim Noroeste</p>
                                          <p class="imoveis-procurados">Imóveis em Pioneiros</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim São Lourenço</p>
                                          <p class="imoveis-procurados">Imóveis em Santo Antônio</p>
                                    </td>
                                    <td>
                                          <p class="imoveis-procurados">Imóveis em Los Angeles</p>
                                          <p class="imoveis-procurados">Imóveis em Coronel Antonino</p>
                                          <p class="imoveis-procurados">Imóveis em Vila Nasser</p>
                                          <p class="imoveis-procurados">Imóveis em Parque dos Poderes</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim dos Estados</p>
                                          <p class="imoveis-procurados">Imóveis em Rita Vieira</p>
                                          <p class="imoveis-procurados">Imóveis em Universitário</p>
                                          <p class="imoveis-procurados">Imóveis em Pioneiros</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim Panamá</p>
                                          <p class="imoveis-procurados">Imóveis em Jardim Morena</p>
                                    </td>
                              </tr>
                        </table>
                      </div>
                  </div> 
                  <div class="accordion-item">
                      <input type="radio" name="accordion" id="accordion-2" />
                      <label for= "accordion-2">Imóveis para alugar em São Paulo (SP)</label>
                      <div class="accordion-content">
                              <table>
                                    <tr>
                                          <td>

                                                <p class="imoveis-procurados">Imóveis em Moema</p>
                                                <p class="imoveis-procurados">Imóveis em Pinheiros</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Mariana</p>
                                                <p class="imoveis-procurados">Imóveis em Jardins</p>
                                                <p class="imoveis-procurados">Imóveis em Morumbi</p>
                                                <p class="imoveis-procurados">Imóveis em Itaim Bibi</p>
                                                <p class="imoveis-procurados">Imóveis em Tatuapé</p>
                                                <p class="imoveis-procurados">Imóveis em Perdizes</p>
                                                <p class="imoveis-procurados">Imóveis em Santana</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Madalena</p>
                                          </td>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Campo Belo</p>
                                                <p class="imoveis-procurados">Imóveis em Brooklin</p>
                                                <p class="imoveis-procurados">Imóveis em Lapa</p>
                                                <p class="imoveis-procurados">Imóveis em Mooca</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Olímpia</p>
                                                <p class="imoveis-procurados">Imóveis em Butantã</p>
                                                <p class="imoveis-procurados">Imóveis em Pompeia</p>
                                                <p class="imoveis-procurados">Imóveis em Consolação</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Leopoldina</p>
                                                <p class="imoveis-procurados">Imóveis em Liberdade</p>
                                          </td>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Higienópolis</p>
                                                <p class="imoveis-procurados">Imóveis em Cambuci</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Nova Conceição</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Clementino</p>
                                                <p class="imoveis-procurados">Imóveis em Bela Vista</p>
                                                <p class="imoveis-procurados">Imóveis em Santo Amaro</p>
                                                <p class="imoveis-procurados">Imóveis em Paraíso</p>
                                                <p class="imoveis-procurados">Imóveis em Jabaquara</p>
                                                <p class="imoveis-procurados">Imóveis em Santa Cecília</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Prudente</p>
                                          </td>
                                    </tr>
                              </table>
                        </div>
                  </div> 
                  <div class="accordion-item">
                      <input type="radio" name="accordion" id="accordion-3" />
                      <label for= "accordion-3">Imóveis para alugar no Rio de Janeiro (RJ)</label>
                        <div class="accordion-content">
                              <table>
                                    <tr>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Copacabana</p>
                                                <p class="imoveis-procurados">Imóveis em Ipanema</p>
                                                <p class="imoveis-procurados">Imóveis em Leblon</p>
                                                <p class="imoveis-procurados">Imóveis em Barra da Tijuca</p>
                                                <p class="imoveis-procurados">Imóveis em Botafogo</p>
                                                <p class="imoveis-procurados">Imóveis em Flamengo</p>
                                                <p class="imoveis-procurados">Imóveis em Tijuca</p>
                                                <p class="imoveis-procurados">Imóveis em Laranjeiras</p>
                                                <p class="imoveis-procurados">Imóveis em Santa Teresa</p>
                                                <p class="imoveis-procurados">Imóveis em Lagoa</p>
                                          </td>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Centro</p>
                                                <p class="imoveis-procurados">Imóveis em Méier</p>
                                                <p class="imoveis-procurados">Imóveis em Jacarepaguá</p>
                                                <p class="imoveis-procurados">Imóveis em Glória</p>
                                                <p class="imoveis-procurados">Imóveis em Recreio dos Bandeirantes</p>
                                                <p class="imoveis-procurados">Imóveis em Jardim Botânico</p>
                                                <p class="imoveis-procurados">Imóveis em Gávea</p>
                                                <p class="imoveis-procurados">Imóveis em São Conrado</p>
                                                <p class="imoveis-procurados">Imóveis em Catete</p>
                                                <p class="imoveis-procurados">Imóveis em Urca</p>
                                          </td>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Leme</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Isabel</p>
                                                <p class="imoveis-procurados">Imóveis em Maracanã</p>
                                                <p class="imoveis-procurados">Imóveis em Grajaú</p>
                                                <p class="imoveis-procurados">Imóveis em Engenho de Dentro</p>
                                                <p class="imoveis-procurados">Imóveis em Méier</p>
                                                <p class="imoveis-procurados">Imóveis em Madureira</p>
                                                <p class="imoveis-procurados">Imóveis em Ilha do Governador</p>
                                                <p class="imoveis-procurados">Imóveis em Ramos</p>
                                                <p class="imoveis-procurados">Imóveis em Anil</p>
                                          </td>
                                    <tr>
                              </table>
                        </div>
                  </div>
                  <div class="accordion-item">
                        <input type="radio" name="accordion" id="accordion-4" />
                        <label for="accordion-4">Imóveis para alugar no Rio de Janeiro (RJ)</label>
                        <div class="accordion-content">
                              <table>
                                    <tr>
                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Centro</p>
                                                <p class="imoveis-procurados">Imóveis em Barra Sul</p>
                                                <p class="imoveis-procurados">Imóveis em Barra Norte</p>
                                                <p class="imoveis-procurados">Imóveis em Pioneiros</p>
                                                <p class="imoveis-procurados">Imóveis em Nações</p>
                                                <p class="imoveis-procurados">Imóveis em Estados</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Real</p>
                                                <p class="imoveis-procurados">Imóveis em Praia Brava</p>
                                                <p class="imoveis-procurados">Imóveis em Estaleiro</p>
                                                <p class="imoveis-procurados">Imóveis em Ariribá</p>
                                          </td>

                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Nova Esperança</p>
                                                <p class="imoveis-procurados">Imóveis em Santa Regina</p>
                                                <p class="imoveis-procurados">Imóveis em Municípios</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Fortaleza</p>
                                                <p class="imoveis-procurados">Imóveis em São Judas Tadeu</p>
                                                <p class="imoveis-procurados">Imóveis em dos Pescadores</p>
                                                <p class="imoveis-procurados">Imóveis em das Nações</p>
                                                <p class="imoveis-procurados">Imóveis em Ressacada</p>
                                                <p class="imoveis-procurados">Imóveis em Balneário Santa Clara</p>
                                                <p class="imoveis-procurados">Imóveis em Praia dos Amores</p>
                                          </td>

                                          <td>
                                                <p class="imoveis-procurados">Imóveis em Nova Esperança</p>
                                                <p class="imoveis-procurados">Imóveis em Pioneiros</p>
                                                <p class="imoveis-procurados">Imóveis em Ariribá</p>
                                                <p class="imoveis-procurados">Imóveis em Municípios</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Real</p>
                                                <p class="imoveis-procurados">Imóveis em Vila Fortaleza</p>
                                                <p class="imoveis-procurados">Imóveis em Estaleirinho</p>
                                                <p class="imoveis-procurados">Imóveis em Interpraias</p>
                                                <p class="imoveis-procurados">Imóveis em Bairro da Barra</p>
                                                <p class="imoveis-procurados">Imóveis em Rio Pequeno</p>
                                          </td>
                                    </tr>
                              </table>
                        </div>
                  </div>
            </div>
            <section style="margin-top: 200px; background-color: #0b0b0b;">

                  <div class="footer">
                          <div class="footer-top">
                          <table style="width: 100%;">
                                  <tr class="footer-table1">
                                  <td style="font-size: 25px;">
                                          <img alt="" src="../assets/teste.png">
                                          <p style="color:white; opacity:0.7;">Realizamos sonhos, oferecendo serviços imobiliários de excelência.<br>Lançamentos, compra, venda e aluguel de imóveis.<br>CRECI: 6313J  |  CNPJ: 17.450.002/0001-55</p>
                                  </td>
                                  <td>
                                          <div style="color: #fff; padding:0px 50px 30px 0px; font-weight:600; font-size:20px;">Inscreva-se em nossa newsletter</div>
                                          <div class="right-section" style="background-color: unset; padding:0; height: 50px; width:600px;">
                                                  <div class="field-group">
                                                  <input type="text" style="height: 40px;" id="search" placeholder="Insira seu e-mail" required>
                                                  <div class="primary-button" style="top: unset;right: unset; margin-left: 420px;margin-top: -80px;">
                                                          <div class="master-primary-button">
                                                                  <div class="button-text">Inscrever-se</div>
                                                          </div>
                                                  </div>
                                                  
                                                  </div>
                                          </div>
                                  </td>
                                  </tr>
                          </table>
                  </div>
                  <div class="footer2" style="background-color: #0b0b0b;">          
                          <table style="width:100%;">      
                                  <tr class="footer-table2">
                                  <td class="menu-adress">
                                          <div class="footer-title">
                                                  <div class="menu-title" style="margin-bottom:3px solid;">Fale conosco</div>
                                                          <div><img style="position: relative;top: 10px; margin-right: 10px;margin-top:10px;" alt="" src="../assets/whatsapp-red.svg"><span style="opacity:0.7;">(67) 99225 - 5605</span></div>
                                                          <div><img style="position: relative;top: 10px; margin-right: 10px;" alt="" src="../assets/PhoneOutlined.svg"><span style="opacity:0.7;">(67) 3324 - 1040</span></div>  
                                                  </div>
                                          </div>
                                          <div class="footer-title">
                                                  <div class="menu-title" style="margin-top:30px;">Endereço</div>
                                                          
                                                  <div class="" style="position: relative; display: flex; margin-top:30px;"><img class="" alt="" src="../assets/akar-icons_location.svg" style="margin-right: 10px;"><span style="opacity:0.7;">Rua Antônio Maria Coelho, 3315 - Jardim dos <br>Estados - Campo Grande - MS - CEP: 79020-210</span></div>
                                                  <br>
                                                  <div style="opacity:0.7;">R2 Consultoria Empresarial, Intermediação e Venda de <br>Imóveis - CRECI: 5945 | CNPJ: 16.987.644/0001-55</div>
                                          </div>
                                  </td>
                                  <td class="menu-option">
                                          <label class="menu-title">Nossos serviços</label> 
                                          <a href="#"><p class="alugar" style="margin-top: 40px;">Alugar</p></a>
                                          <a href="#"><p class="alugar">Comprar</p></a>
                                          <a href="#"><p class="alugar">Lançamentos</p></a>
                                          <a href="#"><p class="alugar">Anunciar imóvel</p></a>
                                          <a href="#"><p class="alugar">Built to suit</p></a>
                                          <a href="#"><p class="alugar">Manutenção</p></a>
                                          <a href="#"><p class="alugar">Desocupação</p>
                                  </td>
                                  <td class="menu-option">
                                          <label class="menu-title">Encontre seu imóvel</label>  
                                          <a href="#"><p class="alugar" style="margin-top: 40px;">Apartamentos</p></a>
                                          <a href="#"><p class="alugar">Casas</p></a>
                                          <a href="#"><p class="alugar">Casas em Condomínio</p></a>
                                          <a href="#"><p class="alugar">Imóveis para investir</p></a>
                                          <a href="#"><p class="alugar">Salas comerciais</p></a>
                                          <a href="#"><p class="alugar">Terrenos</p></a>
                                          <a href="#"><p class="alugar">Áreas de Lazer</p></a>
                                          <a href="#"><p class="alugar">Chácaras / Fazendas</p>
                                  </td>
                                  <td class="menu-option">
                                          <label class="menu-title">Links úteis</label>    
                                          <a href="#"><p class="alugar" style="margin-top: 40px;">Sobre nós</p></a>
                                          <a href="#"><p class="alugar">Área do cliente</p></a>
                                          <a href="#"><p class="alugar">Fale conosco</p></a>
                                          <a href="#"><p class="alugar">Trabalhe conosco</p></a>
                                          <a href="#"><p class="alugar">Blog</p></a>
                                          <a href="#"><p class="alugar">Como alugar</p></a>
                                          <a href="#"><p class="alugar">Como comprar</p></a>
                                  </td>
                                  <td class="menu-option">
                                          <label class="menu-title">Onde estamos</label> 
                                          <a href="#"><p class="alugar" style="margin-top: 40px;">Campo Grande</p></a>
                                          <a href="#"><p class="alugar">Balneário Camboriú</p></a>
                                          <a href="#"><p class="alugar">São Paulo</p></a>
                                          <a href="#"><p class="alugar">Rio de Janeiro</p>
                                  </td>
                                  </tr>
                          </table>          
                  </div>
                          
                          <hr style="opacity: 0.5;width: 95%;">
                  
                          <div class="footer3">
                          
                          <div class="footer-description2" style="display: flex;justify-content: space-between;align-items: center; padding: 10px 50px;">Copyright © Perez Imoveis | Designed by Lab Culture | Todos os direitos reservados
                                  <span style="display: flex; align-items: center;">Siga-nos
                                  <img class="social-media-icon" alt="" src="../assets/linkedin.svg">
                                  <img class="social-media-icon" alt="" src="../assets/instagram.svg">
                                  <img class="social-media-icon" alt="" src="../assets/facebook.svg">  
                                  </span>
                          </div>
                          
                  </div>
            </section>


</body>

</html>