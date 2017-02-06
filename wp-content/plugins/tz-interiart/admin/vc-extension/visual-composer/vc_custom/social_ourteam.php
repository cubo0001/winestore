<?php

$args = array(
    "tz_social_icon"        => "",
    "tz_social_link"        => "",
);

extract(shortcode_atts($args, $atts));

$html = "";
$html .= '<a class="tzSocial_Item" href="'.esc_url($tz_social_link).'">';
$html .= '<i class="fa '.esc_attr($tz_social_icon).'"></i>';
$html .= '</a>';

echo balanceTags($html);