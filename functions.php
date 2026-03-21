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

// Team Member Custom Post Type

function create_team_member_cpt() {
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member'
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ));
}
add_action('init', 'create_team_member_cpt');

// Change "Add title" to "Add full name" in WP Editor for Team Member CPT

function change_team_member_title_placeholder($title, $post) {
    if ($post->post_type == 'team_member') {
        $title = 'Add full name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_team_member_title_placeholder', 10, 2);

// Remove default editor from Team Member CPT (Needed to replace full bio w/ WYSIWYG Editor in ACF)

function remove_editor_from_team_member() {
    remove_post_type_support('team_member', 'editor');
}
add_action('init', 'remove_editor_from_team_member');

// Add Swiper to Team Carousel
function enqueue_team_carousel_assets() {

    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css',
        array(),
        null
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    // Your init script
    wp_enqueue_script(
        'team-carousel-init',
        get_template_directory_uri() . '/js/team-carousel.js',
        array('swiper-js'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_team_carousel_assets');