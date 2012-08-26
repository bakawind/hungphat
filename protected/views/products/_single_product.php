<div class='box'>
    <div class="product_box">
        <a href="productdetail.html">
        <?=CHtml::image($data->image)?>
        </a>
        <div class='info'><p><?=$data->price?>VND <?=$data->name?></p></div>
        <?=CHtml::link('Chi tiết', '/product/display/'.$data->id, array('class'=>'detail'))?>
        <?=CHtml::link('Thêm vào giỏ', '/cart/add/'.$data->id, array('class'=>'add_to_card'))?>
    </div>
</div>
