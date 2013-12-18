<?php Yii::app()->getComponent("bootstrap"); ?>
<?php
/* @var $this CommentController */
/* @var $model CommentModel */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-model-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Comments</h1>

<?php
$this->widget('application.extensions.yiibooster.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
                'content',
		'creationDate',
                array(
                   'name'   => 'userIdAddComment',
                   'header' => 'User Add Comment',
                   'value'  => '$data->userIdAdd->firstName ." - (". $data->userIdAdd->type . ")"'
                ),
                
                array(
                   'name'   => 'acrticleId',
                    'value' => '$data->acrticle->title'
                ),
//                 array(
//                'name' => 'status',
//                'header' => 'Status',
//                'class' => 'application.extensions.yiibooster.widgets.TbEditableColumn',
//                'headerHtmlOptions' => array('style' => 'width:80px'),
//                'editable' => array(
//                    'type' => 'select',
//                    'url' => '/admin/comment/editable',
//                    'source' => array('cheked'=>'Cheked', 'out' => 'Out')
//                )
//            ),
        array(
            'class' => 'application.extensions.yiibooster.widgets.TbToggleColumn',
            'toggleAction' => '/admin/comment/toggle',
            'name' => 'status',
            'header' => 'Status',
        ),
		
        array(
            'class' => 'application.extensions.yiibooster.widgets.TbButtonColumn',
        )),
));
?>

