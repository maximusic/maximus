<?php
/* @var $this BlockController */
/* @var $model BlockModel */

$this->breadcrumbs=array(
	'Block Models'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlockModel', 'url'=>array('index')),
	array('label'=>'Create BlockModel', 'url'=>array('create')),
	array('label'=>'View BlockModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlockModel', 'url'=>array('admin')),
);
?>

<h1>Update BlockModel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>