<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php 

$hero_image = get_field('hero_image');
$title = !empty($args['title']) ? $args['title'] : '';

if (!empty($hero_image['url'])) {
  $hero_args = array(
    'image' => $hero_image['url'],
    'title' => get_field('hero_title'),
    'subtitle' => get_field('hero_subtitle'),
    'button' => get_field('hero_button'),
    'button_url' => get_field('hero_button_url'),
    'button_caption' => get_field('hero_button_caption')
  );

  get_template_part('template-parts/hero', null, $hero_args); 
} else {
  $page_banner_args = array(
    'title' => $title
  );
  get_template_part('template-parts/page-banner', null, $page_banner_args);
}
?>
