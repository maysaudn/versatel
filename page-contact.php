<?php get_header() ?>

<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php get_template_part('template-parts/get-hero-or-banner'); ?>

<!-- THE CONTENT -->
<section class="container center" id="contact-container">
    <?php the_content(); ?>
</section>


<!-- CONTACT CARD -->

<div class="contact-card">
  <span><i class="fa fa-phone"></i> ###-###-####</span>
  <span><i class="fa fa-envelope"></i> info@versatelsolutions.com</span>
  <span><i class="fa fa-clock-o"></i> open during regular business hours</span>
</div>

<!-- FOOTER -->
<?php get_footer(); ?>