<?php
/*===============================
* Shortocde dropcap
===============================*/

function tztitania_dropcap($atts) {
    $tzmaniva_type = $tzmaniva_letter = '';
    extract(shortcode_atts(array(
        'tzmaniva_type'      => '',
        'tzmaniva_letter'    => '',
    ),$atts));
    ob_start();
    $tzmaniva_class = '';
    if($tzmaniva_type == 'type1'){
        $tzmaniva_class = 'plazart-dropcap-type1';
    }else{
        $tzmaniva_class = 'plazart-dropcap-type2';
    }
    ?>
    <span class="<?php echo esc_attr($tzmaniva_class);?>"><?php echo esc_html($tzmaniva_letter);?></span>
    <?php
    $tzmaniva_content_dropcap = ob_get_contents();
    ob_end_clean();
    return $tzmaniva_content_dropcap;
}
add_shortcode('dropcap','tztitania_dropcap');
?>