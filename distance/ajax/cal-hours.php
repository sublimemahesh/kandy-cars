<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');

if ($_POST['action'] == 'CALHOURS') {

    $package_id = $_POST['packageId'];
    $vehicle_id = $_POST['vehicle_id'];

    $pick_up_date_time = strtotime($_POST['pick_up_date_time']);
    $drop_date_time = strtotime($_POST['drop_date_time']);
    $diff = abs($pick_up_date_time - $drop_date_time);
    $hours = $diff / ( 60 * 60 );

    $PACKAGE = new Package($package_id);
    $result = $PACKAGE->CheckPackageHours($hours);

    if ($result) {

        $res = $PACKAGE->getNextPackageByVehicle($vehicle_id, $hours);
        dd($res);
        $result = array("status" => TRUE,);
        echo json_encode($result);
    }
}


