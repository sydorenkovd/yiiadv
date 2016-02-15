<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Job;

$this->title = 'Job';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1 class="page-header">Jobs:
        <a class="btn btn-primary" href="<?php echo Yii::$app
            ->urlManager->createUrl('job/create'); ?>">Create</a></h1>
<? if (!empty($jobs)) :
    ?>
    <ul class="list-group">
        <?php
        /*
         * $jobs is object of ActiveRecord for rendering  vacancies
         * use Html::encode()
         * also we can use HtmlPurifier::process() but it's pretty slow loading
         */
        /*
         * We can also render file in file, or view in view
         */
//        $job = new Job();
//        echo Yii::$app->view->render('create', ['job' => $job]);
        foreach ($jobs as $job) : ?>
            <? $formatedDate = '';
               $formatedDate = Job::dateVacancy($job); ?>
            <li class="list-group-item">
                <?
                /*
                 * everything that we have from users have to be encoded and secure, don't trust them
                 */
                ?>
                <a href="<?php echo Yii::$app->urlManager->createUrl(['job/details', 'id' => $job->id]); ?>">
                    <?php echo Html::encode($job->title); ?></a> - in <b><?= Html::encode($job->city); ?></b> Added: <i><?= Html::encode($formatedDate); ?></i>
            </li>
        <?php endforeach; ?>
    </ul>
<? else : ?>
    <h2>There are no jobs in this category</h2>
<? endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]); ?>

