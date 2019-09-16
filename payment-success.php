<?php
include_once(dirname(__FILE__) . '/class/include.php');

$About = new Page(1);
$Vission = new Page(7);
$Mission = new Page(8);
?> 
<!doctype html>
<html lang="en">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <title> About Us || www.kandycars.lk</title>

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

</head>
<style>
    .success-page{
        max-width:300px;
        display:block;
        margin: 0 auto;
        text-align: center;
        position: relative;
        top: 50%;
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
        width:100px;
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

                <div class="row margin-bottom-40 ">

                    <div class="col-md-12 ">

                        <div class="success-page">
                            <img  src="http://share.ashiknesin.com/green-checkmark.png" class="center" alt="" />
                            <h2>Payment Successful !</h2>
                            <p>We are delighted to inform you that we received your payments</p>
                            <a href="#" class="btn-view-orders">View Orders</a>
                            <a href="#">Continue Shopping</a>
                        </div>
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