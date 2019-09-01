<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $TAX = new Tax(NULL);
    $VALID = new Validator();

    $TAX->tax = $_POST['tax'];  
  

    $VALID->check($TAX, [
        'tax' => ['required' => TRUE],
        
    ]);

    if ($VALID->passed()) {
        $TAX->create();

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
     
    $TAX = new Tax($_POST['id']);

    $TAX->tax = $_POST['tax']; 

    $VALID = new Validator();
    $VALID->check($TAX, [
        'tax' => ['required' => TRUE],
        
    ]);


    if ($VALID->passed()) {
        $TAX->update();

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