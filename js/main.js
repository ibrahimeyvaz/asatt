jQuery(function ($) {

    const singleImage = $('.wp-block-image');
    const galleryImage = $('.blocks-gallery-item');
    const navigationTrigger = document.querySelector(".navigation-trigger");
    const navigationWrapper = document.querySelector(".side-navigation");
    const navigationLink = $(navigationWrapper).find('.menu-item a');
    const html = document.querySelector("html");
    const backDrop = document.querySelector(".backdrop");



    $('.cn-more-info').removeClass('button');

    var options = {
        strings: ['ASATT', 'A Seat At The Table', 'Bring your folding chair'],
        typeSpeed: 100,
        loop: true
    };

    var typed = new Typed('.typewriter--text', options);

    singleImage.find('a').add(galleryImage.find('a')).attr({
        'data-fancybox': 'asatt',
        'aria-label': 'Open afbeelding',
        'title': 'Open afbeelding'
    });

    singleImage.find('a').add(galleryImage.find('a')).fancybox({
        protect: true,
        buttons: [
            "zoom",
            "fullScreen",
            "close",
        ],
        lang: "nl-nl",
        i18n: {
            en: {
                CLOSE: "Sluiten",
                NEXT: "Volgende",
                PREV: "Vorige",
                ERROR: "The requested content cannot be loaded. <br/> Please try again later.",
                PLAY_START: "Start slideshow",
                PLAY_STOP: "Pause slideshow",
                FULL_SCREEN: "Volledige scherm",
                THUMBS: "Thumbnails",
                DOWNLOAD: "Download",
                ZOOM: "Zoom"
            },
        },
    });

    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        gsap.to(".hero:not(.hero-page) .hero-visual img", {filter: 'grayscale(100%)', repeat: -1, yoyo: true, duration: 2});
        singleImage.paroller({
            factor: 0.045,            // multiplier for scrolling speed and offset
            factorXs: 2,           // multiplier for scrolling speed and offset
            type: 'foreground',     // background, foreground
            direction: 'vertical', // vertical, horizontal
        })

    }



    navigationTrigger.addEventListener("click", function () {
        if (!navigationWrapper.classList.contains("active")) {
            TweenMax.to(navigationWrapper, {autoAlpha: 1, display: 'block'})
            navigationWrapper.classList.add("active");
            navigationTrigger.classList.add("active");
            html.classList.add("no-scroll");


        } else {
            TweenMax.to(navigationWrapper, {autoAlpha: 0, display: 'none'});
            navigationWrapper.classList.remove("active");
            html.classList.remove("no-scroll");
            navigationTrigger.classList.remove("active");
        }
    });
});