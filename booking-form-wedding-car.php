<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");

include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
$id = $_GET['id'];
$PACKAGE = new Package($id);
$PRODUCT_TYPE = new ProductType($PACKAGE->vehicle);
?>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title>Book vehicle || www.kandycars.lk</title>

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
    <link rel="shortcut icon" href="/images/logo/img.png">
    <link rel="stylesheet" href="font/demo-files/demo.css">
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.css">

    <!-- CSS theme files
    ============================================ -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/> 
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="contact-form/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.dateselect.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="css/timepicki.css" rel="stylesheet" type="text/css"/>    
    <link href="booking-form/style.css" rel="stylesheet" type="text/css"/>
    <link href="control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
            <img id="loading" src="https://www.vedantalimited.com/SiteAssets/Images/loading.gif" style="display: none; position: absolute;margin-top: 10%;margin-left: 37%;z-index: 999;"/>
            <div class="row">   
                <h2 class="text-center"> <?php echo $PACKAGE->title ?></h2>
                <div class="col-md-9 question-form bg-sidebar-item">  
                    <div class="contact-form">
                        <div class="row">

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <input type="text" name="pick_up_date_time" id="pick_up_date_time" class="form-control date-time-picker" data-select="date"  placeholder="Pick Up date / Time">
                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <input class="date-time-picker padd-left" type="text" name="drop_time" id="drop_date_time"  placeholder="Drop off date / Time" autocomplete="off"/>
                            </div>

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <select  id="selection_type" class="padd-left" >
                                    <option value="" selected="" > -- Select the Way -- </option>
                                    <option value="One Way"  > One Way </option>
                                    <option value="Up and down">  Up and down</option>                                    
                                </select>
                            </div>

                            <div class="col-sm-12 col-xs-8 col-md-6">
                                <div class="controls"> 
                                    <input type="text" id="origin" class="form-control data-val " name="text" placeholder="Pick up location" autocomplete="off"/> 
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-11 col-md-11">
                                <div class="controls"> 
                                    <input type="text" id="destination" class="form-control  " name="text" placeholder="locations" autocomplete="off"/> 
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-4 col-md-1" style="padding-left: 0px;"> 
                                <button type="submit"  class="  btn-style-3  btn-add submit" id="append" name="append" > + </button>
                            </div> 

                            <div class="col-sm-12 col-xs-4 col-md-12" > 
                                <table class="table table-striped c  table-bordered"  id="myTable" style="display: none;" >
                                    <thead>
                                        <tr>
                                            <th scope="col">Locations</th>
                                            <th scope="col" style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="inc">
                                    </tbody>
                                </table> 
                            </div> 
                            <div class="col-sm-6 col-xs-12 col-md-12">
                                <select name="decoration" id="decoration" class="padd-left" >
                                    <option value="0" selected="" > Without decoration </option>
                                    <option value="1">  With decoration</option>                                    
                                </select>
                            </div>  
                        </div>
                        <div  style="margin-top: 20px; margin-bottom: 20px; " >
                            <div class="owl-carousel container" data-max-items="5" data-item-margin="10" data-dots="false" style="display: none;" id="iteam_show">
                                <?php
                                $DECORATION = new Decoration(NULL);
                                foreach ($DECORATION->getDecorationsByVehicle($PRODUCT_TYPE->id) as $key => $decoration) {
                                    ?>
                                    <!-- Slide -->
                                    <div class="item-carousel">
                                        <div  style="background-color:#fff ">
                                            <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $decoration['id'] ?>" >
                                                <img src="<?php echo actual_link() ?>upload/decoration/<?php echo $decoration["image_name"]; ?>" alt="<?php echo $decoration["name"]; ?>">
                                                <h4 class="img-title-2"><?php echo $decoration["name"]; ?></h4>
                                            </a> 
                                        </div>  
                                    </div>  

                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12 col-xs-12">
                                <input type="hidden" name="package_id" id="package_id" value="<?php echo $id ?>" /> 
                                <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo $PACKAGE->vehicle ?>" />
                                <button type="submit" id="btnSubmit" class="btn btn-style-3 submit">Next</button> 
                            </div>
                        </div> 
                    </div>  
                </div>
                <div class="col-md-3" >
                    <div class="price-summer-header"  >
                        <h4 class="price-summer-header-title"  ><b>Your Price Summary </b></h4>
                        <span  class="price-summer-span">
                            <p class="price-summer-p">Pick up date & Time: <span id="pick_up_date_time_append"  ></span></p>  
                            <p class="price-summer-p">Pick up location:<span id="pick_up_location_append"  ></span></p> 
                            <p class="price-summer-p">Drop location:<span id="drop_location_append"  ></span></p> 
                            <p class="price-summer-p">Distance :<span id="distance_append"  ></span></p> 
                            <p class="price-summer-p">Price :<span id="Price"  ></span></p> 
                            <p class="price-summer-p">Drop date & Time:<span id="drop_date_time_append"  ></span></p>                            
                            <p class="price-summer-p">Drive method:<span id="selection_type_append"  ></span></p>
                            <p class="price-summer-p">Decoration:<span id="decoration_name_append"></span></p>

                        </span>
                    </div>
                </div>
            </div>
        </div> 
        <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
        <?php
        foreach ($DECORATION->getDecorationsByVehicle($PRODUCT_TYPE->id) as $key => $decoration) {
            ?>

            <div class="modal fade" id="exampleModal<?php echo $decoration['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-10">
                                <h5 class="modal-title" id="exampleModalLabel"> <?php echo $decoration['name'] ?> </h5>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-horizontal"  enctype="multipart/form-data"> 
                                <div class=" clearfix">  
                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <p class="text-justify">
                                                    <?php echo $decoration['short_description'] ?> 
                                                </p>
                                                <h4>Rs:<?php echo number_format($decoration['charge'], 2) ?> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row modal-footer" style="padding: 12px 10px 0px;"> 
                                    <input type="hidden" id="dec_id" value="<?php echo $decoration['id'] ?>" />
                                    <button type="submit" class="  btn-style-3 btn-sm submit decoration_btn" decoration_name="<?php echo $decoration['name'] ?>" decoration_id="<?php echo $decoration['id'] ?>" >Add Now</button>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

        <?php include './footer.php'; ?>

        <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->
    </div>


    <!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

    <!-- JS Libs & Plugins
    ============================================ -->
    <script src="js/libs/jquery.modernizr.js"></script>
    <script src="js/libs/jquery-2.2.4.min.js"></script>
    <script src="control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc&libraries=places&reigion=lk"></script>


    <script src="js/libs/jquery-ui.min.js"></script>
    <script src="js/libs/retina.min.js"></script>
    <script src="plugins/mad.customselect.js"></script>
    <script src="plugins/sticky-sidebar.js"></script>
    <script src="plugins/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery.queryloader2.min.js"></script>
    <script src="plugins/bootstrap.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="plugins/owl.carousel.min.js"></script>
    <!-- JS theme files
    ============================================ -->
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script> 
    <script src="distance/jquery.datetimepicker.full.js" type="text/javascript"></script> 
    <script src="distance/js/distance-wedding.js" type="text/javascript"></script>

    <script>
        jQuery(document).ready(function () {
            jQuery('.date-time-picker').datetimepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</body>
</html>