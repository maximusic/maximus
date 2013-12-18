<?php
/* @var $this BlockController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Block',
);

$this->menu=array(
	array('label'=>'Create Block', 'url'=>array('create')),
	array('label'=>'Manage Blocks', 'url'=>array('admin')),
);
?>

<h1>Blocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
