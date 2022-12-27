<?php
include "dh_admin_option_page.php";
function dh_add_admin_menu()
{
    add_menu_page("Danas ordersystem", "Danas Ordrar", "manage_options", "dh_product_orders", "dh_render_option_page", "", null);
}
add_action('admin_menu', 'dh_add_admin_menu');
