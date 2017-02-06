<?php
vc_map( array(
    "name" => esc_html__("Newsletter", "js_composer"),
    "icon" => "icon-element",
    "weight" => 1,
    "base" => "tz-newsletter",
    "class" => "tzElement_extended",
    "description" => esc_html__("create a subscription form","js_composer"),
    "category" => esc_html__("Built for Templaza", "js_composer"),
    "params" => array(

        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Style Of Newsletter", "js_composer"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "js_composer"),
            "value"         => array(
                esc_html__("Classic", "js_composer")                         => 'classic',
                esc_html__("Modern", "js_composer")                         => 'modern')
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Newsletter Title", "js_composer"),
            "param_name" => "tz_title",
            "description" => "Define a title for the section",
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Subtitle", "js_composer"),
            "param_name" => "tz_subtitle",
            "description" => "Define a subtitle for the section(optional)",
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
));
?>