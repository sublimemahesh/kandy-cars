<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
 

if (isset($_POST['update'])) {
     
    $TERM_AND_CONDITION = new TermAndCondition($_POST['id']);
     
    $TERM_AND_CONDITION->discription = $_POST['description'];

    $VALID = new Validator();
    $VALID->check($TERM_AND_CONDITION, [  
         
    ]);

    if ($VALID->passed()) {
        $TERM_AND_CONDITION->update();

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

 