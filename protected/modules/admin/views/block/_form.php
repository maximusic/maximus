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
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>250)); ?>
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