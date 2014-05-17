
<?php
if ($productModel->hasErrors()) {
    echo CHtml::errorSummary($productModel);
}

?>
<script type = "text/javascript" > addRow(false);</script>


<table id="newTitleRows" style="display: none">
    <tr>
        <td><?php echo CHtml::textField('Detail[amount][]', '1'); ?></td>
        <td><?php echo CHtml::textField('Detail[itemnum][]', $productModel->tag); ?></td>
        <td><?php echo CHtml::textField('Detail[description][]', $productModel->description); ?></td>
        <td><?php echo CHtml::textField('Detail[unitprice][]', $productModel->price); ?></td>
        <td><input type="button" name="delete" value="delete" onclick="deleteRow(this)" /></td>
    </tr>
</table>

