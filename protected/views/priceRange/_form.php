<?php
/* @var $this PriceRangeController */
/* @var $model PriceRange */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'price-range-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'from_price'); ?>
		<?php echo $form->textField($model,'from_price'); ?>
		<?php echo $form->error($model,'from_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_price'); ?>
		<?php echo $form->textField($model,'to_price'); ?>
		<?php echo $form->error($model,'to_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->