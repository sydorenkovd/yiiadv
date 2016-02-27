<ul class="list-group">


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
print_r($query);

?>
</pre>