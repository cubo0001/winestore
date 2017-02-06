<?php
/* ================
 * Method List
 =================*/
function tzmaniva_list($attr, $content = null ){
    extract(shortcode_atts(array(
        'type'        =>  'no_underlined'
    ),$attr));
    global $tz_list_item;
    $tz_list_item = array();
    do_shortcode($content);
    ob_start();
    ?>
    <ul class="tz-plazart-list tzList-<?php echo esc_attr($type);?>">
        <?php
        foreach($tz_list_item as $tz_item){
        ?>
        <li>
            <?php
            if($tz_item['icon'] != ''){
            ?>
            <i class="fa <?php echo esc_attr($tz_item['icon']);?>"></i>
            <?php
            }
            ?>
            <?php echo esc_html($tz_item['item_content']);?>
        </li>
        <?php
        }
        ?>
    </ul>

    <?php
    $content_list = ob_get_contents();
    ob_end_clean();
    return $content_list;
}
add_shortcode('list','tzmaniva_list');

function tzmaniva_list_item($attr, $content = null){
    global $tz_list_item ;
    extract( shortcode_atts( array(
        'item_icon'     => '',
        'item_content'  => '',
    ), $attr ) ) ;
    $tz_list_item[] = array(
        'icon'      => $item_icon,
        'item_content'   => $item_content
    ) ;
}
add_shortcode('list_item','tzmaniva_list_item');
/*end shortcode list*/
?>