<?php
/* @var $this BlockController */
/* @var $data BlockModel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buttonLink')); ?>:</b>
	<?php echo CHtml::encode($data->buttonLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buttonName')); ?>:</b>
	<?php echo CHtml::encode($data->buttonName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pageName')); ?>:</b>
	<?php echo CHtml::encode($data->pageName); ?>
	<br />


</div>