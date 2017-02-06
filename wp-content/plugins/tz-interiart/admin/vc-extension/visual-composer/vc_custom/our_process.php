<?php

$args = array(
    "title"             => "",
    "description"       => "",
    "number_phase"      => "2",
);

$html = "";

extract(shortcode_atts($args, $atts));

$class_process = '';
if(!empty($number_phase)){
    $class_process = 'tzOurProcess_'. $number_phase .'_phase';
}

$html .= '<div class="tzOurProcess_Container '. $class_process .'">';
$html .= '<h3 class="tzOurProcess_title">'.$title.'</h3>';
$html .= '<p class="tzOurProcess_des">'.$description.'</p>';
$html .= '<div class="tzOurProcess">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';

echo balanceTags($html);