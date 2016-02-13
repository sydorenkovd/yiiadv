<?
use yii\helpers\Html;

?>
<? if(Yii::$app->user->identity->is_moderator == 1) : ?>
<a href="<?= Yii::$app->urlManager
    ->createUrl(['posts/edit', 'id' => $post->id])?>"><?=Html::button('Public', ['class' => 'btn btn-info']); ?></a>
<? endif; ?>
<ul class="list-group">


    <li class="list-group-item">
        <?= $post->title; ?>
    </li>
    <li class="list-group-item">
        <?= $post->description; ?>
    </li>

</ul>
