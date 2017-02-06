<?php
/*===============================
Shortocde tz-section-video
===============================*/

function tzinteriart_video($atts) {
    $tz_type_video = $tztext_right = $tztext_left = $tzwebm  = $tzmp4 = $tzogv = $tzimage = $tzheight = $tzcolor_overlay = $tztext_color = '';
    extract(shortcode_atts(array(
        'tz_type_video'             => 'type1',
        'tzheight'                  => '',
        'tztext_right'              => '',
        'tztext_left'               => '',
        'tztext_color'              => '',
        'tzwebm'                    => '',
        'tzmp4'                     => '',
        'tzogv'                     => '',
        'tzimage'                   => '',
        'tzcolor_overlay'           => '',
    ),$atts));
    ob_start();

    wp_enqueue_script('video');

    $tz_class_type = '';
    if($tz_type_video != ''){
        $tz_class_type = 'tzElement_Video_'.$tz_type_video;
    }

    $tz_img_id = preg_replace( '/[^\d]/', '', $tzimage);
    $tz_width_img ='';
    $tz_height_img ='';
    $tz_images_info = wp_get_attachment_image_src($tz_img_id, $size=''.$img_size.'');
    if(isset($tz_images_info) && !empty($tz_images_info)){
        $tz_url_img = $tz_images_info[0];
        $tz_width_img = $tz_images_info[1];
        $tz_height_img = $tz_images_info[2];
    }

    $style_element = '';
    if($tzheight != ''){
        $style_element = 'style=height:'.esc_attr($tzheight).'px';
    }

    $style_text = '';
    if($tztext_color != ''){
        $style_text = 'style=color:'.esc_attr($tztext_color).';';
    }

    $style_overlay = '';
    if($tzcolor_overlay != ''){
        $style_overlay = 'style=background:'.esc_attr($tzcolor_overlay).';';
    }
    ?>
    <div class="tzElement_Video <?php echo $tz_class_type;?>" <?php echo esc_attr($style_element);?>>
        <div class="tzElement_bgVideo" style="background-image: url(<?php echo esc_url($tz_url_img);?>);background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
        <video class="tzElement_videoID">
            <source type="video/mp4" src="<?php echo esc_url($tzmp4);?>" />
            <source type="video/ogv" src="<?php echo esc_url($tzogv);?>" />
            <source type="video/webm" src="<?php echo esc_url($tzwebm);?>" />
        </video>
        <div class="tzElement_Overlay" <?php echo esc_attr($style_overlay);?>></div>
        <div class="tzElement_autoplay"><i class="fa fa-play"></i></div>
        <div class="tzElement_pauses"><i class="fa fa-pause"></i></div>
        <?php
        if($tz_type_video == 'type1' && $tztext_left != ''){
            ?>
            <span class="tzElement_textLeft" <?php echo esc_attr($style_text);?>>
            <?php echo esc_html($tztext_left);?>
        </span>
            <?php
        }
        ?>

        <?php
        if($tz_type_video == 'type1' && $tztext_right != ''){
            ?>
            <span class="tzElement_textRight" <?php echo esc_attr($style_text);?>>
                <?php echo esc_html($tztext_right);?>
            </span>
            <?php
        }
        ?>

    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            "use strict";

            // JQUERY VIDEO HTML5
            var myVideo = jQuery('.tzElement_videoID')[0];
            jQuery('.tzElement_autoplay').on('click',function(){
                jQuery(this).hide();
                jQuery('.tzElement_bgVideo').hide();
                jQuery('.tzElement_textLeft').hide();
                jQuery('.tzElement_textRight').hide();
                jQuery('.tzElement_pauses').show();
                if (myVideo.paused)
                    myVideo.play();

            }) ;
            jQuery('.tzElement_pauses').on('click',function(){
                jQuery(this).hide();
                jQuery('.tzElement_bgVideo').show();
                jQuery('.tzElement_textLeft').show();
                jQuery('.tzElement_textRight').show();
                jQuery('.tzElement_autoplay').show();
                if (myVideo.play)
                    myVideo.pause();

            });
        });

        jQuery(window).load(function(){
            "use strict";
            var tzHeight_textLeft = jQuery('.tzElement_textLeft').height();
            var tzHeight_textRight = jQuery('.tzElement_textRight').height();
            jQuery('.tzElement_textLeft').css('margin-top','-'+(tzHeight_textLeft/2)+'px');
            jQuery('.tzElement_textRight').css('margin-top','-'+(tzHeight_textRight/2)+'px');
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-section-video','tzinteriart_video');
?>
