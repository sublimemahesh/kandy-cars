<?php 

include './class/include.php';
include './main-fuction.php';

#remove the directory path we don't want
$url = $_SERVER['REQUEST_URI'];

#split the path by '/'
$params = split("/", $url);

if ($params[2] == '' || $params[2] == '') {
    include './home.php';
    exit();
} elseif ($params[2] == 'home') {
    include './home.php';
    exit();
} elseif ($params[2] == 'about-us') {
    include './about.php';
    exit();
} elseif ($params[2] == 'rent-a-car') {

    $title = str_replace("-", " ", strtolower($params[3]));

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
} elseif ($params[2] == 'services') {

    $title = str_replace("-", " ", strtolower($params[3]));
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
} elseif ($params[2] == 'vehicles') {

    $title = str_replace("-", " ", strtolower($params[3]));

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
} elseif ($params[2] == 'vehicle-type') {

    $title = str_replace("-", " ", strtolower($params[3]));

    $VEHICLE_TYPE = new VehicleType(NULL);
    if ($title == '') {
        $title = 'xxxxx';
    }

    if ($title == 'chauffeur driven car') {

        include './booking-form-chauffeur.php';
    }
else{
    
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

} elseif ($params[2] == 'package') {

    $title = str_replace("-", " ", strtolower($params[3]));

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
} elseif ($params[2] == 'booking-rent-car') {

    $title = str_replace("-", " ", strtolower($params[3]));

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
} elseif ($params[2] == 'booking-wedding') {

    $title = str_replace("-", " ", strtolower($params[3]));

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
} elseif ($params[2] == 'gallery') {
    include './gallery.php';
    exit();
} elseif ($params[2] == 'compare-vehicle-rates-price-list') {
    include './price.php';
    exit();
} elseif ($params[2] == 'contact-us') {
    include './contact.php';
    exit();
} elseif ($params[2] == 'comment') {
    include './comments.php';
    exit();
} elseif ($params[2] == 'terms-and-conditions') {
    include './term-and-condition.php';
    exit();
} elseif ($params[2] == 'not-found') {
    include './not-found.php';
    exit();
}