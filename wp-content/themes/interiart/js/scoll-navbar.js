jQuery(document).ready(function() {

    jQuery(window).scroll(function () {

        console.log(jQuery(window).scrollTop());
        if (jQuery(window).scrollTop() > 10) {
            jQuery('.tz-headerBottom').addClass('navbar-fixed');
        }
        if (jQuery(window).scrollTop() < 10) {
            jQuery('.tz-headerBottom').removeClass('navbar-fixed');
        }
    });
});