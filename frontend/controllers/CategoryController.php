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
use frontend\models\Job;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Category;

class CategoryController extends Controller
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
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $query = Category::find();
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $categories = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)->all();
        return $this->render('index', [
            'categories' => $categories,
            'pagination' => $pagination,
        ]);
    }
    /*
     * Method FindByCategory
     * accepted category id
     * return list of jobs group by category
     */
    public function actionOrders($category)
    {
        $query = Job::find()->where(['category_id' => $category]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $orders = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)->all();
        return $this->render('orders', ['orders' => $orders,
            'pagination' => $pagination,
        ]);
    }
    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
                    $category->save();
                    Yii::$app->getSession()->setFlash('success', 'You added new category successfully');
                    return $this->redirect(Yii::$app->urlManager
                        ->createUrl('category'));
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }


}
