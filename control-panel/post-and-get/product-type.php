<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PRODUCT_TYPE = new ProductType(NULL);
    $VALID = new Validator();

    $PRODUCT_TYPE->name = $_POST['name'];
    $PRODUCT_TYPE->type = $_POST['type'];
    $PRODUCT_TYPE->sd_charge_per_day = $_POST['sd_charge_per_day'];
    $PRODUCT_TYPE->sd_mileage_limit = $_POST['sd_mileage_limit'];
    $PRODUCT_TYPE->sd_excess_mileage = $_POST['sd_excess_mileage'];
    $PRODUCT_TYPE->sd_delayed_hour = $_POST['sd_delayed_hour'];

    $PRODUCT_TYPE->wd_mileage = $_POST['wd_mileage'];
    $PRODUCT_TYPE->wd_charge = $_POST['wd_charge'];
    $PRODUCT_TYPE->wd_duration = $_POST['wd_duration'];
    $PRODUCT_TYPE->wd_excess_mileage = $_POST['wd_excess_mileage'];
    $PRODUCT_TYPE->wd_waiting_hour = $_POST['wd_waiting_hour'];

    $PRODUCT_TYPE->wedd_mileage = $_POST['wedd_mileage'];
    $PRODUCT_TYPE->weed_charge = $_POST['weed_charge'];
    $PRODUCT_TYPE->weed_duration = $_POST['weed_duration'];
    $PRODUCT_TYPE->weed_excess_mileage = $_POST['weed_excess_mileage'];
    $PRODUCT_TYPE->weed_waiting_hour = $_POST['weed_waiting_hour'];
    $PRODUCT_TYPE->weed_decoration = $_POST['weed_decoration'];

    $PRODUCT_TYPE->parade_mileage = $_POST['parade_mileage'];
    $PRODUCT_TYPE->parade_charge = $_POST['parade_charge'];
    $PRODUCT_TYPE->parade_duration = $_POST['parade_duration'];
    $PRODUCT_TYPE->parade_excess_mileage = $_POST['parade_excess_mileage'];
    $PRODUCT_TYPE->parade_waiting_hour = $_POST['parade_waiting_hour'];
    $PRODUCT_TYPE->parade_decoration = $_POST['parade_decoration'];



//    $PRODUCT_TYPE->rate_per_day = $_POST['rate_per_day'];
////    $PRODUCT_TYPE->excess_mileage = $_POST['excess_mileage'];
////    $PRODUCT_TYPE->short_description = $_POST['short_description'];
////    $PRODUCT_TYPE->description = $_POST['description'];

    $dir_dest = '../../upload/product-type/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 900;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $PRODUCT_TYPE->image_name = $imgName;


    $dir_dest1 = '../../upload/product-type/thumb/';

    $handle1 = new Upload($_FILES['image']);

    $imgName1 = null;

    if ($handle1->uploaded) {
        $handle1->image_resize = true;
        $handle1->file_new_name_ext = 'jpg';
        $handle1->image_ratio_crop = 'C';
        $handle1->file_new_name_body = Helper::randamId();
        $handle1->image_x = 100;
        $handle1->image_y = 100;

        $handle1->Process($dir_dest1);

        if ($handle1->processed) {
            $info = getimagesize($handle1->file_dst_pathname);
            $imgName1 = $handle1->file_dst_name;
        }
    }

    $PRODUCT_TYPE->image_name = $imgName;


    $VALID->check($PRODUCT_TYPE, [
        'name' => ['required' => TRUE],
//          'rate_per_day' => ['required' => TRUE],
//        'excess_mileage' => ['required' => TRUE],
//        'short_description' => ['required' => TRUE],
//        'description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $PRODUCT_TYPE->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
        header("location: ../view-products.php?id=" . $PRODUCT_TYPE->id);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/product-type/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 900;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $PRODUCT_TYPE = new ProductType(NULL);
    $PRODUCT_TYPE->id = $_POST['id'];
    $PRODUCT_TYPE->image_name = $_POST['oldImageName'];
    $PRODUCT_TYPE->name = $_POST['name'];
    $PRODUCT_TYPE->type = $_POST['type'];
    $PRODUCT_TYPE->sd_charge_per_day = $_POST['sd_charge_per_day'];
    $PRODUCT_TYPE->sd_mileage_limit = $_POST['sd_mileage_limit'];
    $PRODUCT_TYPE->sd_excess_mileage = $_POST['sd_excess_mileage'];
    $PRODUCT_TYPE->sd_delayed_hour = $_POST['sd_delayed_hour'];

    $PRODUCT_TYPE->wd_mileage = $_POST['wd_mileage'];
    $PRODUCT_TYPE->wd_charge = $_POST['wd_charge'];
    $PRODUCT_TYPE->wd_duration = $_POST['wd_duration'];
    $PRODUCT_TYPE->wd_excess_mileage = $_POST['wd_excess_mileage'];
    $PRODUCT_TYPE->wd_waiting_hour = $_POST['wd_waiting_hour'];

    $PRODUCT_TYPE->wedd_mileage = $_POST['wedd_mileage'];
    $PRODUCT_TYPE->weed_charge = $_POST['weed_charge'];
    $PRODUCT_TYPE->weed_duration = $_POST['weed_duration'];
    $PRODUCT_TYPE->weed_excess_mileage = $_POST['weed_excess_mileage'];
    $PRODUCT_TYPE->weed_waiting_hour = $_POST['weed_waiting_hour'];
    $PRODUCT_TYPE->weed_decoration = $_POST['weed_decoration'];

    $PRODUCT_TYPE->parade_mileage = $_POST['parade_mileage'];
    $PRODUCT_TYPE->parade_charge = $_POST['parade_charge'];
    $PRODUCT_TYPE->parade_duration = $_POST['parade_duration'];
    $PRODUCT_TYPE->parade_excess_mileage = $_POST['parade_excess_mileage'];
    $PRODUCT_TYPE->parade_waiting_hour = $_POST['parade_waiting_hour'];
    $PRODUCT_TYPE->parade_decoration = $_POST['parade_decoration'];
     
   

    $VALID = new Validator();
    $VALID->check($PRODUCT_TYPE, [
        'name' => ['required' => TRUE],
//        'rate_per_day' => ['required' => TRUE],
//        'excess_mileage' => ['required' => TRUE],
//        'short_description' => ['required' => TRUE],
//        'description' => ['required' => TRUE],
        'image_name' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $PRODUCT_TYPE->update();

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

        $PRODUCT_TYPE = ProductType::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $PRODUCT_TYPE = ProductType::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}