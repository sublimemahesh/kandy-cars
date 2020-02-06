<?php
include_once(dirname(__FILE__) . '/class/include.php');

$PRICE = new Page(3);
?> 
<!doctype html>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title>Our Prices || www.kandycars.lk </title>

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
    <link rel="stylesheet" href="<?php echo actual_link() ?>font/demo-files/demo.css"><!--
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.css">
    -->  
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <!-- CSS theme files
    ============================================ -->
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="<?php echo actual_link() ?>stylesheet" href="css/fontello.css"><!--
    -->  <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <style>
        .service-title{
            text-align: center;
            margin-bottom: 30px;
            font-size: 34px!important;
        }
        .mg-bottom{
            margin-bottom:   30px;
        }
        .mg-top{
            margin-top:  75px;
        }


        table {background:#fff; text-transform:uppercase;overflow-x: auto; }
        table td, table th {border:#e2e2e4 1px solid; border-collapse:collapse; }
        table th {width:122px; font-weight:bold; text-align:left; padding:15px 10px 8px 20px;}
        table td { padding:21px 10px 21px 20px;}
        table td:first-child {font-weight:bold;}

        /* 
Generic Styling, for Desktops/Laptops 
        */
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        /* Zebra striping */
        tr:nth-of-type(odd) { 
            background: #eee; 
        }
        th { 
            background: #333; 
            color: white; 
            font-weight: bold; 
        }
        td, th { 
            padding: 6px; 
            border: 1px solid #ccc; 
            text-align: left; 
        }
        .table-wrapper-scroll-x {
            display: block;
            /*                        max-height: 200px;*/
            overflow-x: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        @media 
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {
            table{
                width: auto!important;
                height: auto!important;
            }
        }


    </style>
</head>

<body>




    <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <div  class="container margin-bottom-50 margin-top-75  table-wrapper-scroll-x" >

            <?php echo $PRICE->description; ?>

        </div>





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

    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>

    <!-- JS theme files
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script> 
</body>
</html>