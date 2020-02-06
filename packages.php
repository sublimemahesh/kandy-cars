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
    <style>


        @media screen and (max-width: 767px) {
            table caption {
                border-bottom: 1px solid #ddd;
            }
        }

        .p {
            text-align: center;
            padding-top: 140px;
            font-size: 14px;
        }
    </style>
</head>

<body>



    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <div class="page-section container " >
            <div class="table-responsive"> 
                <table class="table     table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th   >Name      </th>
                            <th >Duration         </th>
                            <th >Mileage Limit</th>
                            <th >Price</th>
                            <th >Per Additional Day</th>
                            <th  ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $PACKAGE = Package::getPackagesByVehicle($vehicle['id']);
                        foreach ($PACKAGE as $key => $package) {
                            ?>
                            <tr>
                                <td  ><?php echo $package["title"]; ?></td>
                                <?php
                                $PRODUCT_TYPE = new ProductType($vehicle['id']);
                                if ($PRODUCT_TYPE->type == 2) {
                                    ?>
                                    <td  ><?php echo $package['dates']; ?> Hours</td>
                                <?php } else { ?>
                                    <td  ><?php echo $package['dates']; ?> Days</td>

                                <?php } ?>
                                <td  ><?php echo $package['km']; ?> km</td>
                                <td  ><?php echo number_format($package['charge'], 2); ?> LKR</td>
                                <td  > <?php echo number_format($package['per_additional_day'], 2); ?> LKR</td>
                                <td><a href="<?php echo actual_link(); ?>vehicle-type/<?php echo str_replace(" ", "-", strtolower($VEHICLE_TYPE->name)); ?>/package/<?php echo str_replace(" ", "-", strtolower($vehicle['name'])); ?>/booking/<?php echo str_replace(" ", "-", strtolower($package["title"])); ?>/" class="btn-2">Book Now</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Mileage Limit</th>
                            <th>Price</th>
                            <th>Per Additional Day</th>
                            <th></th>
                        </tr>
                    </tfoot> 
                </table>


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

    <script src="<?php echo actual_link() ?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-ui.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>

    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>
    <script src="<?php echo actual_link(); ?>js/booking-wedding-car.js" type="text/javascript"></script>

</body>
</html>