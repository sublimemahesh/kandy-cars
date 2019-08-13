<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $DECORATION = new Decoration(NULL);
    $VALID = new Validator();


    $DECORATION->vehicle = $_POST['vehicle'];
    $DECORATION->name = $_POST['name'];  
 
    $VALID->check($DECORATION, [
        'name' => ['required' => TRUE] 
    ]);

    if ($VALID->passed()) {
        $DECORATION->create();

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
 
    $DECORATION = new Decoration($_POST['id']); 
 
    $DECORATION->name = $_POST['name'];
   

    $VALID = new Validator();
    $VALID->check($DECORATION, [
        'name' => ['required' => TRUE] 
    ]);

    if ($VALID->passed()) {
        $DECORATION->update();

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

        $DECORATION = Package::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}    