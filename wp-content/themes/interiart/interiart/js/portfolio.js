"use strict";
var $container        =   jQuery('.tzPortfolio'),
    Desktop           =   variables_portfolio.desktop,
    tabletportrait    =   variables_portfolio.tabletportrait,
    mobilelandscape   =   variables_portfolio.mobilelandscape,
    mobileportrait    =   variables_portfolio.mobileportrait,
    $filter_status    =   variables_portfolio.filter_status,
    $paging           =   variables_portfolio.paging,
    $height_option    =   variables_portfolio.height_option,
    $height_value     =   variables_portfolio.height_value,
    $width_option     =   variables_portfolio.width_option,
    resizeTimer = null;

/*
* Method create tags
* @variables $filter_status
*/
function create_tags() {
    if ( $filter_status == 'show' ) {
        var cat_status = []; //var cat_status = [];
        jQuery('.tzPortfolio .portfolio-item').each(function(){
            var item_class = jQuery(this).attr('class');

            item_class = item_class.split(' ');
            for(var i = 0; i < item_class.length; i++){

                if(parseInt(item_class[i].indexOf('interiart'), 10) === 0) {
                    if(jQuery.inArray(item_class[i], cat_status)){
                        cat_status.push(item_class[i]);
                    }
                }
            }
        });
        for(var index=0; index < cat_status.length; index++){
            jQuery('.tzFilter a#' + cat_status[index]).removeClass('TZHide');
            jQuery('.tzFilter a#' + cat_status[index]).addClass('TZShow');
        }
    }
}
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
    var contentWidth    = jQuery('.tzPortfolio').width();
    var numberItem      = 2;
    var newColWidth     = 0;
    var featureColWidth = 0;
    var widthWindwow = jQuery(window).width();
    if (widthWindwow >= 992) {
        numberItem = Desktop;
    } else if (  widthWindwow >= 768) {
        numberItem = tabletportrait ;
    } else if (  widthWindwow >= 480) {
        numberItem = mobilelandscape ;
    } else if (widthWindwow < 480) {
        numberItem = mobileportrait ;
    }
    newColWidth = Math.floor(contentWidth / numberItem);
    featureColWidth = newColWidth * 2;
    jQuery('.portfolio-item').width(newColWidth);
    if($width_option == 1){
        jQuery('.tz_feature_item').width(featureColWidth);
    }
    var $container  = jQuery('.tzPortfolio') ;
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        $container.isotope({
            itemSelector: '.portfolio-item',
            masonry:{
                columnWidth: newColWidth
            }
        });
    } else{
        $container.imagesLoaded(function(){
            $container.isotope({
                itemSelector: '.portfolio-item',
                masonry:{
                    columnWidth: newColWidth
                }
            });

        });
    }

    if($height_option == 'fix'){
        jQuery('.item-img').css('height',$height_value+'px');
        interiart_resize_image(jQuery('.item-img'));
    }

    //jQuery('.simple-ajax-popup-align-top').magnificPopup({
    //    type: 'ajax',
    //    alignTop: true,
    //    overflowY: 'scroll',
    //    callbacks: {
    //        ajaxContentAdded: function() {
    //            jQuery('.tzPortfolio_single_left, .tzPortfolio_single_right').theiaStickySidebar({
    //                // Settings
    //                additionalMarginTop: 30
    //            });
    //        }
    //    }
    //});

    jQuery('.simple-ajax-popup-align-top').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            },
        },
        closeOnContentClick: true,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
}

/*
 * Method reize
 */
jQuery(window).bind('load resize', function() {
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout("tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait)", 100);

});

/*
 * Method filter portfolio
 */

function loadPortfolio(){
    if ( $filter_status == 'show' ) {
        var $optionSets = jQuery('.tzFilter'),
            $optionLinks = $optionSets.find('a');
        $optionLinks.on('click',function(event){
            event.preventDefault();
            var $this = jQuery(this);
            // don't proceed if already selected
            if ( $this.hasClass('selected') ) {
                return false;
            }
            var $optionSet = $this.parents('.tzFilter');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');

            // make option object dynamically, i.e. { filter: '.my-filter-class' }
            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');

            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[ key ] = value;

            if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
                // changes in layout modes need extra logic
                changeLayoutMode( $this, options );
            } else {
                // otherwise, apply new options
                $container.isotope( options );
            }
            return false;
        });
        if (String(jQuery.browser.safari) && String(document.readyState) !== "complete") {
            tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
        } else {
            tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
        }
    }
}

jQuery(document).ready(function(){

    // --------------------------------------------------
    // magnificPopup
    // --------------------------------------------------

    jQuery('.simple-ajax-popup-align-top').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            },
        },
        closeOnContentClick: true,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
});

jQuery(window).on('load', function () {
    // prettyPhoto for image gallery modal popup
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        social_tools: false,
        hook: 'data-rel'
    });

    $container.imagesLoaded( function(){
        tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
    });
    create_tags();
    loadPortfolio();
});

if ( $paging != 'pagenavi' ){
    jQuery(function(){
        $container.infinitescroll({
                navSelector  : '#loadajax a',    // selector for the paged navigation
                nextSelector : '#loadajax a:first',  // selector for the NEXT link (to page 2)
                itemSelector : '.portfolio-item',     // selector for all items you'll retrieve
                errorCallback: function(){
                    jQuery('#tz_append a').addClass('tzNomore');

                },
                loading: {
                    msgText:'',
                    finishedMsg: '',
                    img: variables_portfolio.image,
                    selector: '#tz_append'
                }
            },
            // call Isotope as a callback
            function( newElements ) {
                var $newElems =   jQuery( newElements ).css({ opacity: 0 });
                // ensure that images load before adding to masonry layout
                $newElems.imagesLoaded(function(){
                    // show elems now they're ready
                    $newElems.animate({ opacity: 1 });
                    // trigger scroll again
                    $container.isotope( 'appended', $newElems);
                    if (String(jQuery.browser.safari) && String(document.readyState) !== "complete") {
                        tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
                    } else {
                        tz_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
                    }
                    //if there still more item
                    if($newElems.length){
                        //move item-more to the end
                        jQuery('div#tz_append').find('a:first').show();
                    }
                });

                create_tags();
            }
        );

        if ( $paging == 'ajaxbutton' ){
            jQuery(window).unbind('.infscr');

            jQuery('div#tz_append a').on('click',function(){
                jQuery('div#tz_append').find('a:first').hide();
                $container.infinitescroll('retrieve');
            });
        }

    });
}