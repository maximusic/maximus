<?php
Yii::app()->clientScript->registerScript('search', "
$('#search #ArticleModel_title').keyup(function(){
    $.fn.yiiListView.update('mylist', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
    return false;
});
");
?>
<div id="simple_header">
    <div class="gradient">
        <div class="header">
            <h1>Our Blog</h1>
        </div>
    </div>
</div>
<!-- End Header -->
</div>
<!-- Begin Breadcrumbs -->
<div id="breadcrumbs">
    <?php $this->widget(
    'application.extensions.yiibooster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Blog'),
    )
); ?>
    <div class="clear"></div>
</div>
<div id="top" style="display:none"></div>
<!-- End Breadcrumbs -->
<!-- Begin Content -->
<div class="content spr">
    <div class="cont">
        
          <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'id' => 'mylist',
                'itemView'=>'_view',
                'pager' => array(
                    'id' => 'paging',
       ),
        )); ?>
           </div>
    <div id="sliding-navigation" class="sidebar">
        <div id="search_area">
            <?php $form=$this->beginWidget('CActiveForm', array(
                  'action'=>Yii::app()->createUrl($this->route),
                  'method'=>'get',
                  'id' => 'search'
            )); ?>
            <?php echo $form->label($model,'Search:')  ?>
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
            <?php $this->endWidget(); ?>
        </div>
             <?php $this->widget('application.widgets.CategoriesWidget');?>
    </div>
    <div class="clear"></div>
</div>
