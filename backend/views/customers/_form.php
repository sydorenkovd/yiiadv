<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\Selectable;
use yii\helpers\ArrayHelper;
use common\models\Locations;
/* @var $this yii\web\View */
/* @var $model common\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->dropDownList(
       ArrayHelper::map(Locations::find()->all(), 'id', 'zip_code'),
        ['prompt' => Yii::t('app', 'Select a Zip Code'),
        'id' => 'zipCode',
        ]
    ) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provice')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
$('#zipCode').change(function(){
alert('Zip zip');
})
JS;
$this->registerJs($script);
?>