<style>
.cart{
    width: 100%;
    border: 1px solid #CCC;
    border-collapse: collapse;
    font-size: 0.85em;
    line-height: 1.3em;
}
.cart th{
    padding: 5px 3px;
    vertical-align: middle;
    border: solid 1px #CCC;
    color: #060;
    font-weight: bold;
    background-color: #EFEFEF;
}
.cart tbody{
    display: table-row-group;
}
.cart td{
    text-align: center;
}
.cart .cart_quantity{
    width: 30px;
}
</style>
<?php
if(isset($cart) && $cart!=null){
    if($cart->getTotal() > 0){
?>
<table class='cart'>
    <th>Mã sản phẩm</th>
    <th>Tên</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Tổng</th>
    <th></th>
<?php
    foreach($cart->getItems() as $item){
        $this->renderPartial('/cart/_cart_row', array('item'=>$item));
    }
?>
</table>
<?php
    } else {
?>
    <div class='container'>Không có sản phẩm nào trong giỏ hàng của bạn</div>
<?php
    }
}
?>
