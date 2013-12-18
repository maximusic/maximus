<?php Yii::app()->getComponent("bootstrap"); ?>
<?php
/* @var $this BlockController */
/* @var $model BlockModel */

$this->breadcrumbs = array(
    'Blocks' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Blocks', 'url' => array('index')),
    array('label' => 'Create Block', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#block-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Blocks</h1>

<?php
$this->widget('application.extensions.yiibooster.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        array(
            'name' => 'content',
            'value' => 'TruncateText::truncate($data->content,array(limit => 50))',
        ),
        'image',
        'buttonLink',
        'buttonName',
        'pageName',
        array(
            'class' => 'application.extensions.yiibooster.widgets.TbButtonColumn',
        )),
));
?>

