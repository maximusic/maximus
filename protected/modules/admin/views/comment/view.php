<?php
/* @var $this CommentController */
/* @var $model CommentModel */

$this->breadcrumbs=array(
	'Comment Models'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CommentModel', 'url'=>array('index')),
	array('label'=>'Create CommentModel', 'url'=>array('create')),
	array('label'=>'Update CommentModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommentModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommentModel', 'url'=>array('admin')),
);
?>

<h1>View CommentModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'creationDate',
		'userIdAddComment',
		'userIdReplyComment',
		'acrticleId',
		'status',
	),
)); ?>
