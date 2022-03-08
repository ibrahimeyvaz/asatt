<?

include(locate_template('includes/globals.php', false, false));

?>
<div class="typewriter">
    <span class="typewriter--text"></span>
</div>
<footer class="main-footer">
    <div class="main-footer--cta">
        <div class="footer-cta--content">
            <h2 class="cta-content--headline">Schrijf je in</h2>
            <div class="cta-content--description">
                <p>Vind je passie, inspiratie en<br>
                    roeping met A Seat At The Table.</p>
            </div>
        </div>
        <div class="footer-cta--action">
            <a class="button-arrowed" href="<?= site_url() ?>/inschrijving" ">Take a seat
            <svg class="arrow-icon" width="32" height="32" viewBox="0 0 32 32">
                <g fill="none" stroke="#2567ce" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                    <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                    <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                </g>
            </svg>
            </a>
        </div>
        <div class="footer-cta--intro">
            <p>Ook zin om wekelijks mee aan tafel te schuiven bij de top van het Belgische en<br class="d-none d-md-block">
                internationale bedrijfsleven, middenveld, sport en politiek?</p>
        </div>
    </div>
    <div class="main-footer--navigation">
        <div class="row no-gutters justify-content-center">
            <div class="col-xs-12 col-md-auto pl-md-5 pr-md-5">
                <h3 class="footer-menu--title">Snelmenu</h3>
                <? dynamic_sidebar('footermenu') ?>
            </div>
            <div class="col-xs-12 col-md-auto pl-md-5 pr-md-5">
                <h3 class="footer-menu--title">Links</h3>
                <? dynamic_sidebar('footermenu2') ?>
            </div>
            <div class="col-xs-12 col-md-auto pl-md-5 pr-md-5">
                <h3 class="footer-menu--title">Activiteiten</h3>
                <ul class="footer-menu footer-menu--activities">
                    <?php
                    $time = current_time('timestamp');
                    $args = array(
                        'post_type' => 'activiteit',
                        'post_status' => 'publish',
                        'orderby' => 'meta_value',
                        'meta_key' => 'event_start_date',
                        'meta_value' => $time,
                        'meta_compare' => '>=',
                        'order' => 'ASC',
                        'posts_per_page' => 6,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $startdate = get_field('event_start_date');
                            $enddate = get_field('event_end_date');
                            $categories = get_the_category();
                            ?>
                            <li class="activity-item">
                                <a href="<? the_permalink() ?>">
                                    <span class="activity-item--title">
                                        <? the_title() ?>
                                    </span>
                                    <br>
                                    <span class="activity-item--date-category"><?= date(
                                            'd/m/Y',
                                            strtotime($startdate)
                                        ) ?>
                                        <? if ($categories): ?>
                                            —
                                            <?= $categories[0]->name ?>
                                        <? endif; ?>
                                    </span>
                                </a>
                            </li>
                        <? endwhile;
                        wp_reset_postdata(); endif; ?>
                </ul>
            </div>
            <div class="col-xs-12 col-md-auto pl-md-5 pr-md-5">
                <h3 class="footer-menu--title">Opportuniteiten</h3>
                <ul class="footer-menu footer-menu--activities">
                    <?php
                    $time = current_time('timestamp');
                    $args = array(
                        'post_type' => 'opportuniteit',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'posts_per_page' => 6,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <li class="activity-item">
                                <a href="<? the_permalink() ?>">
                                    <span class="activity-item--title">
                                        <? the_title() ?>
                                    </span>
                                </a>
                            </li>
                        <? endwhile;
                        wp_reset_postdata(); endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-footer--mid">
        <a class="footer-branding" href="<?= home_url() ?>">
            <img src="<?= get_template_directory_uri() ?>/images/asatt-footer.svg" alt="<?= bloginfo('name') ?>">
        </a>
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
    <div class="main-footer--bottom">
        <div class="footer-bottom--center">

            <small id="copy"> Copyright © <?= date("Y") ?> <?= bloginfo('name') ?>. <?= __(
                    "Alle rechten voorbehouden.",
                    "asatt"
                ) ?><br
                        class="d-none d-xs-block d-sm-none"> <a class="terms-link"
                                                                href="<?= site_url() ?>/algemene-voorwaarden"><?= _e(
                        "Algemene voorwaarden",
                        "asatt"
                    ) ?></a>. <a class="privacy-link" href="<?= get_permalink(3) ?>"><?= _e(
                        "Privacybeleid",
                        "asatt"
                    ) ?></a>.</small>
        </div>
        <small class="reign">
            <a href="https://www.reign.agency" rel="noreferrer" target="_blank">
                <?= __("website door", "asatt") ?> <img loading="lazy" width="20" height="30"
                                                        src="<?= get_template_directory_uri(
                                                        ) ?>/images/reign-agency.svg"
                                                        alt="<?= __(
                                                            "Website en marketing door Reign Agency",
                                                            "asatt"
                                                        ) ?>">
            </a>
        </small>
    </div>
</footer>
</div>

<? wp_footer(); ?>
</body>
</html>