<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>

<?php if($modelSaved) { ?>
    <div class="alert alert-success">
        Model ready to be saved!
        <br /><br />
        These are values: <br />
        Floor: <?php echo $model->floor; ?> <br />
        Room Number: <?php echo $model->room_number; ?> <br />
        Has conditioner: <?php echo Yii::$app->formatter->asBoolean($model->has_conditioner); ?> <br />
        Has TV: <?php echo Yii::$app->formatter->asBoolean($model->has_tv); ?> <br />
        Has phone: <?php echo Yii::$app->formatter->asBoolean($model->has_phone); ?> <br />
        Available from (mm/dd/yyyy): <?php echo Yii::$app->formatter->asDate($model->available_from,'full'); ?> <br />
        Price per day: <?php echo Yii::$app->formatter->asCurrency($model->price_per_day,'EUR'); ?> <br />
        Image:
        <?php if(isset($model->fileImage)) { ?>
            <img style="width: 200px; height: 200px;" src="<?php echo Url::to('images/'.$model->fileImage->name, true) ?>" />
        <?php } ?>
    </div>
<?php } ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Room form</h1>
        <?= $form->field($model, 'floor')->textInput() ?>
        <?= $form->field($model, 'room_number')->textInput() ?>
        <?= $form->field($model, 'has_conditioner')->checkbox() ?>
        <?= $form->field($model, 'has_tv')->checkbox() ?>
        <?= $form->field($model, 'has_phone')->checkbox() ?>
        <?= $form->field($model, 'available_from')->widget(
            \yii\jui\DatePicker::className(), [
                'inline' => false,
                'dateFormat' => 'yyyy-MM-dd',
            ]
        ); ?>
        <?= $form->field($model, 'price_per_day')->textInput() ?>
        <?= $form->field($model, 'description')->textarea() ?>


        <?= $form->field($model, 'fileImage')->fileInput() ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

