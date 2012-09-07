<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_price')); ?>:</b>
	<?php echo CHtml::encode($data->from_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_price')); ?>:</b>
	<?php echo CHtml::encode($data->to_price); ?>
	<br />


</div>