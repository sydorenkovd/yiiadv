<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->city) ?></h2>

    <?= HtmlPurifier::process($model->province) ?>
</div>