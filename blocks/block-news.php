<section class="activities">
    <?
    while (have_rows('news_item')) : the_row();

        $news_image = get_sub_field('news_image');
        $news_title = get_sub_field('news_title');
        $news_channel = get_sub_field('news_channel');
        $news_link = get_sub_field('news_link');
        $news_date = get_sub_field('news_date');

        (!empty($news_image)) ? $news_image = $news_image['sizes']['square'] : $news_image = get_template_directory_uri().'/images/default.jpg';


        ?>
        <article class="activity-article">
            <a href="<?= $news_link ?>" rel="noreferrer" target="_blank">
                <? if ($news_image): ?>
                    <figure class="activity-article--visual">
                        <span class="activity-article--category"><?=  $news_channel ?></span>
                        <img loading="lazy" width="300" height="300" src="<?= $news_image ?>"
                             alt="<? $news_title ?> - <?= bloginfo('name') ?>">
                    </figure>
                <? endif; ?>
                <div class="activity-article--content">
                    <? if ($news_date): ?>
                        <span class="activity-article--date"><?= $news_date ?></span>
                    <? endif; ?>
                    <h3 class="activity-article--title"><?= $news_title ?></h3>
                    <span class="button-arrowed">
                            Lees artikel
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


    ?>
</section>
