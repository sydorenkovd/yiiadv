<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
        <? if(Yii::$app->user->identity->is_moderator == 1) :?>
        <?= Html::a('Moderate Posts', ['moderate'], ['class' => 'btn btn-info']) ?>
        <? endif; ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
//            'create_date',
            'image',
            // 'author',
            // 'tags',
            // 'is_moderate',
            [
                'attribute' => 'create_date',
                'value' => 'create_date',
                'format'=> 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                        'attribute' => 'create_date',
//                    'clientOptions' => [
//                'autoclose' => true,
                'dateFormat' => 'yyyy-MM-dd',
//            ]
                    ]
                )
            ],
        ],
    ]); ?>
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    --><?php
//    foreach ($posts as $post) {
//        echo $this->render('shortView', [
//            'model' => $post
//        ]);
//    }
//    ?>
<?php Pjax::end(); ?>
</div>
