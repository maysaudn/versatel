<?php
/*
Template Name: About Page
*/
get_header(); ?>

<?php $team_intro = get_field('team_intro');?>

<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php 

if (!empty(get_field('hero_image')['url'])) {
  $hero_args = array(
    'image' => get_field('hero_image')['url'],
    'title' => get_field('hero_title'),
    'subtitle' => get_field('hero_subtitle')
  );

  get_template_part('template-parts/hero', null, $hero_args); 
} else {
  get_template_part('template-parts/page-banner');
}
?>



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

<?php 

$cta = get_field('cta');

get_template_part('template-parts/cta', null, [
  'heading' => $cta['cta_heading'] ?? '',
  'text' => $cta['cta_text'] ?? '',
  'button' => $cta['cta_button'] ?? '',
  'link' => $cta['cta_link'] ?? '',
]);

?>

<!-- FOOTER -->
<?php get_footer(); ?>