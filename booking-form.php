<!doctype html>
<?php
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

    <title>Contact Us || www.kandycars.lk</title>

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
    <link href="css/timepicki.css" rel="stylesheet" type="text/css"/>    
    <link href="booking-form/style.css" rel="stylesheet" type="text/css"/>
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
                <h2 class="text-center"> <?php echo $PRODUCT_TYPE->name ?></h2>
                <div class="col-md-12 question-form bg-sidebar-item">

                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" name="txtPickUpDate" id="txtPickUpDate" class="form-control" data-select="date"  placeholder="Pick Up date">
                                <span id="spanPickUpDate" ></span> 
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input class="timepicker1" type="text" name="txtPickUpTime"  id="txtPickUpTime" style="padding-left: 10px" placeholder="Pick up time">
                                <span id="spanPickUpTime" ></span> 
                            </div> 

                            <div class="col-sm-12 col-xs-8 col-md-11"> 
                                <div class="">
                                    <div class="controls"> 
                                        <input type="text" id="origin" class="form-control data-val " name="text" placeholder="Pick up location" autocomplete="off"/> 
                                    </div>
                                </div> 
                            </div>

                            <div class="col-sm-12 col-xs-4 col-md-1"> 
                                <button type="submit"  class="btn btn-style-3 btn-sm submit" id="append" name="append" > + </button>
                            </div>                           
                            <div  class="col-md-12">
                                <div class="inc">

                                </div>
                            </div>  

                            <div class="col-sm-12 col-xs-6 col-md-6">
                                <input type="text" name=""  id="destination" class="form-control input-validater" placeholder="Drop off location" autocomplete="off" />
                            </div>

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <input class="timepicker1" type="text" name="txtDropOfTime" id="txtDropOfTime" style="padding-left: 10px" placeholder="Drop off time" autocomplete="off"/>
                                <span id="spanDropOfTime" ></span> 
                            </div> 
                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <select name="txtDecoration" id="txtDecoration">
                                    <option value="0">-- Please select the decoration --</option>
                                    <?php
                                    $DECORATION = new Decoration(NULL);
                                    foreach ($DECORATION->getDecorationsByVehicle($PACKAGE->vehicle) as $decoration) {
                                        ?>
                                        <option value="<?php echo $decoration['name'] ?>"><?php echo $decoration['name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div> 
                            <div class="col-sm-12 col-xs-6 col-md-6">
                                <input type="text" name="txtEmail" id="txtEmail"  class="form-control input-validater" placeholder="Your Email *">
                                <span id="spanEmail" ></span> 
                            </div>

                            <div class=" form-group">
                                <div class="col-sm-6 col-xs-12  col-md-3"> 
                                    <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the Security Code >> ">
                                    <span id="capspan" ></span> 
                                </div>   
                                <div class="col-sm-6 col-xs-12 col-md-3"> 
                                    <?php include("./booking-form/captchacode-widget.php"); ?> 
                                </div>  

                                <div class="col-xs-12 col-sm-6">
                                    <div class="col-sm-4">
                                        <div class="div-check" >
                                            <img src="booking-form/img/checking.gif" id="checking"/>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-sm-12 col-xs-12">
                                <input type="hidden" name="txtVehicle" id="txtVehicle" value="<?php echo $PRODUCT_TYPE->name?>" />
                                <button type="submit" id="btnSubmit" class="btn btn-style-3 submit">SEND YOUR MESSAGE</button>
                                <div id="dismessage" align="center"></div>
                            </div>
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
    <script src="js/jquery.dateselect.min.js" type="text/javascript"></script>
    <script src="js/timepicki.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc&libraries=places&reigion=lk"></script>

    <script>
        $(document).ready(function () {
            $("#append").click(function () {
                var data_val = $('.data-val').val();
                $(".inc").append('<div class="controls  col-md-6"><a href="#"> <input type="hidden" name="txtpick_up_location" class="pick_up_location"  id="txtpick_up_location" value="' + data_val + '  "><p>' + data_val + ' <i class="fa fa-times fa-icion-s remove_this" aria-hidden="true"></i></p> </a> </div>');
                return false;
            });
        });
    </script>

    <script>
        $('.btn-date').on('click', function (e) {
            e.preventDefault();
            $.dateSelect.show({
                element: 'input[name="txtPickUpDate"]'
            });
        });
        $('.timepicker1').timepicki();


        jQuery(document).on('click', '.remove_this', function () {
            jQuery(this).parent().remove();
            return false;
        });

    </script> 
    <script src="booking-form/scripts.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>

</body>
</html>