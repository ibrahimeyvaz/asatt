<?

// Enable menu theme menu
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}


// Register menu locations

if (function_exists('register_nav_menu')) {
    register_nav_menus(
        array(
            'primary' => 'Hoofdmenu',
            'secondary' => 'Verborgenmenu',
            'mobile' => 'Mobiel'
        )
    );
}


// Add schema.org attributes

function add_menu_attributes($atts, $item, $args)
{
    $atts['itemprop'] = 'url';

    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_menu_attributes', 10, 3);

function add_current_nav_class($classes, $item) {

    // Getting the current post details
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

    // Checking if post ID exist...
    if (isset( $id )){

        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));

        // Getting the rewrite slug containing the post type's ancestors
        $ancestor_slug = $current_post_type->rewrite ? $current_post_type->rewrite['slug'] : '';

        // Split the slug into an array of ancestors and then slice off the direct parent.
        $ancestors = explode('/',$ancestor_slug);
        $parent = array_pop($ancestors);

        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));

        // Remove domain from menu slug
        $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

        // If the menu item URL contains the post type's parent
        if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
            $classes[] = 'current-menu-item';
        }

        // If the menu item URL contains any of the post type's ancestors
        foreach ( $ancestors as $ancestor ) {
            if (!empty($menu_slug) && !empty($ancestor) && strpos($menu_slug,$ancestor) !== false) {
                $classes[] = 'current-page-ancestor';
            }
        }
    }
    // Return the corrected set of classes to be added to the menu item
    return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );