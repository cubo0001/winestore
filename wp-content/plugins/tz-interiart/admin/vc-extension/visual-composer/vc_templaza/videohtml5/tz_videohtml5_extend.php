<?php
vc_map( array(
    "name"          => esc_html__("Section Video HTML5", "tz-interiart"),
    "icon"          => "icon-element",
    "base"          => "tz-section-video",
    "weight"        => 1,
    "description"   => "",
    "class"         => "tzElement_extended",
    "category"      => esc_html__("Built for Templaza", "tz-interiart"),
    "params"        => array(

        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Type Video HTML", "tz-interiart"),
            "param_name"    => "tz_type_video",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Type 1", "tz-interiart")             => 'type1',
                esc_html__("Type 2", "tz-interiart")             => 'type2'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Height Of Section Video", "tz-interiart"),
            "param_name"    => "tzheight",
            "value" => "",
        ),
        array(
            "type"              => "textfield",
            "class"             => "",
            "admin_label"       => true,
            "heading"           => esc_html__("Text Left", "tz-interiart"),
            "param_name"        => "tztext_left",
            "value"             => "",
            "dependency"        => Array('element' => "tz_type_video", 'value' => array('type1')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Text Right", "tz-interiart"),
            "param_name"    => "tztext_right",
            "value" => "",
            "dependency"        => Array('element' => "tz_type_video", 'value' => array('type1')),
        ),

        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Text Color', 'tz-interiart'),
            "param_name" => "tztext_color",
            "description" => esc_html__("You can set color text.", "tz-interiart"),
            "dependency"        => Array('element' => "tz_type_video", 'value' => array('type1')),
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Video (webm) file url", "tz-interiart"),
            "param_name"    => "tzwebm",
            "value" => "",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Video (mp4) file url", "tz-interiart"),
            "param_name"    => "tzmp4",
            "value" => "",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Video (ogv) file url", "tz-interiart"),
            "param_name"    => "tzogv",
            "value" => "",
        ),
        array(
            "type"          => "attach_image",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Image Background", "tz-interiart"),
            "param_name"    => "tzimage",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Overlay', 'tz-interiart'),
            "param_name" => "tzcolor_overlay",
            "description" => esc_html__("You can set color overlay.", "tz-interiart"),
        ),
    )
));
?>