<?


add_action('admin_head', 'admin_css');
add_filter ('login_enqueue_scripts', 'admin_css');

function admin_css()
{
    echo '<style>
    .wp-block {
     max-width: none;
    }
    #adminmenu .wp-menu-image img{
    padding: 0;
    padding-top: 6px;
    width: 20px;
    opacity: 1;
    }
    .map{
    height: 400px;
    width: 100%;
    }
    .block-editor__container img{
    max-width: 90%;
    margin-left: auto;
    }
    .wc-block-grid__product-image img{
    height: 300px !important;
    object-fit: contain;
    }
    .taxonomy-product_cat .form-wrap .metabox-holder{
    display: none;
    }
    .login h1 a{
    width: 100% !important;
    height: 80px !important;
    background-size: contain !important;
    background-position: center !important;
}
  </style>';
}
