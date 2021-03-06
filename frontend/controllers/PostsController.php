<?php

namespace frontend\controllers;

use common\models\Tags;
use frontend\Output;
use Yii;
use common\models\Posts;
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
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    return $q->from('tbl_posts')->max('create_date');
                },
            ],
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['details'],
                'etagSeed' => function ($action, $params) {
                    $post = $this->findModel(\Yii::$app->request->get('id'));
                    return serialize([$post->title, $post->description]);
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
//            'page' => [
//                'class' => 'yii\web\ViewAction',
//                'viewPrefix' => 'page'
//            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndexTest()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Posts::find(),
//        ]);
        $query = Posts::find()->where(['is_moderate' => 1]);
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
            'page' => 2
        ]);
        $posts = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)->limit($pagination->limit)->all();
        $model = new Posts();
        $tags = Posts::find()->where(['is_moderate' => Posts::IS_MODERATE]);
        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
            'model' => $model,
            'tags' => $tags
        ]);
    }

    public function actionIndex()
    {
        $posts = new Posts();
        $model = Posts::find()->where(['is_moderate' => 1])->orderBy(['create_date' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
//        $tags = Tags::find();
        return $this->render('index', [
//            'posts' => $posts->getPublishedPosts(),
            'data' => $dataProvider,
            'model' => $model,
//            'tags' => $tags
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

    public function actionOrderTags($tag)
    {
        $model = Posts::find()
            ->innerJoin('tbl_tagPost', 'tbl_posts.id = tbl_tagPost.post_id')
            ->innerJoin('tbl_tag', 'tbl_tagPost.tag_id = tbl_tag.id')
            ->where(['tbl_tag.name' => $tag])
            ->andWhere(['is_moderate' => 1])->all();
        return $this->render('order-tags', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetails($id)
    {
//        $test = Posts::getTest();
        $query = Posts::findOne($id);


        $post = Posts::find()->where(['id' => $id])->one();
        return $this->render('details', ['post' => $post, 'query' => $query]);
    }
}
