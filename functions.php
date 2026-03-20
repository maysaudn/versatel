<?php 

function versatel_files() {
    wp_enqueue_script('main-versatel-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true); // array can be null if not using jquery
    wp_enqueue_style('versatel_main_styles', get_theme_file_uri('/build/style-index.css'));
    // wp_enqueue_style('versatel_page_styles', get_theme_file_uri('/build/page-styles.css'));
    // wp_enqueue_style('versatel_extra_styles', get_theme_file_uri('/build/extra-styles.css'));
    wp_enqueue_style('versatel_browser_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css');
    wp_enqueue_style('font-awesome-stylesheet', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-font-lora', '//fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Satisfy&display=swap');
    wp_enqueue_style('google-font-montserrat', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
}

add_action('wp_enqueue_scripts', 'versatel_files');

function versatel_features() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'versatel_features');