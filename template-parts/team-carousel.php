<?php

$args = array(
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order'
);

$team_query = new WP_Query($args);
?>


<section class="team-carousel flex-container container">
  <div class="swiper team-swiper">
    <div class="swiper-wrapper">

      <?php if ($team_query->have_posts()) :
        while ($team_query->have_posts()) : $team_query->the_post(); 

          $title = get_field('job_title');
          $image = get_field('headshot');
          $image_url = esc_url($image['url']);
          $email = get_field('contact_email');
          $bio = wp_strip_all_tags(get_field('full_bio'));
        ?>

        <div class="swiper-slide">
          <div class="card"
            data-name="<?php echo esc_attr(get_the_title()); ?>"
            data-title="<?php echo esc_attr($title); ?>"
            data-bio="<?php echo esc_attr($bio); ?>"
            data-email="<?php echo esc_attr($email); ?>"
            data-image="<?php echo esc_url($image_url); ?>"
          >
            <img class="headshot" src="<?php echo $image_url ?>">
            <h3><?php echo get_the_title(); ?></h3>
            <p class="role"><?php echo $title ?></p>
          </div>
        </div>

        <?php endwhile;
      endif; ?>

    </div>



  </div>

      <!-- Arrows -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
</section>

<?php wp_reset_postdata(); ?>

<div id="team-modal" class="team-modal container">
  <div class="team-modal-content">
    <span class="team-modal-close">&times;</span>

    <img id="modal-image" class="headshot" src="" alt="">
    <div class="modal-text">
    <h2 id="modal-name"></h2>
    <p id="modal-title"></p>
    <a id="modal-email" href=""></a>
    <p id="modal-bio"></p>
    </div>

  </div>
</div>