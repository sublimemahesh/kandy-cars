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

    <title> <?php echo $service['title'] ?> | Services | www.kandycars.lk</title>

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

    <!-- CSS theme files
    ============================================ -->
    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>

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
                        <div id="transport_photos" class="galleria-slider">
                            <?php
                            $SERVICE_PHOTO = ServicePhoto::getServicePhotosById($service['id']);

                            foreach ($SERVICE_PHOTO as $key => $service_photo) {
                                ?>   
                                <a href="<?php echo actual_link() ?>upload/service/gallery/<?php echo $service_photo['image_name']; ?>">
                                    <img src="<?php echo actual_link() ?>upload/service/gallery/<?php echo $service_photo['image_name']; ?>" data-title="" >
                                </a>
                                <?php
                            }
                            ?>
                        </div> 

                        <div style="padding-top:30px; ">
                            <p  style="margin-top: 50px;font-size:32px;"><?php echo $service['title']; ?></p>
                            <hr>
                            <p class="text-justify" style="margin-top:10px;font-size:28px; "><?php echo $service['description'] ?></p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="widget">

                            <h3 class="widget-title">Other Services</h3>
                            <?php
                            $SERVICE = Service::all();
                            foreach ($SERVICE as $key => $service) {
                                ?>
                                <a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/">
                                    <div class="entry-body">

                                        <div class="col-md-4" style="margin-top: 15px;">
                                            <div class=" thumbnail-attachment">
                                                <img src="<?php echo actual_link() ?>upload/service/<?php echo $service['image_name']; ?>" alt="<?php echo $service['title']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-8 description-service " style="margin-top: 15px;">

                                            <div class="entry-meta">
                                                <h4>  
                                                    <?php echo $service['title']; ?>
                                                </h4>
                                            </div>
                                            <?php echo substr($service['description'], 0, 60); ?>
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
    <script src="<?php echo actual_link() ?>view/galleria.js" type="text/javascript"></script>
    <script src="<?php echo actual_link() ?>view/galleria.classic.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#transport_photos').galleria({
            responsive: true,
            height: 500,
            autoplay: 7000,
            lightbox: true,
            showInfo: true,

            imageCrop: true,
        });
    </script>

    <!-- JS theme files
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>
    <script>
        $(document).ready(function () {
            $('#carl').owlCarousel()({
                nav: false,

            });
        });
    </script>

</body>
</html>