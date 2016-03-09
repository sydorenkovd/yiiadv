<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    Modal::begin([
        'header' => '<h4>Events</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',

    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
<?php
    $events = array();
    //Testing
foreach($eventsDb as $eventDb) {
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = $eventDb->id;
    $Event->title = $eventDb->title;
    $Event->start = $eventDb->create_date;
    $events[] = $Event;

//    $Event = new \yii2fullcalendar\models\Event();
//    $Event->id = 2;
//    $Event->title = 'Second';
//    $Event->start = date('Y-m-d\TH:i:s\Z', strtotime('tomorrow 6am'));
//    $events[] = $Event;
}
    ?>

<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
    'events'=> $events,
));
?>

</div>
