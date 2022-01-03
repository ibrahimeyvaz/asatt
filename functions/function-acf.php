<?


// Add ACF option pages

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Informatie',
            'menu_title' => 'Informatie',
            'menu_slug' => 'Algemene informatie',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-admin-home',
        )
    );
}

// Add Google Maps API Key for WP back-end

function my_acf_init()
{

    acf_update_setting('google_api_key', 'AIzaSyA3nCLZ7ZGxUrmhaI84EfrQTEIecJ_7svI');
}

add_action('acf/init', 'my_acf_init');

add_action('acf/init', 'my_acf_init_block_types');

function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('Galerijslider.'),
            'render_template'   => 'blocks/block-slider.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'slider', 'galerijslider' ),
        ));
        acf_register_block_type(
            array(
                'name' => 'partner-slider',
                'title' => __('Partners Slider'),
                'description' => __('Partners.'),
                'render_template' => 'blocks/block-partner-slider.php',
                'category' => 'formatting',
                'icon' => 'moreHorizontalMobile',
                'align' => 'false',
            )
        );
        acf_register_block_type(
            array(
                'name' => 'partners-grid',
                'title' => __('Partners Grid'),
                'description' => __('Partners.'),
                'render_template' => 'blocks/block-partner-grid.php',
                'category' => 'formatting',
                'icon' => 'moreHorizontalMobile',
                'align' => 'false',
            )
        );
        acf_register_block_type(
            array(
                'name' => 'persons',
                'title' => __('Personen'),
                'description' => __('Personen.'),
                'render_template' => 'blocks/block-persons.php',
                'category' => 'formatting',
                'icon' => 'moreHorizontalMobile',
                'align' => 'false',
            )
        );
        acf_register_block_type(
            array(
                'name' => 'google_map',
                'title' => __('Google Maps'),
                'render_template' => 'blocks/block-map.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('map', 'google maps'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'activities',
                'title' => __('Activiteiten'),
                'render_template' => 'blocks/block-activities.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('activiteiten'),
            )
        );
    }
}