<?php

namespace frontend\controllers;

use common\models\Customer;
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
    public function actionLastReservationForEveryRoom()
    {
        $rooms = Room::find()
            ->joinWith('lastReservation')
            ->all();

        return $this->render('last-reservation-for-every-room', ['rooms' => $rooms]);
    }
    public function actionIndexWithRelationships()
    {
        // 1. Check what parameter of detail has been passed
        $room_id = Yii::$app->request->get('room_id', null);
        $reservation_id = Yii::$app->request->get('reservation_id', null);
        $customer_id = Yii::$app->request->get('customer_id', null);

        // 2. Fill three models: roomSelected, reservationSelected and customerSelected and
        //    Fill three arrays of models: rooms, reservations and customer;
        $roomSelected = null;
        $reservationSelected = null;
        $customerSelected = null;

        if($room_id != null)
        {
            $roomSelected = Room::findOne($room_id);

            $rooms = array($roomSelected);
            $reservations = $roomSelected->reservations;
            $customers = $roomSelected->customers;
        }
        else if($reservation_id != null)
        {
            $reservationSelected = Reservation::findOne($reservation_id);

            $rooms = array($reservationSelected->room);
            $reservations = array($reservationSelected);
            $customers = array($reservationSelected->customer);
        }
        else if($customer_id != null)
        {
            $customerSelected = Customer::findOne($customer_id);

            $rooms = $customerSelected->rooms;
            $reservations = $customerSelected->reservations;
            $customers = array($customerSelected);
        }
        else
        {
            $rooms = Room::find()->all();
            $reservations = Reservation::find()->all();
            $customers = Customer::find()->all();
        }

        return $this->render('index-with-relationships',
            [
                'roomSelected' => $roomSelected,
                'reservationSelected' => $reservationSelected,
                'customerSelected' => $customerSelected,
                'rooms' => $rooms,
                'reservations' => $reservations,
                'customers' => $customers
            ]);
    }
}




















