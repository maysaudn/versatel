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
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()"></a>
                    </li>
                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('/about'); ?>">About</a></li>
                    <li><a href="<?php echo site_url('/services'); ?>">Services</a></li>
                    <li><a href="<?php echo site_url('/resources'); ?>">Resources</a></li>
                    <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                </ul>

            <div class="hamburger" onclick="openMenu()">
                <i class="fa fa-bars"></i>
            </div>
</nav>
</header>