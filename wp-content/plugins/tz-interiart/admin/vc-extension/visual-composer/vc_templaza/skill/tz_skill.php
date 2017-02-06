<?php
/*===============================
Shortocde tz-skill-item
===============================*/

function tzmaniva_skill_item($atts) {
    $tz_type_skill = $tz_title = $tz_description  = $tz_percent = $tz_size = $tz_size_small = $tz_line_width = $tz_barcolor = $tz_padding_top = $tz_padding_bottom = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type_skill'            => '',
        'tz_title'                 => '',
        'tz_description'           => '',
        'tz_percent'               => '',
        'tz_size'                  => '',
        'tz_size_small'            => '',
        'tz_line_width'            => '',
        'tz_barcolor'              => '',
        'tz_padding_top'           => '',
        'tz_padding_bottom'        => '',
        'tz_css_animation'         => '',
    ),$atts));
    ob_start();

    if($tz_type_skill == '' || $tz_type_skill == 'type1' || $tz_type_skill == 'type2' || $tz_type_skill == 'type3' ) {
        wp_enqueue_script('wow');
    }else{
        wp_enqueue_script('jquery.easypiechart');
    }

    $tz_class_skill = 'tzskill-item-type1';
    if($tz_type_skill != ''){
        $tz_class_skill = 'tzskill-item-'.$tz_type_skill;
    }

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tz_class_skill .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    $i = rand(0,100000);
    ?>
    <?php
    if($tz_type_skill == '' || $tz_type_skill == 'type1' || $tz_type_skill == 'type2' || $tz_type_skill == 'type3' ) {
        ?>
        <div class="tzSkill <?php echo esc_attr($tz_class_skill); ?>" <?php
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
            <p class="tzSkill-title"><?php echo esc_html($tz_title); ?></p>
            <?php
            if ($tz_type_skill == 'type2' || $tz_type_skill == 'type3') {
                ?>
                <span><?php echo esc_html($tz_percent) . '%'; ?></span>
            <?php
            }
            ?>
            <div class="tzskill-item">
                <div class="tzskill-item-width wow slideInLeft animated" <?php
                if ($tz_percent != '' || $tz_barcolor != '') {
                    echo 'style="';
                    if($tz_percent != ''){
                        echo 'width:' . esc_attr($tz_percent) . '%;';
                    }
                    if($tz_barcolor != ''){
                        echo 'background:'.esc_attr($tz_barcolor).';';
                    }
                    echo '"';
                }
                ?>>
                    <?php
                    if ($tz_type_skill == '' ||$tz_type_skill == 'type1') {
                    ?>
                        <span><?php echo esc_html($tz_percent) . '%'; ?></span>
                    <?php
                    }
                    if($tz_type_skill == 'type2'){
                        ?>
                        <div class="tzSkill_Circle" <?php
                            if($tz_barcolor != ''){
                                echo 'style="border-color:'.esc_attr($tz_barcolor).'"';
                            }
                        ?>></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                "use strict";
                // jQuery animate ----------------------------
                new WOW(
                    { offset: 300 }
                ).init();
            });
        </script>
    <?php
    }else{
        ?>
        <div class="tzSkill <?php echo esc_attr($tz_class_skill); ?>" <?php
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
            <div class="chart chart-<?php echo esc_attr($i);?>" style="width: <?php if($tz_size != ''){ echo esc_attr($tz_size).'px';}else{ echo '200px';}?>;height: <?php if($tz_size != ''){ echo esc_attr($tz_size).'px';}else{ echo '200px';}?>;" data-percent="<?php echo esc_attr($tz_percent);?>">
                <div class="tzSkill-box">
                    <div class="tzSkill-box-1">
                        <span class="percent"><?php echo esc_attr($tz_percent);?></span>
                    </div>
                </div>
            </div>
            <h5 class="tzSkill-title"><?php echo esc_html($tz_title);?></h5>
            <?php
            if($tz_type_skill == 'type4' || $tz_type_skill == 'type5'){
                ?>
                <p class="tzSkill-des"><?php echo esc_html($tz_description);?></p>
                <?php
            }
            ?>

        </div>

        <script type="text/javascript">
            jQuery(window).load(function(){
                "use strict";

                if (  jQuery('.chart-<?php echo esc_attr($i);?>').length > 0 ){
                    var $_elementTop =   jQuery('.chart-<?php echo esc_attr($i);?>').offset().top;

                    jQuery(window).scroll(function(){

                        var $_Top = jQuery(window).scrollTop();

                        if ( $_Top > $_elementTop - 350 ){

                            jQuery('.chart-<?php echo esc_attr($i);?>').easyPieChart({
                                easing: 'easeInCubic',
                                size: <?php if($tz_size != ''){ echo esc_attr($tz_size);}else{ echo '200';}?>,
                                barColor: '<?php echo esc_attr($tz_barcolor);?>',
                                trackColor: '<?php if($tz_type_skill == 'type6'){echo 'rgba(255,255,255,0.2)';}else{ echo '#dbdbdb';}?>',
                                scaleColor: 'rgba(0,0,0,0)',
                                lineWidth: '<?php if($tz_line_width != ''){ echo esc_attr($tz_line_width);}else{ echo '4';}?>',
                                scaleLength: 10,
                                lineWidthSmall: <?php if($tz_line_width != ''){ echo esc_attr($tz_line_width);}else{ echo '4';}?>,
                                sizeSmall: <?php if($tz_size_small != ''){ echo esc_attr($tz_size_small);}else{ echo '20';}?>,
                                onStep: function(from, to, percent) {
                                    jQuery(this.el).find('.percent').text(Math.round(percent));
                                }
                            });
                        }
                    })
                }
            });
        </script>
        <?php
    }
    ?>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-skill-item','tzmaniva_skill_item');
?>
