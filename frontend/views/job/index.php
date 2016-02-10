<?php
/* @var $this yii\web\View */
use Yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Job;

$this->title = 'Job';
$this->params['breadcrumbs'][] = $this->title;
?>
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
    <h2>There are no jobs in this category</h2>
<? endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]); ?>