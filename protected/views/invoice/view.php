<?php
/* @var $this InvoiceController */
/* @var $model Invoice */

$this->breadcrumbs = array(
    'Invoices' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Invoice', 'url' => array('index')),
    array('label' => 'Create Invoice', 'url' => array('create')),
    array('label' => 'Update Invoice', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Invoice', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Invoice', 'url' => array('admin')),
);
?>

<h1>View Invoice #<?php echo $model->id; ?></h1>

<?php

$subTotal = 0;
foreach ($model->details as $detail) {
    $subTotal+=$detail->subTotal();
}
$GST = $subTotal * 0.05;
$total = $subTotal + $GST;

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'date',
        'payment_method',
        array(
            'label' => 'Customer Name',
            'value' => $model->customer->name,
        ),
        array(
            'label' => 'Customer Phone',
            'value' => $model->customer->phone,
        ),
        array(
            'label' => 'Customer Address',
            'value' => $model->customer->address,
        ),
        array(
            'label' => 'SubTotal',
            'value' => $subTotal,
        ),
        array(
            'label' => 'GST',
            'value' => $GST,
        ),
        array(
            'label' => 'Total',
            'value' => $total,
        ),
    ),
));
?>

<?php
$dataProvider = new CActiveDataProvider('Detail', array(
    'criteria' => array(
        'condition' => 'invoice_id=' . $model->id,
        )));

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        'amount',
        'itemnum',
        'description',
        'unitprice',
)));


?>
