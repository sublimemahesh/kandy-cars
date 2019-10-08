<?php

include_once(dirname(__FILE__) . '/../class/include.php');

$merchant_id = $_POST['merchant_id'];
$order_id = $_POST['order_id'];
$payhere_amount = $_POST['payhere_amount'];
$payhere_currency = $_POST['payhere_currency'];
$status_code = $_POST['status_code'];
$md5sig = $_POST['md5sig'];

$merchant_secret = '44a78a415672d2c3767bde90efa97e29'; // Live Merchant Secret (Can be found on your PayHere account's Settings page)
// $merchant_secret = '121302112130211213021'; // Sandbox Merchant Secret

$local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));
 
$ORDER = new Order($order_id);
if (($local_md5sig === $md5sig) AND ($status_code == 2)) {
     
    $ORDER->paymentStatusCode = $status_code;
    $ORDER->status = 1;
    $result = $ORDER->updatePaymentStatusCodeAndStatus();

    if ($result) {
        $ORD = new Order($order_id);
        $res = $ORD->sendOrderMail();
        $res1 = $ORD->sendOrderMailToAdmin();
    }
} else {
    $ORDER->deleteOrder();
}
?>