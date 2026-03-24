<?php
$hero_image_url = !empty($args['image'])
  ? $args['image']
  : get_template_directory_uri() . '/assets/default-hero.jpg';

$hero_text = !empty($args['text'])
  ? $args['text']
  : get_the_title();
?>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
  <div class="overlay">
    <h1 class="center"><?php echo esc_html($hero_text); ?></h1>
  </div>
</section>