<?php
/* @var $this DetailController */
/* @var $model Detail */

$this->breadcrumbs=array(
	'Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Detail', 'url'=>array('index')),
	array('label'=>'Create Detail', 'url'=>array('create')),
	array('label'=>'Update Detail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Detail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Detail', 'url'=>array('admin')),
);
?>

<h1>View Detail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'itemnum',
		'description',
		'unitprice',
		'amount',
		'invoice_id',
	),
)); ?>
