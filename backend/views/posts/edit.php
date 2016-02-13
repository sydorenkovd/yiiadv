<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Author;

?>

<div class="posts-form">
    <? $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($post); ?>
    <?= $form->field($post, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($post, 'is_moderate')->textInput()->label('Модерировать') ?>
    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success'])?>
    <? var_dump($post->is_moderate); ?>
    <?php ActiveForm::end(); ?>
</div>