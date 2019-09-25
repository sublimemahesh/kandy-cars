<!doctype html>
<?php
date_default_timezone_set("Asia/Calcutta");
include_once(dirname(__FILE__) . '/class/include.php');

$PACKAGE = new Package($package['id']);
$VEHICLE = new ProductType($PACKAGE->vehicle);

$VEHICLE_TYPE = new VehicleType($VEHICLE->type);

$PRODUCT_TYPE = new ProductType($PACKAGE->vehicle);

$ORDER = new Order(NULL);
$LASTID = $ORDER->getLastID();
$order_id = $LASTID + 1;

if (isset($_GET["order_id"])) {
    $ID = $_GET["order_id"];
    $paymentSatusCode = $ORDER->getPaymentStatusCode($ID);
}
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
    <link href="<?php echo actual_link() ?>css/jquery.dateselect.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="<?php echo actual_link() ?>control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link() ?>distance/jquery.datetimepicker.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="<?php echo actual_link() ?>css/countrySelect.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .product-name{
            font-size: 14px;
        }

        th, td { 
            width: 100%;
        }

        /*        tr:nth-child(even){background-color: #f2f2f2}*/
    </style>
</head>

<body>



    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
        <div class="container margin-top-50">
            <div class="alert hidden" id="beautypress-form-msg">
                <?php
                if (isset($_GET["order_id"])) {
                    if ($paymentSatusCode == 2) {
                        ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Your Payment has been succeeded.
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error!</strong> Your Payment was not successful. Please do your reservation again.
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-md-8" id="package_panel">
                <img id="loading" src="https://www.vedantalimited.com/SiteAssets/Images/loading.gif" style="display: none; position: absolute;margin-top: 40%;margin-left: 37%;z-index: 999;"/>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b><?php echo $VEHICLE->name ?></b></h4></div>
                    <div class="panel-body" > 

                        <div class=" question-form bg-sidebar-item">  
                            <div class="contact-form"> 
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Package Details - Pick Up and Drop Off  ( Date / Time)</div>
                                        <div class="panel-body">

                                            <div class="col-sm-12 col-xs-12 col-md-12">
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
                                                <div class="col-sm-12 col-xs-12 col-md-12 table-responsive" style="display: flex;  overflow: auto;  white-space: nowrap;">
                                                    <table class="table table-bordered" id="table-res">
                                                        <thead>
                                                            <tr>
                                                                <th>Package Name</th>
                                                                <th>Hours</th>
                                                                <th>Mileage Limit</th>
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
                                                            <?php echo $PACKAGE->km . " Km" ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "Rs:" . $PACKAGE->charge . ".00" ?>
                                                        </td> 

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <input type="hidden" id="package-tot" value="<?php echo $PACKAGE->charge; ?>">
                                            <input type="hidden" id="package-distance" value="<?php echo $PACKAGE->km; ?>">
                                            <div  id="table-bar" style="display: none"> 
                                                <div class="col-sm-6 col-xs-12 col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Package Name</th>
                                                                <th>Hours</th>
                                                                <th>Mileage Limit</th>
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
                                                <input type="text" name="pick_up_date_time" id="pick_up_date" class="form-control date-time-picker" data-select="date"  placeholder="Pick Up date / Time">
                                            </div>
                                            <input type="hidden" name="hours" id="hours" value="<?php echo $PACKAGE->dates ?>" />
                                            <div class="col-sm-6 col-xs-12 col-md-6">
                                                <label>Drop Off  Date / Time</label>
                                                <input class="padd-left" type="text" name="drop_time" id="drop_up_date"  placeholder="Drop off date / Time" autocomplete="off" disabled="TRUE"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Select pick up location</div>
                                        <div class="panel-body">
                                            <div class="col-sm-6 col-xs-12 col-md-12">
                                                <select  style="padding-left: 10px" id="select_method"> 
                                                    <option value="" selected=""> -- Select pick up location --</option>
                                                    <option value="Collect From Office"> Collect From Office </option>  
                                                    <option value="Home Delivery"> Home Delivery </option>
                                                </select>                 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="collect_office" style="display: none" > 
                                                    <label>Your nearest office</label>
                                                    <select  style="padding-left: 10px"  id="office">
                                                        <option value="" selected=""> -- Select your nearest office --</option>
                                                        <?php
                                                        $OFFICE_DETAILS = new OfficeDetail(NULL);
                                                        foreach ($OFFICE_DETAILS->getOfficeByVehicle($PACKAGE->vehicle) as $office) {
                                                            $OFFICE = new Office($office['office']);
                                                            ?>
                                                            <option value="<?php echo $OFFICE->location ?>"><?php echo $OFFICE->location ?> </option>  
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="your_location" style="display: none" >
                                                    <label>Pickup Location</label>
                                                    <input type="text"  id="origin" class="form-control"  name="name"  placeholder="Your Location" autocomplete="off">                
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>


                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Locations & Destination</div>
                                        <div class="panel-body">
                                            <p>Please add them sequentially.Last location will be your final destination</p>
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
                                                    <!--                                                    <option  selected="" >  -- Please select the option --</option>-->
                                                    <option value="0"   > Without decoration </option>
                                                    <option value="1">  With decoration</option>                                    
                                                </select>
                                            </div> 
                                            <div class="col-sm-6 col-xs-12 col-md-12">
                                                <div  style="margin-top: 20px; margin-bottom: 20px; " >
                                                    <div class="owl-carousel container" data-max-items="3" data-item-margin="5" data-dots="false" style="display: none;" id="iteam_show">
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
                                    <input type="hidden" name="package_id" id="package_id" value="<?php echo $PACKAGE->id; ?>" /> 
                                    <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo $PACKAGE->vehicle ?>" />
                                    <button type="submit" id="next" class="btn btn-style-3 submit">Next</button> 
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
                        <!--<form name="order_from" id="payments" class="order_from" action="https://sandbox.payhere.lk/pay/checkout" method="post" autocomplete="off">-->
                            <form name="contact-from" id="payments" class="booking-form" action="https://www.payhere.lk/pay/checkout" method="post">
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
                                    <input type="text" id="country" class="form-control"  name="country"  placeholder="Country"  >            
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Security Code</label>
                                    <input type="text" id="captchacode" class="form-control"  name="captchacode"  placeholder="Security Code"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="col-sm-6 col-xs-12 col-md-12"> 
                                        <?php include("./booking-wedding/captchacode-widget.php"); ?> 
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
                                    <label class="cont-check">Click here to indicate that you have read and agree to the booking <a href="<?php echo actual_link() ?>terms-and-conditions/" target="_blank" class="text-primary">terms and conditions</a>.
                                        <input type="checkbox"   id="agree" style="float: left;margin-right:10px;">
                                        <span class="checkmark" style="margin-left: 10px;"></span>
                                    </label>
                                </div>
                            </div>


                            <!--sandbox merchant id-->
                            <input type="hidden" name="merchant_id" value="213461">  
                            <!--live merchant id-->

                            <input type="hidden" name="return_url" value="https://kandycars.lk/payment-success.php?id=<?php echo $id ?>">
                            <input type="hidden" name="cancel_url" value="https://kandycars.lk/order-form.php?cancelled">
                            <input type="hidden" name="notify_url" value="https://kandycars.lk/payments/notify.php">
                            <input type="hidden" name="package_id" id="package_id" value="<?php echo $id ?>" />
                            <input name="order_id" id="order_id" type="hidden" value="<?php echo $order_id; ?>" />
                            <input name="amount" id="amount" type="hidden"    class="payment"/>
                            <input name="items" id="items" type="hidden"   value="1"/>
                            <input type="hidden" name="currency" value="LKR">
                            <input type="hidden" id="summery-append" name="summery-append" value="">

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
                   
                    <div class="panel-body" id="price-summery"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pick up D / T: </th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"></span></p> </td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Return D / T:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="drop_up_date_append"></span></p></td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Pick up method:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="select_method_append"></span></p> </td>
                            </tr>
                            <tr id="select_method_drop_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Drop method:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"> <p class="price-summer-p"><span id="select_method_drop_append"></span></p></td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pick up office:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="select_office_append"></span></p></td>
                            </tr>
                            <tr id="pickup_hide">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pickup:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"> <p class="price-summer-p"><span id="pickup"></span></p></td>
                            </tr>
                            <tr id="destination_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Destination:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"> <p class="price-summer-p"><span id="drop_location_append"></span></p></td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Total Distance:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">  <p class="price-summer-p"><span id="destination_distance_append"></span></p></td>
                            </tr>
                            <tr id="package_charge_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Package Charge:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><strong><span id="package_charge"></span></strong></p></td>
                            </tr>

                            <tr style="border-top: 0.5px solid #b4a8a8; display: none" id="deliver_charge_hide">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Delivery Charges:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><strong><span id="deliver_charge"></span></strong></p></td>
                            <input type="hidden" id="deliver_charge_number" value="0" />
                            </tr>

                            <tr style="border-top: 0.5px solid #b4a8a8;; display: none" id="extra_mileage_hide" >
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Extra Mileage:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"> <p class="price-summer-p"><span id="extra_mileage_append"></span></p></td>
                            </tr>

                            <tr id="extra_price_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Extra Price:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">  <p class="price-summer-p"><strong><span id="extra_price_append"></span></strong></p></td>
                            <input type="hidden" id="extra_price" value="0" />
                            </tr>

                            <tr style="border-top: 0.5px solid #b4a8a8;">

                            </tr>

                            <tr style="display: none" id="deco_charge_hide">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Decoration:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">   <p class="price-summer-p"><strong><span id="decoration_price_append"></span></strong></p></td>
                            <input type="hidden" id="dec_price" value="0" />
                            </tr>

                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Price</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">  <p class="price-summer-p"><strong><span id="price_id"></span></strong></p></td>
                            </tr>

                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Tax</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">
                                    <p class="price-summer-p"><span id="tax"></span></p>
                                </td>
                            </tr>

                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%"  align="left">Total Price</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left">
                                    <p class="price-summer-p"><strong><span class="total_price"></span></strong></p>
                                </td>
                            </tr>




                        </table>

                        <!--                        <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Pick up D / T: </p>  
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="pick_up_date_append"></span></p> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Return D / T:</p> 
                        
                                                    </div>
                                                    <div class="col-md-7">
                        
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Pick up method:</p>
                        
                                                    </div>
                                                    <div class="col-md-7">
                        
                                                    </div>
                                                </div>
                        
                                                <div class="row" id="select_method_drop_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Drop method:</p>
                                                    </div>
                                                    <div class="col-md-7">
                        
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Pick up office:</p> 
                                                    </div>
                                                    <div class="col-md-7">
                        
                                                    </div>
                                                </div>
                        
                                                <div class="row" id="pickup_hide">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Pickup:</p>
                                                    </div>
                                                    <div class="col-md-7">
                        
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p" id="destination_hide" style="display: none">Destination:</p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="drop_location_append"></span></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Total Distance:</p></div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="destination_distance_append"></span></p>
                                                    </div>
                                                </div>
                        
                                                                        <div class="row">
                                                                            <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                                                <p class="price-summer-p" id="return_office" style="display: none">Return Office:</p>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <p class="price-summer-p"><span id="select_office_drop_append"></span></p> 
                                                                            </div>
                                                                        </div>
                        
                        
                                                <div class="row" id="package_charge_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Package Charge:</strong></p></div>
                                                    <div class="col-md-7">
                                                     
                                                    </div>
                                                </div>-->

                        <!--                        <div class="row" id="driver_charge_hide" style="display: none">
                                                    <hr>
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Driver Charge:</p>                            </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="driver_charge"></span></p>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="row" id="distance_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p ">Delivery Distance:</p> 
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="distance"></span></p>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="row" id="ex_per_km_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Per km:</p></div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="ex_per_km"></span></p>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p" id="distance_price_hide" style="display: none">Distance Charge:</p></div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="distance_price"></span></p>
                                                    </div>
                                                </div> -->
                        <!--
                                                <div class="row" style="display: none" id="deliver_charge_hide" >
                                                    <hr>
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Delivery Charges:</strong></p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><strong><span id="deliver_charge"></span></strong></p>
                                                        <input type="hidden" id="deliver_charge_number" value="0" />
                                                    </div>
                                                </div>
                                                <div class="row" id="extra_mileage_hide" style="display: none">
                                                    <hr>
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Extra Mileage:</p>   
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="extra_mileage_append"></span></p>
                                                    </div>
                                                </div>
                                                <div class="row" id="extra_price_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Extra Price:</strong></p>   
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><strong><span id="extra_price_append"></span></strong></p>
                                                    </div>
                                                    <input type="hidden" id="extra_price" value="0" />
                                                </div>
                        
                                                <div class="row"  id="deco_charge_hide" style="display: none">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Decoration:</strong></p>   
                                                    </div>
                                                    <input type="hidden" id="dec_price" value="0" />
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><strong><span id="decoration_price_append"></span></strong></p>
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Price:</strong></p>   
                                                    </div>
                        
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><strong><span id="price_id"></span></strong></p>
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p">Tax:</p>      
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><span id="tax"></span></p>
                                                    </div>
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-5" style="border-right: 1px solid hsl(199.2, 9.8%, 50%);">
                                                        <p class="price-summer-p"><strong>Total price:</strong></p></div>
                                                    <div class="col-md-7">
                                                        <p class="price-summer-p"><strong><span class="total_price"></span></strong></p>
                                                    </div>
                                                </div>-->

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <b>Terms and Conditions </b> 
                        </div> 
                        <div class="panel-body"> 
                            <div class="row">
                                <div class="col-md-12" > 
                                    <?php
                                    echo $VEHICLE_TYPE->term_and_condition;
                                    ?>

                                </div>
                            </div> 
                        </div>
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
                                <button type="submit" data-dismiss="modal" class="btn-style-3 btn-sm submit decoration_btn" decoration-price="<?php echo $decoration['charge']; ?>" decoration-price-string="<?php echo number_format($decoration['charge'], 2); ?>" decoration_name="<?php echo $decoration['name'] ?>" decoration_id="<?php echo $decoration['id'] ?>" >Add Now</button>
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
<script src="<?php echo actual_link() ?>contact-form/scripts.js" type="text/javascript"></script>  
<script src="<?php echo actual_link() ?>distance/jquery.datetimepicker.full.js" type="text/javascript"></script> 
<script src="<?php echo actual_link() ?>control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('.date-time-picker').datetimepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 'today',
            timeFormat: 'HH:mm:ss',
        });
    });
</script>
<script src="<?php echo actual_link() ?>distance/js/wedding-cars.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo actual_link() ?>js/countrySelect.min.js" type="text/javascript"></script>

<script>
    $("#country").countrySelect({
        defaultCountry: "lk",
        responsiveDropdown: true
    });
    
     $("#accept").addClass("disabled");
</script>

<!--
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
</script>-->
</body>
</html>