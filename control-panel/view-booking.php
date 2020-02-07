<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$ORDER = new Order($id);
?> 


<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Booking</title>
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
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }
        p{
            margin: 8px;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .th-b{
            border-right: 1px solid hsl(199.2, 9.8%, 50%); 
            color: #666666;
            font-size: 13px;
            font-weight: bold;
            margin: 0px;
            font-family: Arial,Helvetica,sans-serif;
            line-height: 15px;
            width: 35%; 
            padding: 10px 0px 10px 5px;
        }
        .th-b-2{
            color: #666666;
            font-size: 13px;
            font-weight: 300;
            margin: 0px;
            font-family: Arial,Helvetica,sans-serif;
            line-height: 15px;
            width: 60%;
            padding: 10px 0px 10px 10px;
        }
    </style>

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
                                <h2 >View Booking ID - " <?php echo $ORDER->id ?> " </h2>

                            </div>
                            <div class="body">
                                <h3 style="margin-top: 0px!important;"> <u>Customer Details. </u> </h3>
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Order ID </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->id ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Order At </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->orderedAt ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Customer Full Name </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->firstName . ' ' . $ORDER->lastName ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Email </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->email ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Phone Number </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->phoneNumber ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Address </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->address ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">City </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->city ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Country </th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php echo $ORDER->country ?></span></p> </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Vehicle</th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php
                                                    $PACKAGE = new Package($ORDER->package);
                                                    $VEHICLES = new ProductType($PACKAGE->vehicle);
                                                    echo $VEHICLES->name;
                                                    ?>
                                                </span>
                                            </p> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th  class="th-b" width="40%" align="left">Package Name</th>
                                        <td class="th-b-2" width="60%" align="left"><p class="price-summer-p"><span id="pick_up_date_append"><?php $PACKAGE = new Package($ORDER->package);
                                                    echo $PACKAGE->title
                                                    ?></span></p> </td>
                                    </tr>
                                </table>
                                <h3> <u>Booking Details. </u> </h3>
<?php echo $ORDER->price_summery ?>
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