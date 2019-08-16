<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PRODUCT_TYPE = new ProductType($id);
?> 

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Products</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid">  
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Product Type
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-product-type.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" method="post" action="post-and-get/product-type.php" enctype="multipart/form-data"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="name" class="form-control"  value="<?php echo $PRODUCT_TYPE->name; ?>"  name="name"  required="TRUE">
                                                <label class="form-label">Title</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="type" id="type" class="form-control">
                                                    <option value=""> -- Please select the vehicle type --</option>
                                                    <?php
                                                    $VEHICLE_TYPE = new VehicleType(NULL);
                                                    foreach ($VEHICLE_TYPE->all() as $vehicle_type) {
                                                        if ($PRODUCT_TYPE->type == $vehicle_type['id']) {
                                                            ?>
                                                    <option value="<?php echo $vehicle_type['id'] ?>" selected=""><?php echo $vehicle_type['name'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $vehicle_type['id'] ?>"><?php echo $vehicle_type['name'] ?></option>
                                                        <?php }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                       
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" id="image" class="form-control" value="<?php echo $PRODUCT_TYPE->image_name; ?>"  name="image">
                                                <img src="../upload/product-type/<?php echo $PRODUCT_TYPE->image_name; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Self Driver</h4>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off" value="<?php echo $PRODUCT_TYPE->sd_charge_per_day; ?>" name="sd_charge_per_day" required="true">
                                                <label class="form-label">Charge Per Day</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->sd_mileage_limit; ?>" name="sd_mileage_limit" required="true">
                                                <label class="form-label">Mileage Limit</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->sd_excess_mileage; ?>" name="sd_excess_mileage" required="true">
                                                <label class="form-label">Charge Per Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->sd_delayed_hour; ?>" name="sd_delayed_hour" required="true">
                                                <label class="form-label">Charge Per Delayed Hour</label>
                                            </div>
                                        </div>
                                    </div>   


                                    <div class="col-md-12">
                                        <h4>With Driver</h4>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wd_mileage; ?>" name="wd_mileage" required="true">
                                                <label class="form-label">Charge </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wd_charge; ?>" name="wd_charge" required="true">
                                                <label class="form-label">Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wd_duration; ?>" name="wd_duration" required="true">
                                                <label class="form-label">Duration</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wd_excess_mileage; ?>" name="wd_excess_mileage" required="true">
                                                <label class="form-label">Charge Per Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wd_waiting_hour; ?>" name="wd_waiting_hour" required="true">
                                                <label class="form-label">Charge Per Waiting Hour</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4>Wedding And Events</h4>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->wedd_mileage; ?>" name="wedd_mileage" required="true">
                                                <label class="form-label">Charge </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->weed_charge; ?>"  name="weed_charge" required="true">
                                                <label class="form-label">Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->weed_duration; ?>" name="weed_duration" required="true">
                                                <label class="form-label">Duration</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->weed_excess_mileage; ?>" name="weed_excess_mileage" required="true">
                                                <label class="form-label">Charge Per Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->weed_waiting_hour; ?>" name="weed_waiting_hour" required="true">
                                                <label class="form-label">Charge Per Waiting Hour</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->weed_decoration; ?>" name="weed_decoration" required="true">
                                                <label class="form-label">Charge For Decoration</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <h4>Parade</h4>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_mileage; ?>" name="parade_mileage" required="true">
                                                <label class="form-label">Charge </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_charge; ?>" name="parade_charge" required="true">
                                                <label class="form-label">Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_duration; ?>" name="parade_duration" required="true">
                                                <label class="form-label">Duration</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="rate_per_day" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_excess_mileage; ?>" name="parade_excess_mileage" required="true">
                                                <label class="form-label">Charge Per Excess Mileage</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_waiting_hour; ?>" name="parade_waiting_hour" required="true">
                                                <label class="form-label">Charge Per Waiting Hour</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="excess_mileage" class="form-control" autocomplete="off"  value="<?php echo $PRODUCT_TYPE->parade_decoration; ?>" name="parade_decoration" required="true">
                                                <label class="form-label">Charge For Decoration</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <input type="hidden" id="oldImageName" value="<?php echo $PRODUCT_TYPE->image_name; ?>" name="oldImageName"/>
                                        <input type="hidden" id="id" value="<?php echo $PRODUCT_TYPE->id; ?>" name="id"/>
<!--                                            <input type="hidden" id="authToken" value="<?php echo $_SESSION["authToken"]; ?>" name="authToken"/>-->
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                    </div>
                                    <div class="row clearfix">  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/add-new-ad.js" type="text/javascript"></script>


        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });


        </script>
    </body>

</html>