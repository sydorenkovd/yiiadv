<?php
use yii\helpers\Url;
?>

<a class="btn btn-danger" href="<?php echo Url::to(['index-with-relationships']) ?>">Reset</a>

<br /><br />

<div class="row">
    <div class="col-md-4">
        <legend>Rooms</legend>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Floor</th>
                <th>Room number</th>
                <th>Price per day</th>
            </tr>
            <?php foreach($rooms as $room) { ?>
                <tr>
                    <td><a class="btn btn-primary btn-xs" href="<?php echo Url::to(['index-with-relationships', 'room_id' => $room->id]) ?>">detail</a></td>
                    <td><?php echo $room['floor'] ?></td>
                    <td><?php echo $room['room_number'] ?></td>
                    <td><?php echo Yii::$app->formatter->asCurrency($room['price_per_day'], 'EUR') ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php if($roomSelected != null) { ?>
            <div class="alert alert-info">
                <b>You have selected Room #<?php echo $roomSelected->id ?></b>
            </div>
        <?php } else { ?>
            <i>No room selected</i>
        <?php } ?>
    </div>

    <div class="col-md-4">
        <legend>Reservations</legend>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Price per day</th>
                <th>Date from</th>
                <th>Date to</th>
            </tr>
            <?php foreach($reservations as $reservation) { ?>
                <tr>
                    <td><a class="btn btn-primary btn-xs" href="<?php echo Url::to(['index-with-relationships', 'reservation_id' => $reservation->id]) ?>">detail</a></td>
                    <td><?php echo Yii::$app->formatter->asCurrency($reservation['price_per_day'], 'EUR') ?></td>
                    <td><?php echo Yii::$app->formatter->asDate($reservation['date_from'], 'php:Y-m-d') ?></td>
                    <td><?php echo Yii::$app->formatter->asDate($reservation['date_to'], 'php:Y-m-d') ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php if($reservationSelected != null) { ?>
            <div class="alert alert-info">
                <b>You have selected Reservation #<?php echo $reservationSelected->id ?></b>
            </div>
        <?php } else { ?>
            <i>No reservation selected</i>
        <?php } ?>

    </div>

    <div class="col-md-4">
        <legend>Customers</legend>
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone</th>
            </tr>
            <?php foreach($customers as $customer) { ?>
                <tr>
                    <td><a class="btn btn-primary btn-xs" href="<?php echo Url::to(['index-with-relationships', 'customer_id' => $customer->id]) ?>">detail</a></td>
                    <td><?php echo $customer['name'] ?></td>
                    <td><?php echo $customer['surname'] ?></td>
                    <td><?php echo $customer['phone_number'] ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php if($customerSelected != null) { ?>
            <div class="alert alert-info">
                <b>You have selected Customer #<?php echo $customerSelected->id ?></b>
            </div>
        <?php } else { ?>
            <i>No customer selected</i>
        <?php } ?>
    </div>
</div>
