<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Добавить запись';
$this->params['breadcrumbs'][] = ['label' => 'Записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'record' => $record,
    ]) ?>

</div>
