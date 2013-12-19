<?php
/* @var $this BlockController */
/* @var $model BlockModel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-model-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		 <?php
            $this->widget(
                    'application.extensions.yiibooster.widgets.TbRedactorJs', [
                'model' => $model,
                'attribute' => 'content',
                'value' => 'content',
                'editorOptions' => [
                        'plugins' => ['fontfamily','clips']
                ]
                    ]
            );
            ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<div class="pi-row avatar-row">
                <?php echo $form->hiddenField($model, 'image'); ?>
                <img id="afterUploadPreview" src="<?php echo $model->getFileSrc('image') ?>" width="222">
            </div>
                <?php
                $this->widget('ext.cocoCod.CocoCodWidget'
                    , array(
                        'id' => 'cocowidget1',
                        'onCompleted' => 'function(id,filename,jsoninfo){ $("#BlockModel_image").val(filename); $("#afterUploadPreview").attr("src",jsoninfo.uploadUrl)}',
                        'onCancelled' => 'function(id,filename){ alert("cancelled"); }',
                        'onMessage' => 'function(m){ alert(m); }',
                        'allowedExtensions' => array('jpeg', 'jpg', 'gif', 'png'), // server-side mime-type validated
                        'sizeLimit' => 2000000, // limit in server-side and in client-side
                        'uploadDir' => Yii::getPathOfAlias('webroot') . '/uploads/temp/', // coco will @mkdir it
                        'uploadUrl' => Yii::app()->getBaseUrl(true) . '/uploads/temp/', // coco will @mkdir it
// this arguments are used to send a notification
// on a specific class when a new file is uploaded,
                        'receptorClassName' => 'application.models.BlockModel',
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
                        'defaultControllerName' => 'admin/block',
                        //'defaultActionName' => 'coco',
                    ));
                ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buttonLink'); ?>
		<?php echo $form->textField($model,'buttonLink',array('size'=>60,'maxlength'=>75)); ?>
		<?php echo $form->error($model,'buttonLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buttonName'); ?>
		<?php echo $form->textField($model,'buttonName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'buttonName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pageName'); ?>
		<?php echo $form->textField($model,'pageName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pageName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->