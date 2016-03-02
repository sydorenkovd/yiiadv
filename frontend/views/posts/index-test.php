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
                        <?
                        $posts_arr[] = $post;
//                        echo "<pre>";
//                        print_r($posts_arr);
//                        echo "</pre>";
                        ?>
                        <?php
                        if($tags->id == $post->id) {
                            foreach($tags->tagPost as $tag){
                                $arrTags[] = $tag->title;
                            }
                        } ?>
                    <? endforeach; ?>

                    Tags: <?php
                    foreach($arrTags as $t) : ?>
                        <?= Html::a($t, Yii::$app->urlManager
                            ->createUrl(['posts/order-tags', 'tag' => $t]), ['class' => 'btn btn-default btn-sm']) ?>
                        <?php
                        $arrTags = []; ?>
                    <? endforeach; ?>
                    <?php
                    foreach($posts_arr as $post) : ?>
<? count($posts_arr) ?>
                    <li class="list-group-item">
                        Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
                    </li>

                    <li class="list-group-item">
                        Author: <?= $post->author->name; ?>
                    </li>

                <? $posts_arr = []; ?>
                    <? endforeach; ?>
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