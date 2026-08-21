<?php 
function enqueue_swiper_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        null
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        null,
        true
    );

    // Swiper Initializer
    wp_enqueue_script(
        'team-swiper',
        get_template_directory_uri() . '/js/team-swiper.js',
        [],
        $theme_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

// VERSATEL FILES
function versatel_files() {
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_script(
        'main-versatel-js', 
        get_theme_file_uri('/build/index.js'), 
        array('jquery'), 
        $theme_version,
        true
    ); // array can be null if not using jquery
    wp_enqueue_style(
        'versatel-design-tokens',
        get_theme_file_uri('/build/design-tokens.css'),
        array(),
        $theme_version
    );
    wp_enqueue_style(
        'versatel_main_styles', 
        get_theme_file_uri('/build/style-index.css'),
        array('versatel-design-tokens'),
        $theme_version
        );
    wp_enqueue_style(
        'versatel_browser_styles', 
        get_theme_file_uri('/build/index.css'),
        array(),
        $theme_version
    );
    wp_enqueue_style(
        'font-awesome', 
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css'
    );
    wp_enqueue_style(
        'font-awesome-stylesheet', 
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    );
}

add_action('wp_enqueue_scripts', 'versatel_files');

// Use client-facing "Insight" terminology for WordPress posts in the admin UI.
function versatel_relabel_post_type_as_insights($labels) {
    $labels->name                     = 'Insights';
    $labels->singular_name            = 'Insight';
    $labels->add_new                  = 'Add New';
    $labels->add_new_item             = 'Add New Insight';
    $labels->edit_item                = 'Edit Insight';
    $labels->new_item                 = 'New Insight';
    $labels->view_item                = 'View Insight';
    $labels->view_items               = 'View Insights';
    $labels->search_items             = 'Search Insights';
    $labels->not_found                = 'No insights found.';
    $labels->not_found_in_trash       = 'No insights found in Trash.';
    $labels->all_items                = 'All Insights';
    $labels->archives                 = 'Insight Archives';
    $labels->attributes               = 'Insight Attributes';
    $labels->insert_into_item         = 'Insert into insight';
    $labels->uploaded_to_this_item    = 'Uploaded to this insight';
    $labels->filter_items_list        = 'Filter insights list';
    $labels->items_list_navigation    = 'Insights list navigation';
    $labels->items_list               = 'Insights list';
    $labels->item_published           = 'Insight published.';
    $labels->item_published_privately = 'Insight published privately.';
    $labels->item_reverted_to_draft   = 'Insight reverted to draft.';
    $labels->item_scheduled           = 'Insight scheduled.';
    $labels->item_updated             = 'Insight updated.';
    $labels->item_link                = 'Insight Link';
    $labels->item_link_description    = 'A link to an insight.';
    $labels->menu_name                = 'Insights';
    $labels->name_admin_bar           = 'Insight';

    return $labels;
}

add_filter('post_type_labels_post', 'versatel_relabel_post_type_as_insights');

// Allow page editors to provide concise summaries for Resources cards.
function versatel_enable_page_excerpts() {
    add_post_type_support('page', 'excerpt');
}

add_action('init', 'versatel_enable_page_excerpts', 20);

// The static homepage is assembled by the theme and does not render page content.
function versatel_hide_front_page_content_editor() {
    $front_page_id = (int) get_option('page_on_front');
    $edited_page_id = isset($_GET['post'])
        ? absint(wp_unslash($_GET['post']))
        : 0;

    if ($front_page_id && $edited_page_id === $front_page_id) {
        remove_post_type_support('page', 'editor');
    }
}

add_action('admin_init', 'versatel_hide_front_page_content_editor');

// NAVBAR
function nmca_enqueue_navbarMenu() {
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'style-navbar',
        get_theme_file_uri('/build/style-navbar.css'),
        array('versatel-design-tokens'),
        $theme_version
    );
    wp_enqueue_script(
        'navbar-menu',
        get_template_directory_uri() . '/js/navbar-menu.js',
        array(),
        $theme_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'nmca_enqueue_navbarMenu');

// FOOTER 

function nmca_enqueue_footer() {
    wp_enqueue_style(
        'style-footer',
        get_theme_file_uri('/build/style-footer.css'),
        array('versatel-design-tokens'),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'nmca_enqueue_footer');

// PODCAST
function nmca_enqueue_podcast_styles() {
    if (!is_page_template('page-podcast.php')) {
        return;
    }

    wp_enqueue_style(
        'versatel-podcast',
        get_theme_file_uri('/build/style-podcast.css'),
        ['versatel_main_styles'],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'nmca_enqueue_podcast_styles');

// RESOURCES
function nmca_enqueue_resources_styles() {
    if (!is_page_template('page-resources.php')) {
        return;
    }

    wp_enqueue_style(
        'versatel-resources',
        get_theme_file_uri('/build/style-resources.css'),
        array('versatel_main_styles'),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'nmca_enqueue_resources_styles');

// THEME FEATURES
function versatel_features() {
    add_theme_support('title-tag');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('build/design-tokens.css');
    add_editor_style('build/editor-style.css');
    add_theme_support('woocommerce', [
        'thumbnail_image_width' => 400,
        'single_image_width'    => 800,
        'product_grid'          => [
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 4,
        ],
    ]);
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menus([
        'primary' => __('Primary Navigation', 'versatel'),
    ]);
}

add_action('after_setup_theme', 'versatel_features');

// Add Client Portal Menu Item to Primary Navigation for Mobile View

function versatel_add_client_portal_menu_item($items, $args) {
    if ('primary' !== $args->theme_location) {
        return $items;
    }

    $portal_url = nmca_setting('portal_url');

    if (empty($portal_url)) {
        return $items;
    }

    $portal_item = sprintf(
        '<li class="menu-item client-portal-menu-item">
            <a href="%1$s" target="_blank" rel="noopener noreferrer">
                <i class="fa fa-user" aria-hidden="true"></i>
                %2$s
            </a>
        </li>',
        esc_url($portal_url),
        esc_html__('Client Portal', 'versatel')
    );

    return $items . $portal_item;
}

add_filter(
    'wp_nav_menu_items',
    'versatel_add_client_portal_menu_item',
    10,
    2
);

// Theme fonts

function versatel_enqueue_fonts() {
    wp_enqueue_style(
        'google-font-lora',
        'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'google-font-montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
        [],
        null
    );
}

add_action('wp_enqueue_scripts', 'versatel_enqueue_fonts'); // Hook to the frontend
add_action('enqueue_block_editor_assets', 'versatel_enqueue_fonts');    // Hook to the block editor

// Team Member Custom Post Type

function create_team_member_cpt() {
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new' => 'Add New Member',
            'add_new_item' => 'Add New Member',
            'edit_item' => 'Edit Team Member',
            'view_item' => 'View Team Member',
            'view_items' => 'View Team Members',
            'search_items' => 'Search Team Members',
            'not_found' => 'Team member not found',
            'all_items' => 'All Team Members'
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
        $title = 'Full name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_team_member_title_placeholder', 10, 2);

// Remove default editor from Team Member CPT (Needed to replace full bio w/ WYSIWYG Editor in ACF)

function remove_editor_from_team_member() {
    remove_post_type_support('team_member', 'editor');
}
add_action('init', 'remove_editor_from_team_member');

// Team Modal
function enqueue_team_modal_script() {
    wp_enqueue_script(
        'team-modal-js',
        get_template_directory_uri() . '/js/team-modal.js', 
        [],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_team_modal_script');

// Require Custom ACF Fields
require_once get_template_directory() . '/includes/acf/acf-fields.php';

// Font Awesome
function nmca_enqueue_fontawesome() {
    wp_enqueue_style(
      'font-awesome',
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
      array(),
      null
    );
  }
  add_action('wp_enqueue_scripts', 'nmca_enqueue_fontawesome');

// Theme Settings
require_once get_template_directory() . '/includes/theme-settings.php';

// Podcast Feed
require_once get_template_directory() . '/includes/podcast-feed.php';
