<?php
/* @var $this CategoryController */
/* @var $model CategoryModel */

$this->breadcrumbs=array(
	'Category Models'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoryModel', 'url'=>array('index')),
	array('label'=>'Create CategoryModel', 'url'=>array('create')),
	array('label'=>'View CategoryModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoryModel', 'url'=>array('admin')),
);
?>

<h1>Update CategoryModel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>