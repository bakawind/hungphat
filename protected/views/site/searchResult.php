<div class='inner_content solid_background'>

<?php
if ($articleResult->getTotalItemCount() > 0) {?>
	<h1> Kết quả cho Tin Tức</h1>
<?php $this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$articleResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    ));
}
?>
	<br class='clear' />

<?php
if ($productResult->getTotalItemCount() > 0) {?>
	<h1> Kết quả cho Sản Phẩm</h1>
<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$productResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    ));
}
?>
</div> <!-- end inner content-->
