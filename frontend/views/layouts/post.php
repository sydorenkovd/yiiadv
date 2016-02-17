<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    echo Html::csrfMetaTags();
    echo Html::encode($this->title);
    $this->head(); ?>
</head>
<body>
<?php
$this->beginBody();
?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Post',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top'
        ],
    ]);
   $menuItems = [
     ['label' => 'Posts', 'url' => ['/posts/index']],
   ];
    echo Nav::widget([
        'options' => ['class'=>'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
        <?= Alert::widget(); ?>
        <?= $content; ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Posts Company <?= date('Y'); ?></p>
        <p class="pull-right"><?= Yii::powered(); ?></p>
    </div>
</footer>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

