<div class='container contact_us'>
    <?=CHtml::image('/images/contact.png')?>
    <div class='contact_form'>
        <h1>Hãy liên hệ với chúng tôi</h1>
        <?php $form=$this->beginWidget('CActiveForm', array(
	        'id'=>'contact-form',
	        'enableClientValidation'=>true,
	        'clientOptions'=>array(
		        'validateOnSubmit'=>true,
	        ),
        )); ?>
	        <div class="note">Những mục <span class="required">*</span> không được bỏ trống.</div>
            <br/>
            <table>
                <tr>
                    <td> <?php echo $form->labelEx($model,'name'); ?> </td>
                    <td> <?php echo $form->textField($model,'name'); ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $form->labelEx($model,'address'); ?> </td>
                    <td> <?php echo $form->textField($model,'address'); ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $form->labelEx($model,'email'); ?> </td>
                    <td> <?php echo $form->textField($model,'email'); ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $form->labelEx($model,'phone'); ?> </td>
                    <td> <?php echo $form->textField($model,'phone'); ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $form->labelEx($model,'subject'); ?> </td>
                    <td> <?php echo $form->textField($model,'subject'); ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $form->labelEx($model,'body'); ?> </td>
                    <td> <?php echo $form->textArea($model,'body'); ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type='submit' value='Gửi'/></td>
                </tr>
            </table>
        <?php $this->endWidget(); ?>
    </div>
</div>
