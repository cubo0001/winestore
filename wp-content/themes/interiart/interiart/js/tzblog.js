
/*
 * Method reize image
 * @variables class
 */
function interiart_resize_image(obj){
    "use strict"
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

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });


    });
}

jQuery(document).ready(function(){
    "use strict";

    // JQUERY VIDEO HTML5
    jQuery('.tzblog_autoplay').on('click',function(){
        jQuery(this).hide();
        jQuery(this).parent().parent().find('.bg-video').hide();
        jQuery(this).parent().parent().find('.tzblog_pauses').show();
        if (jQuery(this).parent().parent().find('.videoID')[0].paused)
            jQuery(this).parent().parent().find('.videoID')[0].play();

    }) ;
    jQuery('.tzblog_pauses').on('click',function(){
        jQuery(this).hide();
        jQuery(this).parent().parent().find('.bg-video').show();
        jQuery(this).parent().parent().find('.tzblog_autoplay').show();
        if (jQuery(this).parent().parent().find('.videoID')[0].play)
            jQuery(this).parent().parent().find('.videoID')[0].pause();

    });

    // HEIGHT VIMEO + HTML5
    jQuery('.tzBlog_video').each(function(){
        var $width_video = jQuery(this).width();
        jQuery(this).css('height',(($width_video*9)/16)+'px');
    });

    jQuery('.tzBlog_videoHtml5').each(function(){
        var $width_html5 = jQuery(this).width();
        jQuery(this).css('height',(($width_html5*9)/16)+'px');
    });
}) ;
jQuery(window).load(function(){
    "use strict"
    // SLIDESHOW FLEXSLIDER
    jQuery('.tzBlogSlider').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: true,
        directionNav: false,
        prevText: "Previous",
        nextText: "Next",
        smoothHeight: true
    });

    interiart_resize_image(jQuery('.tzBlogQuote_bg'));
});