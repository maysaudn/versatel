<?php get_header(); ?>

<?php while(have_posts()) {
    the_post();
    get_template_part('template-parts/get-hero-or-banner'); ?>
    <div class="container">
        <?php the_content(); ?>
    </div> <?php
 } ?>

<?php get_footer(); ?>