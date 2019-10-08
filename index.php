<?php

include './class/include.php';
include './main-fuction.php';

#remove the directory path we don't want
$url = $_SERVER['REQUEST_URI'];

#split the path by '/'
$params = split("/", $url);

if ($params[1] == '' || $params[1] == '') {
    include './home.php';
    exit();
} elseif ($params[1] == 'home') {
    include './home.php';
    exit();
} elseif ($params[1] == 'about-us') {
    include './about.php';
    exit();
} elseif ($params[1] == 'rent-a-car') {

    $title = str_replace("-", " ", strtolower($params[2]));

    if ($title == '') {
        $title = 'xxxxx';
    }

    $ACTIVITIY = new Activities(NULL);
    $result = $ACTIVITIY->chechExistByName($title);

    if ($result == true) {
        $activitiy = $ACTIVITIY->getByName($title);

        include './view-location.php';
        exit();
    } else {
        include './travel.php';
        exit();
    }
    include './travel.php';
    exit();
} elseif ($params[1] == 'services') {

    $title = str_replace("-", " ", strtolower($params[2]));
    $SERVICE = new Service(NULL);

    if ($title == '') {
        $title = 'xxxxx';
    }
    $result = $SERVICE->chechExistServiceName($title);

    if ($result == true) {

        $SERVICE = new Service(NULL);
        $services = $SERVICE->getSeviceName($title);

        foreach ($services as $service) {
            include './service-view-page.php';
            exit();
        }
    } else {

        include './service.php';
        exit();
    }

    include './service.php';
    exit();
} elseif ($params[1] == 'vehicles') {

    $title = str_replace("-", " ", strtolower($params[2]));

    $VEHICLE = new ProductType(NULL);
    if ($title == '') {
        $title = 'xxxxx';
    }


    $result = $VEHICLE->checkExistVehicle($title);

    if ($result == true) {
        $VEHICLE = new ProductType(NULL);

        $vehicles = $VEHICLE->getVehicleName($title);
        foreach ($vehicles as $vehicle) {
            include './vehicles-view-page.php';
            exit();
        }
    } else {

        include './vehicle.php';
        exit();
    }

    include './vehicle.php';
    exit();
} elseif ($params[1] == 'vehicle-type') {

    if ($params[5] == 'booking' ) {

        $title = str_replace("-", " ", strtolower($params[6]));

        $PACKAGE = new Package(NULL);
        if ($title == '') {
            $title = 'xxxxx';
        }


        $result = $PACKAGE->checkExistPackage($title);

        if ($result == true) {
            $PACKAGE = new Package(NULL);

            $packages = $PACKAGE->getPackageByName($title);
            foreach ($packages as $package) {
                include './booking-form-rent-car.php';
                exit();
            }
        } else {

            include './booking-form-rent-car.php';
            exit();
        }
    }
    if ($params[3] == 'package') {

        $title = str_replace("-", " ", strtolower($params[4]));

        $VEHICLE = new ProductType(NULL);
        if ($title == '') {
            $title = 'xxxxx';
        }


        $result = $VEHICLE->checkExistVehicle($title);

        if ($result == true) {
            $VEHICLE = new ProductType(NULL);

            $vehicles = $VEHICLE->getVehicleName($title);
            foreach ($vehicles as $vehicle) {
                include './packages.php';
                exit();
            }
        } else {

            include './packages.php';
            exit();
        }
    }


    $title = str_replace("-", " ", strtolower($params[2]));

    $VEHICLE_TYPE = new VehicleType(NULL);
   
    if ($title == 'chauffeur driven car') {

        include './booking-form-chauffeur.php';
    } else {

        $result = $VEHICLE_TYPE->checkExistVehicleType($title);

        if ($result == true) {
            $VEHICLE_TYPE = new VehicleType(NULL);

            $vehicle_types = $VEHICLE_TYPE->getVehicleTypeName($title);
            foreach ($vehicle_types as $vehicle_type) {
                include './book-vehicle.php';
                exit();
            }
        } else {

            include './book-vehicle.php';
            exit();
        }

        include './vehicle-type.php';
        exit();
    }
} elseif ($params[1] == 'booking-rent-car') {
    
} elseif ($params[1] == 'booking-wedding') {

    $title = str_replace("-", " ", strtolower($params[2]));

    $PACKAGE = new Package(NULL);
    if ($title == '') {
        $title = 'xxxxx';
    }


    $result = $PACKAGE->checkExistPackage($title);

    if ($result == true) {
        $PACKAGE = new Package(NULL);

        $packages = $PACKAGE->getPackageByName($title);
        foreach ($packages as $package) {
            include './booking-form-wedding-car.php';
            exit();
        }
    } else {

        include './booking-form-wedding-car.php';
        exit();
    }
} elseif ($params[1] == 'gallery') {
    include './gallery.php';
    exit();
} elseif ($params[1] == 'compare-vehicle-rates-price-list') {
    include './price.php';
    exit();
} elseif ($params[1] == 'contact-us') {
    include './contact.php';
    exit();
} elseif ($params[1] == 'comment') {
    include './comments.php';
    exit();
} elseif ($params[1] == 'terms-and-conditions') {
    include './term-and-condition.php';
    exit();
} elseif ($params[1] == 'not-found') {
    include './not-found.php';
    exit();
}