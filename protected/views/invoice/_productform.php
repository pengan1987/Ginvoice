<script type="text/javascript">add();</script>

<table id="newTitleRows">
    <tr>
        <td><?php echo CHtml::textField( 'Detail[amount][]','1'); ?></td>
        <td><?php echo CHtml::textField( 'Detail[itemnum][]',$productModel->tag); ?></td>
        <td><?php echo CHtml::textField( 'Detail[description][]',$productModel->description); ?></td>
        <td><?php echo CHtml::textField( 'Detail[unitprice][]',$productModel->price); ?></td>
    </tr>
</table>
