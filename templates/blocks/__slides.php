<?php
   $slides = get_field("slides");
if ($slides) {
    echo '<div class="hero-slider">';
    foreach ( $slides as $slide ) {
        echo '<div class="hero-slider__wrapper"><img class="img-fluid" src="' . $slide['image']['url'] . '"><div class="hero-slider__overlay-wrapper"><div class="hero-slider__overlay-container"><div class="hero-slider__overlay-content"><h1>' . $slide['overlay_heading_antiqua'] . '<span>' . $slide['overlay_heading_proxima'] . '</span></h1><p>' . $slide['overlay_copy'] . '</p>' . '<p><a class="button button--solid" href="' . $slide['overlay_button_link'] . '">' . $slide['overlay_button_label'] . ' &nbsp; <i class="fa fa-chevron-right" aria-hidden="true"></i></a></p></div></div></div></div>';
    }
    echo '</div>';
}
    ?>



