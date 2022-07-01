<?

function featured_image($post)
{
    /** @var string $page_visual */
    /** @var TYPE_NAME $page_visual */

    global $post;
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
    global
    $page_visual;
    if (!empty($image)) {
        $page_visual = $image[0];
    } else {
        $page_visual = get_template_directory_uri().'/images/default.jpg';
    }
}

add_action('get_header', 'featured_image', 10, 1);