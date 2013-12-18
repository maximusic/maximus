<?php
/* @var $this BlockController */
/* @var $model BlockModel */

$this->breadcrumbs=array(
	'Block Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlockModel', 'url'=>array('index')),
	array('label'=>'Manage BlockModel', 'url'=>array('admin')),
);
?>

<h1>Create BlockModel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>