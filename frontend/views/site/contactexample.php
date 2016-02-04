<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Contactexample';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

<p>
    Example form for testing
</p>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'contact-formexample']); ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'email') ?>

<!--        --><?//= $form->field($model, 'checkbox') ?>

        <?= $form->field($model, 'text')->textArea(['rows' => 8]) ?>

<!--        --><?//= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
//            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>