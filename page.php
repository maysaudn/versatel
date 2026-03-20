<?php

    get_header();

    while(have_posts()) {
        the_post(); ?>

    <section class="page-banner">
    <div class="container container-narrow">
      <h1><?php the_title(); ?></h1>
      <p>Insert Summary Here</p>
    </div>
    </section>

<div class="container page-section generic-content">
  <?php the_content(); ?>
</div>

<?php 
  }
    get_footer();

?>