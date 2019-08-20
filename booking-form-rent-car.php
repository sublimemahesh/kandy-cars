<!doctype html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
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
                <div class="col-md-9">
                    <div class="  question-form bg-sidebar-item">
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" id="pick_up_date"   class="form-control date" data-select="date"  placeholder="Pick Up date">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <select  style="padding-left: 10px" id="select_method"> 
                                        <option value=""> -- Select your method --</option>
                                        <option data-toggle="modal" data-target="#exampleModal" value="Collect From Office"> Collect From Office </option>  
                                        <option data-toggle="modal" data-target="#exampleModal2"  value="Home Delivery"> Home Delivery </option>
                                    </select>                 
                                </div>  
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <input class="timepicker1" type="text" name="timepicker1"  id="pick_up_time" style="padding-left: 10px" placeholder="Pick up time"/>
                                </div> 

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <input   type="text"  id="drop_location"  style="padding-left: 10px" placeholder="Return Location"/>
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <input class="timepicker1" type="text" name="timepicker1" id="drop_time"  style="padding-left: 10px" placeholder="Return time"/>
                                </div> 
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" id="drop_up_date" class="form-control date" data-select="date"  placeholder="Return date">
                                </div> 

                                <div class="col-sm-12 col-xs-12">
                                    <div class="row form-group">
                                        <div class="col-sm-6 col-xs-12"> 
                                            <label for="comment"><span id="star">*</span>Security Code: </label>
                                            <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the Security Code >> ">
                                            <span id="capspan" ></span> 
                                        </div>   
                                        <div class="col-sm-6 col-xs-12"> 
                                            <?php include("./booking-rent-car/captchacode-widget.php"); ?> 
                                        </div>  

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="col-sm-4">
                                                <div class="div-check" >
                                                    <img src="booking-rent-car/img/checking.gif" id="checking"/>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit" id="btnSubmit" class="btn btn-style-3 submit">SEND YOUR MESSAGE</button>
                                    <div id="dismessage" align="center"></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-3" style=" " >
                    <div class="" style="  background-color: rgba(0, 0, 0, 0.35);   
                         text-align: center;
                         border-top-left-radius: 5px;
                         border-top-right-radius: 5px;
                         margin: -15px -15px 0px -15px;
                         padding: 8px 10px;
                         font-weight: bold;
                         line-height: 25px;">
                        <h4 style=" background-color: rgba(0, 0, 0, 0.35);padding: 10px;
                            color: white; "><b>Your Price Summary </b></h4>
                        <span style=" background-color: rgba(0, 0, 0, 0.35); ">
                            <p style="text-align: left;color: white;">Pick up date: <span id="pick_up_date_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;">Pick up method:<span id="select_method_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;">office:<span id="select_office_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;display: none;" id="location_hide" >Your Location:<span id="your_location_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;">Pick up time:<span id="pick_up_time_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;">Return date:<span id="drop_up_date_append" style="color: black"></span></p>
                            <p style="text-align: left;color: white;">Return location:<span id="drop_location_append" style="color: black"></span></p>
                            <p style="text-align: left; color: white;">Return time:<span id="drop_time_append" style="color: black"></span></p>
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
<!--Collect from-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-10">
                    <h5 class="modal-title" id="exampleModalLabel"> Please Select your near Office </h5>

                </div>
                <div class="col-md-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
            <div class="modal-body">
                <div class="form-horizontal"   enctype="multipart/form-data"> 
                    <div class=" clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="name">Offices</label>
                        </div>

                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <select class="form-control" id="select_office">
                                    <?php
                                    $OFFICE = new Office(NULL);
                                    foreach ($OFFICE->all() as $office) {
                                        ?>
                                        <option value="<?php echo $office['location'] ?>"><?php echo $office['location'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class=" row modal-footer" style="padding: 12px 10px 0px;"> 
                        <button type="submit" class="  btn-style-3 btn-sm submit office_btn" >Save changes</button>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
</div>

<!--Home Delivery-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-10">
                    <h5 class="modal-title" id="exampleModalLabel"> Please Select your near by Office </h5>
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
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="name">Offices</label>
                        </div>

                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <select class="form-control" id="select_office_home_deliver">
                                    <?php
                                    $OFFICE = new Office(NULL);
                                    foreach ($OFFICE->all() as $office) {
                                        ?>
                                        <option value="<?php echo $office['location'] ?>"><?php echo $office['location'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="your_location">Your Location</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="orign" class="form-control"  name="name" value=" " style="height:35px" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row modal-footer" style="padding: 12px 10px 0px;"> 
                        <button type="submit" class="  btn-style-3 btn-sm submit office_btn_1"   >Save changes</button>
                    </div> 
                </div>
            </div> 
        </div>
    </div>
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
    $('.btn-date').on('click', function (e) {
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[id="pick_up_date"]',
        });
    });

    $('.btn-date').on('click', function (e) {
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[id="drop_up_date"]',

        });
    });
    $('.timepicker1').timepicki(); 
</script>
<script src="js/booking-rent-car.js" type="text/javascript"></script>
<script src="<?php echo actual_link() ?>js/city.js" type="text/javascript"></script>
</body>
</html>