<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PoitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poitems';
?>
<div class="poitem-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'po_item_no',
            'quantity',
        ],
    ]); ?>

</div>
