<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductType
 *
 * @author Nipuni
 */
class ProductType {

    public $id;
    public $name;
    public $type;
    public $image_name;
    public $sd_charge_per_day;
    public $sd_mileage_limit;
    public $sd_excess_mileage;
    public $sd_delayed_hour;
    public $wd_mileage;
    public $wd_charge;
    public $wd_duration;
    public $wd_excess_mileage;
    public $wd_waiting_hour;
    public $wedd_mileage;
    public $weed_charge;
    public $weed_duration;
    public $weed_excess_mileage;
    public $weed_waiting_hour;
    public $weed_decoration;
    public $parade_mileage;
    public $parade_charge;
    public $parade_duration;
    public $parade_excess_mileage;
    public $parade_waiting_hour;
    public $parade_decoration;
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`type`,`image_name`,`sd_charge_per_day`,`sd_mileage_limit`,`sd_excess_mileage`,`sd_delayed_hour`,`wd_mileage`,`wd_charge`,`wd_duration`,`wd_excess_mileage`,`wd_waiting_hour`,`wedd_mileage`,`weed_charge`,`weed_duration`,`weed_excess_mileage`,`weed_waiting_hour`,`weed_decoration`,`parade_mileage`,`parade_charge`,`parade_duration`,`parade_excess_mileage`,`parade_waiting_hour`,`parade_decoration`,`queue` FROM `product_types` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->type = $result['type'];
            $this->image_name = $result['image_name'];

            $this->sd_charge_per_day = $result['sd_charge_per_day'];
            $this->sd_mileage_limit = $result['sd_mileage_limit'];
            $this->sd_excess_mileage = $result['sd_excess_mileage'];
            $this->sd_delayed_hour = $result['sd_delayed_hour'];

            $this->wd_mileage = $result['wd_mileage'];
            $this->wd_charge = $result['wd_charge'];
            $this->wd_duration = $result['wd_duration'];
            $this->wd_excess_mileage = $result['wd_excess_mileage'];
            $this->wd_waiting_hour = $result['wd_waiting_hour'];

            $this->wedd_mileage = $result['wedd_mileage'];
            $this->weed_charge = $result['weed_charge'];
            $this->weed_duration = $result['weed_duration'];
            $this->weed_excess_mileage = $result['weed_excess_mileage'];
            $this->weed_waiting_hour = $result['weed_waiting_hour'];
            $this->weed_decoration = $result['weed_decoration'];

            $this->parade_mileage = $result['parade_mileage'];
            $this->parade_charge = $result['parade_charge'];
            $this->parade_duration = $result['parade_duration'];
            $this->parade_excess_mileage = $result['parade_excess_mileage'];
            $this->parade_waiting_hour = $result['parade_waiting_hour'];
            $this->parade_decoration = $result['parade_decoration'];

            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `product_types` (`name`,`type`,`image_name`,`sd_charge_per_day`,`sd_mileage_limit`,`sd_excess_mileage`,`sd_delayed_hour`,`wd_mileage`,`wd_charge`,`wd_duration`,`wd_excess_mileage`,`wd_waiting_hour`,`wedd_mileage`,`weed_charge`,`weed_duration`,`weed_excess_mileage`,`weed_waiting_hour`,`weed_decoration`,`parade_mileage`,`parade_charge`,`parade_duration`,`parade_excess_mileage`,`parade_waiting_hour`,`parade_decoration`,`queue`) VALUES  ('"
                . $this->name . "','"
                . $this->type . "','"
                . $this->image_name . "', '"
                . $this->sd_charge_per_day . "', '"
                . $this->sd_mileage_limit . "', '"
                . $this->sd_excess_mileage . "', '"
                . $this->sd_delayed_hour . "', '"
                . $this->wd_mileage . "', '"
                . $this->wd_charge . "', '"
                . $this->wd_duration . "', '"
                . $this->wd_excess_mileage . "', '"
                . $this->wd_waiting_hour . "', '"
                . $this->wedd_mileage . "', '"
                . $this->weed_charge . "', '"
                . $this->weed_duration . "', '"
                . $this->weed_excess_mileage . "', '"
                . $this->weed_waiting_hour . "', '"
                . $this->weed_decoration . "', '"
                . $this->parade_mileage . "', '"
                . $this->parade_charge . "', '"
                . $this->parade_duration . "', '"
                . $this->parade_excess_mileage . "', '"
                . $this->parade_waiting_hour . "', '"
                . $this->parade_decoration . "', '"
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

        $query = "SELECT * FROM `product_types` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `product_types` SET "
                . "`name` ='" . $this->name . "', "
                . "`type` ='" . $this->type . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`sd_charge_per_day` ='" . $this->sd_charge_per_day . "', "
                . "`sd_mileage_limit` ='" . $this->sd_mileage_limit . "', "
                . "`sd_excess_mileage` ='" . $this->sd_excess_mileage . "', "
                . "`sd_delayed_hour` ='" . $this->sd_delayed_hour . "', "
                . "`wd_mileage` ='" . $this->wd_mileage . "', "
                . "`wd_charge` ='" . $this->wd_charge . "', "
                . "`wd_duration` ='" . $this->wd_duration . "', "
                . "`wd_excess_mileage` ='" . $this->wd_excess_mileage . "', "
                . "`wd_waiting_hour` ='" . $this->wd_waiting_hour . "', "
//                . "`image_name` ='" . $this->image_name . "', "
                . "`wedd_mileage` ='" . $this->wedd_mileage . "', "
                . "`weed_charge` ='" . $this->weed_charge . "', "
                . "`weed_duration` ='" . $this->weed_duration . "', "
                . "`weed_excess_mileage` ='" . $this->weed_excess_mileage . "', "
                . "`weed_waiting_hour` ='" . $this->weed_waiting_hour . "', "
                . "`weed_decoration` ='" . $this->weed_decoration . "', "
                . "`parade_mileage` ='" . $this->parade_mileage . "', "
                . "`parade_charge` ='" . $this->parade_charge . "', "
                . "`parade_duration` ='" . $this->parade_duration . "', "
                . "`parade_excess_mileage` ='" . $this->parade_excess_mileage . "', "
                . "`parade_waiting_hour` ='" . $this->parade_waiting_hour . "', "
                . "`parade_decoration` ='" . $this->parade_decoration . "', "
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


        $this->deletePhotos();

        unlink(Helper::getSitePath() . "upload/product-type/" . $this->image_name);

        $query = 'DELETE FROM `product_types` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $PRODUCT = new Product(NULL);

        $allPhotos = $PRODUCT->getProductsById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $PRODUCT->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/product-type/product/" . $IMG);

            $PRODUCT->id = $photo["id"];
            $PRODUCT->delete();
        }
    }

    public function getVehiclesByType($type) {

        $query = "SELECT * FROM `product_types` WHERE `type`='" . $type . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function checkExistVehicle($title) {

        $query = "SELECT * FROM `product_types` WHERE `name`='" . $title . "'";
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getVehicleName($title) {
        $query = "SELECT * FROM `product_types` WHERE `name`='" . $title . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `product_types` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
