<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use common\models\Posts;
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
<? $s = \yii\helpers\ArrayHelper::map(Posts::find()->all(),'id', 'title');
$i = 0;
foreach($s as $k => $val){
    $a[$i] = $val;
    $i++;
}
?>
<?= $form->field($userform, 'id')->widget(AutoComplete::classname(), [
      'clientOptions' => [
          'source' => $a,
      ],
  ]) ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']); ?>
<? ActiveForm::end(); ?>
<? var_dump($a); ?>

