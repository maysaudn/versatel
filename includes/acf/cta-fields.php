<?php

function nmca_get_cta_fields ($template = 'page-about.php') {
    $array = array(
        'key' => 'group_cta_' . $template,
        'title' => 'CTA Section',
        'fields' => array(
            // CTA HEADING
            array(
                'key' => 'group_cta_heading_' . $template,
                'label' => 'CTA Heading',
                'name' => 'cta_heading',
                'type' => 'text',
                'default_value' => 'Ready to learn more?'
            ),

            // CTA TEXT
            array(
                'key' => 'group_cta_text_' . $template,
                'label' => 'CTA Text',
                'name' => 'cta_text',
                'type' => 'text',
                'default_value' => 'Reach out today for a free consultation!'
            ),

            // CTA BUTTON
            array(
                'key' => 'group_cta_btn_' . $template,
                'label' => 'CTA Button',
                'name' => 'cta_button',
                'type' => 'text',
                'default_value' => 'Contact Us'
            ),

            // CTA LINK
            array(
                'key' => 'group_cta_link_' . $template,
                'label' => 'CTA Link',
                'name' => 'cta_link',
                'type' => 'url',
                'default_value' => get_permalink(get_page_by_path('contact'))
            )),
            'location' => array(

                // Group 1: All non-page post types (except excluded ones)
                array(
                  array(
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'attachment'
                  ),
                  array(
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'team_member'
                  ),
                  array(
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'page'
                  )
                ),
              
                // Group 2: Only pages using page-about.php template
                array(
                  array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                  ),
                  array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php'
                  )
                )
              
              )
    );
    
    return $array;
}

?>