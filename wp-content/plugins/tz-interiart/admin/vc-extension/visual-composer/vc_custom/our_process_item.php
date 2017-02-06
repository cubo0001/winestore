<?php

$args = array(
    "font_icon"     => "furniture",
    "icon"          => "",
    "year"          => "",
    "name"          => "",
);

extract(shortcode_atts($args, $atts));

$html = "";
$html .='<div class="tzOurProcessItem">';
$html .='<div class="tzOurProcessItem_top">';
$html .='<span class="tzOurProcessItem_icon">';
                if(($font_icon == 'et-line' || $font_icon == 'elegant')  && $icon != ''){
                    $html .='<span aria-hidden="true" class="'.esc_attr($icon).'"';

                    if(!empty($color_icon)){
                        $html .='style ="color:'.esc_attr($color_icon).';"';
                    }

                    $html .='></span>';

                }elseif($font_icon == 'awesome' && $icon != ''){
                    $html .='<i class="fa '.esc_attr($icon).'"';

                    if(!empty($color_icon)){
                        $html .='style ="color:'.esc_attr($color_icon).';"';
                    }

                    $html .='></i>';
                }elseif($font_icon == 'furniture' && $icon != ''){
                    $html .='<span data-icon="'.esc_attr($icon).'" class="icon"';

                    if(!empty($color_icon)){
                        $html .='style ="color:'.esc_attr($color_icon).';"';
                    }

                    $html .='></span>';
                }

$html .='</span>';
$html .='<span class="tzOurProcessItem_year">'. $year .'</span>';
$html .='<span class="tzOurProcessItem_name">'. $name .'</span>';
$html .='</div>';
$html .='<div class="tzOurProcessItem_bottom">';
$html .='<div class="tzOurProcessItem_left">';
$html .='</div>';
$html .='<div class="tzOurProcessItem_right">';
$html .='<div class="tzOurProcessItem_rightbox">';
$html .='</div>';
$html .='</div>';
$html .='</div>';
$html .='</div>';

echo balanceTags($html);