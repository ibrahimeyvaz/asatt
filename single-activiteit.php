<?php
get_header();

$startdate = get_field('event_start_date');
$enddate = get_field('event_end_date');
$locality = get_field('fysiek_of_online');
$location = get_field('adres');
$categories = get_the_category();
$category_name = $categories[0]->name;

if ($location):
    $address = $location['street_name'].' '.$location['street_number'].', '.$location['post_code'].' '.$location['city'];
    $address_url = 'https://www.google.com/maps/search/?api=1&query='.$location['street_name'].'+'.$location['street_number'].'+'.$location['post_code'].'+'.$location['city'];
endif;

include locate_template('includes/globals.php', false, true); ?>

<section class="hero hero-page">
    <div class="hero-inner">
        <figure class="hero-visual">
            <img src="<?= $page_visual ?>" alt="<? the_title() ?>"><
        </figure>
        <div class="hero-content">
            <strong class="hero-content--tagline"><?= bloginfo('description') ?></strong>
            <h1 class="hero-content--headline">
                <? the_title() ?>
            </h1>
            <div class="hero-content--activity">
                <span class="activity-category"><?= $category_name ?></span>
                <span class="activity-date"><?= date('d/m/Y - H.i', strtotime($startdate)) ?></span>
                <? if ($locality === true): ?>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="<?= $address_url ?>" target="_blank" rel="noreferrer">
                        <?= $address ?>
                    </a>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
<main class="main-wrapper">
    <div class="row">
        <? if ($locality === true): ?>
            <script>
                function initMap() {
                    var styledMap = [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#444444"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 45
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#2567ce"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ];

                    var icon = {
                        url: '<?= get_template_directory_uri() ?>/images/marker.svg',
                        anchor: new google.maps.Point(50, 50),
                        size: new google.maps.Size(50, 50),

                    };

                    var myLatLng = {lat: <?= esc_attr($location['lat']) ?>, lng: <?= esc_attr($location['lng']) ?>};

                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: myLatLng,
                        styles: styledMap,
                        mapTypeControl: false
                    });

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: icon,
                        title: '<?= bloginfo('name') ?>'
                    });


                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3nCLZ7ZGxUrmhaI84EfrQTEIecJ_7svI&callback=initMap&language=nl"></script>
            <figure id="map"
                    class="activity-map" <?php if ($is_preview): ?> style="margin-left:0;width:100%; height: 500px" <? endif ?>></figure>
        <? endif; ?>
        <article class="col-xl-7">
            <? the_content() ?>
        </article>
        <aside class="col-xl-5">
            <?= do_shortcode('[ninja_form id=3]	') ?>
        </aside>
    </div>

</main>

<? get_footer(); ?>
