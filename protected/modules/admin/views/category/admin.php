<?php Yii::app()->getComponent("bootstrap"); ?>
<?php
/* @var $this CategoryController */
/* @var $model CategoryModel */

$this->breadcrumbs=array(
	'Category Models'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CategoryModel', 'url'=>array('index')),
	array('label'=>'Create CategoryModel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categorys</h1>

<?php
$this->widget('application.extensions.yiibooster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'class' => 'application.extensions.yiibooster.widgets.TbButtonColumn',
        )),
));
?>