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
        if(isset($productId) && !$this->isInCart($productId)){
            $item = new CartItem($productId, $quantity);
            //$item->productId = $productId;
            //$item->quantity = $quantity;
            array_push($this->_cartItems, $item);
            Yii::app()->user->setState('cart', $this->toJson());
        }
    }

    public function removeFromCart($productId)
    {
        if($this->isInCart($productId)){
            foreach($_cartItems as $item){
                if($item->id == $productId) unset($this->_cartItems[array_search($item)]);
            }
            Yii::app()->user->setState('cart', $this->toJson());
        }
    }

    public function isInCart($productId)
    {
        if(isset($productId)){
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
}
?>
