<?php 

if (!function_exists('acf_add_local_field_group')) {
    return;
}

acf_add_local_field_group([
    'key' => 'group_about_cta',
    'title' => 'CTA Section',
  
    'fields' => [
      [
        'key' => 'field_cta_group',
        'label' => 'CTA',
        'name' => 'cta',
        'type' => 'group',
        'layout' => 'block',
  
        'sub_fields' => [
        
        // CTA HEADING
          [
            'key' => 'field_cta_heading',
            'label' => 'Heading',
            'name' => 'heading',
            'type' => 'text',
            'default_value' => 'Ready to learn more?',
          ],
        
        // CTA TEXT
          [
            'key' => 'field_cta_text',
            'label' => 'Text',
            'name' => 'text',
            'type' => 'textarea',
            'default_value' => 'Reach out today for a free consultation.',
          ],

        // CTA BUTTON TEXT
  
          [
            'key' => 'field_cta_button_text',
            'label' => 'Button Text',
            'name' => 'button_text',
            'type' => 'text',
            'default_value' => 'Contact Us',
          ],
        
        // BUTTON LINK
          [
            'key' => 'field_cta_button_link',
            'label' => 'Button Link',
            'name' => 'button_link',
            'type' => 'url',
          ],
  
        ],
      ],
    ],
  
    'location' => [
      [
        [
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-about.php',
        ],
      ],
    ],
  ]);
?>