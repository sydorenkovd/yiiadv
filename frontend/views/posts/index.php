<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Author;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <ul class="list-group">
<?
    if($posts) : ?>
        <? foreach($posts as $post) : ?>
            <li class="list-group-item">
                Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
            </li>
            <li class="list-group-item">
                Author: <?= $post->author->name; ?>
            </li>
        <? endforeach; ?>
    <? else : ?>
        <h2 class="alert-danger">There are no posts</h2>
    <? endif; ?>
    </ul>
    <!--    --><?//= GridView::widget([
    //        'dataProvider' => $dataProvider,
    //        'columns' => [
    //            ['class' => 'yii\grid\SerialColumn'],
    //
    ////            'id',
    //            'title',
    //            'description:ntext',
    ////            'create_date',
    ////            'image',
    //             'author',
    //            // 'tags',
    //            // 'is_moderate',
    //
    //            ['class' => 'yii\grid\ActionColumn'],
    //        ],
    //    ]); ?>

</div>

        <? foreach($tags as $tag) : ?>
                   <? foreach($tag->tagPost as $tagp)   {
        print_r($tagp->post_id);
//                if($tag->id == $post->id) {
//
//                    foreach($tagPost as $tags){
//                            $arrTags[] = $tags[$k]->title;}
//            }
                } ?>

<!--            Tags: --><?php
//                foreach($arrTags as $t) : ?>
<!--                        --><?//= Html::a($t, Yii::$app->urlManager
//                        ->createUrl(['posts/order-tags', 'tag' => $t]), ['class' => 'btn btn-default btn-sm']) ?>
<!---->
<!--                --><?php //$arrTags = []; ?>
                <? endforeach; ?>


<?//= Html::a('Go!', Url::toRoute(['details', 'id' => $post->id]), ['class' => 'btn btn-default'])?>