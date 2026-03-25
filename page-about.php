<?php
/*
Template Name: About Page
*/
get_header(); ?>

<?php $team_intro = get_field('team_intro');?>

<!-- PAGE BANNER (DO NOT DISPLAY, SINCE THERE IS ALREADY A HERO-->
<?php /* get_template_part( 'template-parts/page-banner' ); */ ?>


<!-- HERO -->
<?php 
$hero_args = array(
  'image' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
  'text' => get_field('hero_text')
);
?>

<?php get_template_part('template-parts/hero', null, $hero_args); ?>

<!-- ABOUT CONTENT -->
<section class="about-content container center">
  <?php the_content(); ?>
</section>

<!-- TEAM SECTION -->
<section class="team-section container center">
  <h2>Meet Our Team</h2>

  <?php if ($team_intro): ?>
    <div class="team-intro">
      <?php echo wp_kses_post($team_intro); ?>
    </div>
  <?php endif; ?>

  <?php get_template_part('template-parts/team-carousel'); ?>
</section>

<!-- CTA -->
<?php get_template_part(
  'template-parts/cta',
  null,
  [
    'heading' => get_field('cta_heading'),
    'text' => get_field('cta_text'),
    'button_text' => get_field('cta_button_text'),
    'button_link' => get_field('cta_button_link'),
  ]
); ?>

<!-- FOOTER -->
<?php get_footer(); ?>