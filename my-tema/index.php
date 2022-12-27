<?php
get_header();

$args = array('post_type' => 'products', 'post_per_page' => 10);
$the_query = new WP_Query($args);


if ($the_query->have_posts()) : ?>
    <div>
        <h1>Bokhandel</h1>
    </div>
    <div class="employee-list">
        <ul>
            <?php
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <li>
                    <article>
                        <h2><a class="title" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                        <?php the_post_thumbnail(); ?>
                        <?php the_content(); ?>


                    </article>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>
<?php else : ?>
    <p><?php _e('Sorry, no post matched your criteria'); //-e och parentesen behövs egentligen inte
        ?></p>
<?php endif;
dynamic_sidebar('kundvagn_sidebar');
get_footer();
?>