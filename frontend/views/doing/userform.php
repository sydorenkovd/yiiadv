<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<? $this->title = 'User From';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->session->hasFlash('done')){
    echo "<div class='alert alert-success'>". Yii::$app->session->getFlash('done')."</div>";
} ?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($userform); ?>
<?= $form->field($userform, 'name'); ?>
<?= $form->field($userform, 'email'); ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']); ?>
<? ActiveForm::end(); ?>