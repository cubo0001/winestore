<?php
    $interiart_headerType     = ot_get_option('interiart_TzHeader_type','1');
    $interiart_language       = ot_get_option('interiart_TzHeaderTop_Language','show');
    $interiart_email          = ot_get_option('interiart_TzHeaderTop_Email');
    $interiart_facebook       = ot_get_option('interiart_TzHeaderTop_facebook');
    $interiart_twitter        = ot_get_option('interiart_TzHeaderTop_twitter');
    $interiart_tumblr         = ot_get_option('interiart_TzHeaderTop_tumblr');
    $interiart_linkedin       = ot_get_option('interiart_TzHeaderTop_linkedin');
    $interiart_youtube        = ot_get_option('interiart_TzHeaderTop_youtube');
    $interiart_dribbble       = ot_get_option('interiart_TzHeaderTop_dribbble');
    $interiart_behance        = ot_get_option('interiart_TzHeaderTop_behance');
    $interiart_skype          = ot_get_option('interiart_TzHeaderTop_skype');
    $interiart_pinterest      = ot_get_option('interiart_TzHeaderTop_pinterest');
    $interiart_google_plus    = ot_get_option('interiart_TzHeaderTop_google_plus');

    $interiart_header_class = '';
    if($interiart_headerType == '3'){
        $interiart_header_class = 'tz-header-type-3';
    }elseif($interiart_headerType == '2'){
        $interiart_header_class = 'tz-header-type-2';
    }else{
        $interiart_header_class = 'tz-header-type-1';
    }

    $interiart_max_mega_menu_class = '';
    if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) :
        $interiart_max_mega_menu_class = 'tz-max-mega-menu';
    endif;

?>
<header class="tz-header <?php echo esc_attr($interiart_header_class);?>">

    <?php
    if($interiart_headerType == '1' || $interiart_headerType == '2'){
        ?>
        <div class="tz-headerTop">
            <div class="container">
                <div class="tz-headerTop-box">
                    <div class="tz-headerLeft pull-left">
                        <div class="tzheader_support">
                            <?php
                            if($interiart_language == 'show'){
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
                                                        <i class="fa fa-globe"></i><?php  esc_html_e('Chosse Your Languages','interiart');?>
                                                    </a>
                                                    <ul>
                                                        <li class="icl-vi">
                                                            <a href="#">
                                                                <img width="18" height="12" alt="ru" src="http://d2salfytceyqoe.cloudfront.net/wp-content/plugins/wpml/res/flags/vn.png" />
                                                                <?php  esc_html_e('Viet Nam','interiart');?>
                                                            </a>
                                                            <a href="#">
                                                                <img width="18" height="12" alt="en" src="http://d2salfytceyqoe.cloudfront.net/wp-content/plugins/wpml/res/flags/en.png" />
                                                                <?php  esc_html_e('English','interiart');?>
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
                            if($interiart_language == 'show' && $interiart_email != ''){
                                ?>
                                <span class="tzheader_line">|</span>
                            <?php
                            }
                            ?>

                            <?php
                            if($interiart_email != ''){
                                ?>
                                <div class="tzheader_site">
                                    <i class="fa fa-envelope-o"></i>
                                    <?php echo esc_html($interiart_email);?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tz-headerRight pull-right">
                        <ul class="tzheader_social">
                            <?php
                            if($interiart_facebook != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_facebook);?>"><i class="fa fa-facebook"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_twitter != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_twitter);?>"><i class="fa fa-twitter"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_tumblr != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_tumblr);?>"><i class="fa fa-tumblr"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_linkedin != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_linkedin);?>"><i class="fa fa-linkedin"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_youtube != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_youtube);?>"><i class="fa fa-youtube-play"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_dribbble != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_dribbble);?>"><i class="fa fa-dribbble"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_behance != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_behance);?>"><i class="fa fa-behance"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_skype != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_skype);?>"><i class="fa fa-skype"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_pinterest != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_pinterest);?>"><i class="fa fa-pinterest-p"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if($interiart_google_plus != ''){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($interiart_google_plus);?>"><i class="fa fa-google-plus"></i></a>
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

    <div class="tz-headerBottom <?php echo esc_attr($interiart_max_mega_menu_class);?>">
        <div class="tz-headerBottom-box container">
            <?php
            $interiart_logo_color = ot_get_option('interiart_logoTextcolor','');

            $interiart_logo_style = '';
            if($interiart_logo_color != ''){
                $interiart_logo_style = 'style=color:'.esc_attr($interiart_logo_color).'';
            }
            ?>
            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>" <?php echo esc_attr($interiart_logo_style);?>>
                <?php
                $interiart_logotype = ot_get_option('interiart_logotype','0');
                if($interiart_logotype == '0'){
                    echo ot_get_option('interiart_logoText','plazart');
                }else{
                    echo'<img class="logo_lager" src="'.ot_get_option('interiart_logo','') .'" alt="'.get_bloginfo('title').'" />';
                }
                ?>
            </a>
            <div class="image-contact"></div>
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
                if ( has_nav_menu('primary') ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav navbar-nav collapse navbar-collapse pull-left tz-nav',
                        'menu_id' => 'tz-navbar-collapse',
                        'container' => false
                    ) ) ;
                endif;

                if ( has_nav_menu('primary-custom-1') ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary-custom-1',
                        'menu_class' => 'nav navbar-nav collapse navbar-collapse pull-left tz-nav',
                        'menu_id' => 'tz-navbar-collapse',
                        'container' => false
                    ) ) ;
                endif;
                ?>
            </nav>
        </div><!--end class container-->
    </div>
</header>