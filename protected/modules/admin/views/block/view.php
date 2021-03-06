<?php
/* @var $this BlockController */
/* @var $model BlockModel */

$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Blocks', 'url'=>array('index')),
	array('label'=>'Create Block', 'url'=>array('create')),
	array('label'=>'Update Block', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Block', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Block', 'url'=>array('admin')),
);
?>

<h1>View Block #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'content',
		'image',
		'buttonLink',
		'buttonName',
		'pageName',
	),
)); ?>
