<div class='news'>
<?php
if(get_class($data) === 'Article'){
?>
	<?= CHtml::link(CHtml::image($data->image), array('/article/display', 'id'=>$data->id), array('class'=>'thumb')) ?>
    <div class='news_content'>
	    <h3><?php echo CHtml::link($data->title, array('/article/display', 'id'=>$data->id)); ?></h3>
        <br/>
	    <p>
            <?= Util::limitWord($data->content, 100) ?>
            <?= CHtml::link('chi tiết...', array('/article/display', 'id'=>$data->id), array('class'=>'more')) ?>
        </p>
    </div>
	<hr />
<?
} else if(get_class($data) === 'Products') {
?>
	<?= CHtml::link(CHtml::image($data->image), array('/products/display', 'id'=>$data->id), array('class'=>'thumb')) ?>
    <div class='news_content'>
	    <h3><?php echo CHtml::link($data->name, array('/products/display', 'id'=>$data->id)); ?></h3>
        <br/>
	    <p>
            <?= Util::limitWord($data->description, 100) ?>
            <?= CHtml::link('chi tiết...', array('/products/display', 'id'=>$data->id), array('class'=>'more')) ?>
        </p>
    </div>
	<hr />
<? } ?>
</div>
