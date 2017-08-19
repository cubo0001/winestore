jQuery(document).ready(function() {

    jQuery(window).scroll(function () {

        if (jQuery(window).scrollTop() > 10) {
            jQuery('.tz-headerBottom').addClass('navbar-fixed');
        }
        if (jQuery(window).scrollTop() < 10) {
            jQuery('.tz-headerBottom').removeClass('navbar-fixed');
        }
        if (jQuery(window).scrollTop() > 186) {
            jQuery('.nav-menu-find-price').addClass('hold-navbar');
        }
        if (jQuery(window).scrollTop() < 186) {
            jQuery('.nav-menu-find-price').removeClass('hold-navbar');
        }
        if (jQuery(window).scrollTop() > 446) {
            jQuery('.row-under-slide').addClass('hold-row-under-slide');
        }
        if (jQuery(window).scrollTop() < 446) {
            jQuery('.row-under-slide').removeClass('hold-row-under-slide');
        }
    });
});