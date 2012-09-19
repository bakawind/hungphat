<div class='inner_content solid_background'>
<h1>Kết quả cho tin tức</h1>
<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$articleResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
)); ?>
	<br class='clear' />
<h1>Kết quả cho sản phẩm</h1>
<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$productResult,
	    'itemView'=>'_single_result',
	    'summaryText'=>'',
    )); ?>
</div> <!-- end inner content-->
