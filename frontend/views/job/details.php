<?php
use frontend\models\Category;
use frontend\models\Job;
/*
 * accepted $job object from JobController
 */
?>

<a href="<?= Yii::$app->urlManager
    ->createUrl('job') ?>">Back to Jobs</a>
<?php if(Yii::$app->user->identity->getId() == $job->user_id) : ?>
    <span class="pull-right">
    <a class="btn btn-danger" href="<?= Yii::$app
        ->urlManager->createUrl(['job/delete', 'id' => $job->id])?>">Delete</a>
</span>
<span style="margin-left: 10px">
    <a class="btn btn-default" style="background-color: #d0eded" href="<?= Yii::$app->urlManager
        ->createUrl(['job/edit', 'id' => $job->id])?>">Edit</a>
</span>
<? endif; ?>
<? if(!empty($job)) : ?>

<h3>From category: <? $category = Category::find()
        ->where(['id' => $job->category_id])->one();
   echo $category->name; ?></h3>
<span style="font-size: 18px">Published: <?= Job::dateVacancy($job); ?></span>
<h2 class="well"><?= $job->title; ?><span style="font-size: 24px; color: green">    Salary: <?= $job->salary; ?></span></h2>
<code style="font-size: 22px"><?= $job->description; ?></code><br>

<ul class="list-group-item-info" style="margin: 3px">
<li><span style="font-size: 18px; font-style: oblique; color: indigo"> <?= $job->type; ?> </span><br></li>
<li><span style="font-size: 18px">City: <?= $job->city; ?></span><br></li>
<li><span style="font-size: 18px">Email: <?= $job->contact_email; ?></span><br></li>
<li><span class="" style="font-size: 18px;">Phone: <?= $job->contact_phone; ?></span></li>
</ul>
    <a class="btn btn-primary" href="mailto:<?= $job->contact_email; ?>?Subject=Job%20Application">Contact Employer</a>
<? else : ?>
<h1 class="alert-danger">Sorry! No such vacancy, back to searching, and you will find your job offers</h1>
<? endif;?>