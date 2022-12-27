<?php
// 6. Skapa en widget som visar alla varor som finns i varukorgen. Och har en beställningsknapp.

// Creating the widget

class dh_cart_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'dh_cart_widget',

            // Widget name will appear in UI
            __('Danas kundvagn widget', 'dh_cart_widget_domain'),
            // Widget description
            array('description' => "En widget som hör till Dana plugin som visar den aktuella kundvagnen.")

        );
    }

    // Creating widget front-end


    public function widget($args, $instance)
    {
        //$title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        $cart = $_SESSION['cart'];
        // This is where you run the code and display the output
        // echo __('Hello, World!', 'dh_cart_widget_domain');
        foreach ($cart->products as $product) {
            /*if ($product->quantity > 1) {
                echo $product->title;
                echo $product->price;
            }*/
            # code...

        }
        echo "Den totala summan är: " . $cart->sumTotal() . " kr";
        echo "Antal böcker i kundvagnen är: " . count($cart->products);
        $form = '<form action="" method="post">
                <input name="place_order" type="submit" value="Lägg order"/> 
				<input name="empty_cart" type="submit" value="Töm varukorgen"/>
				</form>';
        echo $form;

        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
?>
        <p>
            <label><?php echo 'Det här är en widget till Dana kundvagns plugin. När du lagt till den kommer din kundvagn att synas här.'; ?></label>
        </p>
<?php
    }

    /*
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
*/
    // Class dh_cart_widget ends here
}

// Register and load the widget
function dh_load_widget()
{
    register_sidebar(array(
        'name'          => 'Danas kundvagns sidebar',
        'id'            => 'kundvagn_sidebar',
        'before_widget' => '<div class="kundvagn">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));
    register_widget('dh_cart_widget');
}
add_action('widgets_init', 'dh_load_widget');


if (isset($_POST["empty_cart"])) {
    $cart = $_SESSION['cart'];
    $cart->products = [];
}

if (isset($_POST["place_order"])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dh_product_orders';

    $cart = $_SESSION['cart'];
    if (!$cart->cartIsEmpty()) {
        //recieved = 0, cancelled = 1, shipped = 2, delivered = 3
        $order_status = 0;
        $user = "guest";

        $wpdb->insert(
            $table_name,
            array(
                'order_status' => $order_status,
                'user' => $user,
            )
        );
        $cart->products = [];
    }
    ////gör att det syns på frontend
    //$orders = $wpdb->get_results("SELECT * FROM $table_name");
    //var_dump($cart);
}
