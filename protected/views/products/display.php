<script type="text/javascript">
			$(function() {
				/*
				$('#carousel span').append('<img src="images/gui/carousel_glare.png" class="glare" />');
				$('#thumbs a').append('<img src="images/gui/carousel_glare_small.png" class="glare" />');
				*/
				$('#carousel').carouFredSel({
					responsive: true,
					circular: false,
					auto: false,
					items: {
						visible: 1,
						width: 200,
						height: '90%'

					},
					scroll: {
						fx: 'directscroll'
					}
				});

				$('#thumbs').carouFredSel({
					responsive: true,
					circular: false,
					auto: false,
					prev: '#prev',
					next: '#next',
					items: {
						visible: {
							min: 2,
							max: 6
						},
						width: 150,
						height: '100%'
						
					}
				});

				$('#thumbs a').click(function() {
					$('#carousel').trigger('slideTo', '#'+this.href.split('#').pop());
					$('#thumbs a').removeClass('selected');
					$(this).addClass('selected');
					return false;
				});

			});
</script>


<div class='banner'>
    <?=CHtml::image("/images/banners/banner3.jpg", '', array('width'=>"900", 'height'=>'350'))?>
</div>
<div class='space'></div>

<div class='inner_content'>
	<div class='product_detail'>
		<div class='detail'>
			<table>
				<tr>
					<td colspan='2'>
						<h3>Thông tin chi ti?t</h3>
					</td>								
				</tr>
				<tr> 
					<td class='spec'>
						Mã s?n ph?m
					</td>
					<td>
						ABC
					</td>
				</tr>
				<tr >
					<td class='spec'>
						Tên s?n ph?m
					</td>
					<td>
						Búp bê a
					</td>
				</tr>
				<tr >
					<td class='spec'>
						Giá
					</td>
					<td class='price'>
						60.000d
					</td>
				</tr>
				<tr class='break'>
					
				</tr>
				<tr>
					<td colspan=2>
						<h3>Mô t? s?n ph?m</h3>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						S?n ph?m búp bê d? choi cho tr? em
					</td>
				</tr>
			</table>
			<br class='clear' />
		</div> <!--end detail-->
		
		<!--- **************************slider**************************** -->
		<div id="wrapper">
			<div id="carousel-wrapper">				
				<div id="carousel">
					<span id="bb4"><img src="images/products/bb4.png" /></span>
					<span id="bb4_2" class="selected"><img src="images/products/bb4_2.jpg" /></span>
					<span id="bb4_3"><img src="images/products/bb4_3.jpg" /></span>					
					<span id="walle"><img src="images/products/walle.jpg" /></span>
				</div>
			</div>
			<div id="thumbs-wrapper">
				<div id="thumbs">
					<a href="#bb4" ><img src="images/products/small/bb4_1.jpg" /></a>
					<a href="#bb4_2" class="center"><img src="images/products/small/bb4_2.jpg" /></a>
					<a href="#bb4_3"><img src="images/products/small/bb4_3.jpg" class="center" /></a>					
					<a href="#walle"><img src="images/products/small/walle.jpg" /></a>
				</div>
				<a id="prev" href="#"></a>
				<a id="next" href="#"></a>
			</div>
		</div>
		<!--- **************************slider**************************** -->			
	</div> <!-- end droduct details-->
	<div class='space'></div>

	
	
<?php
$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_single_product',
	    'summaryText'=>'',
    )); 
	?>
	<br class='clear' />
</div> <!-- end inner content-->