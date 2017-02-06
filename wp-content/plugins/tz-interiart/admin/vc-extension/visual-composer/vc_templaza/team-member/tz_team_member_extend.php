<?php
vc_map( array(
    "name"          => esc_html__("Team Member", "tz-interiart"),
    "icon"          => "icon-element",
    "base"          => "tz-team-member",
    "weight"        => 1,
    "description"   => "",
    "class"         => "tzElement_extended",
    "category"      => esc_html__("Built for Templaza", "tz-interiart"),
    "params"        => array(
        array(
            "type"          => "attach_image",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Image Member", "tz-interiart"),
            "param_name"    => "tzinteriart_image",
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Name", "tz-interiart"),
            "param_name"    => "tzinteriart_name",
            "value" => "",
        ),
        array(
            "type"              => "textfield",
            "class"             => "",
            "admin_label"       => true,
            "heading"           => esc_html__("Position", "tz-interiart"),
            "param_name"        => "tzinteriart_position",
            "value"             => "",
        ),
    )
));
?>