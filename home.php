<?php
include_once(dirname(__FILE__) . '/class/include.php');

$WEILCOME_QUOTE = new Page(5);

$WEILCOME_Description = new Page(6);

//$id = $_GET["id"];
?>

<!doctype html>

<html lang="en">

    <title>Kandy Cars - Sri Lanka Rental Cars, Luxury Wedding Cars, Car Import Dealers</title>

    <!--meta info-->

    <meta charset="utf-8"> 

    <meta name="keywords" content="rent a car in kandy, kandy rent car ,kandy car rent, rent a car in sri lanka, self drive vehicle rentals, wedding car hire kandy, wedding car hire sri lanka, airport transfer in sri lanka, budget rent a car sri lanka, airport drop kandy, airport pickup kandy, sri lanka car and driver hire">

    <meta name="description" content="Kandy Car provide you with access to a variety of luxury automobiles suitable for any occasion according to your choice and for the best deals….">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



    <!-- Vendor CSS

    ============================================ -->

    <link rel="shortcut icon" href="<?php echo actual_link() ?>/images/logo/img.png">

    <link rel="stylesheet" href="<?php echo actual_link() ?>font/demo-files/demo.css"> 

    <link href="<?php echo actual_link() ?>css/responsive.css" rel="stylesheet" type="text/css"/>



    <link href="<?php echo actual_link() ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?php echo actual_link() ?>css/fontello.css"> 
    <link rel="stylesheet" href="<?php echo actual_link() ?>css/owl.carousel.css">

    <link rel="stylesheet" href="<?php echo actual_link() ?>css/style.css">

    <link rel="stylesheet" href="<?php echo actual_link() ?>css/responsive.css">

    <link href="<?php echo actual_link() ?>css/custom.css" rel="stylesheet" type="text/css"/> 

    <link href="<?php echo actual_link() ?>css/set-1.css" rel="stylesheet" type="text/css"/> 


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Google Web Fonts

    ================================================== -->



    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900%7COverpass:300,400,600,700,800,900" rel="stylesheet">



    <!-- Basic Page Needs

    ================================================== -->



</head>



<body>



    <!--    <div id="loader">
    
            <div class="box loading"></div>
    
        </div>-->





    <div id="wrapper" class="wrapper-container">



        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>



        <?php include './header.php'; ?>




        <div class="container" style="margin-top: 20px;">
            <div class="owl-carousel container" data-max-items="5" data-item-margin="10" data-dots="false">

                <?php
                $LOCATIONS = new Activities(NULL);

                foreach ($LOCATIONS->all() as $key => $location) {

                    if ($key == 8) {
                        
                    }
                    ?>

                    <!-- Slide -->                  

                    <div class="item-carousel">

                        <div class="" style="background-color:#fff ">

                            <a href="<?php echo actual_link(); ?>rent-a-car/<?php echo str_replace(" ", "-", strtolower($location['title'])); ?>/">

                                <img src="<?php echo actual_link() ?>upload/activity/<?php echo $location["image_name"]; ?>" alt="<?php echo $location["title"]; ?>">
                                <h4 class="img-title"><?php echo $location["title"]; ?></h4>
                            </a> 

                        </div> 

                    </div> 

                    <?php
                }
                ?>



            </div>
        </div>
        <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->

        <div class="page-section">

            <div class="container">

                <div class="row">

                    <div class="col-sm-4" style="height: 711px;
