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

    <title> <?php echo $vehicle['name'] ?> | Vehicle | www.kandycars.lk</title>

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
    <style>
        .galleria-slider{
            border: solid 1px #AFAFAF;
            box-shadow: 0px 0px 4px #6F6F6F;
            margin-bottom: 20px;
        }


        table {
            /*  border: 1px solid #ccc;*/
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: 1.625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
            background:#000000;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }



    </style>
</head>

<body class="page-section-bg">

 



    <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

    <div id="wrapper" class="wrapper-container">

        <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

        <nav id="mobile-advanced" class="mobile-advanced" style="text-align:center;"></nav>

        <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

        <?php include './header.php'; ?>

        <div id="content" class="page-content-wrap">
            <div class="container">    
                <div class="row">
                    <div class="col-md-8 col-sm-12  col-xs-12 carousel-type-2">
                        <div id="transport_photos" class="galleria-slider">
                            <?php
                            $PRODUCT_PHOTO = Product::getProductsById($vehicle['id']);
                            foreach ($PRODUCT_PHOTO as $key => $product_photo) {
                                ?>   
                                <a href="<?php echo actual_link() ?>upload/product-type/product/<?php echo $product_photo['image_name']; ?>">
                                    <img src="<?php echo actual_link() ?>upload/product-type/product/<?php echo $product_photo['image_name']; ?>" data-title="" >
                                </a>
                                <?php
                            }
                            ?>
                        </div> 

                        <div style="padding-top:30px; ">
                            <p  style="margin-top: 50px;font-size:24px;"><?php echo $vehicle['name'] ?></p>
                            <hr>
                            <div class="pricing-area">

                                <table>
                                    <caption>Self Drive</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Charge Per Day</th>
                                            <th scope="col">Mileage Limit</th>
                                            <th scope="col">Charge Per Excess Mileage</th>
                                            <th scope="col">Charge Per Delayed Hour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                    <caption>Self Drive</caption>
                                    <td data-label="Charge Per Day"><?php echo $vehicle['sd_charge_per_day'] ?>(LKR)</td>
                                    <td data-label="Mileage Limit"><?php echo $vehicle['sd_mileage_limit'] ?>(KM)</td>
                                    <td data-label="Charge Per Excess Mileage"><?php echo $vehicle['sd_excess_mileage'] ?>(LKR)</td>
                                    <td data-label="Charge Per Delayed Hour"><?php echo $vehicle['sd_delayed_hour'] ?>(LKR)</td>
                                    </tr>

                                    </tbody>
                                </table>
                                <table>
                                    <th>With Driver</th>
                                    <thead>
                                        <tr>
                                            <th scope="col">Charge</th>
                                            <th scope="col">Excess Mileage</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Charge Per Excess Mileage</th>
                                            <th scope="col">Charge Per Waiting Hour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Charge"><?php echo $vehicle['wd_charge'] ?>(LKR)</td>
                                            <td data-label="Excess Mileage"><?php echo $vehicle['wd_mileage'] ?>(LKR)</td>
                                            <td data-label="Duration"><?php echo $vehicle['wd_duration'] ?></td>
                                            <td data-label="Charge Per Excess Mileage"><?php echo $vehicle['wd_excess_mileage'] ?>(LKR)</td>
                                            <td data-label="Charge Per Waiting Hour"><?php echo $vehicle['wd_waiting_hour'] ?>(LKR)</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <table>
                                    <caption>Wedding And Events</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Charge</th>
                                            <th scope="col">Excess Mileage</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Charge Per Excess Mileage</th>
                                            <th scope="col">Charge Per Waiting Hour</th>
                                            <th scope="col">Charge For Decoration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Charge"><?php echo $vehicle['weed_charge']; ?>(LKR)</td>
                                            <td data-label="Excess Mileage"><?php echo $vehicle['wedd_mileage']; ?>(LKR)</td>
                                            <td data-label="Duration"><?php echo $vehicle['weed_duration']; ?></td>
                                            <td data-label="Charge Per Excess Mileage"><?php echo $vehicle['weed_excess_mileage']; ?>(LKR)</td>
                                            <td data-label="Charge Per Waiting Hour"><?php echo $vehicle['weed_waiting_hour'] ?>(LKR)</td>
                                            <td data-label="Charge For Decoration"><?php echo $vehicle['weed_decoration']; ?>(LKR)</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <table>
                                    <caption>Parade</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Charge</th>
                                            <th scope="col">Excess Mileage</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Charge Per Excess Mileage</th>
                                            <th scope="col">Charge Per Waiting Hour</th>
                                            <th scope="col">Charge For Decoration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Charge"><?php echo $vehicle['parade_charge']; ?>(LKR)</td>
                                            <td data-label="Excess Mileage"><?php echo $vehicle['parade_mileage']; ?>(LKR)</td>
                                            <td data-label="Duration"><?php echo $vehicle['parade_duration']; ?></td>
                                            <td data-label="Charge Per Excess Mileage"><?php echo $vehicle['parade_excess_mileage']; ?>(LKR)</td>
                                            <td data-label="Charge Per Waiting Hour"><?php echo $vehicle['parade_waiting_hour']; ?>(LKR)</td>
                                            <td data-label="Charge For Decoration"><?php echo $vehicle['parade_decoration']; ?>(LKR)</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="model-info pull-right" style="padding-left: 10px; padding-bottom:12px;">
                                    <div ><a href="<?php echo actual_link(); ?>contact-us/" class="btn">Inquiry</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget">
                            <h3 class="widget-title">Other Vehicle</h3>
                            <?php
                            $PRODUCT = ProductType::all();
                            foreach ($PRODUCT as $key => $product) {
                                ?>
                                <aside  class="sbl  col-md-12 col-sm-12">
                                    <div class="icons-box">
                                        <div class="col-md-12 col-xs-6">
                                            <div class="icons-wrap">
                                                <a href="<?php echo actual_link(); ?>vehicles/<?php echo str_replace(" ", "-", strtolower($product['name'])); ?>/" class="icons-item type-2" >
                                                    <img src="<?php echo actual_link() ?>upload/product-type/<?php echo $product['image_name']; ?>" alt="<?php echo $product['name']; ?>">
                                                    <div class="item-box">
                                                        <h4 class="icons-box-title" style="font-size:16px!important; "><?php echo $product['name']; ?> </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <?php
                            }
                            ?>
                        </div>
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
<script src="<?php echo actual_link() ?>js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo actual_link() ?>js/libs/jquery.modernizr.js"></script>
<script src="<?php echo actual_link() ?>js/libs/jquery-2.2.4.min.js"></script>
<script src="<?php echo actual_link() ?>js/jquery_2.2.4_jquery.js" type="text/javascript"></script>
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
<link href="<?php echo actual_link() ?>view/galleria.classic.css" rel="stylesheet" type="text/css"/>
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

</body>
</html>