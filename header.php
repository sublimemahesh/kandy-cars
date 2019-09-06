<?php
include_once(dirname(__FILE__) . '/class/include.php');
$Contact1 = new Page(2);
$Contact2 = new Page(9);
?>
<style>
    /* bootstrap dropdown hover menu*/

</style>


<header id="header" class="header-2">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 ">
                    <div class="logo-wrap">
                        <a href="<?php echo actual_link() ?>" class="logo"><img src="<?php echo actual_link() ?>images/logo/logo-1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 contact-number-design"  >
                    <p style="font-size: 20px;">Hot Line</p>
                    <?php echo $Contact1->description; ?>  
                </div>
                <div class="col-lg-4 col-sm-6 col-xs-12 col-md-4 contact-number-design" id="contact-number-design"  >
                    <p style="font-size: 20px;">Wedding Cars</p>
                    <?php echo $Contact2->description; ?>  
                </div>
            </div>
        </div>
    </div>


    <style>
        .dropbtn {

            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}


    </style>


    <div class="menu-holder">
        <div class="container">
            <div class="menu-wrap" >
                <div class="nav-item" id="nav-item">
                    <nav id="main-navigation" class="main-navigation">

                        <ul>   
                            <li ><a href="<?php echo actual_link() ?>home/">Home</a> </li>
                            <li ><a href="<?php echo actual_link() ?>about-us/">About</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>vehicles/">Vehicles</a>  </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle  dropbtn"  data-toggle="dropdown" >Service <b class="caret"></b></a>
                                <ul class="dropdown-menu dropdown-content">
                                    <hr>
                                    <?php
                                    $SERVICE = Service::all();
                                    foreach ($SERVICE as $key => $service) {
                                        ?>
                                        <li  > <a href="<?php echo actual_link(); ?>services/<?php echo str_replace(" ", "-", strtolower($service['title'])); ?>/"><h6><?php echo $service["title"]; ?> </h6></a></li>
                                        <hr>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li ><a href="<?php echo actual_link() ?>price-list/">Rates</a> </li>
                            <li ><a href="<?php echo actual_link() ?>contact-us">Contact</a> </li> 
                            <li style="background-color: beige;"><a href="vehicle-type.php">Book Now</a> </li>  
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>


