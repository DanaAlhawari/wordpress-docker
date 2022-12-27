<?php
//   4. Skapa en class som heter cart som kan innehålla klassen Product. 

class DanasCart
{
    public $products;
    public function __construct($products = [])
    {
        $this->products = $products;
    }
    public function sumTotal()
    {

        $totalPrice = 0;
        foreach ($this->products as $product) {
            $product_price = $product->price;
            $totalPrice += $product_price;
        }
        return $totalPrice;
        /*for ($i=0; $i < count($cart); $i++) { 
        $product = $cart[$i];
        $price = $product->price;
        $amount = $product->amount;
        $totalPrice += $amount * $price;*/
    }
    public function cartIsEmpty()
    {
        if (count($this->products) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
