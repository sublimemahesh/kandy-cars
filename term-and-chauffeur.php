<!doctype html>
<?php
include_once(dirname(__FILE__) . '/class/include.php');
include './main-fuction.php';
$TERM_AND_CONDITION = new TermAndCondition(3);

?>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title>Term and condition || www.kandycars.lk</title>

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


</head>


<body> 

    <div id="wrapper" class="wrapper-container"> 
        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - --> 
        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav> 
        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
        <div class="container margin-top-50  "  >   
            <div class="col-md-12"  >
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4> <b>Term and Conditions</b></h4></div>
                    <div class="panel-body" > 
                        <p><?php echo $TERM_AND_CONDITION->discription; ?></p>
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




</body>
</html>