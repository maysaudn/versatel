<?php
$cta_heading = get_field('cta_heading') ?: 'Ready to learn more?';
$cta_text = get_field('cta_text') ?: 'Reach out today for a free consultation!';
$cta_button = get_field('cta_button') ?: 'Contact Us';
$cta_link = get_field('cta_link') ?: get_permalink(get_page_by_path('contact'));
?>

<section class="cta-section">
  <div class="container center no-margin">
    <h2 class="center"><?php echo esc_html($cta_heading); ?></h2>
    <p class="center"><?php echo esc_html($cta_text); ?></p>

    <button onclick="window.location.href='<?php echo $cta_link ?>';" class="cta-button button-gold">
      <?php echo esc_html($cta_button); ?>
    </button>
  </div>
</section>
