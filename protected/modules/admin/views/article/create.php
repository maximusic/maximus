<?php
/* @var $this ArticleController */
/* @var $model ArticleModel */

$this->breadcrumbs=array(
	'Article Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticleModel', 'url'=>array('index')),
	array('label'=>'Manage ArticleModel', 'url'=>array('admin')),
);
?>

<h1>Create ArticleModel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>