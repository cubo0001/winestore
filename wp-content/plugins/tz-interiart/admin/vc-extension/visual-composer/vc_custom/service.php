<?php

$args = array(
    "tz_number_item_desk"                   => "3",
    "tz_number_item_tablet_landscape"       => "3",
    "tz_number_item_tablet_portrait"        => "1",
    "tz_number_item_mobile"                 => "1",
    "tz_css_animation"                      => "",
);

$html = "";

extract(shortcode_atts($args, $atts));

wp_enqueue_script('owl.carousel');

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

$interiart_slideid = rand(0,10000);

?>
<div class="tzElement_viewService <?php echo esc_attr($tzinteriart_class);?>">
    <div class="tzView_Service_Slide">
        <?php
        echo do_shortcode($content);
        ?>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        "use strict";

        // Blog slider  -----------------
            jQuery(".tzView_Service_Slide").tzinteriart_owlCarousel({
                items : <?php if($tz_number_item_desk != ''){ echo esc_attr($tz_number_item_desk);} else{ echo '3';}?>,
                itemsDesktop : [1199,<?php if($tz_number_item_desk != ''){ echo esc_attr($tz_number_item_desk);} else{ echo '3';}?>],
                itemsDesktopSmall : [979,<?php if($tz_number_item_tablet_landscape != ''){ echo esc_attr($tz_number_item_tablet_landscape);} else{ echo '3';}?>],
                itemsTablet: [768, <?php if($tz_number_item_tablet_portrait != ''){ echo esc_attr($tz_number_item_tablet_portrait);} else{ echo '1';}?>],
                itemsMobile: [479, <?php if($tz_number_item_mobile != ''){ echo esc_attr($tz_number_item_mobile);} else{ echo '1';}?>],
                slideSpeed:500,
                paginationSpeed:800,
                rewindSpeed:1000,
                autoPlay:false,
                stopOnHover: false,
                singleItem:false,
                rewindNav:false,
                pagination:false,
                paginationNumbers:false,
                itemsScaleUp:false,
                mouseDrag:true
            });
    });

</script>
