<?php
/* @var $this CommentController */
/* @var $data CommentModel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creationDate')); ?>:</b>
	<?php echo CHtml::encode($data->creationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userIdAddComment')); ?>:</b>
	<?php echo CHtml::encode($data->userIdAddComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userIdReplyComment')); ?>:</b>
	<?php echo CHtml::encode($data->userIdReplyComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acrticleId')); ?>:</b>
	<?php echo CHtml::encode($data->acrticleId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>