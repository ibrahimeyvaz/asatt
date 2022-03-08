<?

function activiteiten() {

    $labels = array(
        'name'                  => _x( 'Activiteiten', 'Post Type General Name', 'asatt' ),
        'singular_name'         => _x( 'Activiteit', 'Post Type Singular Name', 'asatt' ),
        'menu_name'             => __( 'Activiteiten', 'asatt' ),
        'name_admin_bar'        => __( 'Activiteiten', 'asatt' ),
        'archives'              => __( 'Activiteiten', 'asatt' ),
        'attributes'            => __( 'Item Attributes', 'asatt' ),
        'parent_item_colon'     => __( 'Parent Item:', 'asatt' ),
        'all_items'             => __( 'Alle activiteiten', 'asatt' ),
        'add_new_item'          => __( 'Nieuw', 'asatt' ),
        'add_new'               => __( 'Nieuw', 'asatt' ),
        'new_item'              => __( 'Nieuw', 'asatt' ),
        'edit_item'             => __( 'Wijzigen', 'asatt' ),
        'update_item'           => __( 'Vernieuwen', 'asatt' ),
        'view_item'             => __( 'Bekijken', 'asatt' ),
        'view_items'            => __( 'Bekijken', 'asatt' ),
        'search_items'          => __( 'Zoeken', 'asatt' ),
        'not_found'             => __( 'Niet gevonden', 'asatt' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'asatt' ),
        'featured_image'        => __( 'Afbeelding', 'asatt' ),
        'set_featured_image'    => __( 'Gebruik als afbeelding', 'asatt' ),
        'remove_featured_image' => __( 'Verwijder afbeelding', 'asatt' ),
        'use_featured_image'    => __( 'Gebruik als afbeelding', 'asatt' ),
        'insert_into_item'      => __( 'Insert into item', 'asatt' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'asatt' ),
        'items_list'            => __( 'Items list', 'asatt' ),
        'items_list_navigation' => __( 'Items list navigation', 'asatt' ),
        'filter_items_list'     => __( 'Filter items list', 'asatt' ),
    );
    $args = array(
        'label'                 => __( 'Activiteit', 'asatt' ),
        'description'           => __( 'Activiteiten', 'asatt' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-universal-access',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'activiteit', $args );

}
add_action( 'init', 'activiteiten', 0 );

// Register Custom Post Type
function oppurtunities() {

    $labels = array(
        'name'                  => _x( 'Opportuniteiten', 'Post Type General Name', 'asatt' ),
        'singular_name'         => _x( 'Opportuniteit', 'Post Type Singular Name', 'asatt' ),
        'menu_name'             => __( 'Opportuniteiten', 'asatt' ),
        'name_admin_bar'        => __( 'Opportuniteiten', 'asatt' ),
        'archives'              => __( 'Opportuniteiten', 'asatt' ),
        'attributes'            => __( 'Item Attributes', 'asatt' ),
        'parent_item_colon'     => __( 'Parent Item:', 'asatt' ),
        'all_items'             => __( 'Alle opportuniteiten', 'asatt' ),
        'add_new_item'          => __( 'Add New Item', 'asatt' ),
        'add_new'               => __( 'Nieuw', 'asatt' ),
        'new_item'              => __( 'Nieuw', 'asatt' ),
        'edit_item'             => __( 'Wijzigen', 'asatt' ),
        'update_item'           => __( 'Updaten', 'asatt' ),
        'view_item'             => __( 'Bekijken', 'asatt' ),
        'view_items'            => __( 'Bekijk alles', 'asatt' ),
        'search_items'          => __( 'Zoeken', 'asatt' ),
        'not_found'             => __( 'Niet gevonden', 'asatt' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'asatt' ),
        'featured_image'        => __( 'Uitgelichte afbeelding', 'asatt' ),
        'set_featured_image'    => __( 'Als uitgelichte afbeelding gebruiken', 'asatt' ),
        'remove_featured_image' => __( 'Verwijderen', 'asatt' ),
        'use_featured_image'    => __( 'Als uitgelichte afbeelding gebruiken', 'asatt' ),
        'insert_into_item'      => __( 'Insert into item', 'asatt' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'asatt' ),
        'items_list'            => __( 'Items list', 'asatt' ),
        'items_list_navigation' => __( 'Items list navigation', 'asatt' ),
        'filter_items_list'     => __( 'Filter items list', 'asatt' ),
    );
    $args = array(
        'label'                 => __( 'Opportuniteit', 'asatt' ),
        'description'           => __( 'Opportuniteiten', 'asatt' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-image-filter',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'opportuniteit', $args );

}
add_action( 'init', 'oppurtunities', 0 );

// Register Custom Post Type
function vacatures() {

    $labels = array(
        'name'                  => 'Vacatures',
        'singular_name'         => 'Vacature',
        'menu_name'             => 'Vacatures',
        'name_admin_bar'        => 'Vacatures',
        'archives'              => 'Item Archives',
        'attributes'            => 'Item Attributes',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'Alle vacatures',
        'add_new_item'          => 'Add New Item',
        'add_new'               => 'Nieuw',
        'new_item'              => 'Nieuw',
        'edit_item'             => 'Wijzigen',
        'update_item'           => 'Updaten',
        'view_item'             => 'Bekijken',
        'view_items'            => 'Alles bekijken',
        'search_items'          => 'Zoeken',
        'not_found'             => 'Niet gevonden',
        'not_found_in_trash'    => 'Niet gevonden',
        'featured_image'        => 'Uitgelichte afbeelding',
        'set_featured_image'    => 'Uitgelichte afbeelding',
        'remove_featured_image' => 'Verwijderen',
        'use_featured_image'    => 'Gebruiken',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $args = array(
        'label'                 => 'Vacature',
        'description'           => 'Post Type Description',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-archive',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'vacatures', $args );

}
add_action( 'init', 'vacatures', 0 );