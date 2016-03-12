<?php

namespace backend\controllers;

use common\models\Postt;
use Yii;
use common\models\Posts;
use common\models\Tags;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Author;
use backend\models\PostSearch;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use yii\widgets\ActiveForm;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    public function behaviors()
    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
        return [
//            'accessOnce' => [
//                'class' => \frontend\behaviors\AccessOnce::className(),
//                'actions' => ['interview']
//            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'delete', 'update', 'edit', 'view'],
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('You are not allowed to access this page');
                },
                'rules' => [
                    [
                        'actions' => ['index','create', 'delete', 'update', 'edit', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
//        $searchModel = new PostSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        $searchModel = new PostSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = Posts::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

// join with relation `author` that is a relation to the table `users`
// and set the table alias to be `author`
        $query->joinWith(['author' => function($query) { $query->from(['author' => 'tbl_author']); }]);
// enable sorting for the related column
        $dataProvider->sort->attributes['author.name'] = [
            'asc' => ['author.name' => SORT_ASC],
            'desc' => ['author.name' => SORT_DESC],
        ];
        $model = Posts::find()->all();
//        $dataProvider = new ActiveDataProvider([
//            'query' => Posts::find(),
//        ]);

        return $this->render('index', [
            compact('searchModel'),
            compact('dataProvider'),
            compact('model')
        ]);
    }
    public function actionEdit($id){
        $post = Posts::findOne($id);
        if ($post->load(Yii::$app->request->post()) && $post->validate()) {
            $post->save();
            Yii::$app->session->setFlash('success', 'Published successfully!');
            return $this->redirect(Yii::$app->urlManager->createUrl('posts'));
        }
        return $this->render('edit', [
            'post' => $post
        ]);
    }

    public function actionModerate()
    {
        if(Yii::$app->user->can('moderate-post')) {
            $moderate = Posts::find()->where(['is_moderate' => 0])->all();
            return $this->render('moderate', ['moderate' => $moderate]);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tags' => Tags::find()->all(),
            ]);
        }
    }
    public function actionDetails($id)
    {
        $post = Posts::find()->where(['id' => $id])->one();
        return $this->render('details', ['post' => $post]);
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

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (Yii::$app->user->can('create-post')) {
            $modelPost = new Posts();
            $model = new Postt($modelPost);

if(Yii::$app->request->isAjax && $model->load($_POST)){
    Yii::$app->response->format = 'json';
    return ActiveForm::validate($model);
}
            if ($model->load(Yii::$app->request->post())) {
                /*
                * get the instance of the uploaded file
                */
//            $imagename = $model->title;
//            $model->file = UploadedFile::getInstance($model, 'file');
//            $model->file->saveAs('uploads/'. $imagename.'.'.$model->file->extension);
                //save the path in the db
//            $model->logo = 'uploads/'. $imagename.'.'.$model->file->extension;
                $model->save();
//                print_r($model->getErrors());
//                return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            } else {
//                $model->id = Yii::$app->user->id;
//                $model->loadDefaultValues();

                return $this->renderAjax('create', [
                    'model' => $model,
                    'tags' => Tags::find()->all(),
                    'authors' => Author::find()->all(),
//                'category' => Category::find()->all(),
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
