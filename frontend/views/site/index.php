<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Need a job?</h1>

        <p class="lead">Browse our open job listings or find employees</p>

        <p><a style="border: 2px; margin: 3px; padding: 10px 14px;" class="btn btn-sm btn-success" href="<?= Yii::$app
                ->urlManager->createUrl('job'); ?>">Start Browsing</a>
            <a style="border: 2px; margin: 3px; padding: 10px 14px;" class="btn btn-sm btn-primary" href="<?= Yii::$app
                ->urlManager->createUrl('job/create'); ?>">Create Listnings</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Browse Listings</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.</p>

                <p><a class="btn btn-default" href="<?= Yii::$app
                        ->urlManager->createUrl('job'); ?>">Browse &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Find By Category</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.</p>

                <p><a class="btn btn-default" href="<?= Yii::$app
                        ->urlManager->createUrl('category'); ?>">Find &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Free To Join</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat</p>

                <p><a class="btn btn-default" href="<?= Yii::$app
                        ->urlManager->createUrl('site/signup'); ?>">Join &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
