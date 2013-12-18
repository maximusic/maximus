<?php
/* @var $this ArticleController */
/* @var $model ArticleModel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-model-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
          'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
            'autocomplete' => 'off',
    )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shirtDesc'); ?>
		<?php echo $form->textArea($model,'shirtDesc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'shirtDesc'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model, 'content'); ?>
            <?php
            $this->widget(
                    'application.extensions.yiibooster.widgets.TbRedactorJs', [
                'model' => $model,
                'attribute' => 'content',
                'value' => 'content',
                'editorOptions' => [
                    'plugins' => ['fontfamily']
                ]
                    ]
            );
            ?>
            <?php echo $form->error($model, 'content'); ?>
        </div>
        
         <div class="pi-row avatar-row">
                <?php echo $form->hiddenField($model, 'image'); ?>
                <img id="afterUploadPreview" src="<?php echo $model->getFileSrc('image') ?>" width="222">
            </div>
                <?php
                $this->widget('ext.cocoCod.CocoCodWidget'
                    , array(
                        'id' => 'cocowidget1',
                        'onCompleted' => 'function(id,filename,jsoninfo){ $("#ArticleModel_image").val(filename); $("#afterUploadPreview").attr("src",jsoninfo.uploadUrl)}',
                        'onCancelled' => 'function(id,filename){ alert("cancelled"); }',
                        'onMessage' => 'function(m){ alert(m); }',
                        'allowedExtensions' => array('jpeg', 'jpg', 'gif', 'png'), // server-side mime-type validated
                        'sizeLimit' => 2000000, // limit in server-side and in client-side
                        'uploadDir' => Yii::getPathOfAlias('webroot') . '/uploads/temp/', // coco will @mkdir it
                        'uploadUrl' => Yii::app()->getBaseUrl(true) . '/uploads/temp/', // coco will @mkdir it
// this arguments are used to send a notification
// on a specific class when a new file is uploaded,
                        'receptorClassName' => 'application.models.ArticleModel',
                        'methodName' => 'onFileUploaded',
                        'userdata' => array(),
                        // controls how many files must be uploaded
                        'maxUploads' => -1, // defaults to -1 (unlimited)
                        'maxUploadsReachMessage' => 'No more files allowed', // if empty, no message is shown
// controls how many files the can select (not upload, for uploads see also: maxUploads)
                        'multipleFileSelection' => true, // true or false, defaults: true
                        'buttonText' => 'Upload photo',
                        'dropFilesText' => 'Upload or Drop here',
                        'htmlOptions' => array('style' => 'width: 300px;'),
                        'defaultControllerName' => 'admin/article',
                        //'defaultActionName' => 'coco',
                    ));
                ?>

	<div class="row">
		<?php echo $form->labelEx($model,'authorId'); ?>
		<?php echo $form->dropDownList($model,'authorId',CHtml::listData(UserModel::model()->findAll(), 'id', 'firstName')); ?>
		<?php echo $form->error($model,'authorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoryId'); ?>
		<?php echo $form->dropDownList($model,'categoryId',CHtml::listData(CategoryModel::model()->findAll(), 'id', 'title')); ?>
		<?php echo $form->error($model,'categoryId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->