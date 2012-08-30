<tr>
    <form method='POST' action='/cart/update'>
        <input type='hidden' name='id' value='<?=$item->productId?>'/>
        <td width='50px'><?=$item->code?></td>
        <td width='250px'><?=$item->name?></td>
        <td width='50px'><?=$item->price?></td>
        <td width='50px'><input class='cart_quantity' type='textField' name='quantity' value='<?=$item->quantity?>'/></td>
        <td width='50px'><?=$item->price * $item->quantity?></td>
        <td width='50px'><input type='submit' value='Thay đổi'/></td>
    </form>
</tr>
