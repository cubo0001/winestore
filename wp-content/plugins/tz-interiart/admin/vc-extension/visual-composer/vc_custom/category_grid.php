<?php

$args = array(
    "tz_column"             => "2",
    "tz_css_animation"      => "",
);

$html = "";

extract(shortcode_atts($args, $atts));

$tzinteriart_support_class = '';
if($tz_column != ''){
    $tzinteriart_support_class .= ' tzCategory_Grid_' .$tz_column. '_column';
}

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_support_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

?>
<div class="tzElement_Category_Grid <?php echo esc_attr($tzinteriart_support_class);?>">
    <?php
    echo do_shortcode($content);
    ?>
</div>
