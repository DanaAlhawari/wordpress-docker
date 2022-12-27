<?php
// 1. Skapa en custom post type för våra produkter
function dh_create_post_type()
{
    register_post_type(
        "products",
        array(
            'labels'      => array(
                'name'          => 'Products',
                'singular_name' => 'Product'
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            // 2. Lägg till custom fields för att ange ett pris
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}
add_action('init', 'dh_create_post_type');

// 5. Lägg till en knapp på våra custom post types som lägger till produkten i kundvagnen. 

function add_button_to_post($content)
{
    if (in_array(get_post()->post_type, ['products'])) {
        $price = get_post_meta(get_the_ID(), 'price_of_product')[0]; //behöver förbättras, hämtar ut custom field ev lägg till en kontroll om man ex inte lagt till pris
        $title = get_the_title();
        $form = '<form action="" method ="post">
        <input name="price" value="' . $price . '" type="hidden">
        <input name="title" value="' . $title . '" type="hidden">
        <input value="Lägg i varukorgen" name="submit" type="submit"/>
        </form>';
        return $content . $form;
    } else {
        return $content;
    }
}
add_filter('the_content', 'add_button_to_post');
/*
if (isset($_POST['submit'])) {
    $price = 199;
    $title = "bibelen";
    $product = new DanasProduct($price, $title);
}*/

if (isset($_POST['submit'])) {
    if (isset($_POST['price']) && isset($_POST['title'])) { //finns det ett värde i pris och titel
        $price = $_POST['price'];
        $title = $_POST['title'];
        $cart = $_SESSION['cart'];
        $product = new DanasProduct($price, $title);
        array_push($cart->products, $product);
        $_SESSION['cart'] = $cart;
        var_dump($cart); //kan vara bra att testa med, kundvagnen skrivs ut på sidan
    }
}
