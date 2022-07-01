<section class="activities swiper-container swiper swiper--opportunities">
    <div class="swiper-wrapper">
        <?
        $args = array(
            'post_type' => 'opportuniteit',
            'post_status' => 'publish',
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'posts_per_page' => 3,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $activity_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'square');
                $startdate = get_field('event_start_date', get_the_ID());
                $enddate = get_field('event_end_date', get_the_ID());
                $starthour = get_field('beginuur', get_the_ID());
                $endhour = get_field('einduur', get_the_ID());
                $multiple_days = get_field('meerdaags', get_the_ID());
                $startDateConverted = DateTime::createFromFormat('d/m/Y', $startdate);
                $date_now = new DateTime();

                (!empty($activity_image)) ? $activity_image = $activity_image[0] : $activity_image = get_template_directory_uri(
                    ).'/images/default.jpg';

                ?>
                <div class="swiper-slide">
                    <article class="activity-article">
                        <a class="activity-article--slider" href="<? the_permalink() ?>">
                            <figure class="activity-article--visual">
                                <?
                                if ($startDateConverted):
                                    if($startDateConverted < $date_now):
                                        echo '<span class="activity-article--category expired">Afgelopen</span>';
                                    endif;
                                endif;
                                ?>
                                <img loading="lazy" width="300" height="300" src="<?= $activity_image ?>"
                                     alt="<? the_title() ?> - <?= bloginfo('name') ?>">
                            </figure>
                            <div class="activity-article--content">
                                <? if ($startdate): ?>
                                    <? if ($multiple_days): ?>
                                        <span class="activity-article--date"><?= $startdate ?>   <?= ($enddate) ? 'tot '.$enddate : '' ?></span>
                                    <? else: ?>
                                        <span class="activity-article--date"><?= $startdate ?> – <?= $starthour ?> <?= ($endhour) ? 'tot '.$endhour : '' ?></span>
                                    <? endif; ?>
                                <? endif; ?>
                                <h3 class="activity-article--title"><? the_title() ?></h3>
                                <span class="button-arrowed">
                            Verder lezen
                            <svg class="arrow-icon" width="32" height="32" viewBox="0 0 32 32">
                              <g fill="none" stroke="#3A64AF" stroke-width="1.5" stroke-linejoin="round"
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
    var swiper = new Swiper(".swiper--opportunities", {
        breakpoints: {
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        loop: false,
        spaceBetween: 30,
    });
</script>