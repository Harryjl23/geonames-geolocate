<?php

$url='http://api.geonames.org/wikipediaSearchJSON?formatted=true&q=' . $_REQUEST['place'] . '&maxRows=3&username=harryjl23&style=full';
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$json_result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($json_result,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "completed";
	$output['data'] = $decode['geonames'];
	
	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($output); 

?>