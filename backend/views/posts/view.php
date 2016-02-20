<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 */
//use common\models\Comment;
use common\models\TagPost;
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var \frontend\models\CommentForm $commentForm \;
/* @var TagPost $post */

//$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Посты', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//?>
<!---->
<!--<h1>--><?//= $model->title ?><!--</h1>-->
<!---->
<div class="meta">
<!--    <p>Автор: --><?//= $model->author->username ?>
<!---->
<!--    <div>-->
<!--        --><?//= $model->content ?>
<!--    </div>-->
<!---->
<!--    <div class="tags">-->
<!--        --><?php
//        $tags = [];
//        foreach($model->getTagPost()->all() as $postTag) {
//            $tag = $postTag->getTag()->one();
//            $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
//        } ?>
<!---->
<!--        Тэги: --><?//= implode($tags, ', ') ?>
    </div>