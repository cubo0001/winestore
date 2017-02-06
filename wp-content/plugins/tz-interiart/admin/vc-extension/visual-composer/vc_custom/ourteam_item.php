<?php

$args = array(
    "tz_type"               => "type1",
    "tz_name"               => "",
    "tz_job"                => "",
    "tz_description"        => "",
    "tz_image"              => "",
    "tz_overlay"            => "",
    "tz_css_animation"      => "",
);

$html = "";

extract(shortcode_atts($args, $atts));

wp_enqueue_script('tz-ourteam');

$tz_img_id = preg_replace( '/[^\d]/', '', $tz_image);
$tz_width_img ='';
$tz_height_img ='';
$tz_images_info = wp_get_attachment_image_src($tz_img_id, $size=''.$img_size.'');
if(isset($tz_images_info) && !empty($tz_images_info)){
    $tz_url_img = $tz_images_info[0];
    $tz_width_img = $tz_images_info[1];
    $tz_height_img = $tz_images_info[2];
}

$tzinteriart_class_ourteam = '';
if($tz_type != ''){
    $tzinteriart_class_ourteam = ' tzOurteam_'.$tz_type;
}

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_class_ourteam .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

$tzinteriart_style_overlay = '';
if($tz_type == 'type2' && $tz_overlay != ''){
    $tzinteriart_style_overlay = 'style=background:'.$tz_overlay.';';
}

$html .= '<div class="tzElement_Ourteam' . esc_attr($tzinteriart_class_ourteam).'">';
if($tz_type == 'type1'){
    $html .= '<div class="tzOurteam_imageContainer">';
    $html .= '<div class="tzOurteam_ImageBox">';
    $html .= '<div class="tzOurteam_shapeLeft"></div>';
    $html .= '<div class="tzOurteam_shapeRight"></div>';
}

if($tz_type == 'type3'){
    $html .= '<div class="tzOurteam_ImageBox">';;
}

$html .= '<div class="tzOurteam_Image">';
$html .= '<img alt="'. esc_attr($tz_name) .'" width="'.esc_attr($tz_width_img).'" height="'.esc_attr($tz_height_img).'" src="'. esc_url($tz_url_img) .'">';
if($tz_type == 'type2'){
    $html .= '<div class="tzOurteam_Overlay" '.esc_attr($tzinteriart_style_overlay).'></div>';
    $html .= '<div class="tzOurteam_Social">';
    $html .= '<div class="tzOurteam_Social_table">';
    $html .= '<div class="tzOurteam_Social_table_cell">';
    $html .= do_shortcode($content);
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
}
$html .= '</div>';
if($tz_type == 'type1'){
    $html .= '</div>';
    $html .= '</div>';
}
if($tz_type == 'type3'){
    $html .= '<div class="tzOurteam_Social">';
    $html .= do_shortcode($content);
    $html .= '</div>';
}
if($tz_type == 'type3'){
    $html .= '</div>';
}

$html .= '<div class="tzOurteam_Info">';
$html .= '<h6 class="tzOurteam_Name">'.esc_html($tz_name).'</h6>';
$html .= '<span class="tzOurteam_Job">'.esc_html($tz_job).'</span>';
if($tz_type != 'type2'){
    $html .= '<p class="tzOurteam_des">'.esc_html($tz_description).'</p>';
}
$html .= '</div>';
if($tz_type == 'type1'){
    $html .= '<div class="tzOurteam_Social">';
    $html .= do_shortcode($content);
    $html .= '</div>';
}
$html .= '</div>';

echo balanceTags($html);

?>