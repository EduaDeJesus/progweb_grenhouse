<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Preferências do Usuário';
?>

<div class="usuario-preferencias">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Aqui você pode ajustar as suas preferências de usuário.</p>

    <form method="post">
        <div class="form-group">
            <label for="language">Idioma:</label>
            <select id="language" name="language" class="form-control">
                <option value="pt">Português</option>
                <option value="en">Inglês</option>
                <option value="es">Espanhol</option>
            </select>
        </div>

        <div class="form-group">
            <label for="notifications">Notificações:</label>
            <input type="checkbox" id="notifications" name="notifications" value="1">
            <label for="notifications">Receber notificações por e-mail</label>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Preferências</button>
    </form>
</div>