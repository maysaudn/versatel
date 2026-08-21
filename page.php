<?php

get_header();

while (have_posts()) {
    the_post();

    get_template_part('template-parts/get-hero-or-banner');
    ?>

    <div class="container page-section generic-content">
        <?php the_content(); ?>
    </div>

    <?php
    if (get_field('cta_enabled')) {
        get_template_part('template-parts/cta');
    }
}

get_footer();
