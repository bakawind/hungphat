<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class='container solid_background'>
    <h2>Error <?php echo $code; ?></h2>

    <div class="error">
    <?php //echo CHtml::encode($message); ?>
    </div>
</div>
