<?php
include_once(dirname(__FILE__) . '/class/include.php');
 
?>
<!doctype html>
<html lang="en"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <title>Our Services ||  www.kandycars.lk</title>

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

                    <aside  class="sbl style-2 col-md-3 col-sm-12">
                        <?php
                        $SUB_SERVICE = SubService::all();
                        foreach ($SUB_SERVICE as $key => $sub_service) {
                            ?>
                            <div class="icons-box">
                                <!--                                <div class="col-md-12 col-xs-6">
                                                                     - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - -         
                                                                    <div class="icons-wrap"  >
                                
                                                                        <a href="#" class="icons-item type-2">
                                                                            <img src="upload/sub_services/<?php echo $sub_service["image_name"]; ?>" alt="">
                                                                            <div class="item-box">
                                
                                                                                <h4 class="icons-box-title" style="font-size:16px!important; "><?php echo $sub_service["title"]; ?></h4>
                                                                                <p class="icons-box-title" style="font-size:11px!important;font-weight:normal!important; "><?php echo $sub_service["description"]; ?></p>
                                                                            </div>
                                                                        </a>
                                
                                                                    </div>
                                                                    
                                
                                                                </div>-->
                                <img src="<?php echo actual_link() ?>upload/sub_services/<?php echo $sub_service["image_name"]; ?>" alt="">
                                <div class="item-box" style="background:#fff;padding-left: 10px;padding-right: 10px; padding-bottom: 10px;margin-bottom: 5px;">

                                    <h4 class="icons-box-title text-center" style="font-size:16px!important;padding-top: 10px; "><?php echo $sub_service["title"]; ?></h4>
                                    <p class="icons-box-title" style="font-size:11px!important;font-weight:normal!important; "><?php echo $sub_service["description"]; ?></p>
                                </div>
                            </div>
                        <?php }
                        ?>

                    </aside>
                    <aside  id="main" class="sbl style-2 col-md-9 col-sm-12 col-xs-12">
                        <?php
                        $SERVICE = Service::all();
                        foreach ($SERVICE as $key => $service) {
                            ?>
                            <div  class="products-holder view-list">
                                <div class="row flex-row">
                                    <div class="col-sm-12 col-xs-6">  
                                        <div class="product">
                                            <figure class="product-image">
                                                <a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/"><img src="<?php echo actual_link() ?>upload/service/<?php echo $service["image_name"]; ?>" alt=""></a>
                                            </figure>
                                            <div class="product-description">
                                                <div class="col-xs-12">
                                                    <h5 class="product-name"><a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/"><?php echo $service["title"]; ?></a></h5>
                                                    <p class="text-justify" style="margin-top: 12px;"><?php echo substr($service["short_description"],0,250); ?></p>
                                                </div>
                                                <div class="model-info pull-right" style="margin-right: 20px;">
                                                    <div ><a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/" class="btn-2">View</a></div>
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