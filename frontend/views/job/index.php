<?php
/* @var $this yii\web\View */
use Yii\helpers\Html;
use yii\widgets\LinkPager;

?>

    <h1 class="page-header">Jobs:
        <a class="btn btn-primary pull-right" href="<?php echo Yii::$app
            ->urlManager->createUrl('job/create'); ?>">Create</a></h1>
<? if (!empty($jobs)) : ?>
    <ul class="list-group">
        <?php foreach ($jobs as $job) : ?>
            <? $phpdate = strtotime($job->create_date); ?>
            <? $pr = time() - $phpdate;
            if (date('d', $phpdate) == date('d', time())) {
                $yes = "today ";
                if($pr < 7200) {
                    $timeAgo = round(($pr - 3600)/60) . ' minutes ago ';
                }
                if($pr > 7200 && $pr < 89000){
                    $timeAgo = round(($pr - 3600)/3600) . ' hours ago ';
                }
            }
            if (date('d', $phpdate) == date('d', time()) - 1) {
                $s = date('d', $phpdate);
                $d = date('d', time()) - 1;
                $yes = "yesterday ";
            }
            $mounth31 = ['01', '03', '05', '07', '09', '11', '12'];
            $i = -1;
            while ($i < count($mounth31) - 1) {
                $i++;
                if ((date('d', time()) == '01' && date('m', time()) == $mounth31[$i]) && date('d', $phpdate) == '30') {
                    $yes = "yesterday ";
                }
            }
            $mounth30 = ['02', '04', '06', '08', '10'];
            $i = -1;
            while ($i < count($mounth30) - 1) {
                $i++;
                if ((date('d', time()) == '01' && date('m', time()) == $mounth30[$i]) && date('d', $phpdate) == '31') {
                    $yes = "yesterday ";
                }
            }
            if ((date('d', time()) == '01' && date('m', time()) == '03') && date('d', $phpdate) == '28') {
                $yes = "yesterday ";
            }
            if($pr > 176400 && $pr < 2600000){
                $timeAgo = round(($pr - 3600)/86400) . ' days ago ';

            }
            ?>

            <? $formatedDate = $yes . $timeAgo . date("F j, Y, g:i a:", $phpdate);
            $timeAgo = '';
            $yes = '';
            ?>


            <li class="list-group-item">
                <a href="<?php echo Yii::$app->urlManager->createUrl(['job/details', 'id' => $job->id]); ?>">
                    <?php echo $job->title; ?></a> - in <b><?= $job->city; ?></b> Added: <i><?= $formatedDate; ?></i>
            </li>
        <?php endforeach; ?>
    </ul>
<? else : ?>
    <h2>There are no job in this category</h2>
<? endif; ?>
<?= LinkPager::widget(['pagination' => $pagination]); ?>