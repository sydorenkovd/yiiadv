<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_id')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_moderate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
