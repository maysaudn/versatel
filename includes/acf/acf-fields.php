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
      array(
        'key' => 'field_cta_customized_' . $template,
        'label' => 'Customize CTA for this page?',
        'name' => 'cta_customized',
        'type' => 'true_false',
        'instructions' => 'Enable this option to replace the Site Settings defaults with page-specific CTA content.',
        'default_value' => 0,
        'ui' => 1,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_cta_enabled_page-about.php',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // CTA HEADING
      array(
        'key' => 'field_cta_heading_' . $template,
        'label' => 'CTA Heading',
        'name' => 'cta_heading',
        'type' => 'text',
        'instructions' => 'Leave blank to omit the heading from this page\'s CTA.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_cta_enabled_page-about.php',
              'operator' => '==',
              'value' => '1',
            ),
            array(
              'field' => 'field_cta_customized_' . $template,
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),

      // CTA TEXT
      array(
        'key' => 'field_cta_text_' . $template,
        'label' => 'CTA Text',
        'name' => 'cta_text',
        'type' => 'text',
        'instructions' => 'Leave blank to omit the supporting text from this page\'s CTA.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_cta_enabled_page-about.php',
              'operator' => '==',
              'value' => '1',
            ),
            array(
              'field' => 'field_cta_customized_' . $template,
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),

      // CTA BUTTON
      array(
        'key' => 'field_cta_btn_' . $template,
        'label' => 'CTA Button',
        'name' => 'cta_button',
        'type' => 'text',
        'instructions' => 'Leave blank to omit the button from this page\'s CTA.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_cta_enabled_page-about.php',
              'operator' => '==',
              'value' => '1',
            ),
            array(
              'field' => 'field_cta_customized_' . $template,
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),

      // CTA LINK
      array(
        'key' => 'field_cta_link_' . $template,
        'label' => 'CTA Link',
        'name' => 'cta_link',
        'type' => 'url',
        'instructions' => 'Required for the custom CTA button to appear.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_cta_enabled_page-about.php',
              'operator' => '==',
              'value' => '1',
            ),
            array(
              'field' => 'field_cta_customized_' . $template,
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
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
        'key' => 'field_hero_enabled',
        'label' => 'Display Hero',
        'name' => 'hero_enabled',
        'type' => 'true_false',
        'instructions' => 'Enable this option to display the full Hero. When disabled, the standard page banner will appear.',
        'default_value' => 0,
        'ui' => 1,
      ),
      array(
        'key' => 'field_hero_image',
        'label' => 'Hero Image',
        'name' => 'hero_image',
        'type' => 'image',
        'return_format' => 'array',
        'instructions' => 'Upload the background image for the Hero.',
        'required' => 1,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // Hero title
      array(
        'key' => 'field_hero_title',
        'label' => 'Hero Title',
        'name' => 'hero_title',
        'type' => 'text',
        'instructions' => 'This can be the title of your page or anything you want.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // Hero Subtitle
      array(
        'key' => 'field_hero_subtitle',
        'label' => 'Hero Subtitle',
        'name' => 'hero_subtitle',
        'type' => 'textarea',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // Hero button
      array(
        'key' => 'field_hero_button',
        'label' => 'Hero Button',
        'name' => 'hero_button',
        'type' => 'text',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // Hero button URL
      array(
        'key' => 'field_hero_button_url',
        'label' => 'Hero Button URL',
        'name' => 'hero_button_url',
        'type' => 'url',
        'default_value' => nmca_setting('booking_url'),
        'instructions' => 'URL to open when the Hero Button is clicked. Defaults to the Booking URL from Site Settings.',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
      ),
      // Hero button caption
      array(
        'key' => 'field_hero_button_caption',
        'label' => 'Hero Button Caption',
        'name' => 'hero_button_caption',
        'type' => 'text',
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_hero_enabled',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
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

function nmca_get_resources_page_id()
{
  $resources_pages = get_posts(
    array(
      'post_type' => 'page',
      'post_status' => array('publish', 'draft', 'private'),
      'posts_per_page' => 1,
      'fields' => 'ids',
      'meta_key' => '_wp_page_template',
      'meta_value' => 'page-resources.php',
      'no_found_rows' => true,
    )
  );

  if ($resources_pages) {
    return (int) $resources_pages[0];
  }

  $resources_page = get_page_by_path('resources');

  return $resources_page ? (int) $resources_page->ID : 0;
}

function nmca_get_resource_collection_fields($resources_page_id)
{
  $location_rules = array(
    array(
      'param' => 'page_parent',
      'operator' => '==',
      'value' => (string) $resources_page_id,
    ),
  );

  $insights_page_id = (int) get_option('page_for_posts');

  if ($insights_page_id) {
    $location_rules[] = array(
      'param' => 'page',
      'operator' => '!=',
      'value' => (string) $insights_page_id,
    );
  }

  return array(
    'key' => 'group_resource_collection',
    'title' => 'Resource Collection',
    'fields' => array(
      array(
        'key' => 'field_resource_collection_post_type',
        'label' => 'Collection Source',
        'name' => 'resource_collection_post_type',
        'type' => 'select',
        'instructions' => 'Select a collection to display its three newest published items on the Resources page. Leave unselected for a regular resource page.',
        'choices' => array(),
        'allow_null' => 1,
        'ui' => 1,
        'return_format' => 'value',
      ),
    ),
    'location' => array($location_rules),
  );
}

function nmca_load_resource_collection_choices($field)
{
  $field['choices'] = array();
  $post_types = get_post_types(
    array(
      'public' => true,
      'show_ui' => true,
    ),
    'objects'
  );

  foreach ($post_types as $post_type) {
    if (in_array($post_type->name, array('post', 'page', 'attachment'), true)) {
      continue;
    }

    $field['choices'][$post_type->name] = $post_type->labels->name;
  }

  return $field;
}

add_filter(
  'acf/load_field/key=field_resource_collection_post_type',
  'nmca_load_resource_collection_choices'
);

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

  $resources_page_id = nmca_get_resources_page_id();

  if ($resources_page_id) {
    acf_add_local_field_group(
      nmca_get_resource_collection_fields($resources_page_id)
    );
  }
}

add_action('acf/init', 'nmca_add_acf_field_groups');

?>
