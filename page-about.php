<?php

    get_header();

    while(have_posts()) {
        the_post(); ?>

    <section class="page-banner">
    <div class="container container-narrow">
      <h1><?php the_title(); ?></h1>
      <?php 
      
      if ( has_post_parent() ) {
        $parentId = wp_get_post_parent_id(get_the_ID());
        $parentTitle = get_the_title($parentId);
        $parentLink = get_permalink($parentId); ?> 
        <div class="breadcrumb"> Back to <a href="<?php echo $parentLink ?>"><?php echo $parentTitle; ?></a></p> 
        <?php
      }
      
      ?>
    </div>
    </section>


<!-- Main Content --> 
<section class="container page-section generic-content">
  <?php the_content(); ?>
</section>

<!-- Team Section -->
<section class="team">
        <div class="container">
            <h2>Our Team</h2>

            <?php get_template_part('partials/team-carousel'); ?>

        </div>
    </section>


<?php 
  }
    get_footer();

?>