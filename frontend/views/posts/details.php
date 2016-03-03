<?php
use yii\helpers\Html;
?>
<ul class="list-group">

    <?php $this->title = 'Details';
    $this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => 'index'];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <li class="list-group-item">
        <?= $post->title; ?>
    </li>
    <li class="list-group-item">
        <?= $post->description; ?>
    </li>
</ul>
<?= $this->blocks['block1'] ?>
<hr>
<?
foreach($query->tagPost as $tag){
    /**
     * that's the thing about relation model, I bind two tables in model Posts
     * and than have access to binding tables by under property, that's sun in dark
     */
 echo Html::a($tag->title, Yii::$app->urlManager
    ->createUrl(['posts/order-tags', 'tag' => $tag->title]), ['class' => 'btn btn-default btn-sm']);
    }
/**
 * return array of data from database if we have a object parameter
 */
//foreach($query->batch() as $jobs){
//    print_r($jobs);
//}
/**
 * return each item from database if we have a object parameter
 */
//foreach($query->each() as $job){
//    print_r($job);
//}
?>