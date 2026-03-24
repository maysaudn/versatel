<?php

$cta_heading = $args['heading'] ?? 'Ready to learn more?';
$cta_text = $args['text'] ?? 'Reach out today for a free consultation';
$cta_button_text = $args['button-text'] ?? 'Contact us';
$cta_button_link = $args['button_link'] ?? get_permalink(get_page_by_path('contact'));

?>

<section class="cta-section">
  <div class="container">
    <h2 class="center"><?php echo esc_html($cta_heading); ?></h2>
    <p class="center"><?php echo esc_html($cta_text); ?></p>

    <a href="<?php echo esc_url($cta_button_link); ?>" class="cta-button">
      <?php echo esc_html($cta_button_text); ?>
    </a>
  </div>
</section>
