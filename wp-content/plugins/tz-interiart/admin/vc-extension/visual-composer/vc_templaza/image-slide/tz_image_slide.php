<?php
/*
 * Element tz-feature-item
 * */

function tzinteriart_image_slide($atts) {
    $tz_image = '';
    extract(shortcode_atts(array(
        'tz_image' => $tz_image,
    ),$atts));
    ob_start();
    //var_dump($tz_image);
    $images = explode( ',', $tz_image );
    ?>
    <div class="tzElement_Image_slide">
        <?php
        foreach ( $images as $attach_id ) {
            $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => 'full'));
            $image_thumbnail = wp_get_attachment_url($attach_id);
            ?>
            <div class="tzImage_Slide_Item">
                <a href="<?php echo esc_url($post_thumbnail['p_img_large']['0']);?>" data-rel="prettyPhoto[worksGallery]">
                    <img class="attachment-full" src="<?php echo esc_url($image_thumbnail);?>">
                </a>
            </div>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-image-slide','tzinteriart_image_slide');
?>