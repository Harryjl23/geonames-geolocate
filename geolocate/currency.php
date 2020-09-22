<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('./openCage/AbstractGeocoder.php');
include('./openCage/Geocoder.php');

// Currency Details
$geocoder = new \OpenCage\Geocoder\Geocoder('b67d389c882342deb045f34b3d719de8');

$result = $geocoder->geocode($_REQUEST['q'],['limit' => $_REQUEST['limit']]);

$searchResult = [];
$searchResult['results'] = [];

$temp = [];

foreach ($result['results'] as $entry) {

  $temp['source'] = 'opencage';
  $temp['formatted'] = $entry['formatted'];
  $temp['name'] = $entry['annotations']['currency']['name'];
  $temp['subunit'] = $entry['annotations']['currency']['subunit'];
  $temp['subunit_to_unit'] = $entry['annotations']['currency']['subunit_to_unit'];
  $temp['symbol'] = $entry['annotations']['currency']['symbol'];

//  push results into array
  array_push($searchResult['results'], $temp);

}

header('Content-Type: application/json; charset=UTF-8');
// Return JSON
echo json_encode($searchResult, JSON_UNESCAPED_UNICODE);
?>

