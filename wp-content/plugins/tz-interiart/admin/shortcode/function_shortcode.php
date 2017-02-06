<?php
/*
 * Add Shortcode buttons in TinyMCE
 */

global $tz_elements;
$tz_elements = array(
    'dropcap',
    'list',
    'title'
);
$dir_vc = dirname( __FILE__ );

foreach ( $tz_elements as $element ):
   require_once  ( $dir_vc.'/'. $element. '/'. $element .'_shortcode.php' );
endforeach;

add_action('init','plazart_add_buttons_to_tinymce');
function plazart_add_buttons_to_tinymce() {
    // check action user
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) :
        return;
    endif;

    if ( get_user_option('rich_editing') == true ):
        add_filter('mce_external_plugins','plazart_add_js_shortcode');
        add_filter('mce_buttons_3','plazart_register_button');
    endif;
} // end function register shortcode for tinymce

// function register js
function plazart_add_js_shortcode($plugin_array) {
    global $tz_elements ;
    foreach ( $tz_elements as $element ):
        $plugin_array['plazart' . $element] = PLUGIN_PATH .'/admin/shortcode/' . $element . '/'. $element .'_jquery.js';
    endforeach;
    return $plugin_array ;
}

// function register css
//function your_css_and_js() {
//    wp_register_style('shortocde_admin', plugins_url('/tz-plazart/admin/shortcode/shortocde_admin.css',__FILE__ ));
//    wp_enqueue_style('shortocde_admin');
//}
//add_action( 'admin_init','your_css_and_js');

// THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
//function custom_colors(){
//    echo '<style type="text/css">
//           #wphead{background:#592222}
//           #footer{background:#592222}
//           #footer-upgrade{background:#592222}
//           .tzshortcodetitle{color: red;}
//         </style>';
//}
//
//add_action('admin_head', 'custom_colors');

// function register button
function plazart_register_button($buttons) {
    global $tz_elements ;
    foreach ( $tz_elements as $element ) :
        $button[] = 'plazart'.$element ;
    endforeach;
    return $button;
}

?>