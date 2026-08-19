<?php

$hero_image_url = $args['image'] ?? '';
$hero_text = $args['title'] ?? get_the_title();
$hero_subtitle = $args['subtitle'] ?? '';
$hero_button = $args['button'] ?? '';
$hero_button_caption = $args['button_caption'] ?? '';

?>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <!-- Title -->
    <h1 class="center"><?php echo esc_html($hero_text); ?></h1>

    <!-- Subtitle -->
    <?php 
    if (!empty($hero_subtitle)) {
      ?><p class="center"><?php echo esc_html($hero_subtitle)?></p><?php
    };
    
    ?>

    <!-- Button Div -->
    <?php 
    if (!empty($hero_button)) {
      ?><button><?php echo esc_html($hero_button)?></button><?php
      if (!empty($hero_button_caption)) {
        ?><div class="center caption"><em><?php echo esc_html($hero_button_caption) ?></em></div> <?php
      }
    };

    ?>
    
  </div>
</section>