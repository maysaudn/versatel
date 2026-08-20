<!DOCTYPE html>
<html lang="<?php echo get_bloginfo('language'); ?>">
    <head>
        <?php wp_head(); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>    
    <body>
        <header class="navbar">
            <div class="logo" id="navbar-logo">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_theme_file_uri('images/favicon.png') ?>" alt="VersaTel Solutions logo">
                    <div class="logo-name" id="logo-text">
                        <h2>VersaTel Solutions</a></h2>
                    </div>

            </div>

            <nav aria-label="<?php esc_attr_e('Primary Navigation', 'versatel'); ?>">
                <div class="nav-right">
                    <a
                        href="<?php echo esc_url(nmca_setting('portal_url')); ?>"
                        class="client-portal-button"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Client Portal
                    </a>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu menuTransform',
                        'menu_id'        => 'primary-menu',
                        'depth'          => 2,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </div>

                <button
                    class="hamburger"
                    type="button"
                    aria-controls="primary-menu"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e('Toggle navigation', 'versatel'); ?>"
                >
                    <i class="menuIcon fa fa-bars" aria-hidden="true"></i>
                    <i class="closeIcon fa fa-close" aria-hidden="true"></i>
                </button>
            </nav>
</header>
