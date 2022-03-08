<?

// Register dynamic sidebar locations

if (function_exists('register_sidebar')) {

    register_sidebar(
        array(
            'name' => 'Footer Menu 1',
            'id' => 'footermenu',
            'before_widget' => '<div class="footer-menu">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Menu 2',
            'id' => 'footermenu2',
            'before_widget' => '<div class="footer-menu">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}

?>