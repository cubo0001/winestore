jQuery(document).ready(function(){
    "use strict";

    // HEIGHT VIMEO + HTML5
    jQuery('.tzBlogSingle_video').each(function(){
        var $width_video = jQuery(this).width();
        jQuery(this).css('height',(($width_video*9)/16)+'px');
    });

    jQuery('.tzBlogSingle_videoHtml5').each(function(){
        var $width_html5 = jQuery(this).width();
        jQuery(this).css('height',(($width_html5*9)/16)+'px');
    });

    // JQUERY VIDEO HTML5
    var myVideo = jQuery('.videoID')[0];
    jQuery('.tzblog_autoplay').on('click',function(){
        jQuery(this).hide();
        jQuery('.bg-video').hide();
        jQuery('.tzblog_pauses').show();
        if (myVideo.paused)
            myVideo.play();

    }) ;
    jQuery('.tzblog_pauses').on('click',function(){
        jQuery(this).hide();
        jQuery('.bg-video').show();
        jQuery('.tzblog_autoplay').show();
        if (myVideo.play)
            myVideo.pause();

    });

}) ;
jQuery(window).load(function(){
    "use strict"
    // SLIDESHOW FLEXSLIDER
    jQuery('.tzBlogSingleSlider').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: true,
        directionNav: false,
        prevText: "Previous",
        nextText: "Next",
        smoothHeight: true
    });

    var $author_social = jQuery('.author-social').height();
    jQuery('.author-social').css('margin-top','-'+$author_social/2+'px');
});