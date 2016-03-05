<?php

namespace frontend\controllers;

use common\models\DoingName;

class DoingnameController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dn = DoingName::findOne(2);
        return $this->render('index', ['dn' => $dn]);
    }
public function actionCreate(){
    $model = new DoingName();
    if($model->load(\Yii::$app->request->post()) && $model->validate()){
        $model->save();
        \Yii::$app->session->setFlash('success', 'It\'s DONE!');
        return $this->redirect('index');
    }
    return $this->render('create', ['model' => $model]);
}
}
