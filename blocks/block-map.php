<? include locate_template( 'includes/globals.php', false, false );  ?>
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
                        "color": "#3A64AF"
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
            size: new google.maps.Size(50,50),

        };

        var myLatLng = {lat: <?= $latitude ?>, lng: <?= $longitude ?>};

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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3nCLZ7ZGxUrmhaI84EfrQTEIecJ_7svI&callback=initMap&language=nl"></script>
<figure id="map" <?php if($is_preview): ?> style="margin-left:0;width:100%; height: 500px" <? endif ?>></figure>

