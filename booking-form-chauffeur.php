<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");

include_once(dirname(__FILE__) . '/class/include.php');
?>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title>Book Chauffeur || www.kandycars.lk</title>

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
    <link rel="shortcut icon" href="<?php echo actual_link(); ?>/images/logo/img.png">
    <link rel="stylesheet" href="<?php echo actual_link(); ?>font/demo-files/demo.css">
    <link rel="stylesheet" href="<?php echo actual_link(); ?>plugins/fancybox/jquery.fancybox.css">

    <!-- CSS theme files
    ============================================ -->
    <link href="<?php echo actual_link(); ?>css/bootstrap.css" rel="stylesheet" type="text/css"/> 
    <link rel="stylesheet" href="<?php echo actual_link(); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link(); ?>css/responsive.css">
    <link href="<?php echo actual_link(); ?>contact-form/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link(); ?>css/jquery.dateselect.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="<?php echo actual_link(); ?>css/timepicki.css" rel="stylesheet" type="text/css"/>     
    <link href="<?php echo actual_link(); ?>control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link(); ?>distance/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link(); ?>booking-chaufferur/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="<?php echo actual_link(); ?>css/countrySelect.min.css" rel="stylesheet" type="text/css"/>

</head>


<body>



    <div id="wrapper" class="wrapper-container"> 
        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
        <div class="container margin-top-50">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4> <b>Chauffeur driven car</b></h4></div>
                <div class="panel-body" > 
                    <div class="col-md-12 question-form bg-sidebar-item">  
                        <div class="contact-form">
                            <div class="row"> 
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Your Name</label>
                                    <input type="text" name="txtFullName" id="txtFullName" class="form-control  "   placeholder="Your Name">
                                    <div class="col-md-12">
                                        <span id="spanFullName" ></span>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Your Email</label>
                                    <input class=" form-control padd-left" type="email" name="txtEmail" id="txtEmail"  placeholder="Your Email" autocomplete="off"/>
                                    <div class="col-md-12">
                                        <span id="spanEmail" ></span>
                                    </div>
                                </div> 
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Nationality</label>
                                    <input type="text" name="txtNationality" id="txtNationality"  placeholder="Nationality" class="form-control input-validater">
                                    <div class="col-md-12">
                                        <span id="spanNationality" ></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Mobile Number</label>
                                    <input type="text" name="txtMobileNumber" id="txtMobileNumber" class="form-control  " data-select="date"  placeholder="Mobile Number">
                                    <div class="col-md-12">
                                        <span id="spanMobileNumber" ></span>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-2" style="margin-top: 40px"> 
                                    <label class="cont-check"> Whats App   
                                        <input type="checkbox" value="Whats App" class="contact_number_type"  id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-2" style="margin-top: 40px">
                                    <label class="cont-check"> Viber
                                        <input type="checkbox" value="Viber"  class="contact_number_type"  id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>

                            </div>
                            <div class="row"> 

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

                            </div>
                            <div class="row"> 
                                <div class="col-sm-12 col-xs-10 col-md-11">
                                    <label>Destination</label>
                                    <div class="controls"> 
                                        <input type="text" id="destination" class="form-control  " name="text" placeholder="locations" autocomplete="off"/> 
                                    </div>
                                </div>

                                <div class="col-sm-12 col-xs-2 col-md-1" style="padding-left: 0px; margin-top: 25px;"> 
                                    <button type="submit"  class="  btn-style-3  btn-add submit" id="append" name="append" > + </button>
                                </div>  
                            </div>
                            <div class="row"> 
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
                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Number of Adults</label>
                                    <input type="number" name="txtNumAdult"  id="txtNumAdult" class="form-control"    placeholder="Number of Adults" min="0">
                                    <div class="col-md-12">
                                        <span id="spanNumAdult" ></span>
                                    </div> 
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Number of Child</label>
                                    <input   type="number" class="form-control" name="txtNumChild" id="txtNumChild"  placeholder="Number of Child" autocomplete="off" min="0"/>
                                    <div class="col-md-12">
                                        <span id="spanNumChild" ></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row"> 

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Accommodation</label>
                                    <select name="txtAccommodation" id="txtAccommodation" class="padd-left" >
                                        <option value=""  selected=""> -- Please select the Accomadation -- </option>
                                        <option value="No Accommodation"  > No Accommodation </option>
                                        <option value="Hotels">Hotels</option>                                    
                                        <option value="Planing Trip">Planing Trip</option>                                    
                                        <option value="Tours">Tours</option>                                    
                                        <option value="Villa">Villa</option>                                    
                                    </select>
                                    <div class="col-md-12">
                                        <span id="spanAccommodation" ></span>
                                    </div>                                
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Vehicle Type and Seats</label>
                                    <select name="txtVehicleName" id="txtVehicleName" class="padd-left" >
                                        <option value="" selected="" > -- Please select the vehicle -- </option>
                                        <option value="Suzuki WagonR Car"> Suzuki WagonR Car  </option>  
                                        <option value="Suzuki Spacia car"> Suzuki Spacia car </option>  
                                        <option value="Toyota aqua car"> Toyota aqua car </option>                                    
                                        <option value="Honda Fit car"> Honda Fit car  </option>     
                                        <option value="Honda Fit Shuttle car"> Honda Fit Shuttle car  </option>     
                                        <option value="Toyota Prius car"> Toyota Prius car </option>     
                                        <option value="Toyota Axio car"> Toyota Axio car  </option>     
                                        <option value="Honda Grace car"> Honda Grace car </option>     
                                        <option value="Honda Vezzel Mini SUV"> Honda Vezzel Mini SUV </option>     
                                        <option value="Toyota CHR mini SUV"> Toyota CHR mini SUV </option>     
                                        <option value="MG ZS mini SUV"> MG ZS mini SUV</option>     
                                        <option value="Mitsubishi OutLander mini SUV"> Mitsubishi OutLander mini SUV </option>     
                                        <option value="Mitsubishi Montero SUV"> Mitsubishi Montero SUV </option>     
                                        <option value="Toyota Prado 150 SUV"> Toyota Prado 150 SUV </option>     
                                        <option value="Toyota Prado TX SUV"> Toyota Prado TX SUV </option>     
                                        <option value="Toyota Prado V8 SUV"> Toyota Prado V8 SUV </option>     
                                        <option value="Land rover defender 90"> Land rover defender 90 </option>     
                                        <option value="Land Rover Defender 110"> Land Rover Defender 110 </option>     
                                        <option value="Land rover discovery SUV"> Land rover discovery SUV </option>     
                                        <option value="Land rover range rover mini SUV"> Land rover range rover mini SUV </option>     
                                        <option value="BMW 520d 5 series Car"> BMW 520d 5 series Car </option>     
                                        <option value="BMW 523 I car"> BMW 523 I car </option>     
                                        <option value="BMW 320d 3 series car">BMW 320d 3 series car </option>     
                                        <option value="Benz CLA 180 car">Benz CLA 180 car</option>     
                                        <option value="Benz CLA 200 car">Benz CLA 200 car</option>     
                                        <option value="Benz C200 car">Benz C200 car </option>     
                                        <option value="Benz S class car">Benz S class car </option>     
                                        <option value="Benz E Class Car">Benz E Class Car </option>     
                                        <option value="Benz E Class Soft Top">Benz E Class Soft Top </option>     
                                        <option value="convertible car">convertible car </option>     
                                        <option value="Toyota Voxy van (5 seats)">Toyota Voxy van (5 seats) </option>     
                                        <option value="Cars - 3 seats">Cars - 3 seats</option>     
                                        <option value="Mini suv s - 3 seats">Mini suv s - 3 seats</option>     
                                        <option value="Suv s - 7 seats(exluding driving seats) ">Suv s - 7 seats(exluding driving seats) </option>     
                                        <option value="Toyota KDH Flat roof van (7 or 8 seats) "> Toyota KDH Flat roof van (7 or 8 seats) </option>     
                                        <option value="Toyota KDH CV Flat roof with more luggage space van (3 or 5 seats) ">   Toyota KDH CV Flat roof with more luggage space van (3 or 5 seats)  </option>     
                                        <option value="Toyota KDH High roof van(12 or 14 seats)">Toyota KDH High roof van(12 or 14 seats)</option>     
                                        <option value="Toyota KDH high roof with more luggage space van (5 to 7 seats)">Toyota KDH high roof with more luggage space van (5 to 7 seats)</option>     
                                        <option value="Toyota KDH High roof luxury van (6 seats)">Toyota KDH High roof luxury van (6 seats)</option>     
                                        <option value="Benz Vito Van (6 seats)">Benz Vito Van (6 seats)</option>     
                                    </select> 
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-sm-6 col-xs-12 col-md-12">
                                    <label>Message</label>
                                    <textarea name="txtMessage"  id="txtMessage" rows="6" class="form-control" placeholder="Write Message Here"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <span id="spanMessage" ></span>
                                </div> 
                            </div>

                            <div class="row"> 

                                <div class="col-sm-12 col-xs-12 col-md-6">
                                    <label for="comment">Security Code:<span id="star">*</span> </label>
                                    <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the Security Code >> ">
                                    <span id="capspan" ></span>  
                                </div> 

                                <div class=" form-group">
                                    <div class="col-sm-6 col-xs-12"> 
                                        <?php include("./booking-chaufferur/captchacode-widget.php"); ?> 
                                        <div class="div-check" >
                                            <img src="<?php echo actual_link() ?>booking-chaufferur/img/checking.gif" id="checking"/>
                                        </div>
                                    </div>   
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-4"  > 
                                    <label class="cont-check"> Contact me through email
                                        <input type="checkbox"  value="Contact me through email" class="contact_type" id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-4"  > 
                                    <label class="cont-check"> Contact me over the phone
                                        <input type="checkbox"  value="Contact me over the phone" class="contact_type" id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>

                            </div>

                            <div class="row" style="margin-top: 15px;">

                                <div class="col-sm-12 col-xs-12"> 
                                    <button type="submit" id="btnSubmit" class="btn btn-style-3">Submit</button> 
                                    <div id="dismessage" align="center"></div>
                                </div>

                            </div> 
                        </div>
                    </div>   
                </div>
            </div>
        </div> 
    </div>


    <?php include './footer.php'; ?>



    <!-- JS Libs & Plugins
    ============================================ -->
    <script src="<?php echo actual_link(); ?>js/libs/jquery.modernizr.js"></script>
    <script src="<?php echo actual_link(); ?>js/libs/jquery-2.2.4.min.js"></script>
    <script src="<?php echo actual_link(); ?>control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc&libraries=places&reigion=lk"></script>


    <script src="<?php echo actual_link(); ?>js/libs/jquery-ui.min.js"></script>
    <script src="<?php echo actual_link(); ?>js/libs/retina.min.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/mad.customselect.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/sticky-sidebar.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/isotope.pkgd.min.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/jquery.queryloader2.min.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/bootstrap.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo actual_link(); ?>plugins/owl.carousel.min.js"></script>

    <!-- 
    JS theme files
    ============================================ 
    -->


    <script src="<?php echo actual_link(); ?>js/plugins.js"></script>
    <script src="<?php echo actual_link(); ?>js/script.js"></script> 
    <script src="<?php echo actual_link(); ?>distance/js/chauffeur.js" type="text/javascript"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo actual_link(); ?>js/countrySelect.min.js" type="text/javascript"></script>


    <script type="text/javascript">


        $("#txtNationality").countrySelect({
            preferredCountries: ["lk"],

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
    </script>

    <script src="<?php echo actual_link(); ?>distance/jquery.datetimepicker.full.js" type="text/javascript"></script> 
    <script src="<?php echo actual_link(); ?>code.js" type="text/javascript"></script>
    <script src="<?php echo actual_link(); ?>booking-chaufferur/scripts.js" type="text/javascript"></script>

    <script>

        jQuery(document).ready(function () {
            jQuery('.date-time-picker').datetimepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 'today'
            });
        });

    </script>

</body>
</html>