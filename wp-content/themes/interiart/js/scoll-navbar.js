jQuery(document).ready(function() {

    jQuery(window).scroll(function () {

        if (jQuery(window).scrollTop() > 10) {
            jQuery('.tz-headerBottom').addClass('navbar-fixed');
        }
        if (jQuery(window).scrollTop() < 10) {
            jQuery('.tz-headerBottom').removeClass('navbar-fixed');
        }
        if (jQuery(window).scrollTop() > 156) {
            jQuery('.nav-menu-find-price').addClass('hold-navbar');
        }
        if (jQuery(window).scrollTop() < 156) {
            jQuery('.nav-menu-find-price').removeClass('hold-navbar');
        }
    });
});