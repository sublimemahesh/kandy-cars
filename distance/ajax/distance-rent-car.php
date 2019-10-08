<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');

if ($_POST['action'] == 'OFFICE_PRICE') {
    $price = 0;
    $total_price = 0;
    $payment = 0;

    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $charge = $PRODUCT_TYPE->charge;
    $TAX = new Tax(1);

    $price += $charge;
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
    
    $distance_price = $distance * $extra_per_km;
    $price = $distance_price;
    $price += $driver_charge;
    $price += $charge;
    $deliver_charge = $distance_price + $driver_charge;
    $tax = ($price / 100) * $TAX->tax;
    $total_price += $price + $tax;

    $payment = $total_price;


    if ($total_price) {

        $data_res = array(
            "status" => TRUE,
            "distance" => $distance,
            "ex_per_km" => number_format($extra_per_km, 2),
            "distance_price" => number_format($distance_price, 2),
            "charge" => number_format($charge, 2),
            "deliver_charge" => number_format($deliver_charge, 2),
            "price" => number_format($price, 2),
            "tax" => number_format($tax, 2),
            "total_price" => number_format($total_price, 2),
            "payment" => $payment,
            "driver_charge" => number_format($driver_charge, 2)
        );

        echo json_encode($data_res);
    }
}

if ($_POST['action'] == 'DISTANCE_DROP_HOME_DELIVERY') {
    $price = 0;
    $total_price = 0;
    $distance = 0;
    $payment = 0;

    $TAX = new Tax(1);
    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;
    $driver_charge = $PRODUCT_TYPE->driver_charge;

    $office = $_POST['office'];
    $destination = $_POST['destination'];

    $from = str_replace(" ", "+", $office);
    $to = str_replace(" ", "+", $destination);

    $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

    $string = file_get_contents($url);


    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);
    $distance = $data['rows'][0]['elements'][0]['distance']['text'];

    $distance_price = $distance * $extra_per_km;
    $price = $distance_price;
    $price += $driver_charge;
    $price += $charge;
    $tax = ($price / 100) * $TAX->tax;
    $total_price += $price + $tax;
    $deliver_charge = $distance_price + $driver_charge;

    $payment = $total_price;

    if ($distance) {

        $data_res = array(
            "status" => TRUE,
            "distance" => $distance,
            "ex_per_km" => number_format($extra_per_km, 2),
            "distance_price" => number_format($distance_price, 2),
            "charge" => number_format($charge, 2),
            "deliver_charge" => number_format($deliver_charge, 2),
            "price" => number_format($price, 2),
            "tax" => number_format($tax, 2),
            "total_price" => number_format($total_price, 2),
            "payment" => $payment,
            "driver_charge" => number_format($driver_charge, 2)
        );

        echo json_encode($data_res);
    }
}

if ($_POST['action'] == 'DISTANCE_PICK_UP_DROP_HOME_DELIVERY') {

    $price = 0;
    $total_price = 0;
    $distance = 0;
    $payment = 0;


    $TAX = new Tax(1);
    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $extra_per_km = $PRODUCT_TYPE->ex_per_km;
    $charge = $PRODUCT_TYPE->charge;
    $driver_charge = $PRODUCT_TYPE->driver_charge;

    $office = $_POST['office'];
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];
   
    if ($destination == " ") {
         
    } else {
        $from = str_replace(" ", "+", $office);
        $to = str_replace(" ", "+", $pickup);

        $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

        $string = file_get_contents($url);


        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $distance_pick_up = $data['rows'][0]['elements'][0]['distance']['text'];

        $from = str_replace(" ", "+", $office);
        $to = str_replace(" ", "+", $destination);

        $apiKey = "AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $from . "&destinations=" . $to . "&key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc";

        $string = file_get_contents($url);


        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $distance_drop = $data['rows'][0]['elements'][0]['distance']['text'];


        $distance = $distance_pick_up + $distance_drop;       
        $distance_price = $distance * $extra_per_km;
        $driver_charge = $driver_charge + $driver_charge;


        $price = $distance_price;
        $price += $driver_charge;
        $price += $charge;
        $tax = ($price / 100) * $TAX->tax;
        $total_price += $price + $tax;
        $payment = $total_price;


        $deliver_charge = $distance_price + $driver_charge;
        if ($distance_price) {

            $data_res = array(
                "status" => TRUE,
                "distance" => $distance,
                "tax" => number_format($tax, 2),
                "total_price" => number_format($total_price, 2),
                "payment" => $payment,
                "ex_per_km" => number_format($extra_per_km, 2),
                "distance_price" => number_format($distance_price, 2),
                "charge" => number_format($charge, 2),
                "price" => number_format($price, 2),
                "deliver_charge" => number_format($deliver_charge, 2),
                "driver_charge" => number_format($driver_charge, 2)
            );

            echo json_encode($data_res);
        }
    }
}

if ($_POST['action'] == 'GETTHEPACKAGEBYID') {

    $PRODUCT_TYPE = new Package($_POST['package_id']);
    $result = $PRODUCT_TYPE->getPackagesById($_POST["package_id"]);
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}