<?php
get_header();

include locate_template('includes/globals.php', false, true); ?>

<section class="hero hero-page">
    <div class="hero-inner">
        <figure class="hero-visual">
            <img src="<?= $page_visual ?>" alt="<? the_title() ?>">
        </figure>
        <div class="hero-content">
            <strong class="hero-content--tagline"><?= bloginfo('description') ?></strong>
            <h1 class="hero-content--headline">
                <?=  (!is_category()) ? get_the_title() : single_cat_title( '', false ) ?>
            </h1>
            <div class="hero-content--description">
                <?= get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) ?>
            </div>
        </div>
    </div>
</section>
