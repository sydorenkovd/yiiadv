<?php

namespace frontend\controllers;
use yii\data\Pagination;
use yii\helpers\Url;
use common\models\Interview;
use frontend\models\ContactFormexample;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use frontend\models\Job;
use frontend\models\Category;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class JobController extends Controller
{
    public function actionIndex()
    {
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);
        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)->all();
        return $this->render('index', ['jobs'=> $jobs,
        'pagination' => $pagination]);
    }
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
}
