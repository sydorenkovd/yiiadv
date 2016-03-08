<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Poitem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Poitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poitem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'po_item_no',
            'quantity',
            'po_id',
        ],
    ]) ?>

</div>
