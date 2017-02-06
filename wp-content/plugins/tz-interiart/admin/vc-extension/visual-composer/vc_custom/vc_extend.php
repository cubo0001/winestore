<?php
/*
 * VC_ROW
 * */
vc_remove_param('vc_row', 'full_width');
vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => esc_html__('Row Type', 'tz-interiart'),
        "param_name" => "tz_row_type",
        "weight" => '0',
        "value" => array(
            esc_html__("Full Width", 'tz-interiart') => 'full_width',
            esc_html__("In Grid", 'tz-interiart') => 'grid',
        )
    )
);

vc_add_param('vc_row', array(
        "type"          =>  "colorpicker",
        "class"         =>  "hide_in_vc_editor",
        "admin_label"   => true,
        "heading"       => "Overlay Parallax",
        "param_name"    => "tz_overlay_parallax",
        "dependency"    => Array('element' => "parallax", 'value' => array('content-moving','content-moving-fade'))
    )
);

vc_add_param('vc_row', array(
    "type"        =>  "checkbox",
    "class"       =>  "hide_in_vc_editor",
    "admin_label" => true,
    "heading"     => "Ruler Option",
    "param_name"  => "tz_ruler",
    "value"       => array( '' => '1')
));

vc_add_param('vc_row', array(
    "type"        =>  "checkbox",
    "class"       =>  "hide_in_vc_editor",
    "admin_label" => true,
    "heading"     => "Pattern",
    "param_name"  => "tz_pattern",
    "value"       => array( '' => '1')
));

/*
 * VC_COLUMN
 * */

vc_add_param('vc_column', array(
        "type"          => "dropdown",
        "class"         => "",
        "heading"       => "Text Alignment",
        "param_name"    => "tztextalign",
        "value"         => array(
            "Choose align"        => "",
            "Align Center"        => "center",
            "Align Left"          => "left",
            "Align Right"         => "right",
        ),
        "description" => ""
    )
);

vc_add_param('vc_column',array(
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
    )
);

/*
 * VC_BUTTON
 * */

vc_add_param('vc_btn',array(
        "type" => "dropdown",
        "class" => "",
        "admin_label" => true,
        "heading"       => esc_html__("Font Family", "tz-interiart"),
        "param_name"    => "tz_font_family",
        "description"   => esc_html__("", "tz-interiart"),
        "value"         => array(
            esc_html__("Ubuntu", "tz-interiart") => '',
            esc_html__("Raleway", "tz-interiart") => 'raleway',
            esc_html__("Montserrat", "tz-interiart") => 'montserrat',
            esc_html__("Droid Serif", "tz-interiart") => 'droidserif'),
    )
);

vc_add_param('vc_btn', array(
        "type"          => "textfield",
        "class"         => "",
        "admin_label"   => true,
        "heading"       => "Padding Top(px)",
        "param_name"    => "tz_padding_top",
        "description"   => "Ex: 50",
        "value"         => "",
    )
);

vc_add_param('vc_btn', array(
        "type"          => "textfield",
        "class"         => "",
        "admin_label"   => true,
        "heading"       => "Padding Bottom(px)",
        "param_name"    => "tz_padding_bottom",
        "description"   => "Ex: 50",
        "value"         => "",
    )
);

vc_add_param('vc_btn', array(
        "type"          => "textfield",
        "class"         => "",
        "admin_label"   => true,
        "heading"       => "Padding Left(px)",
        "param_name"    => "tz_padding_left",
        "description"   => "Ex: 50",
        "value"         => "",
    )
);

vc_add_param('vc_btn', array(
        "type"          => "textfield",
        "class"         => "",
        "admin_label"   => true,
        "heading"       => "Padding Right(px)",
        "param_name"    => "tz_padding_right",
        "description"   => "Ex: 50",
        "value"         => "",
    )
);

/*
 * VC_GALLERY
 * */

vc_add_param('vc_gallery',array(
        "type" => "dropdown",
        "class" => "",
        "admin_label" => true,
        "heading" => esc_html__("Gallery Type", "tz-interiart"),
        "param_name" => "type",
        "description" => esc_html__("", "tz-interiart"),
        "value" => array(
            esc_html__("Flex slider fade", "tz-interiart") => 'flexslider_fade',
            esc_html__("Flex slider slide", "tz-interiart") => 'flexslider_slide',
            esc_html__("Nivo slider", "tz-interiart") => 'nivo',
            esc_html__("Owl Carousel", "tz-interiart") => 'owl_carousel',
            esc_html__("Slick slider", "tz-interiart") => 'slickslider',
            esc_html__("Image grid", "tz-interiart") => 'image_grid'),
    )
);

