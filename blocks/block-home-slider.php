<section class="home-slider swiper swiper-container">
    <div class="swiper-wrapper">
        <? while( have_rows('slider_item') ) : the_row();
            $slider_image = get_sub_field('slider_image', get_the_ID());
            $slider_title = get_sub_field('slider_title', get_the_ID());
            $slider_content = get_sub_field('slider_content', get_the_ID());
            $slider_link = get_sub_field('slider_link', get_the_ID());
        ?>
        <div class="swiper-slide">
            <div class="home-slider-item">
                <figure class="slider-item--image">
                    <img loading="lazy" width="1920" height="1080" src="<?= $slider_image['url'] ?>" alt="<?= $slider_title ?>">
                </figure>
                <div class="slider-item--content">
                    <h2 class="item-content--title">
                        <?= $slider_title ?>
                    </h2>
                    <div class="item-content--text">
                        <?= $slider_content ?>
                        <? if($slider_link): ?>
                            <a href="<?= $slider_link ?>" class="button-arrowed">
                                Verder lezen
                                <svg class="arrow-icon" width="32" height="32" viewBox="0 0 32 32">
                                    <g fill="none" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"
                                       stroke-miterlimit="10">
                                        <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                        <path class="arrow-icon--arrow"
                                              d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                    </g>
                                </svg>
                            </a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <? endwhile; ?>
    </div>
    <div class="swiper-pagination"></div>
</section>
<script>
    var swiper = new Swiper(".home-slider", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 0,
        speed: 1250,
        allowTouchMove: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
    });
</script>