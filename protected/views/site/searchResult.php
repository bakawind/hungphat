<?php ?>

<div class='inner_content'>
	

<h1>Kết quả cho Tin Tức</h1>	
<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$articleResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    )); ?>
	
	<br class='clear' />
	
	<h1>Kết quả cho Sản Phẩm</h1>
<?php 
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$productResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    )); ?>
	
	
</div> <!-- end inner content-->
