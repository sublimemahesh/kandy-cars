<?php
include_once(dirname(__FILE__) . '/class/include.php');
  
$PRODUCT_TYPE = new ProductType($vehicle['id']);
$VEHICLE_TYPE = new VehicleType($PRODUCT_TYPE->type);
?>
<!doctype html>
<html lang="en">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">


    <title>Vehicles Packages|| www.kandycars.lk</title>

    <!--meta info-->
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="keywords" content="rent a car in kandy, kandy rent car ,kandy car rent, rent a car in sri lanka, self drive vehicle rentals, wedding car hire kandy, wedding car hire sri lanka, airport transfer in sri lanka, budget rent a car sri lanka">
    <meta name="description" content="Kandy Car provide you with access to a variety of luxury automobiles suitable for any occasion according to your choice and for the best deals….">


    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link rel="shortcut icon" href="<?php echo actual_link() ?>./images/logo/img.png">
    <link rel="stylesheet" href="<?php echo actual_link() ?>font/demo-files/demo.css"><!--
    
    ============================================ -->
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css">  <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/> 
    <link href="<?php echo actual_link() ?>css/set-1.css" rel="stylesheet" type="text/css"/> 


</head>

<body>



    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <div class="page-section container " >
            <div class="row">

                <?php
                $PACKAGE = Package::getPackagesByVehicle($vehicle['id']);
                foreach ($PACKAGE as $key => $package) {
                    ?>
                    <!-- Slide -->                  
                    <div class="col-md-4 ">
                        <div class="product" style="margin-bottom:20px;">
                            <?php
                            if ($VEHICLE_TYPE->id == 1) {
                                ?>
                                <a href="<?php echo actual_link(); ?>booking-rent-car/<?php echo str_replace(" ", "-", strtolower($package["title"])); ?>/">
                                    <img src="<?php echo actual_link() ?>upload/packages/<?php echo $package["image_name"]; ?>" alt="">
                                </a>
                            <?php } else {
                                ?>
                                <a href="<?php echo actual_link(); ?>booking-wedding/<?php echo str_replace(" ", "-", strtolower($package["title"])); ?>/">
                                    <img src="<?php echo actual_link() ?>upload/packages/<?php echo $package["image_name"]; ?>" alt="">
                                </a>
                            <?php } ?>


                            <div class="product-description no-rating">
                                <h4 class="product-name"><a href=" "><?php echo $package["title"]; ?></a></h4>

                                <div class="pricing-area">
                                    <div class="product-price new-price"> 
                                        <span>Rental</span>  
                                        <?php
                                        if ($VEHICLE_TYPE->id == 1) {
                                            ?>
                                            <span style="color:#000;font-size:21px;" >Dates</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span style="color:#000;font-size:21px;" >Hours</span>
                                            <?php }
                                        ?>
                                        <span  style="color:#000;font-size:18px;" ><?php echo $package['dates']; ?></span> 
                                    </div>
                                    <div class="product-price new-price"> 
                                        <span>Mileage Limit</span>  
                                        <span style="color:#000;font-size:21px;" >KM</span>
                                        <span  style="color:#000;font-size:18px;" ><?php echo $package['km']; ?></span> 
                                    </div>
                                    <div class="product-price new-price">

                                        <span>Price</span>  
                                        <span style="color:#000;font-size:21px;" >LKR</span>
                                        <span  style="color:#000;font-size:18px; text-transform: none;" >Rs: <?php echo number_format($package['charge'], 2); ?></span> 
                                    </div> 
                                </div>

                                <div class="model-info  pull-left" style="  padding-bottom:12px;">
                                    <?php
                                    if ($VEHICLE_TYPE->id == 1) {
                                        ?>
                                        <div><a href="<?php echo actual_link(); ?>booking/<?php echo str_replace(" ", "-", strtolower($package["title"])); ?>/" class="btn-2">Book Now</a></div>
                                    <?php } else if ($VEHICLE_TYPE->id == 2) {
                                        ?>
                                        <div><a href="<?php echo actual_link(); ?>booking-wedding/<?php echo str_replace(" ", "-", strtolower($package["title"])); ?>/" class="btn-2">Book Now</a></div>

                                        <?php
                                    } else {
                                        ?>
                                        <div><a href="booking-form.php?id=<?php echo $package['id'] ?>" class="btn-2">Book Now</a></div>
                                    <?php } ?>
                                </div>

                            </div> 
                        </div> 
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
        <?php include './footer.php'; ?>

        <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

    </div>

    <!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

    <!-- JS Libs & Plugins
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/libs/jquery.modernizr.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-2.2.4.min.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-ui.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>

    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>
    <script src="<?php echo actual_link(); ?>js/booking-wedding-car.js" type="text/javascript"></script>
</body>
</html>