<?php

namespace frontend\controllers;

use common\models\Posts;
use common\models\User;
use frontend\models\UserForm;
use yii\bootstrap\Alert;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use common\models\Doing;
use common\models\DoingName;


class DoingController extends Controller
{
    public function behaviors(){
        return [
//          'access' => [
//              'class' => AccessControl::className(),
//              'only' => ['userform', 'database'],
//              'rules'=> [
//                  [
//                      'actions' => ['userform', 'database'],
//                      'allow' => true,
//                      'roles' => ['@'],
//                  ],
//              ],
//          ],
        ];
    }
    public function actionIndex(){
       return $this->render('index');
    }
    public function actionExample()
    {
        /**
         * recommended request to globals array's parameters
         */
//        $request = Yii::$app->request;
//        $id = $request->get('id', 1);
//        if($request->isAjax){echo 'this is ajax request';}
//        $info = $request->serverPort;
//        $info .= $request->absoluteUrl;
//        $headers = Yii::$app->request->headers;
        /**
         * return language which is the most preferred for user
         */
//        $exm = $request->getPreferredLanguage();
        $response = Yii::$app->response;

        $exm = $response->statusCode;
        return $this->render('index', ['exm' => $exm]);
    }
    public function actionUserform(){
        $userform = new Userform();
        if($userform->load(Yii::$app->request->post()) && $userform->validate()){
            $userform->save();
            Yii::$app->session->setFlash('done', 'Succesfully!');
            return $this->redirect(Yii::$app->urlManager->createUrl('doing/userform'));
        } else {
            return $this->render('userform', ['userform' => $userform]);
        }
    }
    public function actionDatabase(){
        $users = User::find()->all();
        return $this->render('database', ['users' => $users]);
    }
    public function actionTesttwo(){
//        $session = Yii::$app->session;
//        $session->setFlash('hello', 'Message says hello');
//        $s = Alert::widget([
//           'options' => ['class' => 'alert-info'],
//            'body' => Yii::$app->session->getFlash('hello'),
//        ]);
//        $id = Yii::$app->request->get('id', 0);
//        if($id){
//            $this->layout = 'post';
//        } else {
//            $this->layout = 'main';
//        }

        return $this->render('test');
    }

    /**
     * data from parameters for routing
     * @return array
     */
    public function data()
    {
        return [
            [ "id" => 1, 'lang' => 'en', "date" => "2015-04-19", "category" => "business", "title" => "Test news of 2015-04-19" ],
            [ "id" => 2, 'lang' => 'en', "date" => "2015-05-20", "category" => "shopping", "title" => "Test news of 2015-05-20" ],
            [ "id" => 3, 'lang' => 'ru', "date" => "2015-06-21", "category" => "business", "title" => "Test news of 2015-06-21" ],
            [ "id" => 4, 'lang' => 'de', "date" => "2016-04-19", "category" => "shopping", "title" => "Test news of 2016-04-19" ],
            [ "id" => 5, 'lang' => 'en', "date" => "2017-05-19", "category" => "business", "title" => "Test news of 2017-05-19" ],
            [ "id" => 6, 'lang' => 'en', "date" => "2018-06-19", "category" => "shopping", "title" => "Test news of 2018-06-19" ]
        ];
    }

    /**
     *we accept year and category from routing, and put into $data
     * than we filter by one of parameter and get array $filteredData
     * @return string
     */
    public function actionItemsList()
    {
        // if missing, value will be null
        $year = Yii::$app->request->get('year');
        // if missing, value will be null
        $category = Yii::$app->request->get('category');
        $lang = Yii::$app->request->get('lang');
//        Yii::$app->language = $lang;
        $data = $this->data();
        $filteredData = [];

        foreach($data as $d)
        {
            if(($year != null)&&(date('Y', strtotime($d['date'])) == $year)) $filteredData[] = $d;
            if(($category != null)&&($d['category'] == $category)) $filteredData[] = $d;
            if(($lang != null)&&($d['lang'] == $lang)) $filteredData[] = $d;
        }

        return $this->render('itemsList', ['lang' => $lang, 'year' => $year, 'category' => $category, 'filteredData' => $filteredData] );
    }
    public function actionTestDoing()
    {
$doing = Doing::find()->all();
        return $this->render('test-doing', ['doing' => $doing]);



    }
}
