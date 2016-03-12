<table class="table">
    <tr>
        <th>Room Id</th>
        <td><?php echo $lastReservation['room_id'] ?></td>
    </tr>
    <tr>
        <th>Customer Id</th>
        <td><?php echo $lastReservation['customer_id'] ?></td>
    </tr>
    <tr>
        <th>Price per day</th>
        <td><?php echo Yii::$app->formatter->asCurrency($lastReservation['price_per_day'], 'EUR') ?></td>
    </tr>
    <tr>
        <th>Date from</th>
        <td><?php echo Yii::$app->formatter->asDate($lastReservation['date_from'], 'php:Y-m-d') ?></td>
    </tr>
    <tr>
        <th>Date to</th>
        <td><?php echo Yii::$app->formatter->asDate($lastReservation['date_to'], 'php:Y-m-d') ?></td>
    </tr>
    <tr>
        <th>Reservation date</th>
        <td><?php echo Yii::$app->formatter->asDate($lastReservation['reservation_date'], 'php:Y-m-d H:i:s') ?></td>
    </tr>
</table>
