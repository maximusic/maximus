<?php
/* @var $this CategoryController */
/* @var $model CategoryModel */

$this->breadcrumbs=array(
	'Category Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoryModel', 'url'=>array('index')),
	array('label'=>'Manage CategoryModel', 'url'=>array('admin')),
);
?>

<h1>Create CategoryModel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>