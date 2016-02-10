<?php
use frontend\models\Category;
use frontend\models\Job;
?>
<a href="<?= Yii::$app->urlManager
    ->createUrl('job') ?>">Back to Jobs</a>
<h3>From category: <? $category = Category::find()
        ->where(['id' => $job->category_id])->one();
   echo $category->name; ?></h3>
<span style="font-size: 18px">Published: <?= Job::dateVacancy($job); ?></span>
<h2 class="page-header"><?= $job->title; ?><span style="font-size: 24px; color: green">    Salary: <?= $job->salary; ?></span></h2>
<code style="font-size: 18px"><?= $job->description; ?></code><br>
<span style="font-size: 18px">City: <?= $job->city; ?></span><br>
<span style="font-size: 18px">Email: <?= $job->contact_email; ?></span><br>
<span class="" style="font-size: 18px;">Phone: <?= $job->contact_phone; ?></span>
