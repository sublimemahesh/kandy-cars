<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');



if ($_POST['option'] == 'delete') {

    $SUB_SERVICE = new SubService($_POST['id']);
 

    $result = $SUB_SERVICE->delete();


    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}