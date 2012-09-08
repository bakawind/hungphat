<div class='container solid_background'>
<style>
.cart{
    width: 100%;
    border: 1px solid #aaa;
    border-collapse: collapse;
    font-size: 0.85em;
    line-height: 1.3em;
}
.cart th{
    padding: 5px 3px;
    vertical-align: middle;
    border: solid 1px #aaa;
    color: #060;
    font-weight: bold;
    background-color: #dedede;
}
.cart tbody{
    display: table-row-group;
}
.cart tr.color{
    background-color: #EFEFEF;
}
.cart td{
    text-align: center;
}
.cart .cart_quantity{
    width: 30px;
}
.order_info{
}
.order_info table td{
    min-width: 100px;
}
</style>
<?php
if(isset($cart) && $cart!=null){
    if($cart->getTotal() > 0){
?>
<h1>Thông tin giỏ hàng:</h1>
<br/>
<table class='cart'>
    <th>Mã sản phẩm</th>
    <th>Tên</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Tổng</th>
    <th></th>
<?php
    $color = false;
    foreach($cart->getItems() as $item){
        $this->renderPartial('/cart/_cart_row', array('item'=>$item, 'color'=>$color));
        $color = !$color;
    }
?>
<tr> <td colspan='6'>&nbsp</td> </tr>
<tr>
    <td width='50px'></td>
    <td width='250px'></td>
    <td width='50px'></td>
    <td width='50px'><b>Tổng cộng:</b></td>
    <td width='50px'><b><?=$cart->getTotal()?></b></td>
    <td width='50px'></td>
</tr>
</table>

<br/>
<br/>
<div class='order_info'>
    <h1>Thông tin khách hàng:</h1>
    <form method='POST' action='/cart/createOrder' id='order_info' name='order_info'>
        <table cellspacing='5px'>
            <tr>
                <td> Họ Tên *: </td>
                <td><input type='textfield' name='name' value='<?=isset($attributes['name']) ? $attributes['name'] : ''?>' /></td>
                <td class='error'><?=isset($errors['name']) ? $errors['name'] : ''?></td>
            </tr>
            <tr>
                <td> Địa chỉ *: </td>
                <td><input type='textfield' name='address' value='<?=isset($attributes['address']) ? $attributes['address'] : ''?>' /></td>
                <td class='error'><?=isset($errors['address']) ? $errors['address'] : ''?></td>
            </tr>
            <tr>
                <td> Email: </td>
                <td><input type='textfield' name='email' value='<?=isset($attributes['email']) ? $attributes['email'] : ''?>' /></td>
                <td class='error'><?=isset($errors['email']) ? $errors['email'] : ''?></td>
            </tr>
            <tr>
                <td> Điện thoại *: </td>
                <td><input type='textfield' name='phone' value='<?=isset($attributes['phone']) ? $attributes['phone'] : ''?>' /></td>
                <td class='error'><?=isset($errors['phone']) ? $errors['phone'] : ''?></td>
            </tr>
            <tr>
                <td> </td>
                <td><input type='submit' value='Gửi đơn hàng'/></td>
            </tr>
        </table>
    </form>
</div>
<br class='clear'/>

<?php
    } else {
?>
    <div class='container'>Không có sản phẩm nào trong giỏ hàng của bạn</div>
<?php
    }
}
?>
</div>
