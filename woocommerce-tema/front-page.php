<?php

/**
 * Template Name: Front Page
 */
?>
<?php
get_header(); ?>
<section class="main-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php the_content();
            ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Det finns inga poster.</p>
    <?php endif; ?>
</section>
<?php get_footer();
?>