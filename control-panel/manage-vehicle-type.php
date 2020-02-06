<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Vehicle Type</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <!-- Manage Brand -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Vehicle Type
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href=" ">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">  
                                <div class="row clearfix">  
                                    <?php
                                    $VEHICLE_TYPE = new VehicleType(NULL);
                                    foreach ($VEHICLE_TYPE->all() as $vehicle_type) {
                                        ?>
                                        <div class="col-md-3" id="div<?php echo $vehicle_type['id']; ?>"  >
                                            <div class="photo-img-container">
                                                <img src="../upload/vehicle_type/<?php echo $vehicle_type['image_name'] ?>" class="img-responsive ">
                                            </div>
                                            <div class="img-caption">
                                                <p class="maxlinetitle"><?php echo $vehicle_type['name'] ?></p>
                                                <div class="d"> 
                                                    <a href="edit-vehicle-type.php?id=<?php echo $vehicle_type['id']; ?>" title="Edit"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a> | 
                                                    <a href="arrange-vehicle-type.php?id=<?php echo $vehicle_type['id']; ?>" title="Arrange">  <button class="glyphicon glyphicon-random arrange-btn"></button></a> | 
                                                    <a href="view-vehicles.php?id=<?php echo $vehicle_type['id'] ?>" title="Add Vehicle">  <button class="glyphicon   glyphicon-scale arrange-btn"></button></a> | 
                                                    <a href="create-term-condition.php?id=<?php echo $vehicle_type['id'] ?>"  title="Add Term And Condition"> <button class="glyphicon   glyphicon-alert delete-btn"></button></a>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php } ?>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- #END# Manage brand -->

                </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script>
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/vehicle-type.js" type="text/javascript"></script>

    </body>

</html> 