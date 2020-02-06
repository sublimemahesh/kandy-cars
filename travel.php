<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!doctype html>
<html lang="en"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <title>Our Travels ||  www.kandycar.lk</title>

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
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
</head>

<body>

   


    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->
        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

        <?php include './header.php'; ?>
        <!--        <div class="container about-bg ">
                    <div class="container">
                        <div class="rl-banner">
                            <h2 class="tp">Services</h2>
                            <ul>
                                <li><a href="./">Home</a></li>
                                <li><span class="active">Services</span></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
        <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

        <div id="content" >

            <div class="container page-section">

                <div class="row">
                    <aside  id="main" class="sbl style-2 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        $LOCATION = Activities::all();
                        foreach ($LOCATION as $key => $location) {
                            ?>
                            <div  class="products-holder view-list">
                                <div class="row flex-row">
                                    <div class="col-sm-12 col-xs-6">  
                                        <div class="product">
                                            <figure class="product-image">
                                                <a href="<?php echo actual_link(); ?>rent-a-car/<?php echo str_replace(" ", "-", strtolower($location['title'])); ?>/"><img src="<?php echo actual_link() ?>upload/activity/<?php echo $location["image_name"]; ?>" alt=""></a>
                                            </figure>
                                            <div class="product-description">
                                                <div class="col-xs-12">
                                                    <h5 class="product-name"><a href="<?php echo actual_link(); ?>rent-a-car/<?php echo str_replace(" ", "-", strtolower($location['title'])); ?>/"><?php echo $location["title"]; ?></a></h5>
                                                    <p class="text-justify" style="margin-top: 12px;"><?php echo substr($location["description"], 0, 500); ?></p>
                                                </div>
                                                <div class="model-info pull-right" style="margin-right: 20px;">
                                                    <div ><a href="<?php echo actual_link(); ?>rent-a-car/<?php echo str_replace(" ", "-", strtolower($location['title'])); ?>/" class="btn-2">View</a></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                    </aside >

                </div>
            </div>

        </div>


        <?php include './footer.php'; ?>

    </div>

    <!-- JS Libs & Plugins
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/libs/jquery.modernizr.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-2.2.4.min.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/jquery-ui.min.js"></script>
    <script src="<?php echo actual_link() ?>js/libs/retina.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/mad.customselect.js"></script>
    <script src="<?php echo actual_link() ?>plugins/sticky-sidebar.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyBN4XjYeIQbUspEkxCV2dhVPSoScBkIoic"></script>
    <script src="<?php echo actual_link() ?>plugins/jquery.queryloader2.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/instafeed.min.js"></script>
    <script src="<?php echo actual_link() ?>plugins/twitter/jquery.tweet.js"></script>

    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>

</body>
</html>