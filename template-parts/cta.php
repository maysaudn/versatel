<?php

$cta_heading = !empty($args['heading'])
  ? $args['heading']
  : 'Ready to learn more?';

$cta_text = !empty($args['text'])
  ? $args['text']
  : 'Reach out today for a free consultation.';

$cta_button_text = !empty($args['button_text'])
  ? $args['button_text']
  : 'Contact Us';

$cta_button_link = !empty($args['button_link'])
  ? $args['button_link']
  : get_permalink(get_page_by_path('contact'));

?>

<section class="cta-section">
  <div class="container center no-margin">
    <h2 class="center"><?php echo esc_html($cta_heading); ?></h2>
    <p class="center"><?php echo esc_html($cta_text); ?></p>

    <button href="<?php echo esc_url($cta_button_link); ?>" class="cta-button button-gold">
      <?php echo esc_html($cta_button_text); ?>
    </button>
  </div>
</section>
