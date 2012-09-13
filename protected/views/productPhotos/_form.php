<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-photos-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data',),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--div class="row">
		<?php /* echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); */ ?>
	</div Hung - remove id textInput-->

	<!--div class="row">
		<?php /* echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'url'); */ ?>
	</div Hung -close url text input-->

	<div class="row"> <!-- Hung - add upload image input -->

		<?php echo $model->getThumbnail(); ?>
        <br>
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo CHtml::activeFileField($model, 'url'); // see comments below ?>
		<?php echo $form->error($model,'url');  ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php //echo $model->product_id ?>
		<?php echo $form->textField($model,'product_id', array('readonly' => 'readonly'));?>
		<?php echo $form->error($model,'product_id'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
