<?php

$args = array(
    "tz_image_option"           => "",
    "tz_author"                 => "",
    "tz_name_option"            => "",
    "tz_name"                   => "",
    "tz_employment_option"      => "",
    "tz_employment"             => "",
    "tz_content"                => "",
);

extract(shortcode_atts($args, $atts));

$tz_img_id = preg_replace( '/[^\d]/', '', $tz_author);
$tz_width_img ='';
$tz_height_img ='';
$tz_images_info = wp_get_attachment_image_src($tz_img_id, $size=''.$img_size.'');
if(isset($tz_images_info) && !empty($tz_images_info)){
    $tz_url_img = $tz_images_info[0];
    $tz_width_img = $tz_images_info[1];
    $tz_height_img = $tz_images_info[2];
}

?>
<div class="tzQuote_Item">
    <?php
    if($tz_image_option == 'show'){
        ?>
        <div class="tzQuote_Image">
            <div class=tzQuote_imageBox>
                <img class="tzClientImage"  width="<?php echo esc_attr($tz_width_img);?>" height="<?php echo esc_attr($tz_height_img);?>" alt="<?php echo esc_attr($tz_name);?>" src="<?php echo esc_url($tz_url_img);?>">
            </div>
        </div>
        <?php
    }
    ?>
    <p class="tzQuote_Content"><?php echo esc_html($tz_content);?></p>
    <div class="tzQuote_Info">
        <?php
        if($tz_image_option == 'show'){
            ?>
            <div class="tzQuote_Image">
                <div class=tzQuote_imageBox>
                    <img class="tzClientImage"  width="<?php echo esc_attr($tz_width_img);?>" height="<?php echo esc_attr($tz_height_img);?>" alt="<?php echo esc_attr($tz_name);?>" src="<?php echo esc_url($tz_url_img);?>">
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if($tz_name_option == 'show' && $tz_name != ''){
            ?>
            <span class="tzQuote_Name"><?php echo esc_html($tz_name);?></span>
            <?php
        }
        ?>
        <?php
        if($tz_name_option == 'show' && $tz_name != '' && $tz_employment_option == 'show' && $tz_employment != ''){
            ?>
            <small>-</small>
            <?php
        }
        ?>

        <?php
        if($tz_employment_option == 'show' && $tz_employment != ''){
            ?>
            <span class="tzQuote_Employment"><?php echo esc_html($tz_employment);?></span>
            <?php
        }
        ?>

    </div>
</div>


