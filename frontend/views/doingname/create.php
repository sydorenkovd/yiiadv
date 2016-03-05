<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DoingName */
/* @var $form ActiveForm */
?>
<div class="doing-name">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'surname') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- doing-name -->
