<?php
/*===============================
Shortocde tz-skill-item
===============================*/

function tzinteriart_newsletter($atts) {
    $tz_type = $tz_title = $tz_subtitle = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type'               => 'classic',
        'tz_title'              => '',
        'tz_subtitle'           => '',
        'tz_css_animation'      => '',
    ),$atts));
    ob_start();

    $tzinteriart_class = '';
    if($tz_type != ''){
        $tzinteriart_class .= ' tzNewsletter-'.$tz_type;
    }
    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    ?>
    <div class="tzElement-newsletter <?php echo esc_attr($tzinteriart_class);?>">
        <?php if($tz_type=='modern'){ ?>
            <span class="line-left"></span>
            <span class="line-right"></span>
        <?php
        } ?>
        <?php
        if($tz_title != ''){
            ?>
            <h3 class="tzNewsletter-Title">
                <?php echo esc_html($tz_title); ?>
            </h3>
            <?php
        }
        ?>

        <?php
        if($tz_subtitle != ''){
            ?>
            <p class="tzSubTitle"><?php echo esc_html($tz_subtitle);?></p>
            <?php
        }
        ?>
        <?php
        echo do_shortcode('[newsletter_form]');
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-newsletter','tzinteriart_newsletter');
?>
