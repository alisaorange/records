<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($record, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($record, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($record, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($record, 'phone')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>