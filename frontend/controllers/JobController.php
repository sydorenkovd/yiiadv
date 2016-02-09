<?php

namespace frontend\controllers;

class JobController extends \yii\web\Controller
{
    public function actionAdd()
    {
        return $this->render('add');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        $foo = "bar";
        return $this->render('index', ['foo'=> $foo]);
    }

}
