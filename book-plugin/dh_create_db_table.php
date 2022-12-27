<?php

//Skapa custom table i databasen som heter dh_product_orders.

//global $jal_db_version;
//$jal_db_version = '1.0';

function dh_create_custom_db_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'dh_product_orders';

    $charset_collate = $wpdb->get_charset_collate();

    //variabler vi vill spara i databasen

    $sql = "CREATE TABLE $table_name (
		order_id INTEGER NOT NULL AUTO_INCREMENT,
		time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		order_status INTEGER NOT NULL,
		user INTEGER NOT NULL,
		PRIMARY KEY  (order_id)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    //add_option( 'jal_db_version', $jal_db_version );
}


function dh_delete_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'dh_product_orders';
    $wpdb->query(
        "DELETE FROM $table_name",
    );
}
function dh_install_data()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'dh_product_orders';

    $order_status = 0;
    $user = "guest";

    $wpdb->insert(
        $table_name,
        array(
            'order_status' => $order_status,
            'user' => $user,

        )
    );
}
