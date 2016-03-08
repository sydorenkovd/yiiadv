<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PoitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poitem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Poitem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'po_item_no',
            'quantity',
            'po_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
