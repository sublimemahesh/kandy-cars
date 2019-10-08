<?php
include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';

$About = new Page(1);
$Vission = new Page(7);
$Mission = new Page(8);
$ORDER = new Order(NULL);

if (isset($_GET["order_id"])) {
    $ID = $_GET["order_id"];
    $paymentSatusCode = $ORDER->getPaymentStatusCode($ID);
}
?> 
<!doctype html>
<html lang="en">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <title> Payment success || www.kandycars.lk</title>

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
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css"> 
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

</head>
<style>
    .success-page{
        max-width:300px;
        display:block;
        margin: 0 auto;
        text-align: center;
        position: relative;
        transform: perspective(1px) translateY(50%)
    }
    .success-page img{
        max-width:62px;
        display: block;
        margin: 0 auto;
    }

    .btn-view-orders{
        display: block;
        border:1px solid #47c7c5;
        width:120px;
        margin: 0 auto;
        margin-top: 45px;
        padding: 10px;
        color:#fff;
        background-color:#47c7c5;
        text-decoration: none;
        margin-bottom: 20px;
    }
    h2{
        color:#47c7c5;
        margin-top: 25px;

    }
    a{
        text-decoration: none;
    }
</style>
<body>



    <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->
        <section class="hidden-xs hidden-sm">
            <div class="container margin-bottom-40 margin-top-50">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">


                        <?php
                        if (isset($_GET["order_id"])) {
                            
                            if ($paymentSatusCode == 2) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading"> <h2 class="text-center">PAYMENT SUCCESSFUL !</h2></div>
                                    <div class="panel-body"> 
                                        <p class="  text-center" style=" color:#000;">
                                            Dear Client, your payments has been accepted and the booking is confirmed.
                                            Kindly Check your e-mail inbox for confirmation mail and go through it.
                                            <span class="text-danger">DO NOT DELETE THE CONFIRMATION E-MAIL.</span>
                                            THANK YOU.......!
                                        </p>

                                        <a href="<?php echo actual_link() ?>home/" class="btn btn-view-orders">Home</a> 
                                        <center>
                                            <a href="mailto:"><i class="fa fa-google"></i>  </a>
                                        </center>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading"> <h2 class="text-center">Payment was declined</h2></div>
                                    <div class="panel-body"> 
                                        <p class="text-danger text-center">Your Payment was not successful. Please do your reservation again.</p>
                                        <a href="<?php echo actual_link() ?>home/" class="btn btn-view-orders">Home</a> 
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>




                        <div class="col-md-4">
                        </div>
                    </div>




                </div>
        </section>


        <!-- Footer -->

        <?php include './footer.php'; ?>

        <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

    </div>


    <script src="<?php echo actual_link() ?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery.modernizr.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-2.2.4.min.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-ui.min.js"></script> 
    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>

    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>

</html>