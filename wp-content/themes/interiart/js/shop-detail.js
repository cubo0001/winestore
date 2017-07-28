"use strict";
//var number_item     =   variables_shopdetail.number_item;

function interiart_resize_image(obj){

    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){
        heightStage = jQuery(this).height();
        widthStage = jQuery (this).width();
        var img_url = jQuery(this).find('img').attr('src');
        var image = new Image();
        image.src = img_url;
        image.onload = function() {
        }
        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;
        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });
    });
}

//Carousel Tweaking

function mycarousel_initCallback(carousel) {

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}

jQuery(window).load(function () {

    // HEIGHT IMAGE
    jQuery(".tzShop-item_image").each(function(){
        var $interiart_widthImage = jQuery(this).width();
        var $interiart_heightImage = $interiart_widthImage * 1.26;
        jQuery(this).css('height',$interiart_heightImage + 'px');

        //jQuery('.product-list .products .tzShop-item .tzShop-item_inner .tzShop-item_info').css('min-height',$interiart_heightImage + 'px');
    });

    interiart_resize_image(jQuery('.tzShop-item_image'));

    var $interiart_width_box = jQuery('.tzShopDetail_images').width();
    var $interiart_width_left = jQuery('#tzShopDetailSlide-carousel').width();

    jQuery('#tzShopDetail_slide').css('width',( $interiart_width_box - $interiart_width_left - 15 ) + 'px');
    jQuery('#tzShopDetail_slide ul li').css('width',( ($interiart_width_box - $interiart_width_left - 15) ) + 'px');

    //jCarousel Plugin
    jQuery('#tzShopDetail_carousel').jcarousel({
        vertical: true,
        scroll: 1,
        auto: 2,
        navigation: false,
        wrap: 'last',
        //itemLoadCallback: {
        //    onBeforeAnimation: function(){
        //        interiart_resize_image(jQuery('#tzShopDetail_slide ul li'));
        //    }
        //},
        initCallback: mycarousel_initCallback
    });

    jQuery("#tzShopDetailSlide-carousel ul li a").each(function(){
        interiart_resize_image(jQuery(this));
    });

    //Front page Carousel - Initial Setup

    jQuery('div#tzShopDetail_slide li:first').addClass('active');
    //jQuery('div#tzShopDetailSlide-carousel a img').css({'opacity': '0.5'});
    jQuery('div#tzShopDetailSlide-carousel ul li:first').addClass('bd_active');
//    jQuery('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')

    //Combine jCarousel with Image Display
    jQuery('div#tzShopDetailSlide-carousel li a').on('click',function () {

            jQuery('span.arrow').remove();
//            jQuery(this).append('<span class="arrow"></span>');
            jQuery('div#tzShopDetailSlide-carousel ul li.bd_active').removeClass('bd_active');
            jQuery(this).parent().addClass('bd_active');
            jQuery('div#tzShopDetail_slide li').removeClass('active');
            jQuery('div#tzShopDetail_slide li.' + jQuery(this).attr('data-link')).addClass('active');

            return false;
        });

    interiart_resize_image(jQuery('#tzShopDetail_slide ul li '));
});


