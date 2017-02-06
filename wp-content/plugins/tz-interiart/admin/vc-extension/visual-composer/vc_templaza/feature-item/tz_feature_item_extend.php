<?php

vc_map( array(
    "name" => esc_html__("Feature Item", "js_composer"),
    "weight" => 14,
    "base" => "tz-feature-item",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => esc_html__("Built for Templaza", "js_composer"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Type Feature Item", "js_composer"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("Type 1", "js_composer")                         => 'type1',
                esc_html__("Type 2", "js_composer")                         => 'type2',
                esc_html__("Type 3", "js_composer")                         => 'type3',
                esc_html__("Type 4", "js_composer")                         => 'type4',
                esc_html__("Type 5", "js_composer")                         => 'type5')
        ),
        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Font Icon", "js_composer"),
            "param_name"    => "tz_font_icon",
            "description"   => esc_html__("Show or hide icon", "js_composer"),
            "value"         => array(
                esc_html__("Et Line", "js_composer")               => 'et-line',
                esc_html__("Furniture", "js_composer")             => 'furniture',
                esc_html__("Elegant", "js_composer")               => 'elegant',
                esc_html__("Font Awesome", "js_composer")          => 'awesome')
        ),
        array(
            "type"         => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Class Of Icon", "js_composer"),
            "param_name"   => "tz_icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Number Of Feature", "js_composer"),
            "param_name" => "tz_number",
            "dependency"   => array('element' => 'tz_type', 'value' => array('type2','type3')),
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "js_composer"),
            "param_name" => "tz_title",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Sub Title", "js_composer"),
            "param_name" => "tz_subtitle",
            "dependency"   => array('element' => 'tz_type', 'value' => array('type1')),
            "value" => "",
        ),

        array(
            "type"       => "textarea",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Description", "js_composer"),
            "param_name" => "tz_description",
            "value" => "",
        ),

        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Style Option", "js_composer"),
            "param_name"    => "tz_style_option",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("Choose Style Option", "js_composer")        => '',
                esc_html__("Icon - Text", "js_composer")                => 'icon-text',
                esc_html__("Text - Icon", "js_composer")                => 'text-icon'),
            "dependency"   => array('element' => 'tz_type', 'value' => array('type2'))
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Readmore Option", "js_composer"),
            "param_name"    => "tz_readmore_option",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("Hide", "js_composer")               => 'hide',
                esc_html__("Show", "js_composer")               => 'show'),
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Readmore Text", "js_composer"),
            "param_name" => "tz_readmore_text",
            "description" => "",
            "value" => "",
            "dependency"   => array('element' => 'tz_readmore_option', 'value' => array('show'))
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Readmore Link", "js_composer"),
            "param_name" => "tz_readmore_link",
            "description" => "",
            "value" => "",
            "dependency"   => array('element' => 'tz_readmore_option', 'value' => array('show'))
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Padding Top(px)", "js_composer"),
            "param_name" => "tz_padding_top",
            "description" => "Ex: 50;",
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Padding Bottom(px)", "js_composer"),
            "param_name" => "tz_padding_bottom",
            "description" => "Ex: 50;",
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