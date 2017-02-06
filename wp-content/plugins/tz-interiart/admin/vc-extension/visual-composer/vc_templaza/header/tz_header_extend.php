<?php
/*** tz-header ***/

$menus = get_registered_nav_menus();
global $menuArray;
foreach ( $menus as $location => $description ) {
        $menuArray[ $description ] = $location;
}

vc_map( array(
    "name"          => esc_html__("Header Option", "tz-interiart"),
    "icon"          => "icon-element",
    "base"          => "tz-header",
    "weight"        => 1,
    "description"   => "",
    "class"         => "tzElement_extended",
    "category"      => esc_html__("Built for Templaza", "tz-interiart"),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Header Type", "tz-interiart"),
            "param_name"    => "tz_header_type",
            "value"         => array(
                esc_html__("Header Type 1", "tz-interiart") => '1',
                esc_html__("Header Type 2", "tz-interiart") => '2',
                esc_html__("Header Type 3", "tz-interiart") => '3'),
            "description"   => esc_html__("", "tz-interiart"),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Logo Image Type", "tz-interiart"),
            "param_name"    => "tz_logo_type",
            "value"         => array(
                esc_html__("choose type logo", "tz-interiart") => '',
                esc_html__("Logo Image", "tz-interiart") => 'image',
                esc_html__("Logo Text", "tz-interiart") => 'text'),
            "description"   => esc_html__("", "tz-interiart"),
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Upload Logo Image", "tz-interiart"),
            "param_name"    => "tz_logo_image",
            "description"   => esc_html__("", "tz-interiart"),
            "dependency"    => Array('element' => "tz_logo_type", 'value' => array('image')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Logo Text", "tz-interiart"),
            "param_name"    => "tz_logo_text",
            "description"   => "",
            "dependency"    => Array('element' => "tz_logo_type", 'value' => array('text'))
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__('Color Logo Text', 'tz-interiart'),
            "param_name" => "tz_color_logo_text",
            "description" => esc_html__("You can set a color of logo Text.", "tz-interiart"),
            "dependency"    => Array('element' => "tz_logo_type", 'value' => array('text'))
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Location Menu", "tz-interiart"),
            "param_name" => "tz_location_menu",
            "value" => $menuArray,
            "description" => esc_html__("Select location menu of home page.", "tz-interiart")
        ),
    )
));
?>