<?php Yii::app()->getComponent("bootstrap"); ?>
<?php
/* @var $this ArticleController */
/* @var $model ArticleModel */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>
<!-- search-form -->
<?php
$this->widget('application.extensions.yiibooster.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
		'title',
                array(
                'name' => 'shirtDesc',
                'value' => 'TruncateText::truncate($data->shirtDesc,15)',
                ),
                array(
                'name' => 'content',
                'value' => 'TruncateText::truncate($data->content,15)',
                ),
                array(
                    'name'  => 'image',
                    'value' => '$data->getImagePath($data->id)',
                    'type'  => 'image',
                    'htmlOptions'=>array('class'=>'avatar'),
                ),
                array(
                    'name'  => 'authorId',
                    'value' => '$data->author->firstName'
                ),
		
                array(
                    'name'  => 'categoryId',
                    'value' => '$data->category->title'
                ),
        array(
            'class' => 'application.extensions.yiibooster.widgets.TbButtonColumn',
        )),
));
?>

