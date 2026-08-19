<?php 


function nmca_get_theme_settings() {
    return [
        'company_email' => [
            'label' => 'Company Email',
            'type'  => 'email',
            'render' => 'email',
            'footer' => true
        ],
        'company_phone' => [
            'label' => 'Company Phone',
            'type' => 'text',
            'render' => 'phone',
            'footer' => true
        ],
        'booking_url' => [
            'label' => 'Consultation Booking Link',
            'type'  => 'url',
            'render' => 'url',
            'footer' => true
        ],
        'portal_url' => [
            'label' => 'Client Portal',
            'type' => 'url',
            'render' => 'url',
            'footer' => true
        ]
    ];
}

function nmca_add_theme_settings_page() {
    add_menu_page(
        'Site Settings',
        'Site Settings',
        'manage_options',
        'nmca-site-settings',
        'nmca_render_settings_page',
        'dashicons-admin-generic',
        60
    );
}

add_action('admin_menu', 'nmca_add_theme_settings_page');

function nmca_register_theme_settings() {
    foreach (nmca_get_theme_settings() as $name => $setting) {
        register_setting(
            'nmca_settings_group',
            $name
        );
    }
}

add_action('admin_init', 'nmca_register_theme_settings');

function nmca_render_settings_page() {

    $settings = nmca_get_theme_settings();

?>

<div class="wrap">
    <h1>Site Settings</h1>
    <form method="post" action="options.php">
        <?php settings_fields('nmca_settings_group'); ?>
        <table class="form-table">
            <?php foreach ($settings as $name => $setting) : ?>
                <tr>
                    <th>
                        <?php echo esc_html($setting['label']); ?>
                    </th>
                    <td>
                        <input
                            type="<?php echo esc_attr($setting['type']); ?>"
                            name="<?php echo esc_attr($name); ?>"
                            value="<?php echo esc_attr(get_option($name)); ?>"
                            class="regular-text">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php

}

// Use this function to create the variables, ie $email = nmca_setting('company_email')
function nmca_setting($key, $default = '')
{
    return get_option($key, $default);
}


// Helper function to render HTML output
function nmca_render_setting($key)
{
    $settings = nmca_get_theme_settings();

    // Make sure the requested setting exists.
    if (!isset($settings[$key])) {
        return;
    }

    // Get the configuration for this setting.
    $setting = $settings[$key];

    // Get the actual value stored in WordPress.
    $value = nmca_setting($key);
    if (empty($value)) {
        return;
    }

    switch ($setting['render']) {
        case 'phone':
            $href = preg_replace('/\D+/', '', $value);
            echo '<a href="tel:' . esc_attr($href) . '">' . esc_html($value) . '</a>';
            break;
        case 'email':
            echo '<a href="mailto:' . esc_attr($value) . '">' . esc_html($value) . '</a>';
            break;
        case 'url':
            echo '<a href="' . esc_url($value) . '">' . esc_html($setting['label']) . '</a>';
            break;
        default:
            echo esc_html($value);
    }
}
?>

