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
                <div class="col-md-12 question-form bg-sidebar-item">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <input type="text" name="date1" id="date1" class="form-control" data-select="date"  placeholder="Pick Up date">

                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <input class="timepicker1" type="text" name="timepicker1"  style="padding-left: 10px" placeholder="Pick up time">

                            </div> 

                            <div class="col-sm-12 col-xs-12">
                                <input type="text" name="txtSubject"  id="txtSubject" class="form-control input-validater" placeholder="Pick up location">

                            </div>
                            <div class="col-sm-12 col-xs-8 col-md-9"> 
                                <div class="inc">
                                    <div class="controls"> 
                                        <input type="text" class="form-control data-val" name="text" placeholder="text" /> 
                                    </div>
                                </div> 
                            </div>
                            <div  class="col-md-3">
                                <div class="value-data">
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-4 col-md-3"> 
                                <button type="submit"  class="btn btn-style-3 submit" id="append" name="append"> + ADD Location</button>
                            </div>
                            <div class="col-sm-12 col-xs-6 col-md-6">
                                <input type="text" name="txtSubject"  id="txtSubject" class="form-control input-validater" placeholder="Drop off location">
                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <input class="timepicker1" type="text" name="timepicker1"  style="padding-left: 10px" placeholder="Drop off time"/>

                            </div> 

                            <div class="col-sm-12 col-xs-12">
                                <div class="row form-group">
                                    <div class="col-sm-6 col-xs-12">
                                        <br>
                                        <label for="comment"><span id="star">*</span>Security Code: </label>

                                        <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the Security Code >> ">
                                        <span id="capspan" ></span> 
                                    </div>   
                                    <div class="col-sm-6 col-xs-12"> 
                                        <?php include("./contact-form/captchacode-widget.php"); ?> 
                                    </div>  

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="col-sm-4">
                                            <div class="div-check" >
                                                <img src="contact-form/img/checking.gif" id="checking"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 text-right">

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
    <script>
        $('.btn-date').on('click', function (e) {
            e.preventDefault();
            $.dateSelect.show({
                element: 'input[name="date2"]'
            });
        });
        $('.timepicker1').timepicki();


        jQuery(document).ready(function () {
            $("#append").click(function () { 
                 
                   
                $(".inc").append('<div class="controls col-md-3">  <a href="#" class="remove_this btn btn-xs btn-danger">remove</a>  </div>');
                return false;
            });

            jQuery(document).on('click', '.remove_this', function () {
                jQuery(this).parent().remove();
                return false;
            }); 
        });

    </script>
</body>
</html>