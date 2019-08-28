<!doctype html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
$id = $_GET['id'];
$PACKAGE = new Package($id);
?>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title>Booking Rent Car || www.kandycars.lk</title>

    <!--meta info-->

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="keywords" content="rent a car in kandy, kandy rent car ,kandy car rent, rent a car in sri lanka, self drive vehicle rentals, wedding car hire kandy, wedding car hire sri lanka, airport transfer in sri lanka, budget rent a car sri lanka">
    <meta name="description" content="Kandy Car provide you with access to a variety of luxury automobiles suitable for any occasion according to your choice and for the best deals….">


    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Vendor CSS
    ============================================ -->
    <link rel="shortcut icon" href="<?php echo actual_link() ?>./images/logo/img.png">
    <link rel="stylesheet" href="<?php echo actual_link() ?>font/demo-files/demo.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>plugins/fancybox/jquery.fancybox.css">

    <!-- CSS theme files
    ============================================ -->
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/> 
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>contact-form/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.dateselect.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">

    <link href="distance/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
</head>


<body>



    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
        <div class="container margin-top-50">
            <div class="row">
                <h2 class="text-center"> <?php echo $PACKAGE->title ?></h2>
                <div class="col-md-9">
                    <div class="  question-form bg-sidebar-item">
                        <div class="contact-form">
                            <div class="row"> 
                                <div class="col-sm-6 col-xs-12 col-md-12">
                                    <select  style="padding-left: 10px"  >  
                                        <?php
                                        $PACKAGES = new Package(NULL);
                                        foreach ($PACKAGES->getPackagesByVehicle($PACKAGE->vehicle) as $key => $package) {
                                            if ($package['id'] == $PACKAGE->id) {
                                                ?>

                                                <option  selected="" value="<?php echo $package['id'] ?>"> <?php echo $package['title'] ?></option>
                                            <?php } else { ?>

                                                <option value="<?php echo $package['id'] ?>"> <?php echo $package['title'] ?></option>  
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>                 
                                </div> 

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <input type="text" id="pick_up_date"   class="form-control date-time-picker " data-select="date"  placeholder="Pick up Date / Time">
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" id="drop_up_date" class="form-control date-time-picker-drop" data-select="date"  placeholder="Return Date / Time">
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <select  style="padding-left: 10px" id="select_method"> 
                                        <option value="0" selected=""> -- How to take a vehicle --</option>
                                        <option value="Collect From Office"> Collect From Office </option>  
                                        <option value="Home Delivery"> Home Delivery </option>
                                    </select>                 
                                </div>  
                                <div class="col-sm-6 col-xs-12 col-md-6" >
                                    <select  style="padding-left: 10px"   > 
                                        <option value="0" selected=""> -- How to return a vehicle --</option>
                                        <option value="Collect From Office"> Collect From Office </option>  
                                        <option value="Home Delivery"> Home Delivery </option>
                                    </select>                 
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-12 " style="display: none; " id="collect_office">
                                    <select  style="padding-left: 10px"  id="office"> 
                                        <option value="" selected=""> -- Select your near Office --</option>
                                        <?php
                                        $OFFICE = new Office(NULL);
                                        foreach ($OFFICE->all() as $office) {
                                            ?>
                                            <option value="<?php echo $office['location'] ?>"><?php echo $office['location'] ?> </option>  
                                        <?php } ?> 
                                    </select>                 
                                </div>  

                                <div class="col-sm-6 col-xs-12 col-md-6" id="collect_office_2" style="display: none">
                                    <select  style="padding-left: 10px"   id="office">  
                                        <option value="" selected=""> -- Select your near Office --</option>
                                        <?php
                                        foreach ($OFFICE->all() as $office) {
                                            ?>
                                            <option value="<?php echo $office['location'] ?>"><?php echo $office['location'] ?> </option>  
                                        <?php } ?>
                                    </select>                 
                                </div>  

                                <div class="col-sm-6 col-xs-12 col-md-6" style="display: none" id="your_location" >
                                    <input type="text" id="origin" class="form-control"  name="name"  placeholder="Your Location" >            
                                </div>   


                                <div class="col-sm-12 col-xs-12">
                                    <input type="hidden" name="dates" id="dates" value="<?php echo $PACKAGE->dates ?>" />
                                    <input type="hidden" name="package_id" id="package_id" value="<?php echo $id ?>" />
                                    <button type="submit" id="btnSubmit" class="btn btn-style-3 submit">Next</button>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-3" style=" " >
                    <div class="price-summer-header">
                        <h4 class="price-summer-header-title"><b>Your Price Summary </b></h4>
                        <span class="price-summer-span">
                            <p class="price-summer-p">Pick up date & Time: <span id="pick_up_date_append"></span></p>
                            <p class="price-summer-p">Pick up method:<span id="select_method_append"  ></span></p>
                            <p class="price-summer-p">office:<span id="select_office_append"  ></span></p> 
                            <p class="price-summer-p" id="location_hide" style="display: none;">Your Location:<span id="your_location_append"  ></span></p>
                            <p class="price-summer-p">Return location:<span id="drop_location_append"  ></span></p>
                            <p class="price-summer-p">Distance:<span id="distance_id"></span></p> 
                            <p class="price-summer-p">Price:<span id="price_id"></span></p>
                            <p class="price-summer-p">Return date & Time:<span id="drop_up_date_append"  ></span></p>                            
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> 


    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

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
<script src="<?php echo actual_link() ?>js/libs/retina.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/mad.customselect.js"></script>
<script src="<?php echo actual_link() ?>plugins/sticky-sidebar.js"></script>
<script src="<?php echo actual_link() ?>plugins/isotope.pkgd.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/jquery.queryloader2.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/bootstrap.js"></script>
<script src="<?php echo actual_link() ?>plugins/fancybox/jquery.fancybox.min.js"></script>

<!-- JS theme files
============================================ -->
<script src="<?php echo actual_link() ?>js/plugins.js"></script>
<script src="<?php echo actual_link() ?>js/script.js"></script>
<script src="<?php echo actual_link() ?>contact-form/scripts.js" type="text/javascript"></script> 
<script src="distance/jquery.datetimepicker.full.js" type="text/javascript"></script>

<script>
    jQuery(document).ready(function () {
        jQuery('.date-time-picker').datetimepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 'today',
            timeFormat: 'HH:mm:ss',
        });
    });
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc&libraries=places&reigion=lk"></script>
<script src="distance/js/distance-rent-car.js" type="text/javascript"></script>
</body>
</html>