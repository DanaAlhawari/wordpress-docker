<?php

// adderar funktioner för att hämta stylesheets

function load_stylesheets()
{
    wp_enqueue_style('style', get_stylesheet_uri(), array());
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// adderar en menu
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary' => __('Primary Menu')
        )
    );
}
add_action('init', 'register_my_menus');

//Aktivera woocommerce i befintliga tema 
function mythema_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mythema_add_woocommerce_support');

// ta bort breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//ta bort sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

//add_filter('woocommerce_enqueue_styles', '__return_empty_array');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//shop page tar den här class
function my_theme_wrapper_start()
{
    echo '<section class="woocommerce-main">';
}
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 20);


function my_theme_wrapper_end()
{
    echo '</section>';
}
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 20);


add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
