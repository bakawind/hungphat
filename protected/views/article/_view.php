<div class='news'>
    <?= CHtml::link(CHtml::image($data->image), array('/article/view', 'id'=>$data->id), array('class'=>'thumb')) ?>
    <div class='news_content'>
	    <h3><?php echo CHtml::link($data->title, array('/article/view', 'id'=>$data->id)); ?></h3>
        <br/>
	    <p>
            <?= Util::limitWord($data->content, 100) ?>
            <?= CHtml::link('chi tiết...', array('/article/view', 'id'=>$data->id), array('class'=>'more')) ?>
        </p>
    </div>
    <br/> <br/> <hr />
</div>
