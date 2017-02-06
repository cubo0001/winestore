<?php

$args = array(
    'tz_font_icon'          => '',
    'tz_icon'               => '',
    'tz_title'              => '',
    'tz_subtitle'           => '',
    'tz_description'        => '',
    'highlight'             => '',
);

extract(shortcode_atts($args, $atts));

$tzSupport_class = '';
if($highlight == 'highlight'){
    $tzSupport_class = 'tzSupport_Item_active';
}
?>
<div class="tzSupport_Item <?php echo esc_attr($tzSupport_class);?>">
    <div class="tzSupport_Icon">
        <?php
        if($tz_font_icon == 'et-line' || $tz_font_icon == 'elegant'){
            ?>
            <span aria-hidden='true' class='<?php echo esc_attr($tz_icon);?>'></span>
            <?php
        }elseif($tz_font_icon == 'awesome'){
            ?>
            <i class="fa <?php echo esc_attr($tz_icon);?>"></i>
            <?php
        }
        ?>
    </div>

    <div class="tzSupport_Info">
        <h6 class="tzSupport_subTitle">
            <?php echo esc_html($tz_subtitle);?>
        </h6>

        <h5 class="tzSupport_Title">
            <?php echo esc_html($tz_title);?>
        </h5>

        <p class="tzSupport_description">
            <?php echo esc_html($tz_description);?>
        </p>
    </div>
</div>


