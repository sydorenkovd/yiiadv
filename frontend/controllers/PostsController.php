<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Posts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Posts::find(),
//        ]);
        $query = Posts::find()->where(['is_moderate' => 1]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $posts = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDetails($id){
        $post = Posts::find()->where(['id' => $id])->one();
        return $this->render('details', ['post' => $post]);
    }
}
