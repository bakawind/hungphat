<?php
class Cart{
    private $_cartItems;

    public function __construct()
    {
        $this->_cartItems = array();
    }

    public function loadJson($jsonString)
    {
        if(isset($jsonString) && $jsonString!=null){
            $cartArray = json_decode($jsonString, true);
            foreach($cartArray as $item){
                if(isset($item['productId']) && isset($item['quantity']))
                    $this->addToCart($item['productId'], $item['quantity']);
            }
        }
        return $this;
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function toArray(){
        $cart = array();
        foreach($this->_cartItems as $item){
            array_push($cart, $item->toArray());
        }
        return $cart;
    }

    public function addToCart($productId, $quantity=1)
    {
        if(isset($productId) && $productId!=null){
            if(!$this->isInCart($productId)){
                $item = new CartItem($productId, $quantity);
                //$item->productId = $productId;
                //$item->quantity = $quantity;
                array_push($this->_cartItems, $item);
            } else {
                foreach($this->_cartItems as $item){
                    if($item->productId == $productId) $item->quantity += $quantity;
                }
            }
            Yii::app()->user->setState('cart', $this->toJson());
        }
    }

    public function changeQuantity($productId, $quantity=0)
    {
        if(isset($productId) && $productId!=null){
            // The product existed
            if($this->isInCart($productId)){
                if($quantity!=0){
                    foreach($this->_cartItems as $item){
                        if($item->productId == $productId){
                            $item->quantity = $quantity;
                            $this->_cartItems[array_search($item, $this->_cartItems)]=$item;
                        }
                    }
                    Yii::app()->user->setState('cart', $this->toJson());
                } else {
                    $this->removeFromCart($productId);
                }
            }
        }
    }

    public function removeFromCart($productId)
    {
        if($this->isInCart($productId)){
            foreach($this->_cartItems as $item){
                if($item->productId == $productId) unset($this->_cartItems[array_search($item, $this->_cartItems)]);
            }
            Yii::app()->user->setState('cart', $this->toJson());
        }
    }

    public function isInCart($productId)
    {
        if(isset($productId) && $productId!=null){
            foreach($this->_cartItems as $item){
                if($item->productId == $productId) return true;
            }
        }
        return false;
    }

    public function getItems()
    {
        return $this->_cartItems;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->_cartItems as $item){
            $total += $item->getTotal();
        }
        return $total;
    }

    public function getNumberOfItems()
    {
        return sizeof($this->_cartItems);
    }

    public function emptyCart()
    {
        $this->_cartItems = array();
        Yii::app()->user->setState('cart', $this->toJson());
    }

    public function toOrder($order)
    {
        foreach($this->_cartItems as $i){
            $i->toOrderItem($order->id);
        }
    }
}
?>
