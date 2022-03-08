<?php

/**
 * Services template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


?>
<section class="persons">
    <ul class="person-list">
        <? while (have_rows('person')) : the_row();
            $person_name = get_sub_field('person_name');
            $person_image = get_sub_field('person_image');
            $person_job = get_sub_field('person_job');
            $person_linkedin = get_sub_field('person_linkedin');
            ?>
            <li class="person-item">
                <figure class="person-item--visual">
                    <img loading="lazy" width="150" height="150" src="<?= esc_url($person_image['url']) ?>"
                         alt="<?= $person_name ?> @ <?= bloginfo('description') ?>">
                </figure>
                <div class="person-item--detail">
                    <h3 class="person-item--name">
                        <?= $person_name ?>
                    </h3>
                    <? if($person_job): ?>
                    <div class="person-item--job">
                        <?= $person_job ?>
                    </div>
                    <? endif; ?>
                    <? if($person_linkedin): ?>
                    <div class="person-item--social">
                        <a href="<?= $person_linkedin ?>" target="_blank" rel="noreferrer">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                    <? endif; ?>
                </div>
            </li>
        <? endwhile; ?>

    </ul>
    <? while (have_rows('person')) : the_row();
        $person_name = get_sub_field('person_name');
        $person_image = get_sub_field('person_image');
        $person_job = get_sub_field('person_job');
        ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Person",
                "name": "<?= $person_name ?>",
                "image": "<?= esc_url($person_image['url']) ?>",
                "jobTitle": "<?= $person_job ?>"
            }
        </script>
    <? endwhile; ?>
</section>
