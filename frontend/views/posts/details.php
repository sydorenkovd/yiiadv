<ul class="list-group">

    <?php $this->title = 'Details';
    $this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => 'index'];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <li class="list-group-item">
        <?= $post->title . '1'; ?>
    </li>
    <li class="list-group-item">
        <?= $post->description; ?>
    </li>
</ul>
<?= $this->blocks['block1'] ?>
<hr>
<pre>
<?
foreach($query->with('author', 'category')->each() as $q){
//    print_r($q);
    /**
     * that's the thing about relation model, I bind two tables in model Posts
     * and than have access to binding tables by under property, that's sun in dark
     */
    echo $q->category->name;
    echo "<br>";
    echo $q->author->name;
}

/**
 * return array of data from database if we have a object parameter
 */
//foreach($query->batch() as $jobs){
//    print_r($jobs);
//}
/**
 * return each item from database if we have a object parameter
 */
//foreach($query->each() as $job){
//    print_r($job);
//}
?>
</pre>