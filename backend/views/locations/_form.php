<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Locations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locations-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php //$script = <<< JS
//$('form#{$model->formName()}').on('beforeSubmit', function(e){
// var \$form = $(this);
// $.post(
// \$form.attr("action"), //serialize Yii2 form
// \$form.serialize()
// )
//    .done(function(result){
//    if(result.message == 'Success'){
//    console.log(result);
//    //    $(document).find('#secondmodal').modal('hide');
//    //    $.pjax.reload({container:'#commodity-grid'});
//    //} else {
//    //$(\$form).trigger("reset");
//    //$("#message").html(result.message);
//    }
//    }).fail(function(){
//    console.log('server error');
//    });
//    return false;
//});
//JS;
//$this->registerJs($script);















