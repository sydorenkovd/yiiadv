<?php
/* @var $this yii\web\View */
use Yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Job;
use frontend\models\Category;
use common\models\Author;

$this->title = 'Orders by category';
$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Group by category';
?>
    <h1 class="page-header">Jobs: <?= Category::findOne($_GET['category'])->name; ?>
        <a class="btn btn-primary pull-right" href="<?php echo Yii::$app
            ->urlManager->createUrl('job/create'); ?>">Create</a></h1>
<? if (!empty($orders)) :
    ?>
    <ul class="list-group">
        <?php
        /*
         * $jobs is object of ActiveRecord for rendering  vacancies
         */
        foreach ($orders as $order) : ?>
            <? $formatedDate = '';
            $formatedDate = Job::dateVacancy($order); ?>
            <li class="list-group-item">
                <a href="<?php echo Yii::$app->urlManager->createUrl(['job/details', 'id' => $order->id]); ?>">
                    <?php echo $order->title; ?></a> - in <b><?= $order->city; ?></b> Added: <i><?= $formatedDate; ?></i>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="list-group">

        <h1 class="page-header">Posts: <?= Category::findOne($_GET['category'])->name; ?></h1>
<?php
        foreach($postOrders as $post) : ?>
            <? $author = Author::getAuthor($post->author_id); ?>
            <li class="list-group-item">
                Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
            </li>
            <li class="list-group-item">
                Author: <?= $author; ?>
            </li>

        <?php endforeach; ?>
    </ul>
<? else : ?>
    <h2>There are no jobs in this category</h2>
<? endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]); ?>