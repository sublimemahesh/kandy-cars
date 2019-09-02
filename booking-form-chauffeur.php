<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");

include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
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
    <link href="booking-chaufferur/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/countrySelect.min.css" rel="stylesheet" type="text/css"/>

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
                <h2 class="text-center"> Chauffeur driven car </h2>
                <div class="col-md-12 question-form bg-sidebar-item">  
                    <div class="contact-form">
                        <div class="row">

                            <div class="col-sm-6 col-xs-12 col-md-4">
                                <label>Your Name</label>
                                <input type="text" name="txtFullName" id="txtFullName" class="form-control  "   placeholder="Your Name">
                                <div class="col-md-12">
                                    <span id="spanFullName" ></span>
                                </div>

                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-4">
                                <label>Your Email</label>
                                <input class="  padd-left" type="email" name="txtEmail" id="txtEmail"  placeholder="Your Email" autocomplete="off"/>
                                <div class="col-md-12">
                                    <span id="spanEmail" ></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12 col-md-4">
                                <label>Nationality</label>
                                <input type="text" name="txtNationality" id="txtNationality"  placeholder="Nationality" class="form-control input-validater">
                                <div class="col-md-12">
                                    <span id="" ></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <label>Pick up Date / Time</label>
                                <input type="text" name="txtPickUpDate" id="txtPickUpDate" class="form-control date-time-picker" data-select="date"  placeholder="Pick Up date / Time">
                                <div class="col-md-12">
                                    <span id="spanPickUpDate" ></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <label>Drop Date / Time</label>
                                <input class="date-time-picker padd-left" type="text" name="txtDropOfDateTime" id="txtDropOfDateTime"  placeholder="Drop off date / Time" autocomplete="off"/>
                                <div class="col-md-12">
                                    <span id="spanDropDateTime" ></span>
                                </div>
                            </div> 

                            <div class="col-sm-12 col-xs-11 col-md-11">
                                <label>Destination</label>
                                <div class="controls"> 
                                    <input type="text" id="destination" class="form-control  " name="text" placeholder="locations" autocomplete="off"/> 
                                </div>
                            </div>

                            <div class="col-sm-12 col-xs-4 col-md-1" style="padding-left: 0px; margin-top: 25px;"> 
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

                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <label>Num Adults</label>
                                <input type="number" name="txtNumAdult"  id="txtNumAdult" class="form-control"    placeholder="Num Adults" min="0">
                                <div class="col-md-12">
                                    <span id="spanNumAdult" ></span>
                                </div>

                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-6">
                                <label>Num Child</label>
                                <input class="  padd-left" type="number" name="txtNumChild" id="txtNumChild"  placeholder="Num Child" autocomplete="off" min="0"/>
                                <div class="col-md-12">
                                    <span id="spanNumChild" ></span>
                                </div>

                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-12">
                                <label>Accommodation</label>
                                <select name="txtAccommodation" id="txtAccommodation" class="padd-left" >
                                    <option value="No Accommodation" selected="" > No Accommodation </option>
                                    <option value="1">  </option>                                    
                                </select>
                                <div class="col-md-12">
                                    <span id="spanAccommodation" ></span>
                                </div>                                
                            </div>

                            <div class="col-sm-12 col-xs-12 col-md-6">

                                <label for="comment"><span id="star">*</span>Security Code: </label>

                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the Security Code >> ">
                                <span id="capspan" ></span> 

                            </div>   
                            <div class=" form-group">

                                <div class="col-sm-6 col-xs-12"> 
                                    <?php include("./booking-chaufferur/captchacode-widget.php"); ?> 
                                    <div class="div-check" >
                                        <img src="<?php echo actual_link() ?>contact-form/img/checking.gif" id="checking"/>
                                    </div>
                                </div>  


                            </div> 
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <input type="hidden" name="package_id" id="package_id" value="<?php echo $id ?>" />  
                            <button type="submit" id="btnSubmit" class="btn btn-style-3">Submit</button> 
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
<script src="distance/js/chauffeur.js" type="text/javascript"></script>
<script src="booking-chaufferur/scripts.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('.date-time-picker').datetimepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 'today'
        });
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/countrySelect.min.js" type="text/javascript"></script>

<!--
<script type="text/javascript">


    $("#txtNationality").countrySelect({
        preferredCountries: ["xx"]
    });

    blankFlag.call(this);

    $("#txtNationality").on('change', blankFlag);

    function blankFlag(e) {
        if ($('.flag').hasClass('xx')) {

            $('.xx').addClass('blank');

        } else {

            return false;
        }
    }

// $("#").countrySelect();
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
    }
</script>-->

<script src="code.js" type="text/javascript"></script>


</body>
</html>