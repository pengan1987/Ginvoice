<script type="text/javascript">addRow();</script>

<table id="newTitleRows">
    <tr>
        <td><?php echo CHtml::textField( 'Detail[amount][]','1'); ?></td>
        <td><?php echo CHtml::textField( 'Detail[itemnum][]',$productModel->tag); ?></td>
        <td><?php echo CHtml::textField( 'Detail[description][]',$productModel->description); ?></td>
        <td><?php echo CHtml::textField( 'Detail[unitprice][]',$productModel->price); ?></td>
        <td><input type="button" name="delete" value="delete" onclick="deleteRow(this)" /></td>
    </tr>
</table>

