<?php
//    3. Starta en session för att hålla reda på vad som finns i kundvagnen. 

session_start();
//unset($_SESSION['cart']);
$cart = $_SESSION['cart'];
if (!isset($cart)) {
    $new_cart = new DanasCart();
    $_SESSION['cart'] = $new_cart;
}

//en del överflödig kod
/*$cart = $_SESSION['cart'];
if (isset($cart)) {
   var_dump("Cart isset");
   var_dump($_SESSION['cart']->products);
} else {
    var_dump("Cart is not set");
    $new_cart = new DanasCart();
    //$product = new Product(199, "Bibeln");
    //array_push($cart->products, $product)
    $SESSION['cart'] = $new_cart;
}
*/