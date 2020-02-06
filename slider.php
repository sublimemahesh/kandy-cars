
<div class="carousel-type-2">

    <div class="owl-carousel" data-max-items="1">
        <?php
        $SLIDER = Slider::all();
        foreach ($SLIDER as $key => $slider) {
            ?>
            <div class="item-carousel">
                <img src="upload/slider/<?php echo $slider["image_name"]; ?>" alt=""/>
            </div>
            <?php
        }
        ?>
    </div>

</div>

