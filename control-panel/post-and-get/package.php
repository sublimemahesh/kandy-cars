<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PACKAGE = new Package(NULL);
    $VALID = new Validator(); 

    $PACKAGE->vehicle = $_POST['vehicle'];
    $PACKAGE->title = $_POST['title'];
    $PACKAGE->short_description = $_POST['short_description'];
    $PACKAGE->dates = $_POST['dates'];
    $PACKAGE->km = $_POST['km'];
    $PACKAGE->charge = $_POST['charge']; 
    $PACKAGE->driver_charge = $_POST['driver_charge']; 
    $PACKAGE->ex_per_km = $_POST['ex_per_km'];

    $dir_dest = '../../upload/packages/';

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

    $PACKAGE->image_name = $imgName;

    $VALID->check($PACKAGE, [
        'title' => ['required' => TRUE],
        'short_description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $PACKAGE->create();

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
    $dir_dest = '../../upload/packages/';

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

    $PACKAGE = new Package($_POST['id']);
    
    $PACKAGE->image_name = $_POST['oldImageName'];
    $PACKAGE->title = $_POST['title'];
    $PACKAGE->short_description = $_POST['short_description'];
    $PACKAGE->dates = $_POST['dates'];
    $PACKAGE->km = $_POST['km'];
    $PACKAGE->charge = $_POST['charge'];
    $PACKAGE->driver_charge = $_POST['driver_charge'];
    
    $PACKAGE->ex_per_km = $_POST['ex_per_km'];

    $VALID = new Validator();
    $VALID->check($PACKAGE, [
        'title' => ['required' => TRUE],
        'short_description' => ['required' => TRUE],      
        'ex_per_km' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $PACKAGE->update();

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

        $PACKAGE = Package::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}    