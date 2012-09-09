<div class="form">
$this->layout='column2';
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data',),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<!--div class="row">
		<?/*php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); */?>
	</div *Hung - close id input textfield * -->

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
    <div class="text-area">
        <?php
          $this->widget('application.extensions.tinymce.ETinyMce', array(
                      'model'=>$model,
                      'attribute'=>'content',
                      'id'=>'Article_content',
                      'editorTemplate'=>'full',
                      'options' => array(
                          //'plugins'=>'phpimage,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,spellchecker,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
                          //'theme'=>"advanced",
                          //'theme_advanced_buttons1'=>"phpimage,media,link,unlink,anchor,|,|,charmap,iespell,advhr,styleprops,|,attribs,visualchars,|",
                          //'theme_advanced_buttons2'=>"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,indent,|,bullist,numlist",
                          //'theme_advanced_buttons3'=>"styleselect,formatselect,fontselect,fontsizeselect,|,code,|",
                          //'theme_advanced_buttons4'=>"",
                          //'extended_valid_elements'=>"a[name|href|target|title|onclick]",
                          //'relative_urls'=>false,
                          //'remove_script_host'=>true,
                          'plugins'=>'phpimage,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,spellchecker,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
                          'theme'=>"advanced",
                          'theme_advanced_buttons1'=>"phpimage,media,link,unlink,anchor,|,|,charmap,iespell,advhr,styleprops,|,attribs,visualchars,|",
                          'theme_advanced_buttons2'=>"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,indent,|,bullist,numlist",
                          'theme_advanced_buttons3'=>"styleselect,formatselect,fontselect,fontsizeselect,|,code,|",
                          'theme_advanced_buttons4'=>"",
                          'extended_valid_elements'=>"a[name|href|target|title|onclick]",
                          'theme_advanced_resizing' => true,
                          'relative_urls'=>false,
                          'remove_script_host'=>true,
                          'width' => "400px",
                          )
                        )
                    ) ?>
            <?php echo $form->error($model,'content'); ?>
    </div>
    </div>

	<div class="row"> <!-- Hung - add upload image input -->

		<?php echo $model->getThumbnail(); ?>
        <br>
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model, 'tempFile'); // see comments below ?>
		<?php echo $form->error($model,'image');  ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
