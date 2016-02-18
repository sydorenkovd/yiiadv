<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Doing */

$this->title = 'Create Doing';
$this->params['breadcrumbs'][] = ['label' => 'Doings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
