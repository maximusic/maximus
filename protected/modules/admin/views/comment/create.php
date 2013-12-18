<?php
/* @var $this CommentController */
/* @var $model CommentModel */

$this->breadcrumbs=array(
	'Comment Models'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommentModel', 'url'=>array('index')),
	array('label'=>'Manage CommentModel', 'url'=>array('admin')),
);
?>

<h1>Create CommentModel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>