overflow-y: auto;
">

                        <h2>Welcome to Kandy Cars</h2>

                        <h1 style="font-size: 18px;padding: 0px;margin-bottom: 0px;">Rent a Car, Luxury Wedding Car, Taxi & Tours</h1>

                        <p class="text-size-medium"><?php echo $WEILCOME_QUOTE->description; ?> </p>

                        <p class="text-size-medium"><?php echo $WEILCOME_Description->description; ?></p>

                        <a href="<?php echo actual_link() ?>about-us/" class="btn">More About Us</a>

                    </div>

                    <div class="col-sm-8 "> 

                        <div class="row">

                            <?php
                            $SERVICE = new Service(NULL);

                            foreach ($SERVICE->all() as $key => $service) {

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

                </div>

            </div>

        </div>

        <div class="page-section parallax-section" data-bg="<?php echo actual_link() ?>images/1920x999_bg2.jpg">

            <div class="container">

                <div class="title-holder align-center">

                    <h2 class="section-title">Our Vehicles</h2>

                    <p class="text-size-medium">"We have the Largest Fleet of Vehicles in Kandy..."</p>

                </div>



                <div class="carousel-type-3 products-holder">



                    <div class="owl-carousel container" data-max-items="3" data-item-margin="30" >

                        <?php
                        $PRODUCT = new ProductType(NULL);

                        foreach ($PRODUCT->all() as $key => $product) {
                            ?>

                            <!-- Slide -->                  

                            <div class="item-carousel">

                                <div class="" style="background-color:#fff ">

                                    <a href="<?php echo actual_link(); ?>vehicles/<?php echo str_replace(" ", "-", strtolower($product['name'])); ?>/">

                                        <img src="<?php echo actual_link() ?>upload/product-type/<?php echo $product["image_name"]; ?>" alt="">



                                    </a>

                                    <div class="product-description no-rating">

                                        <h5 class="product-name"><a href="<?php echo actual_link(); ?>vehicles/<?php echo str_replace(" ", "-", strtolower($product['name'])); ?>/"><?php echo $product["name"]; ?></a></h5>



                                    </div> 
                                </div> 

                            </div> 

                            <?php
                        }
                        ?>



                    </div>



                </div>



                <div class="align-center"><a href="<?php echo actual_link(); ?>vehicles/" class="btn">Show All</a></div>



            </div>



        </div>





        <div class=" page-section align-center margin-top-40 margin-bottom-40" >



            <div class="container">



                <!-- - - - - - - - - - - - - Owl-Carousel - - - - - - - - - - - - - - - -->        



                <div class="carousel-type-2">



                    <div class="owl-carousel" data-max-items="1">

                        <?php
                        $COMMENTS = Comments::all();

                        foreach ($COMMENTS as $key => $comment) {
                            ?>

                            <!-- Slide -->        

                            <div class="item-carousel">

                                <!-- Carousel Item --> 



                                <!-- - - - - - - - - - - - - - Testimonial - - - - - - - - - - - - - - - - -->

                                <div class="testimonial type-3">



                                    <div class="testimonial-holder">

                                        <div class="author-box">






                                            <div class="author-info">

                                                <a href="#" class="avatar">

                                                    <img src="<?php echo actual_link() ?>upload/comments/<?php echo $comment["image_name"]; ?>" alt="">

                                                </a>

                                                <h6 class="author-name"><?php echo $comment["name"]; ?></h6>





                                            </div>



                                        </div>



                                        <h5><?php echo $comment["title"]; ?></h5>



                                        <p><?php echo $comment["comment"]; ?></p>
                                        <?php
                                      
                                        if ($comment["type"] === "1") {
                                            ?>
                                            <div class="rating-reviews r1">
                                              
                                                <div class="avatar">
                                                    <img src="<?php echo actual_link() ?>img/google-reviews.png" style="border-radius: 0px;" >
                                                </div>
                                            </div>

                                            <?php
                                        } else {
                                            ?>
                                            <div class="rating-reviews r2">
                                              
                                                <div class="avatar">
                                                    <img src="<?php echo actual_link() ?>img/tripadvisor-logo.png"  style="border-radius: 0px;"> 
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </div>







                                </div>



                            </div>

                            <!-- /Slide -->

                            <?php
                        }
                        ?>





                    </div>





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

    <script src="<?php echo actual_link() ?>plugins/owl.carousel.min.js"></script>

    <script src="<?php echo actual_link() ?>js/plugins.js"></script>

    <script src="<?php echo actual_link() ?>js/script.js"></script>

    <script>
        $(document).ready(function () {
            alert("hello");
            $(".dropdown").mouseover(function () {
                alert("hello");
            });
        });

        //        $('.dropdown-toggle').hover(function () {
        //        alert();
        //        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        //        }, function () {
        //        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        //        });
    </script>
</body>

</html>

