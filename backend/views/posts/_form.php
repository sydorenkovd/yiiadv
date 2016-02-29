<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use common\models\Author;
/* @var $this yii\web\View */
/* @var $model frontend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
<?//= $form->field($model, 'tags')->checkboxList(
//    ArrayHelper::map($tags, 'id', 'title')
//);

?>
    <?= $form->field($model, 'author_id')->dropDownList(
   ArrayHelper::map($authors, 'id','name'), ['prompt' => 'List of authors']
    )->hint('Choose the author') ?>

<!--    --><?//= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->widget(
      \yii\jui\DatePicker::className(), [
            'inline' => false,
//            'clientOptions' => [
//                'autoclose' => true,
                'dateFormat' => 'yyyy-MM-dd',
//            ]
        ]
    ); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
