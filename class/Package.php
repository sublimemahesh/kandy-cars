<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Attractions
 *
 * @author Suharshana DsW
 */
class Package {

    public $id;
    public $vehicle;
    public $title;
    public $image_name;
    public $short_description;
    public $hours;
    public $km;
    public $charge;
    public $ex_per_hour;
    public $ex_per_km;
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT * FROM `package` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->vehicle = $result['vehicle'];
            $this->title = $result['title'];
            $this->image_name = $result['image_name'];
            $this->short_description = $result['short_description'];
            $this->hours = $result['hours'];
            $this->km = $result['km'];
            $this->charge = $result['charge'];
            $this->ex_per_hour = $result['ex_per_hour'];
            $this->ex_per_km = $result['ex_per_km'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `package` (`vehicle`,`title`,`image_name`,`short_description`,`hours`,`km`,`charge`,`ex_per_hour`,`ex_per_km`,`queue`) VALUES  ('"
                . $this->vehicle . "','"
                . $this->title . "','"
                . $this->image_name . "', '"
                . $this->short_description . "', '"
                . $this->hours . "', '"
                . $this->km . "', '"
                . $this->charge . "', '"
                . $this->ex_per_hour . "', '"
                . $this->ex_per_km . "', '"
                . $this->queue . "')";

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

        $query = "SELECT * FROM `package` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getPackagesByVehicle($id) {

        $query = "SELECT * FROM `package` WHERE `vehicle`=" . $id . " ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `package` SET "
                . "`title` ='" . $this->title . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`short_description` ='" . $this->short_description . "', "
                . "`hours` ='" . $this->hours . "', "
                . "`km` ='" . $this->km . "', "
                . "`charge` ='" . $this->charge . "', "
                . "`ex_per_hour` ='" . $this->ex_per_hour . "', "
                . "`ex_per_km` ='" . $this->ex_per_km . "', "
                . "`queue` ='" . $this->queue . "' "
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

        unlink(Helper::getSitePath() . "upload/packages/" . $this->image_name);

        $query = 'DELETE FROM `package` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $ATTRACTION_PHOTO = new AttractionPhoto(NULL);

        $allPhotos = $ATTRACTION_PHOTO->getAttractionPhotosById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $ATTRACTION_PHOTO->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/package/gallery/" . $IMG);
            unlink(Helper::getSitePath() . "upload/package/gallery/thumb/" . $IMG);

            $ATTRACTION_PHOTO->id = $photo["id"];
            $ATTRACTION_PHOTO->delete();
        }
    }

    public function arrange($key, $img) {

        $query = "UPDATE `package` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
