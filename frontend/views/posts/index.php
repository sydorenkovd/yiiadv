<?php

use common\models\TagPost;
use yii\helpers\Html;

?>
<div class="col-sm-8 post-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
foreach ($posts->models as $post) {
    echo $this->render('shortView', [
        'model' => $post
    ]);
}
?>
</div>
