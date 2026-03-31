<?php 

if (function_exists('acf_add_options_page')) {
    acf_add_options_page( array(
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'menu_slug' => 'site-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function nmca_get_global_fields() {
    $array = array(
        'key' => 'group_global_settings',
        'title' => 'Global Settings',
        'fields' => array(
            // Phone #
            array(
                'key' => 'field_phone',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text'
            ),

            // Email
            array(
                'key' => 'field_email',
                'label' => 'Email Address',
                'name' => 'email_address',
                'type' => 'email'
            )
        ),
        'location' => array(
            'param' => 'options_page',
            'operation' => '==',
            'value' => 'site-settings'
        )
    );
    return $array;
}

add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) return;
  
    acf_add_local_field_group(nmca_get_global_fields());
  });

?>