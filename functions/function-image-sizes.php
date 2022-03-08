<?

// Add image sizes

add_theme_support('post-thumbnails');

if (function_exists('add_image_size')) {

    add_image_size('hd', 1920, 1080, true);
    add_image_size('square', 600, 600, true);

}