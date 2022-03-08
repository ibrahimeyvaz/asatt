<?php
$image_slider = get_field('image_slider');
if( $image_slider ): ?>
    <div class="swiper swiper-container swiper-image--slider">
        <div class="swiper-wrapper">
            <? foreach( $image_slider as $image_slide ): ?>
                    <a data-fancybox="gallery" class="swiper-slide image-slider--item" href="<?= esc_url($image_slide['url']); ?>">
                        <img width="800" height="800" loading="lazy" src="<?= esc_url($image_slide['sizes']['square']); ?>" alt="<?= esc_attr($image_slide['alt']); ?>">
                    </a>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>
<script>
    var swiper = new Swiper(".swiper-image--slider", {
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1800: {
                slidesPerView: 5,
                spaceBetween: 30,
            },
        },
        loop: true,
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
