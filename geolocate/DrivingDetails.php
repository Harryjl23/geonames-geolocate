<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('openCage/AbstractGeocoder.php');
include('openCage/Geocoder.php');

// Driving Details
$geocoder = new \OpenCage\Geocoder\Geocoder('b67d389c882342deb045f34b3d719de8');

$result = $geocoder->geocode($_REQUEST['q'],['limit' => $_REQUEST['limit']]);

$searchResult = [];
$searchResult['results'] = [];

$temp = [];

foreach ($result['results'] as $entry) {

  $temp['source'] = 'opencage';
  $temp['formatted'] = $entry['formatted'];
  $temp['drive_on'] = $entry['annotations']['roadinfo']['drive_on'];
  $temp['speed_in'] = $entry['annotations']['roadinfo']['speed_in'];

//  push results into array
  array_push($searchResult['results'], $temp);

}

header('Content-Type: application/json; charset=UTF-8');
// Return JSON
echo json_encode($searchResult, JSON_UNESCAPED_UNICODE);
?>



