<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.carouFredSel-5.6.1.js" ></script>
<script type="text/javascript">
			$(function() {

				/*$('#carousel span').append('<img src="../../images/gui/carousel_glare.png" class="glare" />');*/
				$('#thumbs a').append('<img src="../../images/gui/carousel_glare_small.png" class="glare" />');

				$('#carousel').carouFredSel({
					responsive: true,
					circular: false,
					auto: false,
					items: {
						visible: 1,
						width: 448,
						height: '75%'

					},
					scroll: {
						fx: 'directscroll'
					}
				});

				$('#thumbs').carouFredSel({
					responsive: true,
					auto: false,
					circular: false,
					prev: '#prev',
					next: '#next',
					items: {
						visible: {
							min: 2,
							max: 6
						},
						width: 200,
						height: '75%'
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


<div class='inner_content'>

	<div class='product_detail'>
		<div class='detail'>
			<table>
				<tr>
					<td colspan='2'> <h3>Thông Tin Chi Tiết</h3> </td>
				</tr>
				<tr>
					<td class='spec'> Mã sản phẩm </td>
					<td> <?= $model->code ?> </td>
				</tr>
				<tr >
					<td class='spec'> Tên Sản Phẩm </td>
					<td> <?= $model->name ?> </td>
				</tr>
				<tr >
					<td class='spec'> Giá </td>
					<td class='price'> <?= $model->price ?> </td>
				</tr>
				<tr >
					<td class='spec'> Tình Trạng </td>
					<td class='price'> <?php
						if($model->available) echo 'Còn Hàng';
						else echo 'Hết Hàng';
					?> </td>
				</tr>

				<tr class='break'>
				</tr>

				<tr>
					<td colspan=2> <h3>Mô Tả Sản Phẩm</h3> </td>
				</tr>
				<tr>
					<td colspan=2> <p> <?= $model->description ?> </p> </td>
				</tr>
				<tr><td colspan=2><?=CHtml::link('Thêm vào giỏ', '/cart/add/'.$model->id, array('class'=>'add_to_card'))?></td></tr>
			</table>
			<br class='clear' />
		</div> <!--end detail-->

		<!--- **************************slider**************************** -->

			<div id="wrapper">

				<?php
				if($model->image!=null || $photoData->ItemCount!=0) {?>
					<div id="carousel-wrapper">
						<img id="shadow" src="../../img/gui/carousel_shadow.png" />
						<div id="carousel">
							<?php
								if($model->image!=null){ ?>
									<span id="<?= $model->id?>"><img src="<?= $model->image?>" /></span>
							<?php } ?>
							<?php
								if($photoData->ItemCount != 0){
									foreach ($photoData->getData() as $value){ ?>
										<span id="<?= $model->id . '_' .$value->id ?>" class="selected"><img src="<?= $value->url ?>" /></span>
							<?php 	}
								}?>
						</div>
					</div>
				<?php } ?>

				<?php if($photoData->ItemCount > 0 && $model->image!=null ){ ?>
					<div id="thumbs-wrapper">
						<div id="thumbs">
							<a class="selected" href="#<?= $model->id?>" ><img src="<?= $model->image?>"/></a>
							<?php
								foreach ($photoData->getData() as $value){ ?>
								<a href="#<?= $model->id . '_' . $value->id ?>"><img src="<?= $value->url ?>" /></a>
							<? } ?>
						</div>
						<a id="prev" href="#"></a>
						<a id="next" href="#"></a>
					</div>
				<?php } ?>

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