/*
 * VC_GMap
 * */
vc_add_param('vc_gmaps',array(
        "type" => "dropdown",
        "class" => "",
        "admin_label" => true,
        "weight" => -1,
        "heading" => esc_html__("Google Map Type", "tz-interiart"),
        "param_name" => "tz_type",
        "description" => esc_html__("", "tz-interiart"),
        "value" => array(
            esc_html__("Modern", "tz-interiart") => 'modern',
            esc_html__("Classic", "tz-interiart") => 'classic'),
    )
);

/*********************************************************************************
 * Class WPBakeryShortCode_Pricing_Table
 */

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Pricing_Table extends WPBakeryShortCode {}
}

vc_map( array(
    "name" => "Pricing Table",
    "base" => "pricing_table",
    "weight" => 1,
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Type of Pricing Table",
            "param_name" => "tz_type",
            "value" => array(
                "choose type" => "",
                "Type 1" => "type1",
                "Type 2" => "type2",
            )
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Font Icon",
            "param_name" => "tz_font_icon",
            "value" => array(
                "Font Et-Line" => "et-line",
                "Font Awesome" => "awesome",
            )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Class Of Icon",
            "param_name" => "tz_icon",
            "value" => "",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Title",
            "param_name" => "tz_title",
            "value" => "Basic",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Price",
            "param_name" => "tz_price",
            "description" => "",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Currency",
            "param_name" => "tz_currency",
            "description" => "",
            "value"         => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Price Period",
            "param_name" => "tz_price_period",
            "description" => "",
            "value"         => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Button Text",
            "param_name" => "tz_button_text",
            "description" => "Default label is Purchase Now",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Button Link",
            "param_name" => "tz_link",
            "value" => "",
        ),

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => "Content",
            "param_name" => "content",
            "value" => "<ul><li>Full Access</li><li>Unlimited Pizza</li><li>2 Free Forks Every Months</li><li>Unlimited Burger</li><li>Daft Punk Every Evenings</li></ul>",
            "description" => ""
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

/***********************************************************************************
 * Class WPBakeryShortCode_Tz_Quote
 */
class WPBakeryShortCode_Quote  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Quote",
    "base" => "quote",
    "weight" => 1,
    "as_parent" => array('only' => 'quote_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Built for Templaza',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Type Quote", "tz-interiart"),
            "param_name"    => "tz_type",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Type 1", "tz-interiart")             => 'type1',
                esc_html__("Type 2", "tz-interiart")             => 'type2',
                esc_html__("Type 3", "tz-interiart")             => 'type3',
                esc_html__("Type 4", "tz-interiart")             => 'type4',
                esc_html__("Type 5", "tz-interiart")             => 'type5'),
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Image Background", "tz-interiart"),
            "param_name" => "tz_imagebg",
            "description" => esc_html__("Upload image background of quote.", "tz-interiart"),
            "dependency" => Array('element' => "tz_type", 'value' => array('type5')),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Pagination Option", "tz-interiart"),
            "param_name"    => "tz_pagination",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Choose option", "tz-interiart")          => '',
                esc_html__("Show", "tz-interiart")                   => 'show',
                esc_html__("Hide", "tz-interiart")                   => 'hide'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Arrow Option", "tz-interiart"),
            "param_name"    => "tz_arrow",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Hide", "tz-interiart")                   => 'hide',
                esc_html__("Show", "tz-interiart")                   => 'show'),
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
    ),
    "js_view" => 'VcColumnView'
) );

