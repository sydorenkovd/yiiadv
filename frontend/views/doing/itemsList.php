<?php if($year != null) { ?>
    <b>List for year <?php echo $year ?></b>
<?php } ?>
<?php if($category != null) { ?>
    <b>List for category <?php echo $category ?></b>
<?php } ?>
<?php if(true) { ?>
    <b>List for language <b><?php echo Yii::$app->language ?></b></b>
<?php } ?>

<br /><br />


<table border="1">
    <tr>
        <th>Date</th>
        <th>Category</th>
        <th>Title</th>
    </tr>

    <?php foreach($filteredData as $fd) { ?>
        <tr>
            <td><?php echo $fd['date'] ?></td>
            <td><?php echo $fd['category'] ?></td>
            <td><?php echo $fd['title'] ?></td>
        </tr>
    <?php } ?>
</table>