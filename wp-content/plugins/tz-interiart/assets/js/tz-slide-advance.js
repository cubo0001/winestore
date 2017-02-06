/*
 * Method resize image
 */
function TzTemplateResizeImage(obj){

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

//TzTemplateResizeImage(jQuery('.tzViewPost_image'));

jQuery(document).ready(function() {
    "use strict";

    // Blog slider  -----------------
    jQuery(".tzViewPost_slider_advance").each(function(){
        jQuery(this).tzinteriart_owlCarousel({
            items : 1,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [979,1],
            itemsTablet: [768, 1],
            itemsMobile: [479, 1],
            slideSpeed:500,
            paginationSpeed:800,
            rewindSpeed:1000,
            autoPlay:false,
            stopOnHover: false,
            singleItem:false,
            rewindNav:false,
            pagination:false,
            paginationNumbers:false,
            itemsScaleUp:false,
            mouseDrag:true,
        });
    });

});

jQuery(window).load(function(){

    TzTemplateResizeImage(jQuery('.tzViewPost_image'));
});