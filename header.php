<?php
include_once(dirname(__FILE__) . '/class/include.php');

$Contact1 = new Page(2);
$Contact2 = new Page(9);
?>
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



    <div class="menu-holder">
        <div class="container">
            <div class="menu-wrap" >
                <div class="nav-item" id="nav-item">
                    <nav id="main-navigation" class="main-navigation">
                        <ul id="menu" class="clearfix">
                            <li ><a href="<?php echo actual_link() ?>">Home</a> </li>
<!--                            <li ><a href="<?php echo actual_link() ?>about-us/">About</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>services/">Services</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>vehicles/">Vehicles</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>gallery/">Gallery</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>price-list/">Rates</a> </li>
                            <li class=""> <a href="<?php echo actual_link() ?>travel/">Travel</a>  </li>
                            <li ><a href="<?php echo actual_link() ?>contact-us">Contact</a> </li>-->
                            
                            <li ><a href="about.php">About</a>  </li>
                            <li ><a href="service.php">Services</a>  </li>
                            <li ><a href="vehicle.php">Vehicles</a>  </li>
                            <li ><a href="gallery.php">Gallery</a>  </li>
                            <li ><a href="price.php">Rates</a> </li>
                            <li class=""> <a href="travel.php">Travel</a>  </li>
                            <li ><a href="contact.php">Contact</a> </li>
                            <li style="background-color: beige;"><a href="category.php">Book Now</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

