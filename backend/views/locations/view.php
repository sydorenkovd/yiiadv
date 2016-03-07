<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Locations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locations-view">

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
            'zip_code',[
            'label' => 'Town',
                'value' =>  $model->city
    ],
            'province',
        ],
    ]) ?>

</div>
<?php
//$format = Yii::$app->formatter;
//echo $format->asDate('now', 'php:Y-m-d');
//echo $format->asEmail('sydorenkovd@gmail.com');
//
//
$q = \common\models\Locations::find()->where(['>=', 'id', '1']);
$provider = new \yii\data\ActiveDataProvider([
    'query' => $q,
    'pagination' => [
        'pageSize' => 4
    ],
    'sort' => [
        'defaultOrder' => [
            'city' => SORT_DESC,
        ],
    ],
]);
echo \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'zip_code',
        'city',
        'province',
        'file',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>































