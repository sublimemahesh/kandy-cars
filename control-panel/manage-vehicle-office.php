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
        <title>Add Offices</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <style>
            .select2-container{
                width: 100%  !important;
            }
        </style>
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
                                <h2>Create Offices -" <?php echo $PRODUCT_TYPE->name ?> "</h2>

                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/office-detail.php" enctype="multipart/form-data"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="js-example-basic-multiple" name="offices[]" multiple="multiple">
                                                    <?php
                                                    $OFFICE = new Office(null);
                                                    foreach ($OFFICE->all() as $office) {
                                                        ?>
                                                        <option value="<?php echo $office['id'] ?>"><?php echo $office['location'] ?></option> 
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-12"> 
                                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                                        <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="update"/>
                                    </div>
                                </form>
                                <div class="row">  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Packages
                                </h2>

                            </div>
                            <div class="body">
                                <!--                                <div class="table-responsive">-->

                                <div>
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>   
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>  
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $OFFICE_DETAILS = new OfficeDetail(NULL); 
                                                foreach ($OFFICE_DETAILS->getOfficeByVehicle($id) as $key => $office_details) {
                                                    $key++;
                                                    ?>
                                                    <tr id="div<?php echo $office_details['id']; ?>">
                                                        <td><?php echo $key; ?></td> 

                                                        <td> 
                                                            <?php
                                                            $OFFICE = new Office($office_details['office']);
                                                            echo $OFFICE->location;
                                                            ?> 
                                                        </td> 

                                                        <td>  
                                                            <a href="#"  class="delete-office-details" data-id="<?php echo $office_details['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a> 

                                                        </td>
                                                    </tr>

                                                    <?php
                                               
                                            }
                                            ?> 

                                        </tbody>
                                    </table>
                                </div> 

                                <!--                                </div>-->
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
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="delete/js/office-details.js" type="text/javascript"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        
        <script>

            $(document).ready(function () {
                $('.js-example-basic-multiple').select2();
            });

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