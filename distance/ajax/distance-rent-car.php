<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');



$PRODUCT_TYPE = new Package($_POST['package_id']);
$km = $PRODUCT_TYPE->km;
$extra_per_km = $PRODUCT_TYPE->ex_per_km;
$charge = $PRODUCT_TYPE->charge;

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



if ($distance > $km) {
    $diff_km = $distance - $km;
    $price = $charge + ($diff_km * $extra_per_km);
} else {
    $price = $charge;
} 

if ($distance) {

    $d = array("status" => TRUE, "distance" => $distance, "price" => number_format($price, 2));

    echo json_encode($d);
}
 
