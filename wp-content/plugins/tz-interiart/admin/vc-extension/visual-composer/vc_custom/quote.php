<?php

$args = array(
    "tz_type"                   => "type1",
    "tz_imagebg"                => "",
    "tz_pagination"             => "",
    "tz_arrow"                  => "hide",
    "tz_css_animation"          => "",
);

$html = "";

extract(shortcode_atts($args, $atts));

wp_enqueue_script('owl.carousel');

$tz_images_info = wp_get_attachment_image_src($tz_imagebg, $size='full');

$tzinteriart_team_class = '';
if($tz_type != ''){
    $tzinteriart_team_class = 'tzQuote_'.$tz_type;
}

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_team_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

?>
<div class="tzElement_Quote_Container <?php echo esc_attr($tzinteriart_team_class);?>">
    <?php
    if($tz_type == 'type5'){
        ?>
        <div class="tzElement_Quote_ImageBg">
            <img width="<?php echo esc_attr($tz_images_info[1]);?>" height="<?php echo esc_attr($tz_images_info[2]);?>" alt="image testerminal" src="<?php echo esc_url($tz_images_info[0]);?>">
        </div>
        <?php
    }
    ?>
    <?php
    if($tz_type == 'type5'){
        ?>
    <div class="tzElement_Quote_Box">
        <div class="tzElement_Quote_Wrap">

            <img class="tzElement_Quote_Icon" src="<?php echo get_template_directory_uri().'/images/icon_quote.png'?>" alt="quote icon background">

        <?php
    }
    ?>

        <div class="tzElement_Quote">
            <?php
            echo do_shortcode($content);
            ?>
        </div>

    <?php
    if($tz_type == 'type5'){
        ?>
        </div>
    </div>
        <?php
        }
    ?>

    <?php
    if($tz_arrow == 'show'){
        ?>
        <button class="tzprevslider"><i class="fa fa-angle-left"></i></button>
        <button class="tznextslider"><i class="fa fa-angle-right"></i></button>
        <?php
    }
    ?>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        "use strict";
        jQuery(".tzElement_Quote").each(function(){
            jQuery(this).tzinteriart_owlCarousel({
                items : 1,
                itemsDesktop : [1199,1],
                itemsDesktopSmall : [979,1],
                itemsTablet: [768,1],
                itemsMobile: [479,1],
                slideSpeed:500,
                paginationSpeed:800,
                rewindSpeed:1000,
                addClassActive : true,
                autoPlay:false,
                stopOnHover: false,
                singleItem:false,
                rewindNav:true,
                pagination:<?php if($tz_pagination == 'hide'){ echo 'false';}else{ echo 'true';}?>,
                paginationNumbers:false,
                itemsScaleUp:false
            });

            // Custom Navigation Events

            jQuery('.tznextslider').on('click',function(){
                jQuery(this).parent().find('.tzElement_Quote').trigger('owl.next');
            })

            jQuery('.tzprevslider').on('click',function(){
                jQuery(this).parent().find('.tzElement_Quote').trigger('owl.prev');
            }) ;
        });
    });
</script><!--end script recent-project -->