<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?> 


<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Bookings</title>
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
                                    Manage Bookings
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-pages.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!--                                <div class="table-responsive">-->
                                <div>
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Order Date / Time</th> 
                                                <th>Full Name</th>  
                                                <th>Email</th> 
                                                <th>Phone Number</th> 
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Order Date / Time</th> 
                                                <th>Full Name</th>  
                                                <th>Email</th> 
                                                <th>Phone Number</th> 
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            $ORDER = new Order(NULL);
                                            foreach ($ORDER->all() as $key => $order) {
                                                ?>
                                                <tr id="row_<?php echo $order['id']; ?>">
                                                    <td><?php echo $order['id']; ?></td> 
                                                    <td><?php echo $order['ordered_at']; ?></td> 
                                                    <td><?php echo $order['first_name'] . " " . $order['last_name']; ?></td> 
                                                    <td><?php echo $order['email']; ?></td> 
                                                    <td><?php echo $order['phone_number']; ?></td> 

                                                    <td> 
                                                        <a href="view-booking.php?id=<?php echo $order['id']; ?>" class="op-link btn btn-sm btn-primary"><i class="glyphicon glyphicon-file"></i></a>  | 
                                                        <a  href="#" data-id="<?php echo $order['id']; ?>" class="delete-order op-link btn btn-sm btn-danger "><i class="glyphicon glyphicon-trash"></i></a>  
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
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
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="delete/js/order.js" type="text/javascript"></script>
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