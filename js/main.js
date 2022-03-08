jQuery(function ($) {

    const singleImage = $('.wp-block-image');
    const galleryImage = $('.blocks-gallery-item');
    const navigationTrigger = document.querySelector(".navigation-trigger");
    const navigationWrapper = document.querySelector(".side-navigation");
    const navigationLink = $(navigationWrapper).find('.menu-item a');
    const html = document.querySelector("html");
    const backDrop = document.querySelector(".backdrop");



    const siteHeader = $('.main-header');
    const siteNav = $('.main-navigation');

    dataUrl = siteHeader.data("url");
    dataSite = siteHeader.data("site");

    brand = '<a href="' + dataUrl + '">' + dataSite + '</a>';

    $('.mobile-menu').slicknav({
        brand: brand,
        label: '',
        allowParentLinks: true
    });


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