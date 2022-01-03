<?
/**
 * Template Name: Home
 */
get_header();
?>
    <section class="hero">
        <div class="hero-inner">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <figure class="hero-visual">
                        <img src="<?= $page_visual ?>" alt="<?= bloginfo('name') ?>">
                    </figure>
                </div>
                <div class="col-lg-7 hero-content-wrapper align-items-center">
                    <blockquote class="hero-content">
                        <h1 class="hero-content--headline">
                            If they don’t give you <br>
                            <a href="<?= site_url() ?>/wie-zijn-we" class="content-headline-highlight">a seat at the table</a>, <br>
                            bring a folding chair. <br>
                        </h1>
                        <p class="hero-content--author">-Shirley Chisolm</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="hero-cta">
            <a class="button-arrowed" href="<?= site_url() ?>/inschrijving">Schrijf je nu in
                <svg class="arrow-icon" width="32" height="32" viewBox="0 0 32 32">
                    <g fill="none" stroke="#fff" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                        <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                        <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                    </g>
                </svg>
            </a>
        </div>
    </section>
    <main class="main-wrapper">
        <? the_content() ?>
    </main>
<? get_footer() ?>