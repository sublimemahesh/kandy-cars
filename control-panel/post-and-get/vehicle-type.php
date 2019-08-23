<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $VEHICLE_TYPE = new VehicleType(NULL);
    $VALID = new Validator();

    $VEHICLE_TYPE->name = $_POST['name']; 

    $dir_dest = '../../upload/vehicle_type/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 370;
        $handle->image_y = 210;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $VEHICLE_TYPE->image_name = $imgName;

    $VALID->check($VEHICLE_TYPE, [
        'name' => ['required' => TRUE], 
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $VEHICLE_TYPE->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/vehicle_type/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 370;
        $handle->image_y = 210;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $VEHICLE_TYPE = new VehicleType($_POST['id']);

    $VEHICLE_TYPE->image_name = $_POST['oldImageName'];
    $VEHICLE_TYPE->name = $_POST['name'];


    $VALID = new Validator();
    $VALID->check($VEHICLE_TYPE, [
        'name' => ['required' => TRUE], 
        'image_name' => ['required' => TRUE]
    ]);


    if ($VALID->passed()) {
        $VEHICLE_TYPE->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
}
if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $VEHICLE_TYPE = VehicleType::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}