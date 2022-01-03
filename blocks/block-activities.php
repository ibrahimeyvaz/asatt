<section class="activities">
    <?
    $time = current_time('timestamp');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'activiteit',
        'post_status' => 'publish',
        'orderby' => 'meta_value',
        'meta_key' => 'event_start_date',
        'meta_value' => $time,
        'meta_compare' => '>=',
        'order' => 'ASC',
        'posts_per_page' => 6,
        'paged' => $paged,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $startdate = get_field('event_start_date', get_the_ID());
            $enddate = get_field('event_end_date', get_the_ID());
            $categories = get_the_category();
            $category_name = $categories[0]->name;
            $activity_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->id), 'full');

            (!empty($image)) ? $activity_image = $activity_image[0] : $activity_image = get_template_directory_uri().'/images/default.jpg';

            ?>
            <article class="activity-article">
                <a href="<? the_permalink() ?>">
                    <figure class="activity-article--visual">
                        <span class="activity-article--category"><?=  $category_name?></span>
                        <img src="<?= $activity_image ?>" alt="<? the_title() ?> - <?= bloginfo('name') ?>">
                    </figure>
                    <div class="activity-article--content">
                        <span class="activity-article--date"><?= date('d/m/Y - H.i', strtotime($startdate)) ?></span>
                        <h3 class="activity-article--title"><? the_title() ?></h3>
                        <span class="button-arrowed">
                            Verder lezen
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
        <? endwhile;

        $total_pages = $query->max_num_pages;
        ($total_pages > 1) ? $current_page = max(1, get_query_var('paged')) : '';

        wp_reset_postdata(); endif;


    ?>
</section>
<nav class="pagination">
    <?
    echo paginate_links(array(
        'base' => get_pagenum_link(1).'%_%',
        'format' => '/page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => __('<i class="far fa-long-arrow-alt-left"></i>'),
        'next_text' => __('<i class="far fa-long-arrow-alt-right"></i>'),
        'type' => 'list',
    )); ?>
</nav>
