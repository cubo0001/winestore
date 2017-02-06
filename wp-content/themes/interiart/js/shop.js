"use strict";
function interiart_resize_image(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    var width1;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();

        widthStage = jQuery (this).width();
//        width1 = jQuery ('.tz-shop-products-slider').width();
//        alert(width1);
//        widthStage = width1 / 4;

        var img_url = jQuery(this).find('img').attr('src');

        var image = new Image();
        image.src = img_url;

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });


    });
}

jQuery(window).load(function(){
    // HEIGHT IMAGE
    jQuery(".product-grid .tzShop-item_image").each(function(){
        var $interiart_widthImage = jQuery(this).width();
        var $interiart_heightImage = $interiart_widthImage * 1.07;
        jQuery(this).css('height',$interiart_heightImage + 'px');
    });

    jQuery(".product-list .tzShop-item_image").each(function(){
        var $interiart_widthImage = jQuery(this).width();
        var $interiart_heightImage = $interiart_widthImage * 0.92;
        jQuery(this).css('height',$interiart_heightImage + 'px');
    });

    interiart_resize_image(jQuery('.tzShop-item_image'));
});


