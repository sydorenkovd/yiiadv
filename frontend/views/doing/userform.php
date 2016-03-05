<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use common\models\Posts;
use common\models\DoingName;

?>
<? $this->title = 'User From';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->session->hasFlash('done')){
    echo "<div class='alert alert-success'>". Yii::$app->session->getFlash('done')."</div>";
} ?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($userform, 'name'); ?>
<?= $form->field($userform, 'email'); ?>
<?= $form->field($userform, 'id_surname')->dropDownList(
    DoingName::find()->select(['surname', 'id'])->indexBy('id')->column(),
    ['prompt' => 'Select surname']);
?>
<?= $form->field($surname, 'surname')->textInput(); ?>
<?// $s = \yii\helpers\ArrayHelper::map(Posts::find()->all(),'id', 'title');
//$i = 0;
//foreach($s as $k => $val){
//    $a[$i] = $val;
//    $i++;
//}
//?>
<?//= $form->field($userform, 'id')->widget(AutoComplete::classname(), [
//      'clientOptions' => [
//          'source' => $a,
//      ],
//  ]) ?>
<?= Html::submitButton('Create', ['class' => 'btn btn-success']); ?>
<? ActiveForm::end(); ?>

