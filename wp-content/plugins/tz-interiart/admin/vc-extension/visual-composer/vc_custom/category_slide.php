<?php

$args = array(
    "tz_style"                              => "in_grid",
    "tz_number_item_desk"                   => "3",
    "tz_number_item_tablet_landscape"       => "3",
    "tz_number_item_tablet_portrait"        => "1",
    "tz_number_item_mobile"                 => "1",
    "tz_css_animation"                      => "",
);

$html = "";

extract(shortcode_atts($args, $atts));

wp_enqueue_script('owl.carousel');

$tzinteriart_support_class = '';
if($tz_style != ''){
    $tzinteriart_support_class .= ' tzCategory_Slide_' .$tz_style;
}

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_support_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

$interiart_slideid = rand(0,10000);

?>
<div class="tzElement_Category_Slide_Container <?php echo esc_attr($tzinteriart_support_class);?>">
    <?php if($tz_style == 'in_grid'): ?>
    <div class="container">
    <?php endif;?>
        <div class="tzElement_Category_Slide tzElement_Category_Slide_<?php echo esc_attr($interiart_slideid);?>">
            <?php
            echo do_shortcode($content);
            ?>
        </div>
    <?php if($tz_style == 'in_grid'): ?>
    </div>
    <?php endif;?>

</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        "use strict";

        // Blog slider  -----------------
            jQuery(".tzElement_Category_Slide_<?php echo esc_attr($interiart_slideid);?>").tzinteriart_owlCarousel({
                items : <?php if($tz_number_item_desk != ''){ echo esc_attr($tz_number_item_desk);} else{ echo '6';}?>,
                itemsDesktop : [1199,<?php if($tz_number_item_desk != ''){ echo esc_attr($tz_number_item_desk);} else{ echo '6';}?>],
                itemsDesktopSmall : [979,<?php if($tz_number_item_tablet_landscape != ''){ echo esc_attr($tz_number_item_tablet_landscape);} else{ echo '4';}?>],
                itemsTablet: [768, <?php if($tz_number_item_tablet_portrait != ''){ echo esc_attr($tz_number_item_tablet_portrait);} else{ echo '3';}?>],
                itemsMobile: [479, <?php if($tz_number_item_mobile != ''){ echo esc_attr($tz_number_item_mobile);} else{ echo '2';}?>],
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
