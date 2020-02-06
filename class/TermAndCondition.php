<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author Suharshana DsW
 */
class TermAndCondition {

    public $id;
    public $discription; 

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `term_and_condition` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->discription = $result['discription']; 

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `term_and_condition` (`discription`) VALUES  ('"               
                . $this->discription . "')";


        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `term_and_condition`  ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    } 

    public function update() {

        $query = "UPDATE  `term_and_condition` SET "
                . "`discription` ='" . $this->discription . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

  

}
