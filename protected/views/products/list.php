<div class='inner_content'>
	<div class='price_search2'>
	<table>
		<tr>
			<td>Tìm theo giá</td>
			<td>
				<form action="SearchPrice" method="GET" id='priceForm'>
					<select name="range" onchange='priceSearch()'>
					<?php
						$priceRangeModel = PriceRange::model()->findAll();
						foreach($priceRangeModel as $d){ ?>
							<option value="<?=$d->id?>" <?= (isset($range) && $range==$d->id) ? 'selected="selected"' : '' ?> ><?= Util::displayMoney($d->from_price) . 'đ - ' . Util::displayMoney($d->to_price) . 'đ'?> </option>
					<? } ?>
					<input type="hidden" value="<?= $_GET['type'] ?>" name="type" />
					<input type="submit" value="Tìm" />
					</select>
				</form>
			</td>
		</tr>
	</table>

<script>
function priceSearch(){
    document.forms["priceForm"].submit();
}
</script>


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
