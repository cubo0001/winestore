<?php
/* ================
 * shortcode title
 =================*/
function tzinteriart_sctitle($attr, $content = null ){
    extract(shortcode_atts(array(
        'title'                 =>  '',
    ),$attr));
    ob_start();
    ?>
    <h3 class="tzShortcode-title"><?php echo esc_html($title);?></h3>
    <?php
    $content_title = ob_get_contents();
    ob_end_clean();
    return $content_title;
}
add_shortcode('title','tzinteriart_sctitle');

/*end shortcode purchase*/
?>