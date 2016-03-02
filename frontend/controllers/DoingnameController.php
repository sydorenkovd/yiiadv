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

}
