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

            <nav>
                <ul class="menu menuTransform">
                    <li class="menuItem"><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li class="menuItem"><a href="<?php echo site_url('/about'); ?>">About</a></li>
                    <li class="menuItem"><a href="<?php echo site_url('/resources'); ?>">Resources</a></li>
                    <li class="menuItem"><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                    <li class="menuItem client-portal"><a class="client-portal-text" href=""><i class="fa fa-user"></i> Client Portal</a></li>
                </ul>

            <div class="hamburger">
                <i class="menuIcon fa fa-bars"></i>
                <i class="closeIcon fa fa-close"></i>
            </div>
</nav>
</header>