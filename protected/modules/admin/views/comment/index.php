<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comment Models',
);

$this->menu=array(
	array('label'=>'Create CommentModel', 'url'=>array('create')),
	array('label'=>'Manage CommentModel', 'url'=>array('admin')),
);
?>

<h1>Comment Models</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
