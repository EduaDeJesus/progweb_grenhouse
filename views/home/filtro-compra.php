<!-- filtro-imovel.php -->
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