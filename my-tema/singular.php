<?php
get_header();



if (have_posts()) : ?>
    <div>
        <h1>Bokhandel</h1>
    </div>
    <div class="container">
        <?php
        while (have_posts()) : the_post();
        ?>
            <div>
                <h2><?php the_title(); ?></h2>

                <?php the_content(); ?>


            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e('Sorry, no post matched your criteria'); //-e och parentesen behövs egentligen inte
        ?></p>
<?php endif;

get_footer();
?>