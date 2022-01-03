<?

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function disable_embeds_init()
{

    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);

function disable_default_dashboard_widgets()
{

    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('dashboard_activity', 'dashboard', 'core');

}

add_action('admin_menu', 'disable_default_dashboard_widgets');
add_action('add_meta_boxes', 'remove_page_metabox', 100);

function remove_page_metabox()
{
    remove_meta_box('trackbacksdiv', 'post', 'normal'); // Trackbacks meta box
    remove_meta_box('trackbacksdiv', 'page', 'normal'); // Trackbacks meta box
    remove_meta_box('trackbacksdiv', 'product', 'normal'); // Trackbacks meta box
    remove_meta_box('commentsdiv', 'post', 'normal'); // Comments meta box
    remove_meta_box('commentsdiv', 'page', 'normal'); // Comments meta box
    remove_meta_box('commentsdiv', 'product', 'normal'); // Comments meta box
    remove_meta_box('slugdiv', 'post', 'normal');    // Slug meta box
    remove_meta_box('slugdiv', 'page', 'normal');    // Slug meta box
    remove_meta_box('authordiv', 'post', 'normal'); // Author meta box
    remove_meta_box('authordiv', 'page', 'normal'); // Author meta box
    remove_meta_box('authordiv', 'product', 'normal'); // Author meta box
    remove_meta_box('revisionsdiv', 'post', 'normal'); // Revisions meta box
    remove_meta_box('formatdiv', 'post', 'normal'); // Post format meta box
    remove_meta_box('commentstatusdiv', 'post', 'normal'); // Comment status meta box
    remove_meta_box('commentstatusdiv', 'page', 'normal'); // Comment status meta box
    remove_meta_box('commentstatusdiv', 'product', 'normal'); // Comment status meta box
    remove_meta_box('tagsdiv-post_tag', 'post', 'side'); // Post tags meta box
    remove_meta_box('tagsdiv-post_tag', 'page', 'side'); // Post tags meta box
    remove_meta_box('tagsdiv-product_tag', 'product', 'side'); // Post tags meta box
    remove_meta_box('pageparentdiv', 'post', 'side'); // Page attributes meta box
    remove_meta_box('postcustom', 'page', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('postcustom', 'product', 'normal');
    remove_meta_box('icl_div_config', 'page', 'advanced');
    remove_meta_box('icl_div_config', 'post', 'normal');
    remove_meta_box('icl_div_config', 'product', 'advanced');
    remove_meta_box('slugdiv', 'page', 'advanced');
    remove_meta_box('slugdiv', 'post', 'normal');
    remove_meta_box('slugdiv', 'product', 'normal');
    remove_meta_box('pageparentdiv', 'product', 'normal');
}



function tabor_gutenberg_disable_all_colors()
{
    add_theme_support('editor-color-palette');
    add_theme_support('disable-custom-colors');
}

add_action('after_setup_theme', 'tabor_gutenberg_disable_all_colors');

add_theme_support('disable-custom-colors');

///// Disable comments functionality of WP

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}

add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status()
{
    return false;
}

add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments)
{
    $comments = array();

    return $comments;
}

add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}

add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}

// Disable gutenberg custom styling
add_action('init', 'df_disable_comments_admin_bar');

add_filter( 'auto_plugin_update_send_email', '__return_false' );