<?php
/*
 * Element tz-feature-item
 * */

function tzinteriart_feature_item($atts) {
    $tz_type = $tz_font_icon = $tz_icon = $tz_number = $tz_title = $tz_subtitle = $tz_description = $tz_style_option = $tz_readmore_option = $tz_readmore_text = $tz_readmore_link = $tz_padding_top = $tz_padding_bottom = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type'               => 'type1',
        'tz_font_icon'          => 'et-line',
        'tz_icon'               => '',
        'tz_number'             => '',
        'tz_title'              => '',
        'tz_subtitle'           => '',
        'tz_description'        => '',
        'tz_style_option'       => '',
        'tz_readmore_option'    => 'hide',
        'tz_readmore_text'      => '',
        'tz_readmore_link'      => '',
        'tz_padding_top'        => '',
        'tz_padding_bottom'     => '',
        'tz_css_animation'      => '',
    ),$atts));
    ob_start();

    $tzinteriart_class = '';
    if($tz_type != ''){
        $tzinteriart_class .= 'tzFeature_'.esc_attr($tz_type);
    }

    if($tz_type == 'type2' && $tz_style_option != ''){
        $tzinteriart_class .= ' tzFeature_'.esc_attr($tz_style_option);
    }

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    ?>
    <div class="tzElement_Feature <?php echo esc_attr($tzinteriart_class);?>" <?php
    if($tz_padding_top != '' || $tz_padding_bottom != ''){
        echo 'style="';
        if($tz_padding_top != ''){
            echo 'padding-top:'.esc_attr($tz_padding_top).'px;';
        }
        if($tz_padding_bottom != ''){
            echo 'padding-bottom:'.esc_attr($tz_padding_bottom).'px;';
        }
        echo '"';
    }
    ?>>
        <div class="tzFeature_Icon">
            <div class="tzFeature_iconBox">
                <?php
                if($tz_font_icon == 'et-line' || $tz_font_icon == 'elegant'){
                    ?>
                    <span aria-hidden='true' class='<?php echo esc_attr($tz_icon);?>'></span>
                    <?php
                    if($tz_type == 'type2' || $tz_type == 'type3'){
                        ?>
                        <small class="tzFeature_Number"><?php echo esc_html($tz_number);?></small>
                        <?php
                    }
                    ?>
                <?php
                }elseif($tz_font_icon == 'awesome'){
                    ?>
                    <i class="fa <?php echo esc_attr($tz_icon);?>"></i>
                    <?php
                    if($tz_type == 'type2' || $tz_type == 'type3'){
                        ?>
                        <small class="tzFeature_Number"><?php echo esc_html($tz_number);?></small>
                    <?php
                    }
                    ?>
                <?php
                }elseif($tz_font_icon == 'furniture'){
                    ?>
                    <span data-icon="<?php echo esc_attr($tz_icon)?>" class="icon"></span>
                    <?php
                    if($tz_type == 'type2' || $tz_type == 'type3'){
                        ?>
                        <small class="tzFeature_Number"><?php echo esc_html($tz_number);?></small>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
            </div>
        </div>
        <h5 class="tzFeature_title">
            <?php echo esc_html($tz_title);?>
        </h5>
        <?php
        if($tz_type == 'type1'){
            ?>
            <p class="tzFeature_subTitle">
                <?php echo esc_html($tz_subtitle);?>
            </p>
            <?php
        }
        ?>
        <p class="tzFeature_description">
            <?php echo esc_html($tz_description);?>
        </p>
        <?php
        if($tz_readmore_option == 'show'){
            ?>
            <a class="tzFeature_readmore" href="<?php echo esc_url($tz_readmore_link);?>"><?php echo esc_html($tz_readmore_text);?></a>
            <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-feature-item','tzinteriart_feature_item');
?>