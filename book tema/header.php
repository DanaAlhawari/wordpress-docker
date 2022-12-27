<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <div id="logo">
            <a class="logo" href="<?php echo home_url(); ?>">Bokhandel</a>
        </div>
    </header>