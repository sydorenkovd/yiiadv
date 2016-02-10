<?php
/* @var $this yii\web\View */
use Yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Job;

?>
    <h2 class="alert-danger"><?= Yii::$app->session->getFlash('restricted', 'Deny!'); ?></h2>

    <h1 class="page-header">Jobs:
        <a class="btn btn-primary pull-right" href="<?php echo Yii::$app
            ->urlManager->createUrl('job/create'); ?>">Create</a></h1>
<? if (!empty($jobs)) :
    ?>
    <ul class="list-group">
        <?php
        /*
         * $jobs is object of ActiveRecord for rendering  vacancies
         */
        foreach ($jobs as $job) : ?>
            <? $formatedDate = '';
               $formatedDate = Job::dateVacancy($job); ?>
            <li class="list-group-item">
                <a href="<?php echo Yii::$app->urlManager->createUrl(['job/details', 'id' => $job->id]); ?>">
                    <?php echo $job->title; ?></a> - in <b><?= $job->city; ?></b> Added: <i><?= $formatedDate; ?></i>
            </li>
        <?php endforeach; ?>
    </ul>
<? else : ?>
    <h2>There are no job in this category</h2>
<? endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]); ?>