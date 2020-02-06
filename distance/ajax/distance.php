<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


header('Content-type: application/json');

dd($_POST['packageId']);
$PRODUCT_TYPE = new Package($_POST['packageId']);

////price
$base_price_val = $VEHICLE_TYPE->base_price;
$price_per_km_val = $VEHICLE_TYPE->price_per_km;


//location
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
//echo $string;
//price calculate
$price = $base_price_val + ($price_per_km_val * ($distance - 1));


if ($distance) {

    $d = array("status" => TRUE, "distance" => $distance, "price" => $price);

    echo json_encode($d);
}