<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\UserForm;
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
    public function actionIndex()
    {

        return $this->render('index');
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

}
