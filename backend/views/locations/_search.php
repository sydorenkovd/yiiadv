<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LocationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'global')->textInput(['style'=>['width' => '300px']]) ?>

<!--    --><?//= $form->field($model, 'zip_code') ?>
<!---->
<!--    --><?//= $form->field($model, 'city') ?>
<!---->
<!--    --><?//= $form->field($model, 'province') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
