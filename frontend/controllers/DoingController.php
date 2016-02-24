<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\UserForm;
use yii\bootstrap\Alert;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

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
        return $this->render('test');
    }
}
