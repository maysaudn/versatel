<?php
$hero_image_url = !empty($args['image'])
  ? $args['image']
  : get_template_directory_uri() . '/images/default-hero.jpg';

$hero_text = !empty($args['title'])
  ? $args['title']
  : get_the_title();

$hero_subtitle = $args['subtitle']
?>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="center"><?php echo esc_html($hero_text); ?></h1>
    <?php 
    
    if (!empty($hero_subtitle)) {
      ?><p class="center"><?php echo esc_html($hero_subtitle)?></p><?php
    }
    
    ?>
  </div>
</section>