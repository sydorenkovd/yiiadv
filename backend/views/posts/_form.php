<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Author;
use frontend\models\Category;
use common\models\Tags;
/* @var $this yii\web\View */
/* @var $model frontend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=> true, 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
<?//= $form->field($model, 'tags')->checkboxList(
//    ArrayHelper::map($tags, 'id', 'title')
//);

?>
    <?= $form->field($model, 'category_id')->label('Category')->dropDownList(
        Category::find()->select(['name', 'id'])->with('posts')->indexBy('id')->column(), ['prompt' => 'List of categories']
    )->hint('Choose the author') ?>
    <?= $form->field($model, 'author_id')->label('Author')->dropDownList(
        Author::find()->select(['name', 'id'])->with('posts')->indexBy('id')->column(), ['prompt' => 'List of authors']
    )->hint('Choose the author') ?>

<!--    --><?//= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
<!--    --><?//
//    echo "<pre>";
//    print_r($model->listTags);
//    echo "</pre>";
//    die();
//    ?>

    <?= $form->field($model, 'tags')->label('Tags')->checkboxList(
        $model->listTags, ['multiple'=> true, 'prompt' => 'List of Tags']
    )->hint('Choose the Tags'); ?>



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
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
