<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $detailModel Detail */
/* @var $form CActiveForm */
?>


<script type="text/javascript">
    function add(empty) {
        var dataTable = document.getElementById("dataTable");
        var newTable = document.getElementById("emptyTitleRows").cloneNode(true).children;
        if (!empty) {
            newTable = document.getElementById("newTitleRows").cloneNode(true).children;
        }
        dataTable.appendChild(newTable[0]);
    }


</script>
<div class="form">
    <form>
        <?php echo CHtml::textField('productTag') ?>
        <?php
        echo CHtml::ajaxSubmitButton("Add Product", CController::createUrl('addproduct'), array('update' => '#addProduct'));
        ?>
    </form>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'invoice-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>


    <table id="dataTable">
        <tr class="title">
            <td><?php echo $form->labelEx($detailModel, 'amount'); ?></td>
            <td><?php echo $form->labelEx($detailModel, 'itemnum'); ?></td>
            <td><?php echo $form->labelEx($detailModel, 'description'); ?></td>
            <td><?php echo $form->labelEx($detailModel, 'unitprice'); ?></td>
            <td><input type="button" name="more" value="more" onclick="add(true)" /></td>
        </tr>

    </table>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>



    <div class="row">

        <?php echo $form->hiddenField($model, 'customer_id'); ?>

    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'payment_method'); ?>
        <?php echo $form->textField($model, 'payment_method', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'payment_method'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model->customer, 'name'); ?>
        <?php echo $form->textField($model->customer, 'name', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model->customer, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model->customer, 'phone'); ?>
        <?php echo $form->textField($model->customer, 'phone'); ?>
        <?php echo $form->error($model->customer, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model->customer, 'address'); ?>
        <?php echo $form->textField($model->customer, 'address', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model->customer, 'address'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<div id="addProduct" style="display: none">
    <?php $this->renderPartial('_productform', array('model' => $model, 'productModel' => new Product())); ?>
</div>

<table style="display:none" id="emptyTitleRows">
    <tr>
        <td><?php echo $form->textField($detailModel, 'amount[]'); ?></td>
        <td><?php echo $form->textField($detailModel, 'itemnum[]'); ?></td>
        <td><?php echo $form->textField($detailModel, 'description[]'); ?></td>
        <td><?php echo $form->textField($detailModel, 'unitprice[]'); ?></td>
    </tr>
</table>
