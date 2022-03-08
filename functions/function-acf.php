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
        acf_register_block_type(
            array(
                'name' => 'activities-slider',
                'title' => __('Activiteiten Slider'),
                'render_template' => 'blocks/block-activities-slider.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('activiteiten'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'opportunities-slider',
                'title' => __('Opportuniteiten Slider'),
                'render_template' => 'blocks/block-opportunities-slider.php',
                'category' => 'formatting',
                'igucon' => 'admin-comments',
                'keywords' => array('Opportuniteiten'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'image-slider',
                'title' => __('Afbeelding Slider'),
                'render_template' => 'blocks/block-image-slider.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('Afbeelding slider'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'vacatures-slider',
                'title' => __('Vacature Slider'),
                'render_template' => 'blocks/block-vacatures-slider.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('activiteiten'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'home-slider',
                'title' => __('Home Slider'),
                'render_template' => 'blocks/block-home-slider.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('slider home'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'vacatures',
                'title' => __('Vacatures'),
                'render_template' => 'blocks/block-vacatures.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('vacatures'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'opportunities',
                'title' => __('Opportuniteiten'),
                'render_template' => 'blocks/block-opportunities.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('opportunities'),
            )
        );
        acf_register_block_type(
            array(
                'name' => 'news',
                'title' => __('Persberichten'),
                'render_template' => 'blocks/block-news.php',
                'category' => 'formatting',
                'icon' => 'admin-comments',
                'keywords' => array('Persberichten'),
            )
        );
    }
}

function acf_filter_rest_api_preload_paths( $preload_paths ) {
    global $post;
    $rest_path    = rest_get_route_for_post( $post );
    $remove_paths = array(
        add_query_arg( 'context', 'edit', $rest_path ),
        sprintf( '%s/autosaves?context=edit', $rest_path ),
    );

    return array_filter(
        $preload_paths,
        function( $url ) use ( $remove_paths ) {
            return ! in_array( $url, $remove_paths, true );
        }
    );
}
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );