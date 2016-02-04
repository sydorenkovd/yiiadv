<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\Interview;

/* @var $this yii\web\View */
/* @var $model common\models\Interview */
/* @var $form ActiveForm */
?>
<div class="site-interview">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'sex')->radioList(['man', 'women'])->label('You are:') ?>
        <?= $form->field($model, 'planets')->checkboxList(['Меркурий', 'Венера','Земля','Марс','Плутон','Уран','Юпитер'])
            ->label('what kind of planets are lived?') ?>
        <?= $form->field($model, 'astronauts')->dropDownList(['Gagarin', 'Korolev', 'Tereshcova','Armstrong'],
            ['size'=> 4, 'multiple' => true])
            ->hint('with Ctrl you can choose several astronauts')->label('Whom do you know?') ?>
        <?= $form->field($model, 'planet')->dropDownList(['Меркурий', 'Венера','Земля','Марс','Плутон','Уран','Юпитер'])
            ->label('where would you like to go') ?>
    <?= $form->field($model, 'verifyCode')->widget(
       Captcha::className(),
        [
            'template' => '<div class="row"><div class="col-xs-3">{image}</div><div class="col-xs-4">{input}</div></div>',
        ]
    )->hint('Нажмите на картинку, чтобы обновить.') ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-interview -->
