<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');

if ($_POST['action'] == 'OFFICE_PRICE') {
    $price = 0;
    $total_price = 0;
    $payment = 0;
    $decoration = 0;

    $decoration = $_POST['dec_price'];
    $deliver_charge = $_POST['deliver_charge'];
    $extra_charge = $_POST['extra_price'];


    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $charge = $PRODUCT_TYPE->charge;
    $TAX = new Tax(1);

    $price += $charge + $decoration + $deliver_charge + $extra_charge;
    $tax = ($price / 100) * $TAX->tax;
    $total_price += $price + $tax;
    $payment = $total_price;
    if ($price) {

        $data_res = array(
            "status" => TRUE,
            "tax" => number_format($tax, 2),
            "price" => number_format($price, 2),
            "total_price" => number_format($total_price, 2),
            "payment" => $payment,
        );

        echo json_encode($data_res);
    }
}

if ($_POST['action'] == 'EXTRA_KM_PRICE') {

    $PRODUCT_TYPE = new Package($_POST['package_id']);

    $extra_distance = $_POST['extra_km'];
    $ex_km_charge = $PRODUCT_TYPE->ex_per_km;

    $extra_price = $extra_distance * $ex_km_charge;

    if ($extra_price) {
        $data_res = array(
            "status" => TRUE,
            "extra_price_string" => number_format($extra_price, 2),
            "extra_price" => $extra_price,
        );
        echo json_encode($data_res);
    }
}
if ($_POST['action'] == 'DISTANCE_BY_HOME_DELIVERY') {
    $price = 0;
    $total_price = 0;
    $distance = 0;
    $distance_price = 0;
    $payment = 0;

    $TAX = new Tax(1);
    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;
    $driver_charge = $PRODUCT_TYPE->driver_charge;


    $office = $_POST['office'];
    $pickup = $_POST['pickup'];

    $from = str_replace(" ", "+", $office);
    $to = str_replace(" ", "+", $pickup);

    $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);
    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance = $data['rows'][0]['elements'][0]['distance']['text'];
    $distance_numbers = strtok($distance, ' ');

    $distance_price = $distance_numbers * $extra_per_km;
    $price = $distance_price;
    $price += $driver_charge;
    $price += $charge;
    $deliver_charge = $distance_price + $driver_charge;
//    $tax = ($price / 100) * $TAX->tax;
//    $total_price += $price + $tax;
//
//    $payment = $total_price;


    if ($deliver_charge) {

        $data_res = array(
            "status" => TRUE,
            "distance" => $distance,
            "distance_numbers" => $distance_numbers,
            "ex_per_km" => number_format($extra_per_km, 2),
            "distance_price" => number_format($distance_price, 2),
            "charge" => number_format($charge, 2),
            "deliver_charge" => number_format($deliver_charge, 2),
            "price" => number_format($price, 2),
            "deliver_charge_number" => $deliver_charge,
            "driver_charge" => number_format($driver_charge, 2)
        );

        echo json_encode($data_res);
    }
}