<?php
$page_id = !empty($args['post_id']) ? absint($args['post_id']) : get_queried_object_id();
$contact_page = get_page_by_path('contact');
$fallback_link = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
$default_heading = nmca_setting('default_cta_heading') ?: 'Ready to learn more?';
$default_text = nmca_setting('default_cta_text') ?: 'Reach out today for a free consultation!';
$default_button = nmca_setting('default_cta_button') ?: 'Contact Us';
$default_link = nmca_setting('default_cta_link') ?: $fallback_link;

$cta_heading = get_field('cta_heading', $page_id)
  ?: $default_heading;
$cta_text = get_field('cta_text', $page_id)
  ?: $default_text;
$cta_button = get_field('cta_button', $page_id)
  ?: $default_button;
$cta_link = get_field('cta_link', $page_id)
  ?: $default_link;
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
