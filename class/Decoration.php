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
class Decoration {

    public $id;
    public $vehicle;
    public $name; 
    public $image_name; 
    public $short_description; 
    public $charge; 

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `decoration` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->vehicle = $result['vehicle'];
            $this->name = $result['name'];
            $this->image_name = $result['image_name'];
            $this->short_description = $result['short_description'];
            $this->charge = $result['charge'];


            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `decoration` (`vehicle`,`name`,`image_name`,`short_description`,`charge`) VALUES  ('"
                . $this->vehicle . "','"
                . $this->name . "','"
                . $this->image_name . "','"
                . $this->short_description . "','"
                . $this->charge . "')";


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

        $query = "SELECT * FROM `decoration`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getDecorationsByVehicle($id) {

        $query = "SELECT * FROM `decoration` WHERE `vehicle`=" . $id . "  ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `decoration` SET " 
                . "`name` ='" . $this->name . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `decoration` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
