<!doctype html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');

$PACKAGE = new Package($package['id']);

$VEHICLE = new ProductType($PACKAGE->vehicle);
$VEHICLE_TYPE = new VehicleType($VEHICLE->type);

$ORDER = new Order(NULL);
$LASTID = $ORDER->getLastID();
$order_id = $LASTID + 1;
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
        <div class="container margin-top-50  "      >  
            <div class="alert hidden" id="beautypress-form-msg">

            </div>
            <div class="col-md-8" id="package_panel">
                <img id="loading" src="https://www.vedantalimited.com/SiteAssets/Images/loading.gif" style="display: none; position: absolute;margin-top: 40%;margin-left: 37%;z-index: 999;"/>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b><?php echo $PACKAGE->title ?></b></h4></div>
                    <div class="panel-body" > 
                        <div class="  question-form bg-sidebar-item">
                            <div class="contact-form">  
                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Package Details - Pick up And Return ( Date / Time)</div>
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

                                            <div  id="table-bar-display"   > 
                                                <div  class="col-sm-6 col-xs-12 col-md-12" style="display: flex;  overflow: auto;  white-space: nowrap;">
                                                    <table class="table table-bordered" id="table-res">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Number of dates</th>
                                                                <th>Mileage Limit</th>
                                                                <th>Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <td>
                                                            <?php echo $PACKAGE->title ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $PACKAGE->dates ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $PACKAGE->km ?> km
                                                        </td>
                                                        <td>
                                                            Rs: <?php echo number_format($PACKAGE->charge, 2) ?>
                                                        </td> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div  id="table-bar" style="display: none"> 
                                                <div class="col-sm-6 col-xs-12 col-md-12 table-responsive">
                                                    <table class="table table-bordered ">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Number of dates</th>
                                                                <th>Mileage Limit</th>
                                                                <th>Price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="package_body"> 

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-12 col-md-6">
                                                <label>Pick up Date / Time</label>
                                                <input type="text" id="pick_up_date"   class="form-control date-time-picker " data-select="date"  placeholder="Pick up Date / Time" autocomplete="off">
                                            </div>

                                            <div class="col-sm-6 col-xs-12 col-md-6">
                                                <label>Return Date / Time</label>
                                                <input type="text" id="drop_up_date" class="form-control "    placeholder="Return Date / Time" disabled="">
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
                                                    <label>Select your nearest office</label>
                                                    <select  style="padding-left: 10px"  id="office">
                                                        <option value="" selected=""> -- Select your nearest office --</option>
                                                        <?php
                                                        $OFFICE_DETAILS = new OfficeDetail(NULL);

                                                        foreach ($OFFICE_DETAILS->getOfficeByVehicle($PACKAGE->vehicle) as $key => $office_details) {
                                                            $OFFICE = new Office($office_details['office']);
                                                            ?>
                                                            <option value="<?php echo $OFFICE->location ?>">
                                                                <?php
                                                                echo $OFFICE->location;
                                                                ?>
                                                            </option>  
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="your_location" style="display: none" >
                                                    <label>Where you want us to deliver the vehicle</label>
                                                    <input type="text"  id="origin" class="form-control"  name="name"  placeholder="Your Location" autocomplete="off">                
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Select return location </div>
                                        <div class="panel-body"> 
                                            <div class="col-sm-6 col-xs-12 col-md-12" > 
                                                <select  style="padding-left: 10px"  id="select_method_drop" > 
                                                    <option value="" selected=""> -- Select return location --</option>
                                                    <option value="Drop From Office"> Return at Office </option>  
                                                    <option value="Home Delivery"> Home Delivery </option>
                                                </select>                 
                                            </div> 

                                            <div class="col-sm-6 col-xs-12 col-md-6 "  >
                                                <div class="drop_office"  style="display: none"> 
                                                    <label>The return location</label>
                                                    <input type="text" id="select_office_val" class="form-control"  name="name"  placeholder="Your Location" disabled="">            
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12 col-md-6 "  >
                                                <div  style="display: none" id="your_drop_location">
                                                    <label>Where you return the vehicle</label>
                                                    <input type="text" class="form-control  "  id="destination" name="name"  placeholder="Drop of Your Location" autocomplete="off" >            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12 col-xs-12"> 
                                        <input type="hidden" name="dates" id="dates" value="<?php echo $PACKAGE->dates ?>" />
                                        <input type="hidden" name="package_id" id="package_id" value="<?php echo $PACKAGE->id ?>" />
                                        <button type="submit" id="next" class="btn btn-style-3 submit">Next</button>
                                    </div>
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
<!--                           <form name="order_from" id="payments" class="order_from" action="https://sandbox.payhere.lk/pay/checkout" method="post" autocomplete="off">   -->
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
                                    <input type="text" id="country" class="form-control"  name="country"  placeholder="City"  >            
                                </div>

                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <label>Security Code</label>
                                    <input type="text" id="captchacode" class="form-control"  name="captchacode"  placeholder="Security Code"  >            
                                </div> 
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="col-sm-6 col-xs-12 col-md-12"> 
                                        <?php include("./booking-rent-car/captchacode-widget.php"); ?> 
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
<!--                             <input type="hidden" name="merchant_id" value="1213021"> -->


                            <!--live merchant id-->
                            <input type="hidden" name="merchant_id" value="213461"> 
                            <input type="hidden" name="return_url" value="https://kandycars.lk/payment-success.php?id=<?php echo $package['id'] ?>">
                            <input type="hidden" name="cancel_url" value="https://kandycars.lk/order-form.php?cancelled">
                            <input type="hidden" name="notify_url" value="https://kandycars.lk/payments/notify.php">
                            <input type="hidden" name="package_id" id="package_id" value="<?php echo $package['id'] ?>" />
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

            <div class="col-md-4"   >
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Price Summary </b> 
                    </div> 
                    <div class="panel-body" id="price-summery"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pick up D / T: </th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"></span></p> </td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Return D / T: </th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="drop_up_date_append"></span></p> </td>
                            </tr>

                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pick up method:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="select_method_append"></span></p> </td>
                            </tr>

                            <tr id="select_method_drop_hide" style="display: none;  "  > 
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left" >Drop method:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left" ><p class="price-summer-p"><span id="select_method_drop_append"></span></p> </td>
                            </tr>


                            <tr id="pick_up_office_bar" >
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Pick up office:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="select_office_append"></span></p> </td>
                            </tr>

                            <tr id="return_office" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Return Office:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="select_office_drop_append"></span></p> </td>
                            </tr>
                            <tr id="deliver_charge_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Deliver Charges:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="deliver_charge"></span></p> </td>
                            </tr>

                            <tr id="package_charge_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Package Charge:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="package_charge"></span></p> </td>
                            </tr>

                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Price:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="price_id"></span></p> </td>
                            </tr>


                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Tax:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="tax"></span></p> </td>
                            </tr>
                            <tr>
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Total price:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span class="total_price"></span></p> </td>
                            </tr>



                            <tr id="distance_hide" style="display: none;border-top: 0.5px solid #b4a8a8;">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Distance:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="distance"></span></p> </td>
                            </tr>
                            <tr id="ex_per_km_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Per km:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="ex_per_km"></span></p> </td>
                            </tr>
                            <tr id="distance_price_hide" style="display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Distance Charge:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="distance_price"></span></p> </td>
                            </tr>
                            <tr id="driver_charge_hide" style=" ; display: none">
                                <th style="border-right: 1px solid hsl(199.2, 9.8%, 50%); color: #666666;font-size: 13px;font-weight: bold; margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 35%; padding: 10px 0px 10px 5px;" width="40%" align="left">Drive Charge:</th>
                                <td style="color: #666666;font-size: 13px;font-weight: 300;margin: 0px;font-family: Arial,Helvetica,sans-serif;line-height: 15px;width: 60%;padding: 10px 0px 10px 10px;" width="60%" align="left"><p class="price-summer-p"><span id="driver_charge"></span></p> </td>
                            </tr>
                        </table>
                    </div>                     
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Terms and Conditions </b> 
                    </div> 
                    <div class="panel-body" style="overflow-y: auto;height: 450px;"> 
                        <div class="row">
                            <div class="col-md-12 " >

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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBowwQmOfERv2WsBHHvFs2rNTwQex9r1A&libraries=places&reigion=lk"></script>
<script src="<?php echo actual_link() ?>distance/js/distance-rent-car.js" type="text/javascript"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo actual_link() ?>js/countrySelect.min.js" type="text/javascript"></script>



<script>
    $("#country").countrySelect({
        defaultCountry: "lk",
        responsiveDropdown: true
    });
    $("#accept").addClass("disabled");
</script>
</body>
</html>