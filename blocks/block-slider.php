<?

$images = get_field('galerij');

?>
<div class="gallery-wrapper gallery-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <? foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt']; ?>"/>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper(".gallery-wrapper .swiper-container", {
        speed: 1000,
        effect: "fade",
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
    });
</script>
