jQuery(document).ready(function() {
    "use strict";

    jQuery('.tz_map_button_view').on('click',function(){
        jQuery(this).parent().parent().addClass('tz_map_active');
        jQuery(this).css('display','none');
        jQuery(this).parent().find('.tz_map_button_close').css('display','block');
    });

    jQuery('.tz_map_button_close').on('click',function(){
        jQuery(this).parent().parent().removeClass('tz_map_active');
        jQuery(this).css('display','none');
        jQuery(this).parent().find('.tz_map_button_view').css('display','block');
    });

});