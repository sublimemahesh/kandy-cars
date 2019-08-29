<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');

if ($_POST['action'] == 'CALLPRICEFROMOFFICE') {

    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $km = $PRODUCT_TYPE->km;
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;

    $office = $_POST['office'];

//$pickup = $_POST['pickup'];
    $destination = $_POST['destination'];


    $from = str_replace(" ", "+", $office);
    $to = str_replace(" ", "+", $destination);

    $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);



    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance = $data['rows'][0]['elements'][0]['distance']['text'];

    $distance_all_km = 2 * ($distance);

    if ($distance_all_km > $km) {
        $diff_km = $distance_all_km - $km;
        $price = $charge + ($diff_km * $extra_per_km);
    } else {
        $price = $charge;
    }

    if ($distance) {

        $data_res = array("status" => TRUE, "distance_all" => $distance_all_km, "distance" => $distance, "ex_km" => $diff_km, "ex_per_km" => number_format($extra_per_km, 2), "charge" => $charge, "price" => number_format($price, 2));

        echo json_encode($data_res);
    }
}


if ($_POST['action'] == 'CALLPRICEFROMHOMEDELIVER') {

    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $km = $PRODUCT_TYPE->km;
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;

    $office = $_POST['office'];
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];


    $from = str_replace(" ", "+", $office);
    $location = str_replace(" ", "+", $pickup);
    $to = str_replace(" ", "+", $destination);

    $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $location . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance_office = $data['rows'][0]['elements'][0]['distance']['text'];

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $location . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance_drop = $data['rows'][0]['elements'][0]['distance']['text'];

    dd($distance_drop);
    $distance_all_km = 2 * ($distance);

    if ($distance_all_km > $km) {
        $diff_km = $distance_all_km - $km;
        $price = $charge + ($diff_km * $extra_per_km);
    } else {
        $price = $charge;
    }

    if ($distance) {

        $data_res = array("status" => TRUE, "distance_all" => $distance_all_km, "distance" => $distance, "ex_km" => $diff_km, "ex_per_km" => number_format($extra_per_km, 2), "charge" => $charge, "price" => number_format($price, 2));

        echo json_encode($data_res);
    }
}

if ($_POST['action'] == 'CALLPRICEFROMDROPVEHICLE') {

    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $km = $PRODUCT_TYPE->km;
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;

    $office = $_POST['office'];
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];
    $drop_vehivle_location = $_POST['drop_vehivle_location'];
     
    $from = str_replace(" ", "+", $office);
    $location = str_replace(" ", "+", $pickup);
    $to = str_replace(" ", "+", $destination);
    $drop_location = str_replace(" ", "+", $drop_vehivle_location);



    $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $location . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance_office = $data['rows'][0]['elements'][0]['distance']['text'];

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $location . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance_drop = $data['rows'][0]['elements'][0]['distance']['text'];

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $to . "&destinations=" . $drop_location . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);

    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance_vehicle = $data['rows'][0]['elements'][0]['distance']['text'];


    $distance = $distance_office + $distance_drop + $distance_vehicle;

    $distance_all_km = 2 * ($distance);

    if ($distance_all_km > $km) {
        $diff_km = $distance_all_km - $km;
        $price = $charge + ($diff_km * $extra_per_km);
    } else {
        $price = $charge;
    }

    if ($distance) {

        $data_res = array("status" => TRUE, "distance_all" => $distance_all_km, "distance" => $distance, "ex_km" => $diff_km, "ex_per_km" => number_format($extra_per_km, 2), "charge" => $charge, "price" => number_format($price, 2));

        echo json_encode($data_res);
    }
}
