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
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
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