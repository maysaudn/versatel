<?php

// Create custom field group for CTA component, one per page it may be on
function nmca_get_cta_fields($template = 'page-about.php')
{
  $array = array(
    'key' => 'group_cta_' . $template,
    'title' => 'Call To Action',
    'fields' => array(
      array(
        'key' => 'field_cta_enabled_page-about.php',
        'label' => 'Display CTA',
        'name' => 'cta_enabled',
        'type' => 'true_false',
        'default_value' => 0,
        'ui' => 1,
      ),
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
      )
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page'
        )
      )
    )
  );

  return $array;
}

// Create custom field group for hero section
function nmca_get_hero_fields()
{
  $array = array(
    'key' => 'group_hero',
    'title' => 'Hero',
    'fields' => array(
      array(
        'key' => 'field_hero_image',
        'label' => 'Hero Image',
        'name' => 'hero_image',
        'type' => 'image',
        'return_format' => 'array',
        'instructions' => 'Upload an image to trigger a "Hero" header, with a large image and customizable text. If you don\'t upload an image, then the default Header banner will appear.'
      ),
      // Hero title
      array(
        'key' => 'field_hero_title',
        'label' => 'Hero Title',
        'name' => 'hero_title',
        'type' => 'text',
        'instructions' => 'This can be the title of your page or anything you want.'
      ),
      // Hero Subtitle
      array(
        'key' => 'field_hero_subtitle',
        'label' => 'Hero Subtitle',
        'name' => 'hero_subtitle',
        'type' => 'textarea',
      ),
      // Hero button
      array(
        'key' => 'field_hero_button',
        'label' => 'Hero Button',
        'name' => 'hero_button',
        'type' => 'text',
      ),
      // Hero button URL
      array(
        'key' => 'field_hero_button_url',
        'label' => 'Hero Button URL',
        'name' => 'hero_button_url',
        'type' => 'url',
        'default_value' => nmca_setting('booking_url'),
        'instructions' => 'URL to open when the Hero Button is clicked. Defaults to the Booking URL from Site Settings.'
      ),
      // Hero button caption
      array(
        'key' => 'field_hero_button_caption',
        'label' => 'Hero Button Caption',
        'name' => 'hero_button_caption',
        'type' => 'text'
      )
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page'
        ),
      )
    )
  );
  return $array;
}

function nmca_get_site_settings_fields()
{
  return array(
    'key' => 'group_site_settings',
    'title' => 'Site Settings',
    'fields' => array(
      array(
        'key' => 'field_company_phone',
        'label' => 'Company Phone',
        'name' => 'company_phone',
        'type' => 'text',
      ),
      array(
        'key' => 'field_company_email',
        'label' => 'Company Email',
        'name' => 'company_email',
        'type' => 'email',
      ),
      array(
        'key' => 'field_company_address',
        'label' => 'Company Address',
        'name' => 'company_address',
        'type' => 'address'
      ),
      array(
        'key' => 'field_booking_url',
        'label' => 'Booking URL',
        'name' => 'booking_url',
        'type' => 'url',
      ),
      array(
        'key' => 'field_portal_url',
        'label' => 'Portal URL',
        'name' => 'portal_url',
        'type' => 'url',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'site-settings',
        ),
      ),
    ),
  );

}

function nmca_add_acf_field_groups()
{
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

  // Add site settings


  acf_add_local_field_group(
    nmca_get_site_settings_fields()
  );
}

add_action('acf/init', 'nmca_add_acf_field_groups');

?>
