<?php
/*
 * tz-header
 * */

function tzinteriart_header($atts) {
    $tz_header_type = $tz_logo_type = $tz_logo_image = $tz_logo_text = $tz_color_logo_text = $tz_location_menu = '';
    extract(shortcode_atts(array(
        'tz_header_type'               => '1',
        'tz_logo_type'                 => '',
        'tz_logo_image'                => '',
        'tz_logo_text'                 => '',
        'tz_color_logo_text'           => '',
        'tz_location_menu'             => 'primary',
    ),$atts));
    ob_start();

    wp_enqueue_script('nav');

    $tz_class_admin = '';
    if ( is_admin_bar_showing()) {
        $tz_class_admin = 'tzAdmin_bar';
    }

    $tzinteriart_header_class = '';
    if($tz_header_type == '3'){
        $tzinteriart_header_class = 'tz-header-type-3';
    }elseif($tz_header_type == '2'){
        $tzinteriart_header_class = 'tz-header-type-2';
    }else{
        $tzinteriart_header_class = 'tz-header-type-1';
    }

    $tzinteriart_language       = ot_get_option('interiart_TzHeaderTop_Language','show');
    $tzinteriart_email          = ot_get_option('interiart_TzHeaderTop_Email');
    $tzinteriart_facebook       = ot_get_option('interiart_TzHeaderTop_facebook');
    $tzinteriart_twitter        = ot_get_option('interiart_TzHeaderTop_twitter');
    $tzinteriart_tumblr         = ot_get_option('interiart_TzHeaderTop_tumblr');
    $tzinteriart_linkedin       = ot_get_option('interiart_TzHeaderTop_linkedin');
    $tzinteriart_youtube        = ot_get_option('interiart_TzHeaderTop_youtube');
    $tzinteriart_dribbble       = ot_get_option('interiart_TzHeaderTop_dribbble');
    $tzinteriart_behance        = ot_get_option('interiart_TzHeaderTop_behance');
    $tzinteriart_skype          = ot_get_option('interiart_TzHeaderTop_skype');
    $tzinteriart_pinterest      = ot_get_option('interiart_TzHeaderTop_pinterest');
    $tzinteriart_google_plus    = ot_get_option('interiart_TzHeaderTop_google_plus');

    $tzinteriart_max_mega_menu_class = '';
    if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) :
        $tzinteriart_max_mega_menu_class = 'tz-max-mega-menu';
    endif;

    ?>
    <header class="tz-header <?php echo esc_attr($tzinteriart_header_class);?>">
    <?php
    if($tz_header_type == '1' || $tz_header_type == '2'){
        ?>
        <div class="tz-headerTop">
            <div class="container">
                <div class="tz-headerTop-box">
                    <div class="tz-headerLeft pull-left">
                        <div class="tzheader_support">
                            <?php
                            if($tzinteriart_language == 'show'){
                                ?>
                                <div class="tzheader_wpml">
                                    <?php
                                    if ( function_exists('icl_object_id') ) {
                                        ?>
                                        <?php do_action('icl_language_selector'); ?>
                                    <?php
                                    }else{
                                        ?>
                                        <div id="lang_sel">
                                            <ul>
                                                <li>
                                                    <a class="lang_sel_sel icl-en" href="#">
                                                        <i class="fa fa-globe"></i><?php echo esc_html_e('Chosse Your Languages','tz-plazart');?>
                                                    </a>
                                                    <ul>
                                                        <li class="icl-vi">
                                                            <a href="#">
                                                                <img width="18" height="12" alt="ru" src="http://d2salfytceyqoe.cloudfront.net/wp-content/plugins/wpml/res/flags/vn.png" />
                                                                <?php echo esc_html_e('Viet Nam','tz-plazart');?>
                                                            </a>
                                                            <a href="#">
                                                                <img width="18" height="12" alt="en" src="http://d2salfytceyqoe.cloudfront.net/wp-content/plugins/wpml/res/flags/en.png" />
                                                                <?php echo esc_html_e('English','tz-plazart');?>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_language == 'show' && $tzinteriart_email != ''){
                                ?>
                                <span class="tzheader_line">|</span>
                            <?php
                            }
                            ?>

                            <?php
                            if($tzinteriart_email != ''){
                                ?>
                                <div class="tzheader_site">
                                    <i class="fa fa-envelope-o"></i>
                                    <?php echo esc_html($tzinteriart_email);?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tz-headerRight pull-right">
                        <ul class="tzheader_social">
                            <?php
                            if($tzinteriart_facebook != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_facebook);?>"><i class="fa fa-facebook"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_twitter != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_twitter);?>"><i class="fa fa-twitter"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_tumblr != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_tumblr);?>"><i class="fa fa-tumblr"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_linkedin != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_linkedin);?>"><i class="fa fa-linkedin"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_youtube != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_youtube);?>"><i class="fa fa-youtube-play"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_dribbble != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_dribbble);?>"><i class="fa fa-dribbble"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_behance != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_behance);?>"><i class="fa fa-behance"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_skype != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_skype);?>"><i class="fa fa-skype"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_pinterest != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_pinterest);?>"><i class="fa fa-pinterest-p"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($tzinteriart_google_plus != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($tzinteriart_google_plus);?>"><i class="fa fa-google-plus"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div><!--end class container-->
        </div>
        <?php
    }
    ?>

        <div class="tz-headerBottom <?php echo esc_attr($tzinteriart_max_mega_menu_class);?>">
            <div class="container">
                <a class="pull-left tz_logo" href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>" <?php
                if($tz_logo_type == 'text' && $tz_logo_text != ''){
                    echo 'style="color:'. esc_attr($tz_color_logo_text) .'"';
                }
                ?>>
                    <?php
                    $tz_logo_url     = wp_get_attachment_url($tz_logo_image);
                    $tz_width_img ='';
                    $tz_height_img ='';
                    $tz_images_info = wp_get_attachment_image_src($tz_logo_image, $size='full');
                    if(isset($tz_images_info) && !empty($tz_images_info)){
                        $tz_width_img = $tz_images_info[1];
                        $tz_height_img = $tz_images_info[2];
                    }
                    if($tz_logo_type=='text'){
                        echo esc_html($tz_logo_text);
                    }else{
                        echo'<img class="logo_lager" width ="'. esc_attr($tz_width_img) .'" height ="'. esc_attr($tz_height_img) .'" src="'. esc_url($tz_logo_url) .'" alt="'.get_bloginfo('title').'" />';
                    }
                    ?>
                </a>
                <div class="image-contact pull-right"></div>
                <?php
                if (class_exists( 'WooCommerce')):
                    ?>
                    <div class="tz-header-cart pull-right">
                        <span aria-hidden="true" class="icon_cart_alt"></span>
                        <?php
                        if ( class_exists( 'interiart_WC_Widget_Cart' ) ) { the_widget( 'interiart_WC_Widget_Cart' ); }
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <div class="tz-header-search pull-right">
                    <span aria-hidden='true' class='icon_search tz_icon_search'></span>
                    <span aria-hidden='true' class='icon_close tz_icon_close'></span>
                    <div class="tz-header-search-form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tz-navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <nav class="pull-right">
                    <?php

                    if ($tz_location_menu != '') :
                        wp_nav_menu(array(
                            'theme_location' => $tz_location_menu,
                            'menu_class' => 'nav navbar-nav collapse navbar-collapse pull-left tz-nav',
                            'menu_id' => 'tz-navbar-collapse',
                            'container' => false
                        ));
                    endif;
                    ?>
                </nav>
            </div><!--end class container-->
        </div>
    </header>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-header','tzinteriart_header');
?>