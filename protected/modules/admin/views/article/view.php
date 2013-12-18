<?php
/* @var $this ArticleController */
/* @var $model ArticleModel */

$this->breadcrumbs=array(
	'Article Models'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ArticleModel', 'url'=>array('index')),
	array('label'=>'Create ArticleModel', 'url'=>array('create')),
	array('label'=>'Update ArticleModel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleModel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleModel', 'url'=>array('admin')),
);
?>

<h1>View ArticleModel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'shirtDesc',
		'content',
		'authorId',
		'categoryId',
		'createdTime',
	),
)); ?>
