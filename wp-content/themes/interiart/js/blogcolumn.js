"use strict";
var $container        =   jQuery('.tzBlogContainer'),
    Desktop           =   variables_blog.desktop,
    tabletportrait    =   variables_blog.tabletportrait,
    mobilelandscape   =   variables_blog.mobilelandscape,
    mobileportrait    =   variables_blog.mobileportrait,
    //$filter_status    =   variables_portfolio.filter_status,
    //$paging           =   variables_portfolio.paging,
    resizeTimer = null;

/*
 * Method reize image
 * @variables class
 */
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

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });


    });
}

/*
 * Method portfolio column
 * @variables Desktop
 * @variables tabletportrait
 * @variables mobilelandscape
 * @variables mobileportrait
 */
function tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait){
    var contentWidth    = jQuery('.tzBlogContainer').width();
    var numberItem      = 2;
    var newColWidth     = 0;
    var featureColWidth = 0;
    var widthWindwow = jQuery(window).width();
    if (widthWindwow >= 992) {
        numberItem = Desktop;
        jQuery('.tzBlogContainer').addClass('tzBlogDesktop-'+Desktop+'-Column');
    } else if (  widthWindwow >= 768) {
        numberItem = tabletportrait ;
        jQuery('.tzBlogContainer').addClass('tzBlogTabletPortrait-'+Desktop+'-Column');
    } else if (  widthWindwow >= 480) {
        numberItem = mobilelandscape ;
        jQuery('.tzBlogContainer').addClass('tzBlogMobileLandscape-'+Desktop+'-Column');
    } else if (widthWindwow < 480) {
        numberItem = mobileportrait ;
        jQuery('.tzBlogContainer').addClass('tzBlogMobile-'+Desktop+'-Column');
    }
    newColWidth = Math.floor(contentWidth / numberItem);
    featureColWidth = newColWidth * 2;
    jQuery('.blogColumn-item').width(newColWidth);
    jQuery('.tz_feature_item').width(featureColWidth);
    var $container  = jQuery('.tzBlogContainer') ;
    $container.imagesLoaded(function(){
        $container.isotope({
            masonry:{
                columnWidth: newColWidth
            }
        });

    });
    interiart_resize_image(jQuery('.tzBlogQuote_bg'));

    // HEIGHT VIMEO + HTML5
    jQuery('.tzBlogVideo').each(function(){
        var $width_video = jQuery(this).width();
        jQuery(this).css('height',(($width_video*9)/16)+'px');
    });

    jQuery('.tzBlog_videoHtml5').each(function(){
        var $width_html5 = jQuery(this).width();
        jQuery(this).css('height',(($width_html5*9)/16)+'px');
    });
}

/*
 * Method reize
 */
jQuery(window).bind('load resize', function() {
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout("tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait)", 100);
});

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

}) ;
jQuery(window).load(function(){
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
});