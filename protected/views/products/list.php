

<div class='banner'>
    <?=CHtml::image("/images/banners/banner3.jpg", '', array('width'=>"900", 'height'=>'350'))?>
</div>

<div class='space'></div>
<div class='inner_content'>
	<div class='price_search2'>
	
	
	
	Tìm theo giá
		
		<form action="SearchPrice" method="GET">
			<select name="range" >
			<?php
				$priceRangeModel = PriceRange::model()->findAll();
				//$list = CHtml::listData($priceRangeModel, 'id', 'from_price' . ' - ' . 'to_price');
				
				
				foreach($priceRangeModel as $d){ ?>				
					<option value="<?=$d->id?>"><?= $d->from_price . 'đ - ' . $d->to_price . 'đ'?> </option>	
			<?php } ?>
			<input type="hidden" value="<?= $_GET['type'] ?>" name="type" />
			
			<input type="submit" value="Tìm" />
						
			</select>
		</form>
		
		
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
