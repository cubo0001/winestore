<?php
$interiart_title              = ot_get_option('interiart_tzBreadcrumb_title','show');
$interiart_breadcrumb         = ot_get_option('interiart_tzBreadcrumb_breadcrumb','show');
$interiart_padding_top        = ot_get_option('interiart_tzBreadcrumb_padding_top','');
$interiart_padding_bottom     = ot_get_option('interiart_tzBreadcrumb_padding_bottom','');

$interiart_style = '';
if($interiart_padding_bottom != '' || $interiart_padding_top != ''){
    $interiart_style = 'style=';
    if($interiart_padding_top != ''){
        $interiart_style .= 'padding-top:'.$interiart_padding_top.'px;';
    }
    if($interiart_padding_bottom != ''){
        $interiart_style .= 'padding-bottom:'.$interiart_padding_bottom.'px;';
    }
}

?>
<div class="tz-Breadcrumb">
    <div class="tzOverlayBreadcrumb" <?php echo esc_attr($interiart_style);?>>
        <div class="container">
            <?php
            if($interiart_title == 'show'){
                ?>
                <h1>
                    <?php
                    if( class_exists('WooCommerce') && is_woocommerce()){
                        if(is_product()){
                            the_title();
                        }else{
                            woocommerce_page_title();
                        }
                    }else{
                        if(is_category() || is_tax( 'portfolio-category') || is_tax('service-category')){
                            single_cat_title();
                        }elseif(is_author()){
                            the_author();
                        }elseif(is_search()){
                            echo get_search_query();
                        }elseif(is_tag() || is_tax( 'portfolio-tags' || is_tax('service-tags'))){
                            echo single_tag_title();
                        }elseif(is_home()){
                            single_post_title();
                        }elseif(is_404()){
                            echo  esc_html__('Error 404 - Page Not Found','interiart');
                        }elseif(is_archive()){
                            if ( is_day() ) :
                                printf(  esc_html__( 'Archives %s', 'interiart'), '<span>' . get_the_date() . '</span>' );
                            elseif ( is_month() ) :
                                printf(  esc_html__( 'Archives %s', 'interiart'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'interiart') . '</span>' ));
                            elseif ( is_year() ) :
                                printf(  esc_html__( 'Archives %s', 'interiart'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'interiart') . '</span>' ));
                            else :
                                esc_html_e( 'Archives', 'interiart' );
                            endif;
                        }else{
                            the_title();
                        }
                    }
                    ?>
                </h1>
                <?php
            }
            ?>

            <?php
            if($interiart_breadcrumb == 'show'){
                ?>
                <div class="tz-breadcrumb-navxt">
                    <!--Breadcrumbs-->
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                    <!--End breadcrumbs-->
                </div>
                <?php
            }
            ?>
        </div><!-- end class container -->
    </div>
</div><!-- end class tzbreadcrumb -->