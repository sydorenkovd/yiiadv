<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $job frontend\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create">
<h1 class="page-header">Create Job</h1>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($job); ?>
        <?= $form->field($job, 'category_id')->dropDownList(Category::find()
            ->select(['name', 'id'])
            ->indexBy('id')->column(), ['prompt' => 'Select Category']) ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textarea(['rows'=> 4]) ?>
        <?= $form->field($job, 'type')
            ->dropDownList(['full_time' => 'Full-Time',
                'part_time' => 'Part-Time',
                'as_needed' => 'As Needed'], ['prompt' => 'Select job-type']); ?>
        <?= $form->field($job, 'reqierement') ?>
        <?= $form->field($job, 'salary')->dropDownList([
            '$20-40k'=>'$20 - 40k',
            '$40-60k'=>'$40 - 60k',
            '$60-80k'=>'$60 - 80k',
            '$80-100k'=>'$80 - 100k',
            'over'=>'Over $100k',
            'blank' => 'No chosen',
        ],['prompt' => 'Choose salary range']) ?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'state') ?>
        <?= $form->field($job, 'zipcode') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')->checkboxList([ 1 => 'Yes'])
            ->label('Опубликовать?')->hint('Allowed 1 for published and 0 for not') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <? var_dump($job->is_published); ?>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
