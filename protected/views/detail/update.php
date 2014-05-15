<?php
/* @var $this DetailController */
/* @var $model Detail */

$this->breadcrumbs=array(
	'Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Detail', 'url'=>array('index')),
	array('label'=>'Create Detail', 'url'=>array('create')),
	array('label'=>'View Detail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Detail', 'url'=>array('admin')),
);
?>

<h1>Update Detail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>