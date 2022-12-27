<?php get_header(); ?>
<section class="woocommerce-main">
    <div <?php echo post_class(); ?>>
        <?php echo get_the_post_thumbnail(); ?>

        <h1><?php the_title(); ?><a href="<?php echo the_permalink(); ?>"></a></h1>

        <?php the_content(); ?>

    </div>
</section>
<?php get_footer(); ?>