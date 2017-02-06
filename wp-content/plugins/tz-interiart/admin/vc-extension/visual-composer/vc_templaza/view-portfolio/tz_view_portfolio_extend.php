<?php
/*
 * Element Tz Portfolio Grid
 * */

$tzportfolio_cat = array();
$cate_portfolio = get_categories(array('taxonomy'=>'portfolio-category'));

foreach ($cate_portfolio as $cat){
    $tzportfolio_cat[$cat->name] = $cat->term_id;
}

vc_map( array(
    "name"          => esc_html__("View Portfolio", "js_composer"),
    "icon"          => "icon-element",
    "base"          => "tz-view-portfolio",
    "weight"        => 11,
    "description"   => "",
    "class"         => "tzElement_extended",
    "category"      => esc_html__("Built for Templaza", "js_composer"),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Portfolio Type", "js_composer"),
            "param_name"    => "tz_type",
            "value"         => array(
                esc_html__("Grid", "js_composer") => 'grid',
                esc_html__("Carousel Slider", "js_composer") => "carousel",
                esc_html__("Slick Slider", "js_composer") => 'slick'),
            "description"   => esc_html__("", "js_composer"),
        ),
        array(
            "type" => "checkbox",
            "class" => "",
            "admin_label" => true,
            "heading" =>  esc_html__("Portfolio Categories", "js_composer"),
            "param_name" => "tz_category",
            "value" => $tzportfolio_cat,
            "description" => esc_html__("Select category portfolio.", "js_composer")
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Show Or Hide Filter", "js_composer"),
            "param_name"    => "tz_filter_option",
            "value"         => array(
                esc_html__("Choose option", "js_composer")  => '',
                esc_html__("Show", "js_composer")           => 'show',
                esc_html__("Hide", "js_composer")           => "hide"),
            "description"   => esc_html__("", "js_composer"),
            "dependency"    => array('element' => 'tz_type', 'value' => array('grid')),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Filter Type", "js_composer"),
            "param_name"    => "tz_filter_type",
            "value"         => array(
                esc_html__("Choose filter type", "js_composer") => '',
                esc_html__("Portfolio Category", "js_composer") => 'portfolio-category',
                esc_html__("Portfolio Tags", "js_composer") => "portfolio-tags"),
            "description"   => esc_html__("", "js_composer"),
            "dependency" => Array('element' => 'tz_filter_option', 'value' => 'show')
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
            "value"         => array(esc_html__("Date", "js_composer") => 'date', esc_html__("ID", "js_composer") => "id", esc_html__("Title", "js_composer") => "title"),
            "description"   => esc_html__("", "js_composer")
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Order", "js_composer"),
            "param_name"    => "tz_order",
            "value"         => array(esc_html__("Z --> A", "js_composer") => 'desc', esc_html__("A --> Z", "js_composer") => "asc"),
            "description"   => esc_html__("", "js_composer")
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Column Of Desktop", "js_composer"),
            "param_name"    => "tz_col_desktop",
            "value"         => "",
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Column Of Tablet Portrait", "js_composer"),
            "param_name"    => "tz_col_tabletportrait",
            "value"         => "",
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Column Of Mobile Landscape", "js_composer"),
            "param_name"    => "tz_col_mobilelandscape",
            "value"         => "",
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number column of Mobile", "js_composer"),
            "param_name"    => "tz_col_mobile",
            "value"         => "",
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Show Or Hide Button", "js_composer"),
            "param_name"    => "tz_button_option",
            "value"         => array(
                esc_html__("Choose option", "js_composer") => '',
                esc_html__("Show", "js_composer") => 'show',
                esc_html__("Hide", "js_composer") => "hide"),
            "description"   => esc_html__("", "js_composer"),
        ),

        array(
            "type"          => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Height Item", "js_composer"),
            "param_name"    => "tz_height_item",
            "value"         => "",
            "dependency"    => array('element' => 'tz_type', 'value' => array('grid')),
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