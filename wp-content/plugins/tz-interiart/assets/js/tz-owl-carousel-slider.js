jQuery(document).ready(function() {
    "use strict";

    // Blog slider  -----------------
    jQuery(".tzOwlCarouselSlider").each(function() {
        jQuery(this).tzinteriart_owlCarousel({
            items: 6,
            itemsDesktop: [1199, 6],
            itemsDesktopSmall: [979, 4],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1],
            slideSpeed: 500,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            autoPlay: false,
            stopOnHover: false,
            singleItem: false,
            rewindNav: false,
            pagination: false,
            paginationNumbers: false,
            itemsScaleUp: false,
            mouseDrag: true
        });
    });
});

jQuery(window).load(function(){
    "use strict";

    // height excerpt
    var $opject = jQuery('.tzOwlCarouselSlider .owl-item');
    var $array_li = [];
    jQuery($opject).parent().parent().parent().find('.owl-item').each(function(){

        $array_li.push(jQuery(this).innerHeight());
    });
    var $max_height = Math.max.apply( Math, $array_li);

    jQuery($opject).css('height',$max_height+'px');
});