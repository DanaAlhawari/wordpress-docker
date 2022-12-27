<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 */

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="header">

        <div class="header-navigation-wrapper">
            <?php
            if (has_nav_menu('primary')) {
            ?>
                <nav class="primary-menu-wrapper">
                    <ul class="primary-menu">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(
                                array(
                                    'container'  => '',
                                    'items_wrap' => '%3$s',
                                    'theme_location' => 'primary',
                                )
                            );
                        }
                        ?>

                    </ul>

                </nav><!-- .primary-menu-wrapper -->
            <?php
            }
            ?>
        </div><!-- .header-navigation-wrapper -->
    </header>
    <div id="page" class="site">
        <div id="content" class="site-content">