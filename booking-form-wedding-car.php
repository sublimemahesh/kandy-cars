<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");

include_once(dirname(__FILE__) . '/class/include.php');


$PACKAGE = new Package($package['id']);
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
    <link rel="shortcut icon" href="<?php echo actual_link() ?>/images/logo/img.png">
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
    <link href="<?php echo actual_link() ?>css/jquery.dateselect.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="<?php echo actual_link() ?>css/timepicki.css" rel="stylesheet" type="text/css"/>    
    <link href="<?php echo actual_link() ?>booking-form/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link() ?>control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link() ?>distance/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="<?php echo actual_link() ?>css/countrySelect.min.css" rel="stylesheet" type="text/css"/>
</head>


<body>



    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
        <div class="container margin-top-50">

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b><?php echo $PACKAGE->title ?></b></h4></div>
                    <div class="panel-body" > 

                        <div class=" question-form bg-sidebar-item">  
                            <div class="contact-form">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Package Details - Pick  And Drop ( Date / Time)</div>
                                        <div class="panel-body">
                                            <div class="col-sm-6 col-xs-12 col-md-12">
                                                <label>Package Name</label>
                                                <select  style="padding-left: 10px" id="packages" >  
                                                    <option value="0"> -- Select the other packages -- </option>  
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
                                            <div  id="table-bar-display"  > 
                                                <div class="col-sm-6 col-xs-12 col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Package Name</th>
                                                                <th>Hours</th>
                                                                <th>Millage Limit</th>
                                                                <th>Package Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody  >
                                                        <td>
                                                            <?php echo $PACKAGE->title ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $PACKAGE->dates ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $PACKAGE->km ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $PACKAGE->charge ?>
                                                        </td> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div  id="table-bar" style="display: none"> 
                                                <div class="col-sm-6 col-xs-12 col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Package Name</th>
                                                                <th>Hours</th>
                                                                <th>Millage Limit</th>
                                                                <th>Package Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="package_body"> 

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12 col-md-6">
                                                <label>Pick up Date / Time</label>
                                                <input type="text" name="pick_up_date_time" id="pick_up_date_time" class="form-control date-time-picker" data-select="date"  placeholder="Pick Up date / Time">
                                            </div>
                                            <input type="hidden" name="hours" id="hours" value="<?php echo $PACKAGE->dates ?>" />
                                            <div class="col-sm-6 col-xs-12 col-md-6">
                                                <label>Return Date / Time</label>
                                                <input class="padd-left" type="text" name="drop_time" id="drop_date_time"  placeholder="Drop off date / Time" autocomplete="off" disabled="TRUE"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">How to take the vehicle</div>
                                        <div class="panel-body">
                                            <div class="col-sm-6 col-xs-12 col-md-12">
                                                <select  style="padding-left: 10px" id="select_method"> 
                                                    <option value="" selected=""> -- How to take the vehicle --</option>
                                                    <option value="Collect From Office"> Collect From Office </option>  
                                                    <option value="Home Delivery"> Home Delivery </option>
                                                </select>                 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="collect_office" style="display: none" > 
                                                    <label>Your nearest office</label>
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
                                            </div>

                                            <div class="col-md-6">
                                                <div id="your_location" style="display: none" >
                                                    <label>The place you get the vehicle</label>
                                                    <input type="text"  id="origin" class="form-control"  name="name"  placeholder="Your Location" autocomplete="off">                
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>


                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Locations</div>
                                        <div class="panel-body">
                                            <div class="col-sm-12 col-xs-11 col-md-11">
                                                <div class="controls"> 
                                                    <input type="text" id="destination" class="form-control  " name="text" placeholder="locations" autocomplete="off"/> 
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-xs-4 col-md-1" style="padding-left: 0px;"> 
                                                <button type="submit"  class="  btn-style-3  btn-add submit" id="add-destination" name="add-destination" > + </button>
                                            </div> 

                                            <div class="col-sm-12 col-xs-4 col-md-12" > 
                                                <table class="table table-striped c  table-bordered"  id="myTable" style="display: none;" >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Locations</th>
                                                            <th scope="col" style="width: 20%;">Distance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="inc">
                                                    </tbody>
                                                </table> 
                                                <input type="hidden" id="distance-tot" value="0">
                                            </div> 
                                        </div>
                                    </div> 
                                </div>

                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Decorations</div>
                                        <div class="panel-body">

                                            <div class="col-sm-6 col-xs-12 col-md-12">

                                                <select name="decoration" id="decoration" class="padd-left" >

                                                    <option  selected="" >  -- Please select the option --</option>
                                                    <option value="0"   > Without decoration </option>
                                                    <option value="1">  With decoration</option>                                    
                                                </select>
                                            </div> 
                                            <div class="col-sm-6 col-xs-12 col-md-12">
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
                                            </div> 
                                        </div>
                                    </div> 
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
                </div>
            </div>

            <div class="col-md-8" id="customer_panel" style="display: none"> 
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b>Customer Details</b></h4></div>
                    <div class="panel-body" >  
                        <form name="order_from" id="payments" class="order_from" action="https://sandbox.payhere.lk/pay/checkout" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>First Name</label>
                                    <input type="text" id="first_name" class="form-control"  name="first_name"  placeholder="First Name"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" id="last_name" class="form-control"  name="last_name"  placeholder="Last Name"  >            
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Email Address</label>
                                    <input type="text" id="email" class="form-control"  name="email"  placeholder="Email Address"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Phone Number</label>
                                    <input type="text" id="phone_number" class="form-control"  name="phone_number"  placeholder="Phone Number"  >            
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>City</label>
                                    <input type="text" id="city" class="form-control"  name="city"  placeholder="City"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-6">
                                    <label>Address</label>
                                    <input type="text" id="address" class="form-control"  name="address"  placeholder="Address"  >            
                                </div> 

                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Country</label>
                                    <input type="text" id="country" class="form-control"  name="country"  placeholder="City"  >            
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Security Code</label>
                                    <input type="text" id="captchacode" class="form-control"  name="captchacode"  placeholder="Security Code"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="col-sm-6 col-xs-12 col-md-12"> 
                                        <?php include("/booking-rent-car/captchacode-widget.php"); ?> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="row hidden">
                                <div class="col-sm-6 col-xs-12 col-md-12">
                                    <label>Postal Code</label>
                                    <input type="text" id="postal_code" class="form-control"  name="postal_code"  placeholder="City"  >            
                                </div>  
                            </div>

                            <div class="row"> 
                                <div class="col-xs-12   " style="margin-bottom: 10px;">  
                                    <label class="cont-check">Click here to indicate that you have read and agree to the booking <a href="term-and-condition.php" target="_blank" class="text-primary">terms and conditions</a>.
                                        <input type="checkbox"   id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>
                            </div>


                            <!--sandbox merchant id-->
                            <input type="hidden" name="merchant_id" value="1213021">  
                            <!--live merchant id-->

                            <input type="hidden" name="return_url" value="https://kandycars.lk/booking-form-rent-car.php?id=<?php echo $id ?>">
                            <input type="hidden" name="cancel_url" value="https://kandycars.lk/order-form.php?cancelled">
                            <input type="hidden" name="notify_url" value="https://kandycars.lk/payments/notify.php">
                            <input type="hidden" name="package_id" id="package_id" value="<?php echo $id ?>" />
                            <input name="order_id" id="order_id" type="hidden" value="<?php echo $order_id; ?>" />
                            <input name="amount" id="amount" type="hidden"    class="payment"/>
                            <input name="items" id="items" type="hidden"   value="1"/>
                            <input type="hidden" name="currency" value="LKR">

                            <div class="row"> 
                                <div class="col-sm-6 col-xs-12 col-md-6 pull-left">
                                    <button type="submit" id="back" class="btn btn-style-3 submit">Back</button>
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-3 pull-right">
                                    <button type="submit" id="pay" class="btn btn-style-3 submit">Pay Now</button>
                                </div> 
                            </div>

                        </form>
                    </div>
                </div> 
            </div> 

            <div class="col-md-4" >
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b>Your Price Summary </b></h4></div>
                    <div class="panel-body" > 
                        <span  class="price-summer-span">
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Pick up D / T: </p>  

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> <span id="pick_up_date_append"></span> </p> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Drop up D / T: </p>  

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> <span id="drop_up_date_append"></span> </p> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Office: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p">  </p> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Package Price: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> <span id="package_charge"> <?php echo $PACKAGE->charge ?></span></p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Price: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Tax: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p">  </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Total Price: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> </p> 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Distance: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p">  </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Per km: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Distance Price: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                    <p class="price-summer-p">Decoration: </p> 

                                </div>
                                <div class="col-md-7">
                                    <p class="price-summer-p"> </p> 
                                </div>
                            </div> 
                        </span>
                    </div>
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
<script src="<?php echo actual_link() ?>js/libs/jquery.modernizr.js"></script>
<script src="<?php echo actual_link() ?>js/libs/jquery-2.2.4.min.js"></script>
<script src="<?php echo actual_link() ?><?php echo actual_link() ?>control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL0Gc6zvPpvH-CbORJwntxbqedMmkMcfc&libraries=places&reigion=lk"></script>


<script src="<?php echo actual_link() ?>js/libs/jquery-ui.min.js"></script>
<script src="<?php echo actual_link() ?>js/libs/retina.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/mad.customselect.js"></script>
<script src="<?php echo actual_link() ?>plugins/sticky-sidebar.js"></script>
<script src="<?php echo actual_link() ?>plugins/isotope.pkgd.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/jquery.queryloader2.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/bootstrap.js"></script>
<script src="<?php echo actual_link() ?>plugins/fancybox/jquery.fancybox.min.js"></script>
<script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>
<!-- JS theme files
============================================ -->
<script src="<?php echo actual_link() ?>js/plugins.js"></script>
<script src="<?php echo actual_link() ?>js/script.js"></script> 
<script src="<?php echo actual_link() ?>distance/jquery.datetimepicker.full.js" type="text/javascript"></script> 
<script src="<?php echo actual_link() ?>distance/js/wedding-cars.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo actual_link() ?>js/countrySelect.min.js" type="text/javascript"></script>


<script type="text/javascript">


    $("#txtNationality").countrySelect({
        preferredCountries: ["lk"]
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

    jQuery(document).ready(function () {
        jQuery('.date-time-picker').datetimepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 'today',
        });
    });
</script>
</body>
</html>