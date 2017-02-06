<?php
/*
 * Element Tz View Post
 * */
$tz_categories_array = array();
$tz_categories = get_categories();
foreach($tz_categories as $tz_category){
    $tz_categories_array[] = $tz_category->name;
}

vc_map( array(
    "name"          => esc_html__("View Post", "js_composer"),
    "icon"          => "icon-element",
    "base"          => "tz-view-post",
    "weight"        => 1,
    "description"   => "",
    "class"         => "tzElement_extended",
    "category"      => esc_html__("Built for Templaza", "js_composer"),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Of View", "js_composer"),
            "param_name"    => "tz_type_view",
            "value"         => array(
                esc_html__("choose type", "js_composer")        => "",
                esc_html__("grid", "js_composer")               => "grid",
                esc_html__("Slide", "js_composer")              => "slide",
                esc_html__("Slide Type 2", "js_composer")       => "slide-type2",
                esc_html__("Slide Advance", "js_composer")      => "slide-advance"),
            "description"   => esc_html__("", "js_composer"),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Category", "js_composer"),
            "param_name"    => "tz_category",
            "value"         => $tz_categories_array,
            "description"   => esc_html__("Choose category.", "js_composer"),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Limit", "js_composer"),
            "param_name"    => "tz_limit",
            "value"         => "",
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Order by", "js_composer"),
            "param_name"    => "tz_orderby",
            "value"         => array(
                esc_html__("choose order by", "js_composer")        => '',
                esc_html__("Date", "js_composer")                   => 'date',
                esc_html__("ID", "js_composer")                     => "id",
                esc_html__("Title", "js_composer")                  => "title"),
            "description"   => esc_html__("", "js_composer"),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Order", "js_composer"),
            "param_name"    => "tz_order",
            "value"         => array(
                esc_html__("choose order", "js_composer")       => 'Z --> A',
                esc_html__("desc", "js_composer")               => 'Z --> A',
                esc_html__("asc", "js_composer")                => "A --> Z"),
            "description"   => esc_html__("", "js_composer"),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Button Read More Option", "js_composer"),
            "param_name"    => "tz_read_option",
            "value"         => array(
                esc_html__("choose option", "js_composer")      => "",
                esc_html__("Show", "js_composer")               => "show",
                esc_html__("Hide", "js_composer")               => "hide"),
            "description"   => esc_html__("", "js_composer"),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Button Text Read All", "js_composer"),
            "param_name"    => "tz_read_text",
            "value"         => "",
            "dependency"    => array('element' => 'tz_read_option', 'value' => array('show')),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Height Image Option", "js_composer"),
            "param_name"    => "tz_height_option",
            "value"         => array(
                esc_html__("choose option", "js_composer")      => "",
                esc_html__("Auto Height", "js_composer")        => "auto",
                esc_html__("Fix Height", "js_composer")         => "fix",),
            "description"   => esc_html__("", "js_composer"),
            "dependency"    => array('element' => 'tz_type_view', 'value' => array('grid')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Height Image", "js_composer"),
            "param_name"    => "tz_height_value",
            "value"         => "",
            "dependency"    => array('element' => 'tz_height_option', 'value' => array('fix')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Items Desktop", "js_composer"),
            "param_name"    => "tz_number_desktop",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type_view', 'value' => array('slide','slide-type2','grid')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Items Desktop Small", "js_composer"),
            "param_name"    => "tz_number_desktopsmall",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type_view', 'value' => array('slide','slide-type2','grid')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Items Tablet", "js_composer"),
            "param_name"    => "tz_number_tablet",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type_view', 'value' => array('slide','slide-type2','grid')),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Items Mobile", "js_composer"),
            "param_name"    => "tz_number_mobile",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type_view', 'value' => array('slide','slide-type2','grid')),
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