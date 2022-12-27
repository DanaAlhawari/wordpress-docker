<?php
/*
Plugin Name: Book Plugin
Description: Det är en plugin för att handla böcker
Author: Dana Alhawari

    1. Skapa en custom post type för våra produkter 
    2. Lägg till custom fields för att ange ett pris 
    3. Starta en session för att hålla reda på vad som finns i kundvagnen. 
    4. Skapa en class som heter cart som kan innehålla klassen Product. 
    5. Lägg till en knapp på våra custom post types som lägger till produkten i kundvagnen. 
    6. Skapa en widget som visar alla varor som finns i varukorgen. Och har en beställningsknapp.
    7. Klicka på beställ, lägg till ordern i databasen.
    8. Visa upp alla ordrar på en adminsida i wp-admin.
    9. Lägg till funktionalitet så att det går att ändra status på ordern!
    10. lägg till funktionalitet för att tömma varukorgen! och för att ta bort ordrar
*/
include "dh_cart.php";
include "dh_product.php";
include "dh_session_manager.php";
include "dh_handle_widget.php";
include "dh_handle_post_type.php";
include "dh_create_db_table.php";
include "admin/dh_register_admin_menu.php";

//Skapa en databastabell och installera lite test data.
register_activation_hook(__FILE__, 'dh_create_custom_db_table'); // denna function körs när aktiverar plugin (kör en gång)
//KOMMENTERA UT DENNA INNAN PRODUKTION!!!!
//register_activation_hook(__FILE__, 'dh_delete_data');
//register_activation_hook(__FILE__, 'dh_install_data');
/*
function print_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'dh_product_orders';
    $orders = $wpdb->get_results("SELECT * FROM $table_name");
    var_dump($orders);
}
add_action('init', 'print_data');
