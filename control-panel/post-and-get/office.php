<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $OFFICE = new Office(NULL);
    $VALID = new Validator();

    $OFFICE->location = $_POST['location'];


    $VALID->check($OFFICE, [
        'location' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $OFFICE->create();

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

    $OFFICE = new Office($_POST['id']);
    $OFFICE->location = $_POST['location'];

    $VALID = new Validator();
    $VALID->check($OFFICE, [
        'location' => ['required' => TRUE],
    ]);


    if ($VALID->passed()) {
        $OFFICE->update();

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

        $OFFICE = Office::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} 