<?php

/*
   Plugin Name: WooCommerce plugin
   Description: En plugin för att förbättra woocommerce-upplevelsen på min sida
   Author: Dana Alhawari
*/
// Test to see if WooCommerce is active (including network activated).
$plugin_path = trailingslashit(WP_PLUGIN_DIR) . 'woocommerce/woocommerce.php';

if (
    in_array($plugin_path, wp_get_active_and_valid_plugins())
    //|| in_array($plugin_path, wp_get_active_network_plugins())
) {
    // Custom code here. WooCommerce is active, however it has not 
    // necessarily initialized (when that is important, consider
    // using the `woocommerce_init` action).
    /* function testa_om_woocommerce_funkar($title)
    {
        global $post;
        if ($post && $post->post_type == 'product') {
            return  strtoupper($title) . ' - Till salu';
        }
        return $title;
    }
    add_action('the_title', 'testa_om_woocommerce_funkar');
    */
    function woocommerce_product_custom_fields()
    {

        $args = array(
            'id' => 'författare',
            'label' => 'författare'
        );
        woocommerce_wp_text_input($args);
        $args = array(
            'id' => 'språk',
            'label' => 'språk'
        );
        woocommerce_wp_text_input($args);
        $args = array(
            'id' => 'Utgivningsdatum',
            'label' => 'Utgivningsdatum'
        );
        woocommerce_wp_text_input($args);
    }
    add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields', 10);

    function save_woocommerce_product_custom_fields($post_id)
    {

        $product = wc_get_product($post_id);
        $custom_fields_författare = isset($_POST['författare']) ? $_POST['författare'] : '';
        $product->update_meta_data('författare', $custom_fields_författare);
        $custom_fields_språk = isset($_POST['språk']) ? $_POST['språk'] : '';
        $product->update_meta_data('språk', $custom_fields_språk);
        $custom_fields_Utgivningsdatum = isset($_POST['Utgivningsdatum']) ? $_POST['Utgivningsdatum'] : '';
        $product->update_meta_data('Utgivningsdatum', $custom_fields_Utgivningsdatum);
        $product->save();
    }
    add_action('woocommerce_process_product_meta', 'save_woocommerce_product_custom_fields', 10);

    function woocommerce_custom_fields_display()
    {
        global $post;
        $product = wc_get_product($post->ID);
        $custom_fields_författare = $product->get_meta('författare');
        $custom_fields_språk = $product->get_meta('språk');
        $custom_fields_Utgivningsdatum = $product->get_meta('Utgivningsdatum');


        if (!empty($custom_fields_författare) & !empty($custom_fields_språk) & !empty($custom_fields_Utgivningsdatum)) {
            echo '<p> Författare: ' . $custom_fields_författare . ' </p>',
            '<p> Språk: ' . $custom_fields_språk . ' </p>',
            '<p> Utgivningsdatum: ' . $custom_fields_Utgivningsdatum . ' </p>';
        }
    }
    add_action('woocommerce_before_add_to_cart_button', 'woocommerce_custom_fields_display');

    // Hook in
    add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

    // Our hooked in function - $fields is passed via the filter!
    function custom_override_checkout_fields($fields)
    {
        unset($fields['order']['order_comments']);
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_address_2']);

        return $fields;
    }
}
