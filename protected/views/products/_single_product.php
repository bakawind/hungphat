<div class='box'>
    <div class="product_box">
    <a href="/products/display/<?=$data->id?>">
		<div class='product_img'>
			<?=CHtml::image($data->image)?>
		</div>
        </a>
        <div class='info'>
			<div class="name"><?=$data->name?></div>
			<div class="price"><?=$data->price?>VND </div> 			
		</div>
        <?=CHtml::link('Chi tiết', '/products/display/'.$data->id, array('class'=>'detail'))?>
        <?=CHtml::link('Thêm vào giỏ', '/cart/add/'.$data->id, array('class'=>'add_to_card'))?>
    </div>
</div>
