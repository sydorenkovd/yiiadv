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

        <? foreach($tags->with('tagPost')->each() as $tags) : ?>
    <? foreach($posts as $post) : ?>
<!--            <div class="tags">-->
<!--                Тэги: --><?php //foreach($model->getTagPost()->all() as $post) : ?>
<!--                    --><?//= $post->getTags()->one()->title ?>
<!--                --><?php //endforeach; ?>
<!--            </div>-->

            <?php
//            foreach($tags->with('tagPost')->each() as $tags){
                if($tags->id == $post->id) {
                    foreach($tags->tagPost as $tag){
                        $arrTags[] = $tag->title;
                    }

                } ?>
                    <? endforeach; ?>
            <?
//                foreach($tag->tagPost as $ctag){
//                    echo $ctag->title;
//                    echo "<br>";
//                }
//            }
?>
            <div class="tags">
                Tags: <?php
                foreach($arrTags as $t) : ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['posts/order-tags', 'tag' => $t]); ?>">
                    <?= $t . " "; ?></a>
                <?php
                $arrTags = []; ?>
                <? endforeach; ?>
        </div>
            <? $author = Author::getAuthor($post->author_id); ?>
<li class="list-group-item">
    Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
</li>
            <li class="list-group-item">
               Author: <?= $author; ?>
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

<?//= Html::a('Go!', Url::toRoute(['details', 'id' => $post->id]), ['class' => 'btn btn-default'])?>