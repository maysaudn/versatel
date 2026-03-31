<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php 

$hero_image = get_field('hero_image');

if (!empty($hero_image['url'])) {
  $hero_args = array(
    'image' => $hero_image['url'],
    'title' => get_field('hero_title'),
    'subtitle' => get_field('hero_subtitle')
  );

  get_template_part('template-parts/hero', null, $hero_args); 
} else {
  get_template_part('template-parts/page-banner');
}
?>