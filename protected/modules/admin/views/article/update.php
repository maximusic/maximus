<?php
/* @var $this ArticleController */
/* @var $model ArticleModel */

$this->breadcrumbs=array(
	'Article Models'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleModel', 'url'=>array('index')),
	array('label'=>'Create ArticleModel', 'url'=>array('create')),
	array('label'=>'View ArticleModel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleModel', 'url'=>array('admin')),
);
?>

<h1>Update ArticleModel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>