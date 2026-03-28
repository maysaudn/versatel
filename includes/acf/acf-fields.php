<?php 

// Create custom field group for CTA component, one per page it may be on
function nmca_get_cta_fields ($template = 'page-about.php') {
  $array = array(
      'key' => 'group_cta_' . $template,
      'title' => 'Call To Action',
      'fields' => array(
          // CTA HEADING
          array(
              'key' => 'field_cta_heading_' . $template,
              'label' => 'CTA Heading',
              'name' => 'cta_heading',
              'type' => 'text',
              'default_value' => 'Ready to learn more?'
          ),

          // CTA TEXT
          array(
              'key' => 'field_cta_text_' . $template,
              'label' => 'CTA Text',
              'name' => 'cta_text',
              'type' => 'text',
              'default_value' => 'Reach out today for a free consultation!'
          ),

          // CTA BUTTON
          array(
              'key' => 'field_cta_btn_' . $template,
              'label' => 'CTA Button',
              'name' => 'cta_button',
              'type' => 'text',
              'default_value' => 'Contact Us'
          ),

          // CTA LINK
          array(
              'key' => 'field_cta_link_' . $template,
              'label' => 'CTA Link',
              'name' => 'cta_link',
              'type' => 'url',
              'default_value' => get_permalink(get_page_by_path('contact'))
          )),
    'location' => array(
      'param' => 'page_template',
      'operator' => '==',
      'value' => $template,
    )
  );
  
  return $array;
}

// Create custom field group for hero section
function nmca_get_hero_fields () {
  $array = array(
    'key' => 'group_hero',
    'title' => 'hero',
    'fields' => array (
      array (
      'key' => 'field_hero_image',
      'label' => 'Hero Image',
      'name' => 'hero_image',
      'type' => 'image',
      'return_format' => 'array'
      ),
      // Hero title
      array (
        'key' => 'field_hero_title',
        'label' => 'Hero Title',
        'name' => 'hero_title',
        'type' => 'text'
      ),
      // Hero Subtitle
      array (
        'key' => 'field_hero_subtitle',
        'label' => 'Hero Subtitle',
        'name' => 'hero_subtitle',
        'type' => 'text'
      )
    ),
    'location' => array (
      'param' => 'post_type',
      'operator' => '!=',
      'value' => 'attachment'
    )
  );
  return $array;
}

function nmca_add_acf_field_groups () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  // Add CTA fields
  acf_add_local_field_group(
    nmca_get_cta_fields('page-about.php')
  );

  // Add Hero Fields
  acf_add_local_field_group(
    nmca_get_hero_fields()
  );
}

add_action('acf/init', 'nmca_add_acf_field_groups');

?>