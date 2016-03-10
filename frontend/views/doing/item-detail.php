Detail item with title <b><?php echo $title ?></b>
<br /><br />
<?php if($itemFound != null) { ?>
    <table border="1">
        <?php foreach($itemFound as $key=>$value) { ?>
            <tr>
                <th><?php echo $key ?></th>
                <td><?php echo $value ?></td>
            </tr>
        <?php } ?>
    </table>

    <br />

    Url for this items is: <?php echo yii\helpers\Url::to(['doing/item-detail', 'title' => $title]); ?>

<?php } else { ?>
    <i>No item found</i>
<?php } ?>