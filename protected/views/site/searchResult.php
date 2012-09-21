<div class='inner_content solid_background'>
<?php
if ($articleResult->getTotalItemCount() > 0) {
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$articleResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    ));
}
?>
	<br class='clear' />
<?php
if ($productResult->getTotalItemCount() > 0) {
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$productResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    ));
}
?>
</div> <!-- end inner content-->
