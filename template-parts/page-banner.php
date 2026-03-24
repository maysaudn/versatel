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
