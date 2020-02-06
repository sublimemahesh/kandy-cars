<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');

 
$pickup = $_POST['pickup'];
$destination = $_POST['destination'];


$from = str_replace(" ", "+", $pickup);
$to = str_replace(" ", "+", $destination);

$apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

$url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

$string = file_get_contents($url);



$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$distance = $data['rows'][0]['elements'][0]['distance']['text'];
$distance_numbers = strtok($distance,' ');

if ($distance) {

    $d = array("status" => TRUE, "distance" => $distance, "distance_numbers" =>$distance_numbers);

    echo json_encode($d);
}
 
