<div class='banner'>
    <?=CHtml::image("/images/banners/banner3.jpg", '', array('width'=>"900", 'height'=>'350'))?>
</div>
<div class='space'></div>
<div class='inner_content'>
	<div class='price_search2'>
	Tìm theo giá
		<select>
			<option>50.000 - 100.000</option>
			<option>100.000 - 200.000</option>
			<option>200.000 - 300.000</option>
		</select>
	</div>
	<br class='clear' />
<?php
$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_single_product',
	    'summaryText'=>'',
    )); ?>
	<br class='clear' />
</div> <!-- end inner content-->
