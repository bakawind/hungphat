<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_price'); ?>
		<?php echo $form->textField($model,'from_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'to_price'); ?>
		<?php echo $form->textField($model,'to_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->