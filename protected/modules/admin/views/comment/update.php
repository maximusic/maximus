<?php
/* @var $this CommentController */
/* @var $model CommentModel */

$this->breadcrumbs=array(
	'Comment Models'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommentModel', 'url'=>array('index')),
	array('label'=>'Create CommentModel', 'url'=>array('create')),
	array('label'=>'View CommentModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommentModel', 'url'=>array('admin')),
);
?>

<h1>Update CommentModel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>