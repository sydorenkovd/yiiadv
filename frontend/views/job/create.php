<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $job frontend\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($job, 'category_id')->dropDownList(Category::find()
            ->select(['name', 'id'])
            ->indexBy('id')->column(), ['prompt' => 'Select Category']) ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description') ?>
        <?= $form->field($job, 'type') ?>
        <?= $form->field($job, 'reqierement') ?>
        <?= $form->field($job, 'salary') ?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'state') ?>
        <?= $form->field($job, 'zipcode') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')
            ->label('Опубликовать?')->hint('Allowed 1 for published and 0 for not') ?>
        <?= $form->field($job, 'create_date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
