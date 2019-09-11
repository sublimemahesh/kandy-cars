<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!doctype html>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">

    <!-- Basic Page Needs
    ================================================== -->

    <title> <?php echo $activitiy->title ?> | Travel Sri Lanka</title>

    <!--meta info-->

    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="keywords" content="<?php echo $activitiy->keyword; ?>">
    <meta name="description" content="<?php echo $activitiy->short_description; ?>">


    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Vendor CSS
    ============================================ -->
    <link rel="shortcut icon" href="<?php echo actual_link() ?>./images/logo/img.png">
    <link rel="stylesheet" href="<?php echo actual_link() ?>font/demo-files/demo.css">

    <!-- CSS theme files
    ============================================ -->
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo actual_link() ?>css/set-1.css" rel="stylesheet" type="text/css"/> 

</head>

<body class="page-section-bg">

    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

        <?php include './header.php'; ?>

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

        <div id="content" class="page-content-wrap">
            <div class="container">    
                <div class="row">
                    <div class="col-md-8 carousel-type-2">
                        <h1><?php echo $activitiy->title; ?></h1> 
                        <?php echo $activitiy->description; ?>
                        <hr/>
                        <div class="row">
                            <?php
                            $SERVICE = Service::all();
                            foreach ($SERVICE as $key => $service) {
                                if ($key < 6) {
                                    ?>
                                    <div class="grid">
                                        <a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/">
                                            <figure class="effect-sarah">
                                                <img src="<?php echo actual_link() ?>upload/service/<?php echo $service["image_name"]; ?>" alt="img13">
                                                <figcaption>
                                                    <h2><?php echo $service["title"]; ?></h2>
                                                    <?php echo substr($service["short_description"], 0, 75); ?>
                                                </figcaption>			
                                            </figure>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">

                            <h3 class="widget-title">Other Location</h3>
                            <div class="entry-body" style="height: 773px;  overflow-y: auto;">
                                 <?php
                                 $LOCATIONS = Activities::all();
                                 foreach ($LOCATIONS as $key => $locations) {
                                     ?>
                                    <a href="<?php echo actual_link(); ?>rent-a-car/<?php echo str_replace(" ", "-", strtolower($locations['title'])); ?>/">

                                        <div class="row">

                                            <div class="col-md-4" style="margin-top: 15px;">
                                                <div class=" thumbnail-attachment">
                                                    <img src="<?php echo actual_link() ?>upload/activity/<?php echo $locations['image_name']; ?>" alt="<?php echo $locations['title']; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-8 description-service " style="margin-top: 15px;">

                                                <div class="entry-meta">
                                                    <h4>  
                                                        <?php echo $locations['title']; ?>
                                                    </h4>
                                                </div>

                                            </div>
                                        </div>

                                    </a>

                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


        <?php include './footer.php'; ?>

        <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

    </div>

    <!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

    <!-- JS Libs & Plugins
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/bootstrap.js" type="text/javascript"></script>
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

    <!-- JS theme files
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>


</body>
</html>