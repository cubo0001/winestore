jQuery(document).ready(function() {
    "use strict";
    /* counter */

    jQuery('.slickslider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        autoplay:false,
        autoplaySpeed:3000,
        arrows:true,
        infinite:true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});