// Customer say item
class WPBakeryShortCode_Quote_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Quote Item",
    "base" => "quote_item",
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'quote'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Image Option", "tz-interiart"),
            "param_name"    => "tz_image_option",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Choose type", "tz-interiart")        => '',
                esc_html__("Show", "tz-interiart")             => 'show',
                esc_html__("Hide", "tz-interiart")             => 'hide'),
        ),

        array(
            "type" => "attach_image",
            "class"         => "",
            "admin_label"   => true,
            "heading" => esc_html__("Image Author", "tz-interiart"),
            "param_name" => "tz_author",
            "description" => esc_html__("Upload image author of quote.", "tz-interiart"),
            "dependency"    => Array('element' => "tz_image_option", 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Name Option", "tz-interiart"),
            "param_name"    => "tz_name_option",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Choose option", "tz-interiart")        => '',
                esc_html__("Show", "tz-interiart")             => 'show',
                esc_html__("Hide", "tz-interiart")             => 'hide'),
        ),

        array(
            "type" => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading" => "Name",
            "param_name" => "tz_name",
            "description" => "",
            "value" => "",
            "dependency"    => Array('element' => "tz_name_option", 'value' => array('show')),
        ),

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Employment Option", "tz-interiart"),
            "param_name"    => "tz_employment_option",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("Choose option", "tz-interiart")        => '',
                esc_html__("Show", "tz-interiart")             => 'show',
                esc_html__("Hide", "tz-interiart")             => 'hide'),
        ),
        array(
            "type" => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading" => "Employment",
            "param_name" => "tz_employment",
            "description" => "",
            "value" => "",
            "dependency" => Array('element' => "tz_employment_option", 'value' => array('show')),
        ),
        array(
            "type"          => "textarea",
            "holder"        => "div",
            "class"         => "",
            "heading"       => esc_html__("Content", "tz-interiart"),
            "param_name"    => "tz_content",
            "value"         => "",
        ),
    )
) );

/***********************************************************************************
 * Class WPBakeryShortCode_Tz_Category_Grid
 */
class WPBakeryShortCode_Category_Grid  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Category Grid",
    "base" => "category_grid",
    "weight" => 1,
    "as_parent" => array('only' => 'category_grid_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Built for Templaza',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Column Of Support", "tz-interiart"),
            "param_name"    => "tz_column",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("2 Columns", "tz-interiart")             => '2',
                esc_html__("3 Columns", "tz-interiart")             => '3',
                esc_html__("4 Columns", "tz-interiart")             => '4'),
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
    ),
    "js_view" => 'VcColumnView'
) );

// Customer say item
$tz_categories_array = array('choose category of portfolio');
$tz_categories = get_categories(array('taxonomy'=>'portfolio-category'));
foreach($tz_categories as $tz_category){
    $tz_categories_array[$tz_category->name] = $tz_category->slug;
}

class WPBakeryShortCode_Category_Grid_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Category Grid Item",
    "base" => "category_grid_item",
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'category_grid'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Image Background", "tz-interiart"),
            "param_name" => "tz_image",
            "description" => esc_html__("Upload image background for element.", "tz-interiart"),
        ),
        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Font Icon", "tz-interiart"),
            "param_name"    => "tz_font_icon",
            "description"   => esc_html__("Show or hide icon", "tz-interiart"),
            "value"         => array(
                esc_html__("Furniture", "tz-interiart")             => 'furniture',
                esc_html__("Elegant", "tz-interiart")               => 'elegant',
                esc_html__("Font Awesome", "tz-interiart")          => 'awesome',
                esc_html__("Et Line", "tz-interiart")               => 'et-line')
        ),
        array(
            "type"         => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Icon", "tz-interiart"),
            "param_name"   => "tz_icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "tz-interiart"),
            "param_name" => "tz_title",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Sub Title", "tz-interiart"),
            "param_name" => "tz_subtitle",
            "value" => "",
        ),

        array(
            "type"       => "textarea",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Description", "tz-interiart"),
            "param_name" => "tz_description",
            "value" => "",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Option Link", "tz-interiart"),
            "param_name"    => "tz_option_link",
            "description"   => esc_html__("You can choose link to category or custom link", "tz-interiart"),
            "value"         => array(
                esc_html__("Link To Category", "tz-interiart") => 'link-to-category',
                esc_html__("Custom Link", "tz-interiart") => 'custom-link')
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Link To Category Page", "tz-interiart"),
            "param_name"    => "tz_category",
            "value"         => $tz_categories_array,
            "description"   => esc_html__("Choose category.", "tz-interiart"),
            "dependency" => Array('element' => "tz_option_link", 'value' => array('link-to-category')),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Custom link", "tz-interiart"),
            "param_name" => "tz_custom_link",
            "value" => "",
            "dependency" => Array('element' => "tz_option_link", 'value' => array('custom-link')),
        ),
    )
) );

/***********************************************************************************
 * Class WPBakeryShortCode_Tz_Category_Slide
 */
