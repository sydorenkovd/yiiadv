<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Author;
?>
<ul class="list-group">
    <?
    if($moderate) : ?>
        <? foreach($moderate as $post) : ?>
            <li class="list-group-item">
                Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
            </li>
            <li class="list-group-item">
                Author: <?= Author::getAuthor($post->author_id); ?>
            </li>
        <? endforeach; ?>
    <? else : ?>
        <h2 class="alert-danger">There are no posts1</h2>
    <? endif; ?>
</ul>
<?php //var_dump(Author::find()->all()); ?>
