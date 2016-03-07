<?php
use common\models\TagPost;
use yii\helpers\Html;
//use yii\helpers\HtmlPurifier;
?>
<div>
<h2><?= $model->title ?></h2>

<div class="meta">
    <p>Автор: <?= $model->author->name ?><br>
        Дата публикации: <?= $model->create_date ?>
<!--        Категория: --><?//= Html::a($model->category->title, ['category/view', 'id' => $model->category->id]) ?><!--</p>-->
</div>

<div class="tags">
    <?php
    $tags = [];
    foreach($model->getTagPosts()->all() as $postTag) {
        $tag = $postTag->getTag()->one();
        $tags[] = Html::a($tag->title, Yii::$app->urlManager
            ->createUrl(['posts/order-tags', 'tag' => $tag->title]), ['class' => 'btn btn-default btn-sm']);
    } ?>

    Тэги: <?= implode($tags, ' | ') ?>
</div>

<?= Html::a('Read', ['posts/details', 'id' => $model->id], ['class' => 'btn btn-lg btn-border-success btn-post']); ?>
</div>