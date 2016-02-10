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
    public function behaviors()
    {
        return [
//            'accessOnce' => [
//                'class' => \frontend\behaviors\AccessOnce::className(),
//                'actions' => ['interview']
//            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)->all();
        return $this->render('index', ['jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

//    public function actionOrder($category)
//    {
//        $query = Job::find()->where(['category_id' => $category]);
//        $pagination = new Pagination([
//            'defaultPageSize' => 5,
//            'totalCount' => $query->count(),
//        ]);
//        $orders = $query->orderBy('create_date DESC')
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)->all();
//        return $this->render('orders', ['orders' => $orders,
//        'pagination' => $pagination,
//        ]);
//    }

    public function actionEdit($id)
    {
        $job = Job::findOne(['id' => $id]);
        if (Yii::$app->user->identity->id != $job->user_id) {
            Yii::$app->session->setFlash('restricted', 'Deny!');
            return $this->redirect(Yii::$app->urlManager->createUrl('job'));
        }
        if ($job->load(Yii::$app->request->post()) && $job->validate()) {
            $job->save();
            Yii::$app->session->setFlash('success', 'Job has edited successfully!');
            return $this->redirect(Yii::$app->urlManager->createUrl('job'));
        }
        return $this->render('edit', [
            'job' => $job
        ]);
    }

    public function actionDetails($id)
    {//get Job
        $job = Job::find()
            ->where(['id' => $id])->one();
        return $this->render('details', ['job' => $job]);
    }

    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post()) && $job->validate()) {
            $job->save();
            Yii::$app->session->setFlash('success', 'Job has created successfully!');
            return $this->redirect(Yii::$app->urlManager->createUrl('job'));
        }
        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);
        if (Yii::$app->user->identity->id != $job->user_id) {
            Yii::$app->session->setFlash('restricted', 'Deny!');
            return $this->redirect(Yii::$app->urlManager->createUrl('job'));
        }
        $job->delete();
        Yii::$app->session->setFlash('success', 'Job has deleted!');
        return $this->redirect(Yii::$app->urlManager->createUrl('job'));
    }
}
