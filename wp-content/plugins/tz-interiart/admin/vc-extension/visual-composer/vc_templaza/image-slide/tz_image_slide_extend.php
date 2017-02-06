<?php

vc_map( array(
    "name" => __("Image Slide", "js_composer"),
    "weight" => 14,
    "base" => "tz-image-slide",
    "icon" => "icon-element",
    "description" => "",
    "class" => "tzElement_extended",
    "category" => __("Built for Templaza", "js_composer"),
    "params" => array(
        array(
            "type"          => "attach_images",
            "heading"       => __("Upload Image", "js_composer"),
            "param_name"    => "tz_image",
            "description"   => __("Upload image image gallery.", "js_composer")
        ),
    )
) );

?>