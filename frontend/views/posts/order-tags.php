
<?php
use common\models\Author;
$this->title = 'Tags';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => 'index'];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = Yii::$app->request->get('tag');
if($model) : ?>
    <ul class="list-group">
    <?php
foreach($model as $item) : ?>
    <? $author = Author::getAuthor($item->author_id); ?>
    <li class="list-group-item">
        Title: <a href="<?= Yii::$app->urlManager->createUrl(['posts/details', 'id' => $item->id]); ?>"><?= $item->title; ?></a>
    </li>
    <li class="list-group-item">
        Author: <?= $author; ?>
    </li>
<? endforeach; ?>
    </ul>
<? else : ?>
<b>There are no posts</b>
    <? endif ?>
