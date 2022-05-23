<?php

/** @var yii\web\View $this */

$this->title = 'Справочник';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Справочник пользователей</h1>

        <p><a class="btn btn-lg btn-success" type="button" onclick="showRecords()">Показать данные</a></p>
        <div id="loader" class="loader" hidden>
            <div class="loader_inner"></div>
        </div>
        <div id="table_div"></div>
    </div>

</div>
