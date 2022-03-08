<?php

/**
 * Products template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


?>
    <section id="partners" class="partner-slider">
        <h3 class="partner-slider--title">Backed by</h3>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?
                $partner_images = get_field('partners');
                foreach( $partner_images as $partner_image ):
                    ?>
                    <div class="swiper-slide">
                        <div class="partner-slide">
                            <a class="partner-slide--visual" href="<?= $partner_image['caption'] ?>" target="_blank" rel="noreferrer">
                                <img loading="lazy" width="150" height="50" src="<?= esc_url($partner_image['url']) ?>"
                                     alt="<?= esc_attr($partner_image['alt']) ?>">
                            </a>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? if (!$is_preview): ?>
    <script>
        var swiper = new Swiper('.partner-slider .swiper-container', {
            speed: 1000,
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                },
            },
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>
<? endif; ?>