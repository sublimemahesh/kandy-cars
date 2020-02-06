<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
header('Content-type: application/json');
session_start();
if ($_POST['option'] == 'PAY') {
    if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {

        $result = ["status" => 'error'];
        echo json_encode($result);
        exit();
    } else {
       
        date_default_timezone_set('Asia/Colombo');
        $orderedAt = date('Y-m-d H:i:s');

        $ORDER = new Order(NULL);
        $ORDER->orderedAt = $orderedAt;
        $ORDER->firstName = $_POST["fname"];
        $ORDER->lastName = $_POST["lname"];
        $ORDER->email = $_POST["email"];
        $ORDER->phoneNumber = $_POST["phone"];
        $ORDER->address = $_POST["address"];
        $ORDER->city = $_POST["city"];
        $ORDER->country = $_POST["country"];
        $ORDER->postalCode = $_POST["postal_code"];
        $ORDER->package = $_POST["package_id"];
        $ORDER->price_summery = $_POST["price_summery"];
        $ORDER->amount = $_POST["amount"];
        $ORDER->status = '0';

        $result = $ORDER->create();
        

        $result = ["status" => 'success'];
        echo json_encode($result);
        exit();
    }
}
