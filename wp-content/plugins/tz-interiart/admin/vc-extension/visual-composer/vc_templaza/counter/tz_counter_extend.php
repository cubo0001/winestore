<?php

vc_map( array(
    "name" => esc_html__("Counter", "js_composer"),
    "weight" => 14,
    "base" => "tz-counter",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Built for Templaza", "js_composer"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Counter", "js_composer"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("Type 1", "js_composer")             => 'type1',
                esc_html__("Type 2", "js_composer")             => 'type2',
                esc_html__("Type 3", "js_composer")             => 'type3'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Font Icon", "js_composer"),
            "param_name"    => "font_icon",
            "description"   => esc_html__("Show or hide icon", "js_composer"),
            "value"         => array(
                esc_html__("Furniture", "js_composer")             => 'furniture',
                esc_html__("Et Line", "js_composer")               => 'et-line',
                esc_html__("Elegant", "js_composer")               => 'elegant',
                esc_html__("Font Awesome", "js_composer")          => 'awesome'),
            "dependency"   => array('element' => 'tz_type', 'value' => array('type1','type2')),
        ),
        array(
            "type"         => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"      => esc_html__("Class Of Icon", "js_composer"),
            "param_name"   => "icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "dependency"   => array('element' => 'font_icon', 'value' => array('et-line','elegant','awesome','furniture')),
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Icon', 'js_composer'),
            "param_name" => "color_icon",
            "description" => esc_html__("You can set a color.", "js_composer"),
            "dependency"   => array('element' => 'font_icon', 'value' => array('et-line','elegant','awesome')),
        ),
        array(
            "type"       => "textfield",
            "class"         => "",
            "admin_label" => true,
            "heading"    => esc_html__("Count", "js_composer"),
            "param_name" => "count",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Count', 'js_composer'),
            "param_name" => "color_count",
            "description" => esc_html__("You can set a color.", "js_composer"),
            "value" => "",
        ),
        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "js_composer"),
            "param_name" => "title",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Of Title', 'js_composer'),
            "param_name" => "color_title",
            "description" => esc_html__("You can set a color.", "js_composer"),
            "value" => "",
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Css Animation", "js_composer"),
            "param_name"    => "tz_css_animation",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("No animation", "js_composer")           => '',
                esc_html__("Top to bottom", "js_composer")          => 'top-to-bottom',
                esc_html__("Bottom to top", "js_composer")          => 'bottom-to-top',
                esc_html__("Left to right", "js_composer")          => 'left-to-right',
                esc_html__("Right to left", "js_composer")          => 'right-to-left',
                esc_html__("Appear from center", "js_composer")     => 'appear'),
        ),
    )
) );

?>