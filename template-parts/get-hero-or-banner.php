<!-- HERO OR PAGE BANNER IF NO HERO IMAGE UPLOADED -->
<?php

$page_id = !empty($args['post_id']) ? absint($args['post_id']) : get_queried_object_id();
$hero_enabled = (bool) get_field('hero_enabled', $page_id);
$hero_image = get_field('hero_image', $page_id);
$title = !empty($args['title']) ? $args['title'] : get_the_title($page_id);

if ($hero_enabled && !empty($hero_image['url'])) {
  $hero_args = array(
    'image' => $hero_image['url'],
    'title' => get_field('hero_title', $page_id),
    'subtitle' => get_field('hero_subtitle', $page_id),
    'button' => get_field('hero_button', $page_id),
    'button_url' => get_field('hero_button_url', $page_id),
    'button_caption' => get_field('hero_button_caption', $page_id)
  );

  get_template_part('template-parts/hero', null, $hero_args); 
} else {
  $page_banner_args = array(
    'title' => $title
  );
  get_template_part('template-parts/page-banner', null, $page_banner_args);
}
?>
