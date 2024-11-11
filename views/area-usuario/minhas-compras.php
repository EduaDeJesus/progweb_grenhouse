<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Minhas Compras';
?>

<div class="usuario-minhas-compras">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Abaixo estão listadas as suas compras recentes.</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Data da Compra</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Produto 1</td>
                <td>01/01/2024</td>
                <td>Enviado</td>
                <td><a href="#" class="btn btn-info btn-sm">Ver Detalhes</a></td>
            </tr>
            <tr>
                <td>Produto 2</td>
                <td>15/12/2023</td>
                <td>Pendente</td>
                <td><a href="#" class="btn btn-info btn-sm">Ver Detalhes</a></td>
            </tr>
        </tbody>
    </table>
</div>