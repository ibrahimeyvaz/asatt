<section class="activities swiper-container swiper swiper--jobs">
    <div class="swiper-wrapper">
    <?
    $time = current_time('timestamp');
    $args = array(
        'post_type' => 'vacatures',
        'post_status' => 'publish',
        'order' => 'ASC',
        'posts_per_page' => 6,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $location = get_field('address_opportunity', get_the_ID());
            $contract_type = get_field('contracttype', get_the_ID());
            $contract_term = get_field('contractduur', get_the_ID());
            $contract_hours = get_field('uren', get_the_ID());
            $activity_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'square');

            (!empty($activity_image)) ? $activity_image = $activity_image[0] : $activity_image = get_template_directory_uri().'/images/default.jpg';

            ?>
        <div class="swiper-slide">
            <article class="activity-article">
                <a href="<? the_permalink() ?>">
                    <figure class="activity-article--visual">
                        <img loading="lazy" width="300" height="300" src="<?= $activity_image ?>" alt="<? the_title() ?> - <?= bloginfo('name') ?>">
                    </figure>
                    <div class="activity-article--content">
                        <h3 class="activity-article--title"><? the_title() ?></h3>
                        <ul class="opportunity-list-index">
                            <? if($contract_type): ?>
                                <li>
                                    <i class="fa-regular fa-memo-circle-check"></i>
                                    <?= $contract_type ?>
                                </li>
                            <? endif; ?>
                            <? if($contract_term): ?>
                                <li>
                                    <i class="fa-regular fa-calendar-clock"></i>
                                    <?= $contract_term ?>
                                </li>
                            <? endif; ?>
                            <? if($contract_hours): ?>
                                <li>
                                    <i class="fa-regular fa-clock-rotate-left"></i>
                                    <?= $contract_hours ?>
                                </li>
                            <? endif; ?>
                        </ul>
                        <br>
                        <span class="button-arrowed">
                            Solliciteer hier!
                            <svg class="arrow-icon" width="32" height="32" viewBox="0 0 32 32">
                              <g fill="none" stroke="#2567ce" stroke-width="1.5" stroke-linejoin="round"
                                 stroke-miterlimit="10">
                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                <path class="arrow-icon--arrow"
                                      d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                </g>
                            </svg>
                        </span>
                    </div>
                </a>
            </article>
        </div>
        <? endwhile;


        wp_reset_postdata(); endif;


    ?>
    </div>
</section>
<script>
    var swiper = new Swiper(".swiper--jobs", {
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1800: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        loop: false,
        spaceBetween: 30,
    });
</script>