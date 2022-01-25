<?php
get_header();

$location = get_field('address_opportunity');
$contract_type = get_field('contracttype');
$contract_term = get_field('contractduur');
$contract_hours = get_field('uren');

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
        <div class="hero-content hero-content--opportunity">
            <strong class="hero-content--tagline"><?= bloginfo('description') ?></strong>
            <h1 class="hero-content--headline">
                <? the_title() ?>
            </h1>
            <div class="hero-content--activity">
                <ul class="opportunity-list">
                    <li>
                        <i class="fa-regular fa-memo-circle-check"></i>
                        <?= $contract_type ?>
                    </li>
                    <li>
                        <i class="fa-regular fa-calendar-clock"></i>
                        <?= $contract_term ?>
                    </li>
                    <li>
                        <i class="fa-regular fa-clock-rotate-left"></i>
                        <?= $contract_hours ?>
                    </li>
                    <li>
                        <i class="fa-regular fa-building"></i>
                        <a href="<?= $address_url ?>" target="_blank" rel="noreferrer">
                            <?= $address ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<main class="main-wrapper">
    <div class="row">
        <? if ($address): ?>
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
        <article>
            <? the_content() ?>
        </article>
    </div>

</main>

<? get_footer(); ?>
