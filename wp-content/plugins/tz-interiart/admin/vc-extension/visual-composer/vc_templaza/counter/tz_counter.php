<?php
/*
 * Element tz-counter
 * */

function tzinteriart_counter($atts) {
    $tz_type = $font_icon = $icon = $color_icon = $title = $color_title = $count = $color_count = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type'               => 'type1',
        'font_icon'             => 'furniture',
        'icon'                  => '',
        'color_icon'            => '',
        'title'                 => '',
        'color_title'           => '',
        'count'                 => '',
        'color_count'           => '',
        'tz_css_animation'      => '',
    ),$atts));
    ob_start();

    wp_enqueue_script('tz-counter');

    $tzinteriart_class = '';

    if($tz_type != ''){
        $tzinteriart_class .= ' tz_Counter_'.$tz_type;
    }

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    ?>
    <div class="tzElement_Counter <?php echo esc_attr($tzinteriart_class);?>">
        <?php
        if($tz_type != 'type3' && $font_icon != ''){
            ?>
            <div class="tzElement_counterIcon">
                <?php
                if($font_icon == 'et-line' || $font_icon == 'elegant'){
                    ?>
                    <span aria-hidden='true' class='<?php echo esc_attr($icon);?>' <?php
                    if(!empty($color_icon)){
                        echo 'style ="color:'.esc_attr($color_icon).';"';
                    }
                    ?>></span>
                <?php
                }elseif($font_icon == 'awesome'){
                    ?>
                    <i class="fa <?php echo esc_attr($icon);?>" <?php
                    if(!empty($color_icon)){
                        echo 'style ="color:'.esc_attr($color_icon).';"';
                    }
                    ?>></i>
                <?php
                }elseif($font_icon == 'furniture'){
                    ?>
                    <span data-icon="<?php echo esc_attr($icon)?>" class="icon"></span>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

        <span class="tzElement_count"><em class="stat-count" <?php
            if(!empty($color_count)){
                echo 'style ="color:'.esc_attr($color_count).';"';
            }
            ?>><?php echo esc_html($count);?></em></span>
        <p <?php
        if(!empty($color_title)){
            echo 'style ="color:'.esc_attr($color_title).';"';
        }
        ?>><?php echo esc_html($title);?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-counter','tzinteriart_counter');
?>