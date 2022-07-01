<? include locate_template('includes/globals.php', true, true) ?>


<!DOCTYPE html>
<html <? language_attributes() ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="author" content="<? bloginfo('name'); ?>">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="<? bloginfo('stylesheet_url'); ?>">
    <? wp_head() ?>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/862e2bcf9c.js" crossorigin="anonymous"></script>
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
<nav class="side-navigation">
    <div class="side-navigation--inner">
        <div class="side-navigation--information">
            <h3 class="information-headline">
                <?= bloginfo('description') ?>
            </h3>
            <ul class="information-list">
                <li>
                    <a target="_blank" rel="noopener"
                       href="<?= $google ?>"><?= $street.',  '.$zipcode.' '.$city ?></a>
                </li>
                <li>
                    <a target="_blank" rel="noopener"
                       href="mailto:<?= $email ?>">
                        <?= $email ?>
                    </a>
                </li>
                <li>
                    BTW: <?= $vat ?>
                </li>
            </ul>
            <ul class="social-media">
                <li>
                    <a href="<?= $facebook ?>" rel="noopener" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= $instagram ?>" rel="noopener" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= $linkedin ?>" rel="noopener" target="_blank">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= $twitter ?>" rel="noopener" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:<?= $email ?>" rel="noopener" target="_blank">
                        <i class="fa-regular fa-envelope"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?
        wp_nav_menu(
            array(
                'container'     =>  '   ',
                'theme_location' => 'secondary',
                'items_wrap' => '<ul class="side-navigation--menu" itemscope itemtype="http://schema.org/SiteNavigationElement" class="%2$s">%3$s</ul>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            )
        );
        ?>
    </div>
</nav>
<header class="main-header main-header--page" id="site-header"
        data-url="<?= site_url() ?>"
        data-site="<?= bloginfo('name') ?>">
    <a class="main-branding" href="<?= home_url() ?>" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="<?= bloginfo('name') ?>">
        <meta itemprop="url" content="<?= home_url() ?>">
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <meta itemprop="streetAddress" content="<?= $street ?>">
            <meta itemprop="addressLocality" content="<?= $city ?>, Belgium">
            <meta itemprop="postalCode" content="<?= $zipcode ?>">
        </div>
        <img class="main-branding--logo" width="150" height="30" loading="lazy" src="<?= get_template_directory_uri() ?>/images/asatt-logo.svg"
             alt="<?= bloginfo('name') ?>">
    </a>
    <div class="main-header-right">
        <nav class="main-navigation">
            <?
            wp_nav_menu(
                array(

                    'theme_location' => 'primary',
                    'container' => '',
                    'container_class' => '',
                    'items_wrap' => '<ul class="main-navigation-inner" itemscope itemtype="http://schema.org/SiteNavigationElement" class="%2$s">%3$s</ul>',
                    'link_before' => '<span>',
                    'link_aft
                er' => '</span>',
                )
            );
            ?>
        </nav>
        <div class="navigation-trigger-wrapper">
            <div class="navigation-trigger">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-menu">
    <?
    wp_nav_menu(
        array(
            'container'     =>  '   ',
            'theme_location' => 'mobile',
            'items_wrap' => '<ul class="mobile--menu" itemscope itemtype="http://schema.org/SiteNavigationElement" class="%2$s">%3$s</ul>',
            'link_before' => '<span>',
            'link_after' => '</span>',
        )
    );
    ?>
</div>
<div class="site-wrapper">