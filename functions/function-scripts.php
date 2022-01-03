<?
add_action('wp_enqueue_scripts', 'load_scripts_styles');


function load_scripts_styles()
{
    wp_deregister_script('jquery');

    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js", null, false);

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'popper',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js',
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'paroller',
        get_template_directory_uri() . '/js/vendor/jquery.paroller.min.js',
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'typed',
        get_template_directory_uri() . '/js/vendor/typed.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), null, false);

    wp_enqueue_script(
        'fancybox',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js',
        array('jquery'),
        null,
        true
    );

    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);


}

add_action('wp_enqueue_scripts', 'dequeue_stylesheets', 9999);

add_action('wp_head', 'dequeue_stylesheets', 9999);

function dequeue_stylesheets()
{
    wp_dequeue_style('dashicons');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-bootstrap-blocks-styles');
    wp_dequeue_style('nf-display', array('dashicons'));
    wp_dequeue_style('cookie-notice-front');
    wp_deregister_style('dashicons');
    wp_deregister_style('contact-form-7');
    wp_deregister_style('wc-block-style');
}

add_filter('wpcf7_autop_or_not', '__return_false');