<?php
/* @var $this yii\web\View */
use Yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<?php //if(Yii::$app->session->getFlash('success') !== null) : ?>
<!--    <h1 class="alert alert-success">--><?//= Yii::$app->session->getFlash('success'); ?><!--</h1>-->
<?// endif; ?>

<h1 class="page-header">Categories:
    <a class="btn btn-primary pull-right" href="<?php echo Yii::$app
        ->urlManager->createUrl('category/create'); ?>">Create</a></h1>

<ul class="list-group">
    <?php foreach($categories as $category) : ?>
    <li class="list-group-item">
        <a href="<?php echo Yii::$app->urlManager->createUrl(['job', 'category' => $category->id ]); ?>">
            <?php echo $category->name; ?></a></li>
    <?php endforeach; ?>
</ul>
<?= LinkPager::widget(['pagination' => $pagination]); ?>
