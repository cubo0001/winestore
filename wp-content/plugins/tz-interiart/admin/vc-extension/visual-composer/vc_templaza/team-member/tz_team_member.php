<?php
/*===============================
Shortocde tz-section-video
===============================*/

function tzinteriart_team_member($atts) {
    $tzinteriart_image = $tzinteriart_name = $tzinteriart_position = '';
    extract(shortcode_atts(array(
        'tzinteriart_image'             => '',
        'tzinteriart_name'              => '',
        'tzinteriart_position'          => '',
    ),$atts));
    ob_start();

    $tzinteriart_img_id = preg_replace( '/[^\d]/', '', $tzinteriart_image);
    $tzinteriart_width_img ='';
    $tzinteriart_height_img ='';
    $tzinteriart_images_info = wp_get_attachment_image_src($tzinteriart_img_id, $size='large');
    if(isset($tzinteriart_images_info) && !empty($tzinteriart_images_info)){
        $tzinteriart_url_img = $tzinteriart_images_info[0];
        $tzinteriart_width_img = $tzinteriart_images_info[1];
        $tzinteriart_height_img = $tzinteriart_images_info[2];
    }

    ?>
    <div class="tzElement_Member">
        <div class="tzMember_Wrap">
            <div class="tzMember_image">
                <img src="<?php echo esc_url($tzinteriart_url_img);?>" width="<?php echo esc_attr($tzinteriart_width_img)?>" height="<?php echo esc_attr($tzinteriart_height_img)?>" alt="<?php echo esc_attr($tzinteriart_name);?>">
            </div>
            <div class="tzMember_Info">
                <div class="tzMember_Info_Box">
                    <h3 class="tzMember_name"><?php echo esc_html($tzinteriart_name);?></h3>
                    <span class="tzMember_position"><?php echo esc_html($tzinteriart_position);?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-team-member','tzinteriart_team_member');
?>
