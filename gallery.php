<?php
include_once(dirname(__FILE__) . '/class/include.php');

?> 
<!doctype html>
<html lang="en">

    <!-- Google Web Fonts
    ================================================== -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">


    <title>Our Gallery || www.kandycars.lk</title>

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
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">
    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo actual_link() ?>css/simplelightbox.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>



    <!--cookie-->
    <!-- <div class="cookie">
            <div class="container">
              <div class="clearfix">
                <span>Please note this website requires cookies in order to function correctly, they do not store any specific information about you personally.</span>
                <div class="f-right"><a href="#" class="button button-type-3 button-orange">Accept Cookies</a><a href="#" class="button button-type-3 button-grey-light">Read More</a></div>
              </div>
            </div>
          </div>-->

    <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->
        <?php include './header.php'; ?>

        <div id="content">
            <div class="page-section">
                <div class="container">
                    <div id="options">
                        <div id="filters" class="isotope-nav">

                            <?php
                            foreach (PhotoAlbum::all()as $key => $album) {
                                ?>

                                <button data-filter=".album_<?php echo $album['id']; ?>" id="album_<?php echo $album['id']; ?>"><?php echo $album['title']; ?></button>
                                <?php
                            }
                            ?>

                        </div>
                    </div>

                    <!-- - - - - - - - - - - - - - End of Filter - - - - - - - - - - - - - - - - -->      

                    <div class="isotope three-collumn clearfix portfolio-holder type-2" data-isotope-options='{"itemSelector" : ".item","layoutMode" : "masonry","transitionDuration":"0.7s","masonry" : {"columnWidth":".item"}}'>
                        <?php
                        foreach (AlbumPhoto::all()as $key => $photo) {
                            ?>

                            <div class="item album_<?php echo $photo['album']; ?>">

                                <div class="project  gallery">
                                    <a href="<?php echo actual_link() ?>upload/photo-album/gallery/<?php echo $photo['image_name'] ?>" class="big"> 

                                        <div class="project-image">
                                            <li class="  "> 
                                                <img src="<?php echo actual_link() ?>upload/photo-album/gallery/thumb/<?php echo $photo['image_name'] ?>" alt="<?php echo $photo['caption'] ?>" title="<?php echo $photo['caption'] ?>" />
                                            </li> 
                                        </div>


                                        <div class="project-description">
                                            <div class="description-inner">
                                                <h5 class="project-title" style="color: white">
                                                    <?php echo $photo['caption']; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div> 
                            </div>
                            <?php
                        }
                        ?> 
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
    <script src="<?php echo actual_link() ?>js/simple-lightbox.min.js" type="text/javascript"></script>
    <!-- JS theme files
    ============================================ -->
    <script src="<?php echo actual_link() ?>js/plugins.js"></script>
    <script src="<?php echo actual_link() ?>js/script.js"></script>

    <script>
        $(function () {
            var $gallery = $('.gallery a').simpleLightbox();
            $gallery.on('show.simplelightbox', function () {
                console.log('Requested for showing');
            })
                    .on('shown.simplelightbox', function () {
                        console.log('Shown');
                    })
                    .on('close.simplelightbox', function () {
                        console.log('Requested for closing');
                    })
                    .on('closed.simplelightbox', function () {
                        console.log('Closed');
                    })
                    .on('change.simplelightbox', function () {
                        console.log('Requested for change');
                    })
                    .on('next.simplelightbox', function () {
                        console.log('Requested for next');
                    })
                    .on('prev.simplelightbox', function () {
                        console.log('Requested for prev');
                    })
                    .on('nextImageLoaded.simplelightbox', function () {
                        console.log('Next image loaded');
                    })
                    .on('prevImageLoaded.simplelightbox', function () {
                        console.log('Prev image loaded');
                    })
                    .on('changed.simplelightbox', function () {
                        console.log('Image changed');
                    })
                    .on('nextDone.simplelightbox', function () {
                        console.log('Image changed to next');
                    })
                    .on('prevDone.simplelightbox', function () {
                        console.log('Image changed to prev');
                    })
                    .on('error.simplelightbox', function (e) {
                        console.log('No image found, go to the next/prev');
                        console.log(e);
                    });
        });
    </script>
</body>
</html>