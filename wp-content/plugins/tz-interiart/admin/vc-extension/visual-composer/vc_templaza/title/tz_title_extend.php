<?php
vc_map( array(
    "name" => esc_html__("Title", "tz-interiart"),
    "icon" => "icon-element",
    "weight" => 1,
    "base" => "tz-title",
    "class" => "tzElement_extended",
    "description" => "Set a title and subtitle with style",
    "category" => esc_html__("Built for Templaza", "tz-interiart"),
    "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Title Type", "tz-interiart"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Type 1", "tz-interiart")     => '1',
                esc_html__("Type 2", "tz-interiart")     => '2',
                esc_html__("Type 3", "tz-interiart")     => '3'),
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Section Title", "tz-interiart"),
            "param_name" => "tz_title",
            "description" => "Define a title for the section",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Title', 'tz-interiart'),
            "param_name" => "tz_color_title",
            "description" => esc_html__("You can set a color title.", "tz-interiart"),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Section Subtitle", "tz-interiart"),
            "param_name" => "tz_subtitle",
            "description" => "Define a subtitle for the section(optional)",
            "value" => "",
            "dependency" => array('element' => 'tz_type', 'value' => array('1')),
        ),

        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Subtitle', 'tz-interiart'),
            "param_name" => "tz_color_subtitle",
            "description" => esc_html__("You can set a color subtitle.", "tz-interiart"),
            "dependency" => array('element' => 'tz_type', 'value' => array('1')),
        ),

        array(
            "type" => "textarea",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Description", "tz-interiart"),
            "param_name" => "tz_description",
            "description" => "Define a description for the section(optional)",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Description', 'tz-interiart'),
            "param_name" => "tz_color_des",
            "description" => esc_html__("You can set a color description.", "tz-interiart"),
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Css Animation", "tz-interiart"),
            "param_name"    => "tz_css_animation",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("No animation", "tz-interiart")           => '',
                esc_html__("Top to bottom", "tz-interiart")          => 'top-to-bottom',
                esc_html__("Bottom to top", "tz-interiart")          => 'bottom-to-top',
                esc_html__("Left to right", "tz-interiart")          => 'left-to-right',
                esc_html__("Right to left", "tz-interiart")          => 'right-to-left',
                esc_html__("Appear from center", "tz-interiart")     => 'appear'),
        ),
    )
));
?>