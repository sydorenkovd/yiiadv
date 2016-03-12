<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Room;
use yii\web\UploadedFile;

class RoomController extends Controller
{
    public function actionCreate()
    {
        $model = new Room();
        $modelSaved = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->fileImage) {
                $model->fileImage->saveAs('images/'. $model->fileImage->baseName . '.' . $model->fileImage->extension);
            }

            $modelSaved = true;
        }

        return $this->render('create', [
            'model' => $model,
            'modelSaved' => $modelSaved
        ]);
    }
}