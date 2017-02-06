<?php
vc_map( array(
    "name" => esc_html__("Skill Item", "tz-interiart"),
    "icon" => "icon-element",
    "weight" => 1,
    "base" => "tz-skill-item",
    "class" => "tzElement_extended",
    "description" => "",
    "category" => esc_html__("Built for Templaza", "tz-interiart"),
    "params" => array(
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Type Skill", "tz-interiart"),
            "param_name"    => "tz_type_skill",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Choose type", "tz-interiart")        => '',
                esc_html__("Type 1", "tz-interiart")             => 'type1',
                esc_html__("Type 2", "tz-interiart")             => 'type2',
                esc_html__("Type 3", "tz-interiart")             => 'type3',
                esc_html__("Type 4", "tz-interiart")             => 'type4',
                esc_html__("Type 5", "tz-interiart")             => 'type5',
                esc_html__("Type 6", "tz-interiart")             => 'type6'),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Title", "tz-interiart"),
            "param_name" => "tz_title",
            "description" => "",
            "value" => "",
        ),

        array(
            "type" => "textarea",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Description", "tz-interiart"),
            "param_name" => "tz_description",
            "dependency" => Array('element' => "tz_type_skill", 'value' => array('type4','type5')),
            "description" => "",
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Percent", "tz-interiart"),
            "param_name" => "tz_percent",
            "description" => "%",
            "value" => "",
        ),

        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('barColor', 'tz-interiart'),
            "param_name" => "tz_barcolor",
            "description" => esc_html__("You can set a barcolor.", "tz-interiart"),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Size", "tz-interiart"),
            "param_name" => "tz_size",
            "description" => "Size of skill.Exp:200",
            "dependency" => Array('element' => "tz_type_skill", 'value' => array('type4','type5','type6')),
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Size Small", "tz-interiart"),
            "param_name" => "tz_size_small",
            "description" => "Size of skill.Exp:20",
            "dependency" => Array('element' => "tz_type_skill", 'value' => array('type4','type5','type6')),
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Line Width", "tz-interiart"),
            "param_name" => "tz_line_width",
            "description" => "Width of the chart line in px.",
            "dependency" => Array('element' => "tz_type_skill", 'value' => array('type4','type5','type6')),
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Padding Top(px)", "tz-interiart"),
            "param_name" => "tz_padding_top",
            "description" => "Ex: 50;",
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Padding Bottom(px)", "tz-interiart"),
            "param_name" => "tz_padding_bottom",
            "description" => "Ex: 50;",
            "value" => "",
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
) );
?>