class WPBakeryShortCode_Category_Slide extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Category Slide",
    "base" => "category_slide",
    "weight" => 1,
    "as_parent" => array('only' => 'category_slide_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Built for Templaza',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Style of slide", "tz-interiart"),
            "param_name"    => "tz_style",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("In Grid", "tz-interiart")             => 'in_grid',
                esc_html__("Full Width", "tz-interiart")             => 'full_width'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Desktop", "tz-interiart"),
            "param_name"    => "tz_number_item_desk",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4',
                esc_html__("5 item", "tz-interiart")             => '5',
                esc_html__("6 item", "tz-interiart")             => '6'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Tablet Landscape", "tz-interiart"),
            "param_name"    => "tz_number_item_tablet_landscape",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4',
                esc_html__("5 item", "tz-interiart")             => '5',
                esc_html__("6 item", "tz-interiart")             => '6'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Tablet Portrait", "tz-interiart"),
            "param_name"    => "tz_number_item_tablet_portrait",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Mobile", "tz-interiart"),
            "param_name"    => "tz_number_item_mobile",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
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
    ),
    "js_view" => 'VcColumnView'
) );

// Customer say item
$tz_categories_array = array('choose category of portfolio');
$tz_categories = get_categories(array('taxonomy'=>'portfolio-category'));
foreach($tz_categories as $tz_category){
    $tz_categories_array[$tz_category->name] = $tz_category->slug;
}

class WPBakeryShortCode_Category_Slide_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Category Slide Item",
    "base" => "category_slide_item",
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'category_slide'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Image Option", "tz-interiart"),
            "param_name"    => "tz_image_option",
            "description"   => esc_html__("Show or hide image", "tz-interiart"),
            "value"         => array(
                esc_html__("Show", "tz-interiart")             => 'show',
                esc_html__("Hide", "tz-interiart")             => 'hide')
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Image Background", "tz-interiart"),
            "param_name" => "tz_image",
            "description" => esc_html__("Upload image background for element.", "tz-interiart"),
            "dependency" => Array('element' => "tz_image_option", 'value' => array('show')),
        ),
        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Font Icon", "tz-interiart"),
            "param_name"    => "tz_font_icon",
            "description"   => esc_html__("Show or hide icon", "tz-interiart"),
            "value"         => array(
                esc_html__("Furniture", "tz-interiart")             => 'furniture',
                esc_html__("Elegant", "tz-interiart")               => 'elegant',
                esc_html__("Font Awesome", "tz-interiart")          => 'awesome',
                esc_html__("Et Line", "tz-interiart")               => 'et-line')
        ),
        array(
            "type"         => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Icon", "tz-interiart"),
            "param_name"   => "tz_icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "tz-interiart"),
            "param_name" => "tz_title",
            "value" => "",
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Option Link", "tz-interiart"),
            "param_name"    => "tz_option_link",
            "description"   => esc_html__("You can choose link to category or custom link", "tz-interiart"),
            "value"         => array(
                esc_html__("Link To Category", "tz-interiart") => 'link-to-category',
                esc_html__("Custom Link", "tz-interiart") => 'custom-link')
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Link To Category Page", "tz-interiart"),
            "param_name"    => "tz_category",
            "value"         => $tz_categories_array,
            "description"   => esc_html__("Choose category.", "tz-interiart"),
            "dependency" => Array('element' => "tz_option_link", 'value' => array('link-to-category')),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Custom link", "tz-interiart"),
            "param_name" => "tz_custom_link",
            "value" => "",
            "dependency" => Array('element' => "tz_option_link", 'value' => array('custom-link')),
        ),
    )
) );

/***********************************************************************************
 * Class WPBakeryShortCode_Tz_Service
 */
