<h1>Edit About Content</h1>
<div class="form">
<?php
$this->layout='column2';
?>
<form method='POST' action='/site/editAdminEmail' name='email'>
    <div class="row">
        <label for='email1' class='required' >Admin email
            <span class="required">*</span>
        </label>
        <input type='textfield' name='email1' value='<?=isset($emails['email1']) ? $emails['email1'] : ''?>'/>
    </div>
    <div class="row">
        <label for='email2' class='required' >Email 2
            <span class="required">*</span>
        </label>
        <input type='textfield' name='email2' value='<?=isset($emails['email2']) ? $emails['email2'] : ''?>'/>
    </div>
	<div class="row buttons"> <input type='submit' value='Save'/> </div>
</form>
</div><!-- form -->
