<?

/** @var string $facebook */
/** @var string $instagram */
/** @var string $twitter */
/** @var string $google */
/** @var string $linkedin */
/** @var string $youtube */
/** @var string $fixedline */
/** @var string $street */
/** @var string $zipcode */
/** @var string $city */
/** @var string $email */
/** @var int $facilities_index */
/** @var int $halls_index */
/** @var int $offices_index */
/** @var int $meetingrooms_index */
/** @var int $news_index */
/** @var int $occasions_index */
/** @var int $chat_link */
/** @var string $schema_logo */
/** @var string $browser */
/** @var string $not_supported */

$street    = get_field( 'adres_global', 'option' );
$zipcode   = get_field( 'postcode', 'option' );
$city      = get_field( 'stad', 'option' );
$phone     = get_field( 'telefoonnummer', 'option' );
$fixedline = get_field( 'vaste_lijn', 'option' );
$email     = get_field( 'email-client', 'option' );
$vat       = get_field( 'vat_id', 'option' );
$facebook  = get_field( 'facebook', 'option' );
$instagram = get_field( 'instagram', 'option' );
$twitter   = get_field( 'twitter', 'option' );
$google    = get_field( 'google_business', 'option' );
$linkedin  = get_field( 'linkedin', 'option' );
$youtube   = get_field( 'youtube', 'option' );
$hours   = get_field( 'openingsuren', 'option' );
$latitude   = get_field( 'latitude', 'option' );
$longitude   = get_field( 'longitude', 'option' );

$phoneLink = str_replace( ' ', '', $phone );
$phoneLink = str_replace( '+', '', $phoneLink );


$agent= $_SERVER['HTTP_USER_AGENT'];
$browser=  strtolower(get_browser_name($agent));
$browser = str_replace(' ', '_', $browser);
$not_supported = array('edge', 'internet_explorer');