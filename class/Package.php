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
    public $dates;
    public $km;
    public $charge;
    public $driver_charge;
    public $ex_per_km;
    public $per_additional_day;
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
            $this->dates = $result['dates'];
            $this->km = $result['km'];
            $this->charge = $result['charge'];
            $this->driver_charge = $result['driver_charge'];
            $this->ex_per_km = $result['ex_per_km'];
            $this->per_additional_day = $result['per_additional_day'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `package` (`vehicle`,`title`,`image_name`,`short_description`,`dates`,`km`,`charge`,`driver_charge`,`ex_per_km`,`per_additional_day`,`queue`) VALUES  ('"
                . $this->vehicle . "','"
                . $this->title . "','"
                . $this->image_name . "', '"
                . $this->short_description . "', '"
                . $this->dates . "', '"
                . $this->km . "', '"
                . $this->charge . "', '"
                . $this->driver_charge . "', '"
                . $this->ex_per_km . "', '"
                . $this->per_additional_day . "', '"
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

    public function getPackagesById($id) {

        $query = "SELECT * FROM `package` WHERE `id`=" . $id . " ORDER BY queue ASC";
           
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function CheckPackageHours($dates) {

        $query = "SELECT * FROM `package` WHERE `id` =" . $this->id . " AND `dates` <" . $dates . " ORDER BY queue ASC";

        $db = new Database();
        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getNextPackageByVehicle($vehicle_id, $dates) {

        $query = "SELECT * FROM `package` WHERE `vehicle`=" . $vehicle_id . " AND MIN`dates` >" . $dates . " AND  ORDER BY queue ASC";

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
                . "`dates` ='" . $this->dates . "', "
                . "`km` ='" . $this->km . "', "
                . "`charge` ='" . $this->charge . "', "
                . "`driver_charge` ='" . $this->driver_charge . "', "
                . "`ex_per_km` ='" . $this->ex_per_km . "', "
                . "`per_additional_day` ='" . $this->per_additional_day . "', "
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

    public function checkExistPackage($title) {

        $query = "SELECT * FROM `package` WHERE `title`='" . $title . "'";
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getPackageByName($title,$vehicles_id) {
        
        $query = "SELECT * FROM `package` WHERE `title`='" . $title . "' And `vehicle`=" . $vehicles_id . "";
      
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
