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
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Category;

class CategoryController extends Controller
{
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
    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post())) {
            if ($category->validate()) {
                if($category->validate()) {
                    $category->save();
                    Yii::$app->getSession()->setFlash('success', 'You added new category successfully');
                    return $this->redirect(Yii::$app->urlManager
                        ->createUrl('category'));
                }
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }


}
