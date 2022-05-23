<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Обновить запись: ' . $record->name;
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'record' => $record,
    ]) ?>

</div>
