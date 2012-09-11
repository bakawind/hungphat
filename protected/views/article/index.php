<div class='inner_content solid_background'>
    <?php $this->widget('zii.widgets.CListView', array(
    	'dataProvider'=>$dataProvider,
    	'itemView'=>'_view',
    	'summaryText'=>'',
    )); ?>
		<br class='clear' />
</div> <!-- end inner content-->
