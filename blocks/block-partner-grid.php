<?php

/**
 * Partners Grid template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


?>
<section class="partner-grid">
    <?
    $partner_images = get_field('partners');
    foreach ($partner_images as $partner_image):
        ?>
        <div class="partner-grid--block">
            <a class="grid-block--link" href="<?= $partner_image['caption'] ?>" target="_blank" rel="noreferrer">
                <img loading="lazy" class="grid-block--visual" src="<?= esc_url($partner_image['url']) ?>"
                     alt="<?= esc_attr($partner_image['alt']) ?>"/>
            </a>
        </div>
    <? endforeach; ?>
</section>