class WPBakeryShortCode_Service extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Service",
    "base" => "service",
    "weight" => 1,
    "as_parent" => array('only' => 'service_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Built for Templaza',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(

        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Desktop", "tz-interiart"),
            "param_name"    => "tz_number_item_desk",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Tablet Landscape", "tz-interiart"),
            "param_name"    => "tz_number_item_tablet_landscape",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Tablet Portrait", "tz-interiart"),
            "param_name"    => "tz_number_item_tablet_portrait",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
        ),
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Number Item On Mobile", "tz-interiart"),
            "param_name"    => "tz_number_item_mobile",
            "description"   => esc_html__("", "tz-interiart"),
            "value"         => array(
                esc_html__("1 item", "tz-interiart")             => '1',
                esc_html__("2 item", "tz-interiart")             => '2',
                esc_html__("3 item", "tz-interiart")             => '3',
                esc_html__("4 item", "tz-interiart")             => '4'),
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
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Service_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Service Item",
    "base" => "service_item",
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'service'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type" => "attach_image",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Image Service", "tz-interiart"),
            "param_name" => "tz_image",
            "description" => esc_html__("Upload image for Service.", "tz-interiart"),
        ),
        array(
            "type"          => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Font Icon", "tz-interiart"),
            "param_name"    => "tz_font_icon",
            "description"   => esc_html__("Show or hide icon", "tz-interiart"),
            "value"         => array(
                esc_html__("Furniture", "tz-interiart")             => 'furniture',
                esc_html__("Elegant", "tz-interiart")               => 'elegant',
                esc_html__("Font Awesome", "tz-interiart")          => 'awesome',
                esc_html__("Et Line", "tz-interiart")               => 'et-line')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"      => esc_html__("Icon", "tz-interiart"),
            "param_name"   => "tz_icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "value" => "",
        ),

        array(
            "type"       => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading"    => esc_html__("Title", "tz-interiart"),
            "param_name" => "tz_title",
            "value" => "",
        ),

        array(
            "type"          => "textarea",
            "class"         => "",
            "heading"       => esc_html__("Description", "tz-interiart"),
            "param_name"    => "tz_description",
            "value"         => "",
        ),

        array(
            "type" => "dropdown",
            "class" => "",
            "admin_label" => true,
            "heading"       => esc_html__("Option Readmore", "tz-interiart"),
            "param_name"    => "tz_option_readmore",
            "description"   => esc_html__("You can choose show or hide button readmore.", "tz-interiart"),
            "value"         => array(
                esc_html__("Show", "tz-interiart") => 'show',
                esc_html__("Hide", "tz-interiart") => 'hide')
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Readmore Text", "tz-interiart"),
            "param_name" => "tz_readmore_text",
            "value" => "",
            "dependency" => Array('element' => "tz_option_readmore", 'value' => array('show')),
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "admin_label" => true,
            "heading" => esc_html__("Readmore Link", "tz-interiart"),
            "param_name" => "tz_readmore_link",
            "value" => "",
            "dependency" => Array('element' => "tz_option_readmore", 'value' => array('show')),
        ),
    )
) );

/************************************************************************
 * Class WPBakeryShortCode_Our_Process
 */

class WPBakeryShortCode_Our_Process  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Our Process",
    "base" => "our_process",
    "weight"        => 1,
    "as_parent" => array('only' => 'our_process_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'Built for Templaza',
    "icon" => "icon-element",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => esc_html__("Title", "tz-interiart"),
            "param_name"    => "title",
            "value"         => "",
        ),
        array(
            "type"          => "textarea",
            "class"         => "",
            "heading"       => esc_html__("Description", "tz-interiart"),
            "param_name"    => "description",
            "value"         => "",
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Number Phase", "tz-interiart"),
            "param_name"    => "number_phase",
            "value"         => array(
                esc_html__("Two Phase", "tz-interiart") => '2',
                esc_html__("Three Phase", "tz-interiart") => '3',
                esc_html__("Four Phase", "tz-interiart") => '4',
                esc_html__("Five Phase", "tz-interiart") => '5'),
            "description"   => esc_html__("Select number phase of process.", "tz-interiart")
        ),
    ),
    "js_view" => 'VcColumnView'
) );

// Our Team item
class WPBakeryShortCode_Our_Process_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" => "Our Process Item",
    "base" => "our_process_item",
    "icon" => "icon-element",
    "category" => 'Built for Templaza',
    "allowed_container_element" => 'vc_row',
    "as_child" => array('only' => 'our_process'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        array(
            "type"          => "dropdown",
            "class"         => "",
            "admin_label"   => true,
            "heading"       => esc_html__("Font Icon", "tz-interiart"),
            "param_name"    => "font_icon",
            "description"   => esc_html__("Show or hide icon", "tz-interiart"),
            "value"         => array(
                esc_html__("Furniture", "tz-interiart")             => 'furniture',
                esc_html__("Et Line", "tz-interiart")               => 'et-line',
                esc_html__("Elegant", "tz-interiart")               => 'elegant',
                esc_html__("Font Awesome", "tz-interiart")          => 'awesome')
        ),
        array(
            "type"         => "textfield",
            "class"         => "",
            "admin_label"   => true,
            "heading"      => esc_html__("Class Of Icon", "tz-interiart"),
            "param_name"   => "icon",
            "description"  => ".If you choose font Et Line icon or font Elegant icon,you can see class of icon in package.If you choose Awesome font, you click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fa-user",
            "value" => "",
        ),

        array(
            "type" => "textfield",
            "class" => "",
            "heading" => "Year of Phase",
            "param_name" => "year",
            "value" => "",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => "Name of Phase",
            "param_name" => "name",
            "value" => "",
            "description" => ""
        ),
    ),
) );

?>