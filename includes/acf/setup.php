<?php 

// Checks if ACF plugin is installed
if ( ! function_exists( 'is_plugin_active' ) ) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Check if ACF PRO is active
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    // Abort all bundling, ACF PRO plugin takes priority
    return;
}

// Check if another plugin or theme has bundled ACF
if ( defined( 'MY_ACF_PATH' ) ) {
    return;
}
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Check if the ACF free plugin is activated
if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    // Free plugin activated
    // Free plugin activated, show notice
    add_action( 'admin_notices', function () {
        ?>
        <div class="updated" style="border-left: 4px solid #ffba00;">
            <p>The ACF plugin cannot be activated at the same time as Third-Party Product and has been deactivated. Please keep ACF installed to allow you to use ACF functionality.</p>
        </div>
        <?php
    }, 99 );

    // Disable ACF free plugin
    deactivate_plugins( 'advanced-custom-fields/acf.php' );
}

// Check if ACF free is installed
if ( ! file_exists( WP_PLUGIN_DIR . '/advanced-custom-fields/acf.php' ) ) {
    // Free plugin not installed
    // Hide the ACF admin menu item.
    add_filter( 'acf/settings/show_admin', '__return_false' );
    // Hide the ACF Updates menu
    add_filter( 'acf/settings/show_updates', '__return_false', 100 );
}
?>