<?php

namespace frontend\controllers;

use frontend\models\UserForm;
use yii\web\Controller;
use Yii;

class DoingController extends Controller
{
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

}
