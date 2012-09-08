<?php
class CartItem{
    public $productId, $code, $name, $price, $quantity;

    public function __construct($productId, $quantity=1)
    {
        if($productId!=null){
            $product = Products::model()->findByPk($productId);
            if($product != null){
                $this->productId = $productId;
                $this->quantity = $quantity;
                $this->code = $product->code;
                $this->name = $product->name;
                $this->price = $product->price;
            }
        }
    }

    public function toArray(){
        $item = array();
        $item['productId'] = $this->productId;
        $item['quantity'] = $this->quantity;
        $item['code'] = $this->code;
        $item['name'] = $this->name;
        $item['price'] = $this->price;
        return $item;
    }

    public function getTotal()
    {
        return $this->price * $this->quantity;
    }

    public function toOrderItem($orderId)
    {
        if(isset($orderId) && $orderId != '') {
            $orderItem = new OrderItems;
            $orderItem->order_id = $orderId;
            $orderItem->product_id = $this->productId;
            $orderItem->quantity = $this->quantity;
            $orderItem->save();
        }
    }
}
?>
