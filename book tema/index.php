<?php
get_header();

$args = array('post_type' => 'products', 'post_per_page' => 10);
$the_query = new WP_Query($args);


if ($the_query->have_posts()) : ?>

    <div class="container">

        <?php
        while ($the_query->have_posts()) : $the_query->the_post();
        ?>
            <div>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="400" height="400" alt=" bild" />
                <div>
                    <h2><a class="title" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                    <p><?php the_content(); ?>
                        <?php get_post_meta($post->ID, 'price', true); ?>
                    </p>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>

    </div>
<?php else : ?>
    <p><?php _e('Sorry, no post matched your criteria'); //-e och parentesen behövs egentligen inte
        ?></p>
<?php endif;
dynamic_sidebar('kundvagn_sidebar');

get_footer();
?>