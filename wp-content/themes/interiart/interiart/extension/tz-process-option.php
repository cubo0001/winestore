<?php
/*
 * Method process option
 * # option 1: config font
 * # option 2: process config theme
*/
if(!is_admin()):


    add_action('wp_head','interiart_config_theme');

    function interiart_config_theme(){

        // custom color for theme
        $interiart_ifcolor                 = ot_get_option('interiart_TZTypecolor',0);
        $interiart_color_unlimited         = ot_get_option('interiart_TZThemecolor_unlimited','');
        $interiart_color_limited           = ot_get_option('interiart_TZThemecolor_limited','');

        $interiart_color_theme = '';
        if($interiart_ifcolor == '0'){
            $interiart_color_theme = $interiart_color_limited;
        }else{
            $interiart_color_theme = $interiart_color_unlimited;
        }

        // method body font
        $interiart_fonttype         =   ot_get_option('interiart_TZFontType','TzFontSquirrel');
        $interiart_fontbodyurl      =   ot_get_option('interiart_TzFontFami');
        $interiart_bodyfamiy        =   ot_get_option('interiart_TzFontFaminy');
        $interiart_bodyselecter       =   ot_get_option('interiart_TzBodySelecter');
        $interiart_FontDefault      =   ot_get_option('interiart_TzFontDefault','Arial');
        $interiart_bodyfontColor    = ot_get_option('interiart_TzBodyColor');


        switch($interiart_fonttype){
            case'Tzgoogle':
                $interiart_font = $interiart_bodyfamiy;
                break;
            default:
                $interiart_font = $interiart_FontDefault;
                break;

        }
        // Method header font
        $interiart_headertype       =   ot_get_option('interiart_TZFontTypeHead','TzFontDefault');               // type font google or defaul
        $interiart_headerurl        =   ot_get_option('interiart_TzFontHeadGoodurl');                            //  url google font
        $interiart_headerfamily     =   ot_get_option('interiart_TzFontFaminyHead');                             //  font family google       //  font squireel
        $interiart_headerselecter   =   ot_get_option('interiart_TzHeadSelecter');                               //  body selecter
        $interiart_FHeadDefault     =   ot_get_option('interiart_TzFontHeadDefault','Arial');                     //  font standard
        $interiart_headerfontcolor  = ot_get_option('interiart_TzHeaderFontColor');

        switch($interiart_headertype){
            case'Tzgoogle':
                $interiart_headerfont = $interiart_headerfamily;
                break;
            default:
                $interiart_headerfont = "'".$interiart_FHeadDefault."'";
                break;
        }
        // Method Menu font
        $interiart_menutype       =   ot_get_option('interiart_TZFontTypeMenu','TzFontDefault');
        $interiart_menuurl        =   ot_get_option('interiart_TzFontMenuGoodurl');
        $interiart_menufamily     =   ot_get_option('interiart_TzFontFaminyMenu');
        $interiart_menuselecter   =   ot_get_option('interiart_TzMenuSelecter');
        $interiart_menudefault    =   ot_get_option('interiart_TzFontMenuDefault','Arial');
        $interiart_menusecolor    = ot_get_option('interiart_TzMenuFontColor');
        switch($interiart_menutype){
            case'Tzgoogle':
                $interiart_menufont = $interiart_menufamily;
                break;
            default:
                $interiart_menufont = "'".$interiart_menudefault."'";
                break;

        }
        // Method Custom font
        $interiart_customtype      =   ot_get_option('interiart_TZFontTypeCustom','TzFontDefault');
        $interiart_customurl       =   ot_get_option('interiart_TzFontCustomGoodurl');
        $interiart_customfamily    =   ot_get_option('interiart_TzFontFaminyCustom');
        $interiart_customselecter  =   ot_get_option('interiart_TzCustomSelecter');
        $interiart_FCustomDefault  =   ot_get_option('interiart_TzFontCustomDefault','Arial');
        $interiart_customcolor     = ot_get_option('interiart_TzCustomFontColor');
        switch($interiart_customtype){
            case'Tzgoogle':
                $interiart_customfont = $interiart_customfamily;
                break;
            default:
                $interiart_customfont = "'".$interiart_FCustomDefault."'";
                break;
        }

        // add code css
        $interiart_csscode = ot_get_option('interiart_TzCustomCss','');
        // end custom font
        if ( isset ( $interiart_fontbodyurl ) && $interiart_fontbodyurl != ""){ wp_enqueue_style('google-font', $interiart_fontbodyurl, false); }
        if ( isset ( $interiart_headerurl ) && $interiart_headerurl != ""){ wp_enqueue_style('header-font', $interiart_headerurl, false); }
        if ( isset ( $interiart_menuurl ) && $interiart_menuurl != ""){ wp_enqueue_style('menu-font', $interiart_menuurl, false); }
        if( isset ( $interiart_customurl ) && $interiart_customurl != ""){ wp_enqueue_style('custom-font', $interiart_customurl, false); }


        //Background
        $interiart_default_background_type = ot_get_option('interiart_background_type');
        $interiart_default_color           = ot_get_option('interiart_TZBackgroundColor','#ffffff');
        $interiart_default_pattern         = ot_get_option('interiart_background_pattern');
        $interiart_default_single_image    = ot_get_option('interiart_background_single_image');
        $interiart_background = '';
        switch($interiart_default_background_type){
            case 'pattern':
                $interiart_background = 'body#bd {background: url("' . get_template_directory_uri() .'/images/patterns/' . $interiart_default_pattern . '") repeat scroll 0 0 transparent !important;}';
                break;
            case 'single_image':
                $interiart_background = 'body#bd {background: url("' . $interiart_default_single_image . '") no-repeat fixed center center / cover transparent !important;}';
                break;
            case 'none':
                $interiart_background = 'body#bd {background: '.$interiart_default_color.' !important;}';
                break;
            default:
                $interiart_background = 'body#bd {background: '.$interiart_default_color.' !important;}';
                break;
        }

        //Background Breadcrumb

        $interiart_breadcrumb_image            = ot_get_option('interiart_tzBreadcrumb_Imagebg');
        $interiart_breadcrumb  = '';
        if($interiart_breadcrumb_image != ''){
            $interiart_breadcrumb = '.tz-Breadcrumb {background-image:url('.esc_attr($interiart_breadcrumb_image).')!important;}';
        }

        //Background footer

        //footer type 1
        $interiart_footer_image            = ot_get_option('interiartfooter_Background_Image');
        $interiart_footerbg  = '';
        if($interiart_footer_image != ''){
            $interiart_footerbg = '.tzFooter-Type-1 .tzFooterTop {background-image:url('.esc_attr($interiart_footer_image).')!important;}';
        }

        //footer type 1
        $interiart_footer_type2_image            = ot_get_option('interiartfooterType2_Background_Image');
        $interiart_footerbg_type2  = '';
        if($interiart_footer_type2_image != ''){
            $interiart_footerbg_type2 = '.tzFooter-Type-2 .tzFooterTop {background-image:url('.esc_attr($interiart_footer_type2_image).')!important;}';
        }

        // logo
        $colorlogo  =   ot_get_option('interiart_logoTextcolor');
        ?>
        <style type="text/css">
            <?php if(!empty($interiart_bodyselecter) && !empty($interiart_bodyselecter)){  echo esc_attr($interiart_bodyselecter) ; ?> { font-family:<?php echo esc_attr($interiart_font); ?> !important; color: <?php echo esc_attr($interiart_bodyfontColor); ?> !important;   }
            <?php } ?>

            <?php if(!empty($interiart_headerselecter) && !empty($interiart_headerselecter)){  echo esc_attr($interiart_headerselecter) ; ?> { font-family:<?php echo esc_attr($interiart_headerfont); ?> !important; color: <?php echo esc_attr($interiart_headerfontcolor); ?> !important; }
            <?php }  ?>

            <?php if(!empty($interiart_menuselecter) && !empty($interiart_menuselecter)){  echo esc_attr($interiart_menuselecter) ; ?> { font-family:<?php echo esc_attr($interiart_menufont); ?> !important ; color: <?php echo esc_attr($interiart_menusecolor); ?> !important ;  }
            <?php
            } ?>

            <?php if(!empty($interiart_customselecter) && !empty($interiart_customselecter)):  echo esc_attr($interiart_customselecter) ; ?> { font-family:<?php echo esc_attr($interiart_customfont); ?> !important ; color: <?php echo esc_attr($interiart_customcolor); ?> !important ; }
            <?php endif; ?>

            <?php if(isset($colorlogo) && !empty($colorlogo)): echo'.tz-logo-text{ color: '.$colorlogo.' }';  endif; ?>

            /*social color*/
            .tzsocialfont{
                color: <?php echo ot_get_option('interiart_social_network_color','#a6a6a6'); ?> !important;
            }
            <?php

                if($interiart_background){
                    echo esc_attr($interiart_background);
                }

                if($interiart_breadcrumb){
                    echo esc_attr($interiart_breadcrumb);
                }

                if($interiart_footerbg){
                    echo esc_attr($interiart_footerbg);
                }

                if($interiart_footerbg_type2){
                    echo esc_attr($interiart_footerbg_type2);
                }

                if(isset($interiart_csscode) && !empty($interiart_csscode)){
                    echo esc_attr($interiart_csscode);
                }

                if($interiart_color_theme):
                ?>
            .tz-header .tz-headerTop,
            .plazart-dropcap-type2,
            .tz-header .tz-headerBottom .tz-header-cart .widget_shopping_cart .widget_shopping_cart_content ul.cart_list li a.remove:hover,
            .tz-header .tz-headerBottom .tz-header-cart .widget_shopping_cart .widget_shopping_cart_content p.buttons a:hover,
            .tzFooter .tzFooterTop .footerattr .widget.widget_search .searchform .icon_search,
            .tzFooter .tzFooterTop .footerattr .widget.widget_tag_cloud .tagcloud a:hover,
            .tzFooter .tzFooterTop .footerattr .widget.widget_newsletterwidget .newsletter form:after,
            .tzFooter .tzFooterBottom .tzFooterSocial ul li a:after,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlog_videoHtml5 .tzblog_autoplay,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlog_videoHtml5 .tzblog_pauses,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlog_videoHtml5 .tzBlogDate .tzDateText,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogAudio .tzBlogDate .tzDateText,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlog_video .tzBlogDate .tzDateText,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogSlider ul.flex-direction-nav li a:hover,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogSlider .tzBlogDate .tzDateText,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogImage .tzBlogDate .tzDateText,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogContent a.tzreadmore,
            .tzBlogDefault .tzBlogContainer .tzserach_notda .page-content form input.searchsubmit,
            .tzBlogDefault .wp-pagenavi span.current,
            .tzBlogDefault .wp-pagenavi a:hover,
            .tzBlogDefault ol.flex-control-nav li a.flex-active,
            .tzBlogDefault ol.flex-control-nav li a:hover,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlog_videoHtml5 .tzblog_autoplay,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlog_videoHtml5 .tzblog_pauses,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlog_videoHtml5 .tzBlogDate .tzDateText,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogAudio .tzBlogDate .tzDateText,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogSlider ul.flex-direction-nav li a:hover,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogSlider ol.flex-control-nav li a.flex-active,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogSlider ol.flex-control-nav li a:hover,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogSlider .tzBlogDate .tzDateText,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogImage .tzBlogDate .tzDateText,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogContent a.tzreadmore,
            .tzBlogColumn .wp-pagenavi span.current,
            .tzBlogColumn .wp-pagenavi a:hover,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingleImage .tzBlogDate .tzDateText,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingleAudio .tzBlogDate .tzDateText,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingle_video .tzBlogDate .tzDateText,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingleSlider ol.flex-control-nav li a.flex-active,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingleSlider ol.flex-control-nav li a:hover,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingleSlider .tzBlogDate .tzDateText,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingle_videoHtml5 .tzblog_autoplay,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingle_videoHtml5 .tzblog_pauses,
            .tzBlogSingle .tzBlogSingleContainer .tzBlogSingle_videoHtml5 .tzBlogDate .tzDateText,
            .tz-sidebar .widget .widget_shopping_cart_content ul.product_list_widget li a.remove:hover,
            .tz-sidebar .widget .widget_shopping_cart_content p.buttons a:hover,
            .tz-sidebar .widget.widget_search form input.searchsubmit,
            .tz-sidebar .widget.widget_tag_cloud .tagcloud a:hover,
            .tz-sidebar .widget.widget_calendar #calendar_wrap table tbody tr td#today,
            .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .ui-widget-content .ui-slider-range,
            .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button:hover,
            .tz-sidebar .widget.widget_product_search form.woocommerce-product-search input[type="submit"],
            .tz-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover,
            .tzPortfolio_Container .tzFilter .tzFillter_box a.selected,
            .tzPortfolio_Container .tzFilter .tzFillter_box a:hover,
            .tzPortfolio_Container .tzPortfolio .portfolio-item .tz-inner .tzPortfolioBox .tzPortfolio_hover2 a:hover,
            .tzPortfolio_Container #tz_append a,
            .tzPortfolio_Container #loadajax .navigation .tzpagination2 span.current,
            .tzPortfolio_Container #loadajax .navigation .tzpagination2 a:hover,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_Slider ol.flex-control-nav li a.flex-active,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_Slider ol.flex-control-nav li a:hover,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_Slider ul.flex-direction-nav li a,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_Slider ul.flex-direction-nav li a:hover,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_videoHtml5 .tzPortfolio_autoplay,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_videoHtml5 .tzPortfolio_pauses,
            .tzPortfolio_Single .tzPortfolio_related .tzPortfolio_relateBox .tzPortfolio_relateSlider .related-item .tzRelated_hover2 a:hover,
            .tzPortfolio_Single .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p.form-submit input.submit,
            .tzPricing_table.tzPricing_table_type1 .pricing-button,
            .tzPricing_table.tzPricing_table_type2:hover .pricing-button a,
            .tzSkill.tzskill-item-type1 .tzskill-item .tzskill-item-width,
            .tzSkill.tzskill-item-type2 .tzskill-item .tzskill-item-width,
            .tzSkill.tzskill-item-type3 .tzskill-item .tzskill-item-width,
            .tzElement_Feature.tzFeature_type1 .tzFeature_Icon .tzFeature_iconBox,
            .tzElement_Feature.tzFeature_type2 .tzFeature_Icon .tzFeature_iconBox,
            .tzElement_Feature.tzFeature_type3 .tzFeature_Icon .tzFeature_iconBox,
            .vc_tta-style-modern .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading h4.vc_tta-panel-title a .vc_tta-controls-icon,
            .vc_tta-style-modern.vc_tta-shape-rounded .vc_tta-panels-container .vc_tta-panels .vc_tta-panel .vc_tta-controls-icon,
            .tzElement_Video .tzElement_autoplay,
            .tzElement_Video .tzElement_pauses,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_imageContainer .tzOurteam_ImageBox .tzOurteam_shapeLeft,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_imageContainer .tzOurteam_ImageBox .tzOurteam_shapeRight,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_Social a.tzSocial_Item:hover,
            .tzElement_Quote.tzQuote_type1 .owl-controls .owl-pagination .owl-page.active span,
            .tzElement_Quote.tzQuote_type1 .owl-controls .owl-pagination .owl-page:hover span,
            .tzElement_Quote.tzQuote_type2 .tzQuote_Item .tzQuote_Info:after,
            .tzElement_Quote.tzQuote_type2 .owl-controls .owl-pagination .owl-page.active span,
            .tzElement_Quote.tzQuote_type2 .owl-controls .owl-pagination .owl-page:hover span,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_videoHtml5 .tzPost_autoplay,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_videoHtml5 .tzPost_pauses,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_Slider ul.flex-direction-nav li a:hover,
            .tzElement_viewPost .tzViewPost_Grid .tzPost_Item .tzPost_Box .tzPost_Content .tzPostImage .tzViewPost_Date .tzViewPost_Text,
            .tzElement_viewPost .tzViewPost_Grid .tzPost_Item .tzPost_Box .tzPost_Content .tzPost_info .tzPost_title:after,
            .tzPortfolio_Grid .tzfilter .tzFillter_box a.selected,
            .tzPortfolio_Grid .tzfilter .tzFillter_box a:hover,
            .tzPortfolio_Grid .tzPortfolioGrid_Content .tzPortfolioGrid-item .tz-inner .tzPortfolioGrid_hover2 a:hover,
            .TzPage_Default .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p.form-submit input.submit,
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span,
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,
            .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a:hover,
            .tzshop-wrap .product-list ul.products li.tzShop-item.tzShopList-2column .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .tzshop-wrap .product-list ul.products li.tzShop-item.tzShopList-2column .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .tzshop-wrap .product-list ul.products li.tzShop-item.tzShopList-2column .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a:hover,
            .tzshop-wrap .woocommerce-pagination ul.page-numbers li span.current,
            .tzshop-wrap .woocommerce-pagination ul.page-numbers li a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info form.cart button:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info p.cart a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .product_share .product_share_social .tz_social span,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product.product-type-grouped .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product.product-type-variable .tzShopDetail_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product.outofstock .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs .panel #reviews #review_form_wrapper #review_form .comment-respond form#commentform p.form-submit input:hover,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,
            .upsells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,
            .upsells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,
            .woocommerce p.return-to-shop a.button:hover,
            .woocommerce form table.shop_table tbody tr.cart_item td.product-remove a:hover,
            .woocommerce form table.shop_table tbody tr td.actions input:hover,
            .woocommerce form table.shop_table tbody tr td.actions .coupon input.button:hover,
            .woocommerce .cart-collaterals .cross-sells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,
            .woocommerce .cart-collaterals .cross-sells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,
            .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn form.woocommerce-shipping-calculator .shipping-calculator-form p button.button:hover,
            .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals .wc-proceed-to-checkout a:hover,
            form#yith-wcwl-form table.wishlist_table tbody tr td.product-remove a:hover,
            form#yith-wcwl-form table.wishlist_table tbody tr td.product-add-to-cart a:hover,
            .woocommerce-account .woocommerce .addresses .address header.title a:hover,
            .woocommerce-account .woocommerce form p input.button:hover,
            .woocommerce-checkout .woocommerce form.checkout_coupon p input.button:hover,
            .woocommerce-checkout .woocommerce form.checkout .col2-set .col-1 .woocommerce-billing-fields p input.button:hover,
            .woocommerce-checkout .woocommerce form.checkout .col2-set .col-2 .woocommerce-shipping-fields .shipping_address p input.button:hover,
            .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order input#place_order:hover,
            .tzButton_left,
            .tzElement_Quote_Container.tzQuote_type1 .tzElement_Quote .owl-controls .owl-pagination .owl-page.active span,
            .tzElement_Quote_Container.tzQuote_type2 .tzElement_Quote .tzQuote_Item .tzQuote_Info::after,
            .tzElement-title.tz-title-type-2 .tzTitle::after,
            .tzPortfolio_slide .tzPortfolio_slide_item .tzPortfolioSlide_hover4 .tzPortfolioSlide_table .tzPortfolioSlide_table_cell h3::after,
            .tzOurProcess_Container .tzOurProcess .tzOurProcessItem:hover .tzOurProcessItem_top .tzOurProcessItem_icon,
            .tz-plazart-list.tzList-icon_highlight li i,
            .tz-header.tz-header-type-2 .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item.mega-current-menu-parent > a::after,
            .tzElement_Support .tzSupport_Item .tzSupport_Info .tzSupport_Title::after,
            .tzElement_Feature.tzFeature_type5 h5.tzFeature_title::after,
            .tzElement_Category_Grid .tzCategory_Grid_Item .tzCategory_Grid_Item_Content .tzCategory_Grid_Info .tzCategory_Grid_Title::after,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_image .yith-wcwl-add-to-wishlist,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_image .tzProduct-item_button,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_image .tzProduct-item_button a span,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_image .tzProduct-View-detail a,
            .tzPortfolio_Grid .tzPortfolioGrid_Content .tzPortfolioGrid-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_more::after,
            .tzOurProcess_Container .tzOurProcess_title::after,
            .tzPortfolio_Container .tzPortfolio .portfolio-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_more::after,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_detail a,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li a,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_detail a,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a span,
            .wpcf7-form input.wpcf7-submit{
                background-color: <?php echo esc_attr($interiart_color_theme);?>;
            }
            .bypostauthor,
            .sticky,
            .plazart-dropcap-type1,
            table tbody tr th a:hover,
            table tbody tr td a:hover,
            .tz-header .tz-headerBottom nav ul.tz-nav li.current-menu-item a,
            .tz-header .tz-headerBottom nav ul.tz-nav li .themeple_custom_menu_mega_menu ul.sub-menu > li > a:hover,
            .tz-header .tz-headerBottom nav ul.tz-nav li .themeple_custom_menu_mega_menu ul.sub-menu > li.current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span:before,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-current-menu-ancestor > a,
            .tz-header .tz-headerBottom .tz-header-cart span:hover,
            .tz-header .tz-headerBottom .tz-header-cart .widget_shopping_cart .widget_shopping_cart_content ul.cart_list li .tzMiniCart_info span.quantity span.amount,
            .tz-header .tz-headerBottom .tz-header-cart .widget_shopping_cart .widget_shopping_cart_content p.total span.amount,
            .tz-header .tz-headerBottom .tz-header-search span:hover,
            .tz-header .tz-headerBottom .tz-header-search .tz-header-search-form .searchform span,
            .tzFooter .tzFooterTop .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item:after,
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogQuote .tzBlogQuote_char,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogQuote .tzBlogQuote_char,
            .tzBlogSingle .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content cite a:hover,
            .tzBlogSingle .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-edit-link,
            .tzBlogSingle .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-reply-link,
            .tzBlogSingle .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p a,
            .tzBlogSingle .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p.form-submit input.submit,
            .tz-sidebar .widget ul.product_list_widget li .star-rating span:before,
            .tz-sidebar .widget ul.product_list_widget li span.reviewer,
            .tz-sidebar .widget ul.product_list_widget li span.amount,
            .tz-sidebar .widget ul.product_list_widget li ins,
            .tz-sidebar .widget ul.product_list_widget li ins span.amount,
            .tz-sidebar .widget .widget_shopping_cart_content ul.product_list_widget li .tzMiniCart_info span.quantity,
            .tzPortfolio_Single .tzPortfolio_Single_Container .tzPortfolio_Single_content table tbody tr td a:hover,
            .tzPortfolio_Single .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-edit-link,
            .tzPortfolio_Single .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-reply-link,
            .tzPortfolio_Single .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p a,
            .tz-plazart-list li i,
            .tzPricing_table.tzPricing_table_type2:hover .pricing-header h3.pricinge-title,
            .tzPricing_table.tzPricing_table_type2:hover .pricing-header span,
            .tzElement_Feature.tzFeature_type2 .tzFeature_Icon .tzFeature_iconBox small.tzFeature_Number,
            .tzElement_Feature.tzFeature_type2:hover .tzFeature_Icon .tzFeature_iconBox span,
            .tzElement_Feature.tzFeature_type2:hover .tzFeature_Icon .tzFeature_iconBox i,
            .tzElement_Feature.tzFeature_type3 .tzFeature_Icon .tzFeature_iconBox small.tzFeature_Number,
            .tzElement_Feature.tzFeature_type3:hover .tzFeature_Icon .tzFeature_iconBox span,
            .tzElement_Feature.tzFeature_type3:hover .tzFeature_Icon .tzFeature_iconBox i,
            .tzElement_Quote.tzQuote_type1 .tzQuote_Item .tzQuote_Info .tzQuote_Name,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_info .tzPost_infomation a:hover,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_info .tzPost_readMore,
            .tzElement_viewPost .tzViewPost_Grid .tzPost_Item .tzPost_Box .tzPost_Content .tzPost_info .tzPost_readMore,
            .TzPage_Default .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-edit-link,
            .TzPage_Default .tzComments .comments-area .tzCommentContent ol.comment-list li article .comment-content .tz-commentInfo .comment-reply-link,
            .TzPage_Default .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p a,
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToList:hover i,
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid:hover i,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .star-rating span:before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price ins span.amount,
            .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .star-rating span:before,
            .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price ins span.amount,
            .tzshop-wrap ul.products li.product-category .tz-shop-subcategory .tz-shop-subcategory-inner .tz-subcategory-info .tz-subcategory-table .tz-subcategory-table-cell a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .woocommerce-product-rating .star-rating span:before,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info p.price,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info p.price span.amount,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info form.cart table.group_table tbody tr td.price span.amount,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info form.variations_form table.variations tbody tr td.value a.reset_variations:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info form.variations_form .single_variation_wrap .single_variation span.price,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info form.variations_form .single_variation_wrap .single_variation span.price span.amount,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_info .product_meta span a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li.active a,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs .panel #reviews #review_form_wrapper #review_form .comment-respond form#commentform p p.stars span a.active:after,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs .panel #reviews #review_form_wrapper #review_form .comment-respond form#commentform p p.stars span a:hover:after,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .star-rating span:before,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price ins span.amount,
            .upsells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .star-rating span:before,
            .upsells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price,
            .upsells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price ins span.amount,
            .woocommerce form table.shop_table tbody tr.cart_item td.product-subtotal span.amount,
            .woocommerce .cart-collaterals .cross-sells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .star-rating span:before,
            .woocommerce .cart-collaterals .cross-sells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price,
            .woocommerce .cart-collaterals .cross-sells ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .price ins span.amount,
            .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals table tbody tr.order-total td span,
            .woocommerce-account .woocommerce p.myaccount_user strong,
            .woocommerce-account .woocommerce p.myaccount_user a:hover,
            .woocommerce-checkout .woocommerce .woocommerce-info:before,
            .woocommerce-checkout .woocommerce .woocommerce-info a,
            .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment ul.payment_methods li label a:hover,
            .tzButton_right,
            .tz-header .tz-headerBottom.tz-max-mega-menu nav #mega-menu-wrap-primary .mega-menu-toggle:hover:before,
            form#yith-wcwl-form table.wishlist_table tbody tr td.product-add-to-cart a:hover:after,
            .tzElement_Quote_Container.tzQuote_type1 .tzElement_Quote .tzQuote_Item .tzQuote_Info .tzQuote_Name,
            #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item.mega-toggle-on > a.mega-menu-link,
            #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > a.mega-menu-link:hover,
            #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > a.mega-menu-link:focus,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span::before,
            .tzElement_Feature.tzFeature_type4 .tzFeature_Icon .tzFeature_iconBox span,
            .tzElement_Feature.tzFeature_type4 a.tzFeature_readmore,
            .tzElement_Quote_Container.tzQuote_type3 .tzElement_Quote .tzQuote_Item .tzQuote_Info .tzQuote_Name,
            .tzElement_Counter.tz_Counter_type2 .tzElement_count em,
            .vc_tta-tabs .vc_tta-tabs-container ul.vc_tta-tabs-list li.vc_tta-tab.vc_active a span,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_info .star-rating span::before,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_info .price ins span.amount,
            .woocommerce ul.products li.product .tzProduct-item_inner .tzProduct-item_info .price,
            .tzElement_viewPost .tzViewPost_slider_advance .tzViewPost_item .tzViewPost_item_0 .tzViewPost_item_box .tzViewPost_info h3.tzViewPost_title a,
            .tzElement_viewPost .tzViewPost_slider_advance .tzViewPost_item .tzViewPost_item_1 .tzViewPost_item_box .tzViewPost_info h3.tzViewPost_title a,
            .tzElement_viewPost .tzViewPost_slider_advance .tzViewPost_item .tzViewPost_item_2 .tzViewPost_item_box .tzViewPost_info h3.tzViewPost_title a,
            .tzElement_viewPost .tzViewPost_slider_advance .tzViewPost_item .tzViewPost_item_3 .tzViewPost_item_box .tzViewPost_info h3.tzViewPost_title a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item.mega-current-menu-ancestor > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span::before,
            .tzElement_Support .tzSupport_Item .tzSupport_Info .tzSupport_subTitle,
            .tzElement_Feature.tzFeature_type5 .tzFeature_Icon .tzFeature_iconBox span,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item.mega-current-menu-item > a,
            .tzElement_viewService .tzView_Service_Slide .tzView_Service_Slide_Item .tzView_Service_Content a.tzViewService-readmore,
            .tzPortfolio_slick .tzPortfolio_slick_item .tzPortfolioslick_hover1 .tzPortfolioslick_table .tzPortfolioslick_table_cell h3 a,
            .tzElement-newsletter.tzNewsletter-modern h3.tzNewsletter-Title,
            .tzCopyright span,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item ul li a:hover,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item ul li a:hover,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item ul li a:hover,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span::before,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span::before,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item .product_list_widget li .star-rating span::before,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-1 #mega-menu-primary-custom-1 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a,
            .tz-header .tz-headerBottom nav #mega-menu-wrap-primary-custom-2 #mega-menu-primary-custom-2 > li.mega-menu-item > ul.mega-sub-menu > li.mega-menu-item.mega-current-menu-item > a,
            .tzElement-title .tzTitle em,
            .tzElement_Category_Grid .tzCategory_Grid_Item .tzCategory_Grid_Item_Content .tzCategory_Grid_Info .tzCategory_Grid_subTitle,
            .tzPortfolio_Grid .tzPortfolioGrid_Content .tzPortfolioGrid-item .tz-inner .tzPortfolioGrid_hover5 .tzPortfolioGrid_table .tzPortfolioGrid_table_cell h3 a,
            .tzElement-newsletter .newsletter form table tbody tr td input.newsletter-submit,
            .tzPortfolio_slick .tzPortfolio_slick_item .tzPortfolioslick_hover .tzPortfolioslick_table .tzPortfolioslick_table_cell h3 a,
            .tzFooter.tzFooter-Type-2 .tzFooterTop .footerattr .widget .wpcf7-form .TzContactForm p input.wpcf7-submit,
            .tzPortfolio_Grid .tzPortfolioGrid_Content .tzPortfolioGrid-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_info h3 a,
            .tzPortfolio_Grid .tzPortfolioGrid_Content .tzPortfolioGrid-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_more:hover,
            .tzElement_Counter .tzElement_count em,
            .tzElement_Category_Slide_Container.tzCategory_Slide_full_width .tzElement_Category_Slide .tzCategory_Slide_Item a:hover .tzCategory_Slide_Item_Content_box h5,
            .tzElement_Quote_Container.tzQuote_type4 .tzElement_Quote .tzQuote_Item .tzQuote_Info .tzQuote_Name,
            .tzPortfolio_Container .tzPortfolio .portfolio-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_info h3 a,
            .tzPortfolio_Container .tzPortfolio .portfolio-item .tz-inner .tzPortfolioBox .tzPortfolio_hover .tzPortfolio_hover_more:hover,
            .tzPortfolio_Single h3.tzPortfolio_Single_title,
            .tzPortfolio_Single .tzPortfolio_Single_tks,
            .tzPortfolio_Single_Close i:hover,
            .tzFooter.tzFooter-Type-2 .tzFooterBottom .tzFooterSocial ul li a span:hover,
            .tzElement_Member:hover .tzMember_Wrap .tzMember_Info .tzMember_Info_Box .tzMember_name,
            .tzElement_Member:hover .tzMember_Wrap .tzMember_Info .tzMember_Info_Box .tzMember_position,
            .tzPortfolio_Single .tzPortfolio_Single_Info ul li,
            .tzPortfolio_Single .tzPortfolio_Single_Info ul li a{
                color: <?php echo esc_attr($interiart_color_theme);?> !important;
            }
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span::after,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span::after,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a span::after{
                border-top-color: <?php echo esc_attr($interiart_color_theme);?> !important;
            }
            .tzBlogDefault .tzBlogContainer .tzBlogItem .tzBlogSlider ul.flex-direction-nav li a:hover,
            .tzBlogColumn .tzBlogContainer .blogColumn-item .tzBlogInner .tzBlogSlider ul.flex-direction-nav li a:hover,
            .tzBlogSingle .tzComments .comments-area .tzCommentForm .comment-respond form.comment-form p.form-submit input.submit,
            .tz-sidebar .widget.widget_tag_cloud .tagcloud a:hover,
            .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .ui-widget-content .ui-slider-handle,
            .tz-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover,
            .tzPortfolio_Container .tzFilter .tzFillter_box a.selected,
            .tzPortfolio_Container .tzFilter .tzFillter_box a:hover,
            .tzPricing_table.tzPricing_table_type2:hover,
            .tzSkill.tzskill-item-type2 .tzskill-item .tzskill-item-width .tzSkill_Circle,
            .tzElement_Feature.tzFeature_type1 .tzFeature_Icon .tzFeature_iconBox:after,
            .tzElement_Feature.tzFeature_type2 .tzFeature_Icon .tzFeature_iconBox,
            .tzElement_Feature.tzFeature_type2 .tzFeature_Icon .tzFeature_iconBox small.tzFeature_Number,
            .tzElement_Feature.tzFeature_type2:hover .tzFeature_Icon .tzFeature_iconBox,
            .tzElement_Feature.tzFeature_type3 .tzFeature_Icon .tzFeature_iconBox,
            .tzElement_Feature.tzFeature_type3 .tzFeature_Icon .tzFeature_iconBox small.tzFeature_Number,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_imageContainer .tzOurteam_ImageBox .tzOurteam_shapeLeft:after,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_imageContainer .tzOurteam_ImageBox .tzOurteam_shapeRight:after,
            .tzElement_Ourteam.tzOurteam_type1 .tzOurteam_Social a.tzSocial_Item:hover,
            .tzElement_Quote.tzQuote_type1 .owl-controls .owl-pagination .owl-page span:after,
            .tzElement_Quote.tzQuote_type2 .owl-controls .owl-pagination .owl-page span:after,
            .tzElement_viewPost .tzViewPost_slider .tzViewPost_item .tzPost_Slider ul.flex-direction-nav li a:hover,
            .tzPortfolio_Grid .tzfilter .tzFillter_box a.selected,
            .tzPortfolio_Grid .tzfilter .tzFillter_box a:hover,
            .tzshop-wrap .woocommerce-pagination ul.page-numbers li span.current,
            .tzshop-wrap .woocommerce-pagination ul.page-numbers li a:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetailSlide-carousel ul li.bd_active:after,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetailSlide-carousel ul li:hover :after,
            .woocommerce-checkout .woocommerce .woocommerce-info,
            .tzButton_left,
            .tzButton_right,
            .tzElement_Quote_Container.tzQuote_type1 .tzElement_Quote .owl-controls .owl-pagination .owl-page span::after,
            .tzElement_Quote_Container.tzQuote_type5 .tzElement_Quote_Box .tzElement_Quote .owl-controls .owl-pagination .owl-page span::after,
            .tzElement_Quote_Container.tzQuote_type5 .tzElement_Quote_Box .tzElement_Quote_Wrap .tzElement_Quote,
            .tzFooter.tzFooter-Type-2 .tzFooterTop .footerattr .widget .wpcf7-form .TzContactForm p input.wpcf7-submit,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after,
            .tzElement_Quote_Container.tzQuote_type3 .tzElement_Quote .tzQuote_Item .tzQuote_Info .tzQuote_Image,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li a,
            .tzElement_Member:hover .tzMember_Wrap .tzMember_image,
            .tzElement_Member:hover .tzMember_Wrap .tzMember_Info{
                border-color: <?php echo esc_attr($interiart_color_theme);?>;
            }
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs .panel,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs{
                border-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.2));?>);
            }
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span:after,
            .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span:after,
            .related ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after{
                border-top-color: <?php echo esc_attr($interiart_color_theme);?> !important;
            }

            .woocommerce ul.products li.product .tzProduct-item_inner:hover .tzProduct-item_image .tzProduct-item_overlay,
            .woocommerce ul.products li.product .tzProduct-item_inner:hover .tzProduct-item_info,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .tzShop-item_image .tzShop-item_overlay,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .tzShop-item_info,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetail_slide ul li::after,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .tzShop-item_image .tzShop-item_overlay,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .tzShop-item_info{
                background-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.1));?>);
            }
            .woocommerce ul.products li.product .tzProduct-item_inner .line-left::after,
            .woocommerce ul.products li.product .tzProduct-item_inner .line-left::before,
            .woocommerce ul.products li.product .tzProduct-item_inner .line-right::after,
            .woocommerce ul.products li.product .tzProduct-item_inner .line-right::before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .line-left::before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .line-left::after,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .line-right::before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .line-right::after,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetailSlide-carousel ul li,
            .related ul.products li.tzShop-item .tzShop-item_inner .line-left::before,
            .related ul.products li.tzShop-item .tzShop-item_inner .line-left::after,
            .related ul.products li.tzShop-item .tzShop-item_inner .line-right::before,
            .related ul.products li.tzShop-item .tzShop-item_inner .line-right::after{
                background-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.2));?>);
            }
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li.active a,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .woocommerce-tabs ul.tabs li a:hover{
                border-left-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.2));?>);
                border-right-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.2));?>)
            }
            .woocommerce ul.products li.product .tzProduct-item_inner:hover .line-left::before,
            .woocommerce ul.products li.product .tzProduct-item_inner:hover .line-left::after,
            .woocommerce ul.products li.product .tzProduct-item_inner:hover .line-right::before,
            .woocommerce ul.products li.product .tzProduct-item_inner:hover .line-right::after,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .line-left::before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .line-left::after,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .line-right::before,
            .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner:hover .line-right::after,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetailSlide-carousel ul li:hover,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetail_slide,
            .tzShopDetail-wrap .tzShopContentDetail .tzShopDetail_Product .tzShopDetail_images #tzShopDetailSlide-carousel ul li.bd_active,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .line-left::before,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .line-left::after,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .line-right::before,
            .related ul.products li.tzShop-item .tzShop-item_inner:hover .line-right::after{
                background-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.5));?>);
            }
            .tzFooter .tzFooterTop .footerattr .widget.widget_flickr .tz-flickr a::before{
                background-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.75));?>);
            }
            .wpb_gmaps_widget.tzGoogleMap_modern .wpb_wrapper .wpb_map_wraper .tz_map_overlay{
                background-color: rgba(<?php echo esc_attr(interiart_hex2rgb($interiart_color_theme,0.9));?>);
            }
            <?php
            endif
        ?>
        </style>

        <?php
        $interiart_favicon_option = ot_get_option('interiart_favicon_onoff');
        $interiart_favicon = ot_get_option('interiart_favicon');
        if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
            if( $interiart_favicon_option == 'yes' && $interiart_favicon != ''){
                echo '<link rel="shortcut icon" href="' . esc_url($interiart_favicon) . '" type="image/x-icon" />';
            }
        }
        ?>

        <?php

    }

endif

?>