<?php
/*===============================
Shortocde tz-skill-item
===============================*/

function tzinteriart_title($atts) {
    $tz_type = $tz_title = $tz_color_title = $tz_subtitle  = $tz_color_subtitle = $tz_description = $tz_color_des = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type'               => '1',
        'tz_title'              => '',
        'tz_color_title'        => '',
        'tz_subtitle'           => '',
        'tz_color_subtitle'     => '',
        'tz_description'        => '',
        'tz_color_des'          => '',
        'tz_css_animation'      => '',
    ),$atts));
    ob_start();

    $tzinteriart_class = '';

    if($tz_type != ''){
        $tzinteriart_class .= 'tz-title-type-'.$tz_type;
    }

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    ?>
    <div class="tzElement-title <?php echo esc_attr($tzinteriart_class);?>">
        <?php
        if($tz_title != ''){
            ?>
            <span class="tzTitle" <?php
            if($tz_color_title != ''){
                echo 'style="color:'.esc_attr($tz_color_title).'"';
            }
            ?>>
                <h2><?php
                if($tz_type == '1'){
                    echo '{ ';
                }
                echo balanceTags($tz_title);
                if($tz_type == '1'){
                    echo ' }';
                }
                ?></h2>
            </span>
            <?php
        }
        ?>

        <?php
        if($tz_type == '1' && $tz_subtitle != ''){
            ?>
            <span class="tzSubTitle" <?php
            if($tz_color_subtitle != ''){
                echo 'style="color:'.esc_attr($tz_color_subtitle).'"';
            }
            ?>><?php echo esc_html($tz_subtitle);?></span>
            <?php
        }
        ?>

        <p class="tzDescription" <?php
        if($tz_color_des != ''){
            echo 'style="color:'.esc_attr($tz_color_des).'"';
        }
        ?>><?php echo esc_html($tz_description);?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-title','tzinteriart_title');
?>
