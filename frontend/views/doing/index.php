<?php
/* @var $this yii\web\View */
?>
<h1>doing/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<?php
use yii\helpers\Html;
echo Html::a('Link',Yii::$app->urlManager->createUrl(['site/index', 'id' => 3]), ['class' => 'btn btn-info']);
?>
