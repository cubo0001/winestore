<?php

$args = array(
    "tz_type"          => "",
    "tz_font_icon"     => "",
    "tz_icon"          => "",
    "tz_title"         => "basic",
    "tz_price"         => "969",
    "tz_currency"      => "$",
    "tz_price_period"  => "month",
    "tz_link"          => "#",
    "tz_button_text"   => "Order Now",
    "tz_image_hover"   => "",
    "tz_css_animation" => "",
);

extract(shortcode_atts($args, $atts));
$content = preg_replace('#^<\/p>|<p>$#', '', $content);
$tz_images     = wp_get_attachment_url($tz_image_hover);

$tzinteriart_price_class = 'tzPricing_table_type1';
if($tz_type != ''){
    $tzinteriart_price_class = 'tzPricing_table_'.$tz_type;
}

if($tz_css_animation != ''){
    wp_enqueue_script( 'waypoints' );
    $tzinteriart_price_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
}

$html = "";

$html .= "<div class='tzPricing_table ".esc_attr($tzinteriart_price_class)."'>";
$html .= "<div class='pricing-header'>";
if($tz_type != 'type2'){
    $html .= "<h3 class='pricinge-title'>".esc_html($tz_title)."</h3>";
}
if($tz_font_icon == 'awesome'){
    $html .= "<i class='fa ".esc_attr($tz_icon)."'></i>";
}else{
    $html .= "<span aria-hidden='true' class='".esc_attr($tz_icon)."'></span>";
}
if($tz_type == 'type2'){
    $html .= "<h3 class='pricinge-title'>".esc_html($tz_title)."</h3>";
}
$html .= "</div>";
if($tz_type != 'type2'){
    $html .= "<div class='pricing-cn'>";
    $html .= do_shortcode($content); //append pricing table content
    $html .= "</div>";
}
$html .= "<div class='pricing-footer'>";
$html .= "<div class='pricing-footer-box'>";
$html .= "<div class='pricing-footer-iner'>";
$html .= "<span class='pricing-price'>".esc_html($tz_price)."</span>";
$html .= "<span class='pricing-curren'>".esc_html($tz_currency)."</span>";
$html .= "<span class='pricing-period'>".esc_html($tz_price_period)."</span>";
$html .= "</div>";
$html .= "</div>";
$html .= "</div>";
if($tz_type == 'type2'){
    $html .= "<div class='pricing-cn'>";
    $html .= do_shortcode($content); //append pricing table content
    $html .= "</div>";
}
$html .= "<div class='pricing-button'>";
$html .= "<a href='".esc_url($tz_link)."'>".esc_html($tz_button_text)."</a>";
$html .= "</div>";
$html .= "</div>";

echo balanceTags($html);