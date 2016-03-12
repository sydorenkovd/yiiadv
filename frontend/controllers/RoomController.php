<?php

namespace frontend\controllers;

use common\models\Reservation;
use Yii;
use yii\web\Controller;
use common\models\Room;
use yii\web\UploadedFile;

class RoomController extends Controller
{
    public function actionIndex()
    {
        $db = Yii::$app->db;
        $sql = 'select * from room order by id ASC';
        $rooms = $db->createCommand($sql)->queryAll();
        return $this->render('index', [
            'rooms' => $rooms
        ]);
    }

    public function actionCreate()
    {
        $model = new Room();
        $modelSaved = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->fileImage) {
                $model->fileImage->saveAs('images/' . $model->fileImage->baseName . '.' . $model->fileImage->extension);
            }

            $modelSaved = true;
        }

        return $this->render('create', [
            'model' => $model,
            'modelSaved' => $modelSaved
        ]);
    }

    public function actionIndexFiltered()
    {
        $query = Room::find();

        $searchFilter = [
            'floor' => ['operator' => '', 'value' => ''],
            'room_number' => ['operator' => '', 'value' => ''],
            'price_per_day' => ['operator' => '', 'value' => ''],
        ];

        if (isset($_POST['SearchFilter'])) {
            $fieldsList = ['floor', 'room_number', 'price_per_day'];

            foreach ($fieldsList as $field) {
                $fieldOperator = $_POST['SearchFilter'][$field]['operator'];
                $fieldValue = $_POST['SearchFilter'][$field]['value'];

                $searchFilter[$field] = ['operator' => $fieldOperator, 'value' => $fieldValue];

                if ($fieldValue != '') {
                    $query->andWhere([$fieldOperator, $field, $fieldValue]);
                }
            }
        }

        $rooms = $query->all();

        return $this->render('index-filtered', ['rooms' => $rooms, 'searchFilter' => $searchFilter]);
    }
    public  function actionLastReservationRoomId($room_id){
        $room = Room::findOne($room_id);
        $lastReservation = $room->lastReservation;
        return $this->render('last-reservation-room-id',
            [
                'room' => $room,
                'lastReservation' => $lastReservation]);
    }
}




















