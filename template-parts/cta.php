<?php
$page_id = !empty($args['post_id']) ? absint($args['post_id']) : get_queried_object_id();
$cta_heading = get_field('cta_heading', $page_id) ?: 'Ready to learn more?';
$cta_text = get_field('cta_text', $page_id) ?: 'Reach out today for a free consultation!';
$cta_button = get_field('cta_button', $page_id) ?: 'Contact Us';
$cta_link = get_field('cta_link', $page_id) ?: get_permalink(get_page_by_path('contact'));
?>

<section class="cta-section">
  <div class="container center no-margin">
    <h2 class="center"><?php echo esc_html($cta_heading); ?></h2>
    <p class="center"><?php echo esc_html($cta_text); ?></p>

    <a href="<?php echo esc_url($cta_link); ?>" class="button button-gold">
      <?php echo esc_html($cta_button); ?>
    </a>
  </div>
</section>
