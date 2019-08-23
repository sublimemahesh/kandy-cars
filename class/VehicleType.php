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
class VehicleType {

    public $id;
    public $name;
    public $image_name;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `vehicle_type` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->image_name = $result['image_name'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `vehicle_type` (`name`,`image_name`) VALUES  ('"
                . $this->name . "','"
                . $this->image_name . "')";

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

        $query = "SELECT * FROM `vehicle_type` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `vehicle_type` SET "
                . "`name` ='" . $this->name . "', "
                . "`image_name` ='" . $this->image_name . "' "
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

        $query = 'DELETE FROM `vehicle_type` WHERE id="' . $this->id . '"';
        unlink(Helper::getSitePath() . "upload/vehicle_type/" . $this->image_name);

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $img) {
        $query = "UPDATE `vehicle_type` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
