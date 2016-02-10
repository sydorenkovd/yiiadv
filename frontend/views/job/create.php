<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category_id') ?>
        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'type') ?>
        <?= $form->field($model, 'reqierement') ?>
        <?= $form->field($model, 'salary') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'zipcode') ?>
        <?= $form->field($model, 'contact_email') ?>
        <?= $form->field($model, 'contact_form') ?>
        <?= $form->field($model, 'is_published') ?>
        <?= $form->field($model, 'create_date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
