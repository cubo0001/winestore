<?php

$args = array(
    'tz_image'              => '',
    'tz_font_icon'          => 'furniture',
    'tz_icon'               => '',
    'tz_title'              => '',
    'tz_subtitle'           => '',
    'tz_description'        => '',
    'tz_option_link'        => 'link-to-category',
    'tz_category'           => '',
    'tz_custom_link'        => '',
    'highlight'             => '',
);

extract(shortcode_atts($args, $atts));
$category = get_term_by('slug', $tz_category , 'portfolio-category');

// Get the URL of this category
$category_link = get_category_link( $category->term_id );

$tz_img_id = preg_replace( '/[^\d]/', '', $tz_image);
$tz_width_img ='';
$tz_height_img ='';
$tz_images_info = wp_get_attachment_image_src($tz_img_id, $size='full');
if(isset($tz_images_info) && !empty($tz_images_info)){
    $tz_url_img = $tz_images_info[0];
    $tz_width_img = $tz_images_info[1];
    $tz_height_img = $tz_images_info[2];
}

?>

<div class="tzCategory_Grid_Item">
    <?php
    if($tz_option_link == 'link-to-category' && $tz_category != ''){
        ?>
        <a href="<?php echo esc_url($category_link);?>">
    <?php }elseif($tz_option_link == 'custom-link' && $tz_custom_link != ''){ ?>
        <a href="<?php echo esc_url($tz_custom_link);?>">
    <?php } ?>

        <div class="tzCategory_Grid_Item_Image">
            <img width="<?php echo esc_attr($tz_width_img);?>" height="<?php echo esc_attr($tz_height_img);?>" alt="<?php echo esc_attr($tz_name);?>" src="<?php echo esc_url($tz_url_img);?>">
        </div>
        <div class="tzCategory_Grid_Item_Content">
            <div class="tzCategory_Grid_Icon">
                <?php
                if($tz_font_icon == 'et-line' || $tz_font_icon == 'elegant'){
                    ?>
                    <span aria-hidden='true' class='<?php echo esc_attr($tz_icon);?>'></span>
                    <?php
                }elseif($tz_font_icon == 'awesome'){
                    ?>
                    <i class="fa <?php echo esc_attr($tz_icon);?>"></i>
                    <?php
                }elseif($tz_font_icon == 'furniture'){
                    ?>
                    <span data-icon="<?php echo esc_attr($tz_icon)?>" class="icon"></span>
                    <?php
                }
                ?>
            </div>

            <div class="tzCategory_Grid_Info">
                <h6 class="tzCategory_Grid_subTitle">
                    <?php echo esc_html($tz_subtitle);?>
                </h6>

                <h5 class="tzCategory_Grid_Title">
                    <?php echo esc_html($tz_title);?>
                </h5>

                <p class="tzCategory_Grid_description">
                    <?php echo esc_html($tz_description);?>
                </p>
            </div>
        </div>
        <?php if(($tz_option_link == 'link-to-category' && $tz_category != '') || ($tz_option_link == 'custom-link' && $tz_custom_link != '')):?>
            </a>
        <?php endif;?>
</div>


