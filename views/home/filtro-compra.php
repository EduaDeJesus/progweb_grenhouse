<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="filter-nav" id="filterNav">
    <button class="close-btn" id="closeFilterBtn">X</button>

    <div class="body-content">
    <div class="filtro-barra">
        <?php $form = ActiveForm::begin([
            'id' => 'filtro-imoveis',
            'method' => 'post',
            'action' => Url::to(['comprar']),
        ]); ?>

        <div class="filtro-descricao">
            <h4>Palavra-Chave</h4>
            <?= Html::textInput('descricao', isset($filtros['descricao']) ? $filtros['descricao'] : '', ['class' => 'form-control']) ?>
            </div>

        <div class="filtro-tipo">
            <h4>Tipo de Imóvel</h4>
            <?= Html::dropDownList(
                'tipo_imovel', 
                isset($filtros['tipo_imovel']) ? $filtros['tipo_imovel'] : null, 
                [
                    '' => 'Selecione',
                    'casa' => 'Casa',
                    'apartamento' => 'Apartamento',
                    'condominio' => 'Condomínio',
                    'area' => 'Área',
                ], 
                ['class' => 'form-control']
            ) ?>

        </div>

        <div class="filtro-preco">
            <h4>Faixa de Preço</h4>
            <input type="text" id="preco_min" name="preco_min" class="form-control" placeholder="Preço mínimo" value="<?= isset($filtros['preco_min']) ? $filtros['preco_min'] : '' ?>">
            <input type="text" id="preco_max" name="preco_max" class="form-control" placeholder="Preço máximo" value="<?= isset($filtros['preco_max']) ? $filtros['preco_max'] : '' ?>">
        </div>

        <div class="filtro-quartos">
            <h4>Quantidade de Quartos</h4>
            <?= Html::dropDownList('quartos',  isset($filtros['quartos']) ? $filtros['quartos'] : null, [
                '' => 'Selecione',
                '1' => '1+',
                '2' => '2+',
                '3' => '3+',
                '4' => '4+',
            ], ['class' => 'form-control']) ?>
        </div>

        <div class="filtro-vagas">
            <h4>Vagas de Garagem</h4>
            <?= Html::dropDownList('vagas_garagem',  isset($filtros['vagas_garagem']) ? $filtros['vagas_garagem'] : null, [
                '' => 'Selecione',
                '1' => '1+',
                '2' => '2+',
                '3' => '3+',
                '4' => '4+',
            ], ['class' => 'form-control']) ?>
        </div>

        <div class="filtro-banheiros">
            <h4>Banheiros</h4>
            <?= Html::dropDownList('banheiros', isset($filtros['banheiros']) ? $filtros['banheiros'] : null, [
                '' => 'Selecione',
                '1' => '1+',
                '2' => '2+',
                '3' => '3+',
                '4' => '4+',
            ], ['class' => 'form-control']) ?>
        </div>

        <div class="filtro-area">
            <h4>Área Total (m²)</h4>
            <input type="text" id="area_min" name="area_total_min" class="form-control" placeholder="Área mínima" value="<?= isset($filtros['area_total_min']) ? $filtros['banheiros'] : '' ?>">
            <input type="text" id="area_max" name="area_total_max" class="form-control" placeholder="Área máxima" value="<?= isset($filtros['area_total_max']) ? $filtros['banheiros'] : '' ?>">
        </div>

        <div class="filtro-caracteristicas">
            <h4>Características</h4>
            <?= Html::checkboxList('caracteristicas',isset($filtros['caracteristicas']) ? $filtros['caracteristicas'] : [],[
                'mobiliado' => 'Mobiliado',
                'ar_condicionado' => 'Ar-Condicionado',
                'armario_cozinha' => 'Armário na Cozinha',
                'area_servico' => 'Área de Serviço',
                'aceita_pets' => 'Aceita Pets',
                'academia' => 'Academia',
                'piscina' => 'Piscina',
                'playground' => 'Playground',
            ], ['class' => 'form-control', 'style' => 'display: flex;flex-direction: column; color: white; background-color: #333']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Aplicar filtros', ['class' => 'btn btn-primary btn-separate', 'style' => 'margin-bottom: auto;',]) ?>
            <?= Html::submitButton('Limpar filtros', ['class' => 'btn-limpar btn-secondary btn-separate', 'name' => 'limpar_filtros', 'value' => 'true']) ?>  
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>