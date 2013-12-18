<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Category Models',
);

$this->menu=array(
	array('label'=>'Create CategoryModel', 'url'=>array('create')),
	array('label'=>'Manage CategoryModel', 'url'=>array('admin')),
);
?>

<h1>Category Models</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
