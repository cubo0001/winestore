jQuery(document).ready(function(){
    "use strict";
    // method body font
    var FontCheck2 = jQuery("#interiart_TZFontType").attr('value');
    switch (FontCheck2){
        case 'TzFontSquirrel':
            jQuery('#setting_interiart_TzFontSquirrel').css("display","block");
            break;
        case 'TzFontDefault':
            jQuery('#setting_interiart_TzFontDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_interiart_TzFontFami').css("display","block");
            jQuery('#setting_interiart_TzFontFaminy').css("display","block");
            break;
    }

    jQuery("#interiart_TZFontType").change(function(){
        var FontCheck = jQuery("#interiart_TZFontType").attr('value');
        switch (FontCheck){
            case 'TzFontDefault':
                jQuery('#setting_interiart_TzFontDefault').slideDown();
                jQuery('#setting_interiart_TzFontSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontFami').slideUp();
                jQuery('#setting_interiart_TzFontFaminy').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_interiart_TzFontDefault').slideUp();
                jQuery('#setting_interiart_TzFontSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontFami').slideDown();
                jQuery('#setting_interiart_TzFontFaminy').slideDown();
                break;
        }
    });


    // method header font
    var FontCheckHead = jQuery("#interiart_TZFontTypeHead").attr('value');
    switch (FontCheckHead){
        case 'TzFontDefault':
            jQuery('#setting_interiart_TzFontHeadDefault').css("display","block");
            break;
        case 'Tzgoogle':
            jQuery('#setting_interiart_TzFontHeadGoodurl').css("display","block");
            jQuery('#setting_interiart_TzFontFaminyHead').css("display","block");
            break;
    }

    jQuery("#interiart_TZFontTypeHead").change(function(){
        var FontCheckHead2 = jQuery("#interiart_TZFontTypeHead").attr('value');
        switch (FontCheckHead2){
            case 'TzFontDefault':
                jQuery('#setting_interiart_TzFontHeadDefault').slideDown();
                jQuery('#setting_interiart_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontHeadGoodurl').slideUp();
                jQuery('#setting_interiart_TzFontFaminyHead').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_interiart_TzFontHeadDefault').slideUp();
                jQuery('#setting_interiart_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontHeadGoodurl').slideDown();
                jQuery('#setting_interiart_TzFontFaminyHead').slideDown();
                break;
        }
    });

    // method Menu font
    var FontCheckMenu= jQuery("#interiart_TZFontTypeMenu").attr('value');
    switch (FontCheckMenu){

        case 'TzFontDefault':
            jQuery('#setting_interiart_TzFontMenuDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_interiart_TzFontMenuGoodurl').css("display","block");
            jQuery('#setting_interiart_TzFontFaminyMenu').css("display","block");
            break;
    }

    jQuery("#interiart_TZFontTypeMenu").change(function(){
        var FontCheckMenu2 = jQuery("#interiart_TZFontTypeMenu").attr('value');
        switch (FontCheckMenu2){

            case 'TzFontDefault':
                jQuery('#setting_interiart_TzFontMenuDefault').slideDown();
                jQuery('#setting_interiart_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontMenuGoodurl').slideUp();
                jQuery('#setting_interiart_TzFontFaminyMenu').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_interiart_TzFontMenuDefault').slideUp();
                jQuery('#setting_interiart_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontMenuGoodurl').slideDown();
                jQuery('#setting_interiart_TzFontFaminyMenu').slideDown();
                break;
        }
    });

    // method custom font
    var FontCheckCustom= jQuery("#interiart_TZFontTypeCustom").attr('value');
    switch (FontCheckCustom){

        case 'TzFontDefault':
            jQuery('#setting_interiart_TzFontCustomDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_interiart_TzFontCustomGoodurl').css("display","block");
            jQuery('#setting_interiart_TzFontFaminyCustom').css("display","block");
            break;
    }

    jQuery("#interiart_TZFontTypeCustom").change(function(){
        var FontCheckCustom2 = jQuery("#interiart_TZFontTypeCustom").attr('value');
        switch (FontCheckCustom2){

            case 'TzFontDefault':
                jQuery('#setting_interiart_TzFontCustomDefault').slideDown();
                jQuery('#setting_interiart_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontCustomGoodurl').slideUp();
                jQuery('#setting_interiart_TzFontFaminyCustom').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_interiart_TzFontCustomDefault').slideUp();
                jQuery('#setting_interiart_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_interiart_TzFontCustomGoodurl').slideDown();
                jQuery('#setting_interiart_TzFontFaminyCustom').slideDown();
                break;
        }
    });




    // method logo type

    var LogoType= jQuery("#interiart_logotype").attr('value');
    if(LogoType==1){
        jQuery('#setting_interiart_logo').slideDown();
        jQuery('#setting_interiart_logoText').slideUp();
        jQuery('#setting_interiart_logoTextcolor').slideUp();
    }else{
        jQuery('#setting_interiart_logo').slideUp();
        jQuery('#setting_interiart_logoText').slideDown();
        jQuery('#setting_interiart_logoTextcolor').slideDown();
    }

    jQuery("#interiart_logotype").change(function(){
        var LogoTypeChange= jQuery("#interiart_logotype").attr('value');
        if(LogoTypeChange==1){
            jQuery('#setting_interiart_logo').slideDown();
            jQuery('#setting_interiart_logoText').slideUp();
            jQuery('#setting_interiart_logoTextcolor').slideUp();
        }else{
            jQuery('#setting_interiart_logo').slideUp();
            jQuery('#setting_interiart_logoText').slideDown();
            jQuery('#setting_interiart_logoTextcolor').slideDown();
        }
    });

    // Option color of theme
    var type_color = jQuery('#interiart_TZTypecolor').attr('value');
    if(type_color == '0'){
        jQuery('#setting_interiart_TZThemecolor_limited').slideDown();
        jQuery('#setting_interiart_TZThemecolor_unlimited').slideUp();
    }else{
        jQuery('#setting_interiart_TZThemecolor_limited').slideUp();
        jQuery('#setting_interiart_TZThemecolor_unlimited').slideDown();
    }

    jQuery('#interiart_TZTypecolor').change(function(){
        if(jQuery(this).attr('value')=='0'){
            jQuery('#setting_interiart_TZThemecolor_limited').slideDown();
            jQuery('#setting_interiart_TZThemecolor_unlimited').slideUp();
        }else{
            jQuery('#setting_interiart_TZThemecolor_limited').slideUp();
            jQuery('#setting_interiart_TZThemecolor_unlimited').slideDown();
        }
    })


    // jquery style option
    jQuery("#tab_TzSyle").toggle(function(){
        jQuery('#tab_TzFontMenu').slideDown();
        jQuery('#tab_TzFontCustom').slideDown();
        jQuery('#tab_TZBody').slideDown();
        jQuery('#tab_TzFontHeader').slideDown();
    }, function(){
        jQuery('#tab_TzFontMenu').slideUp();
        jQuery('#tab_TzFontCustom').slideUp();
        jQuery('#tab_TZBody').slideUp();
        jQuery('#tab_TzFontHeader').slideUp();
    });

    // jquery footer option
    jQuery("#tab_footeroption").toggle(function(){
        jQuery('#tab_footeroptiontype1').slideDown();
        jQuery('#tab_footeroptiontype2').slideDown();
        jQuery('#tab_footeroptiontype3').slideDown();
    }, function(){
        jQuery('#tab_footeroptiontype1').slideUp();
        jQuery('#tab_footeroptiontype2').slideUp();
        jQuery('#tab_footeroptiontype3').slideUp();
    });

        // jquery style option
    jQuery("#tab_TZShop").toggle(function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideDown();
    }, function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideUp();
    });

    // jquery favicon option
    var valuefavicon = jQuery('#interiart_favicon_onoff').attr('value');
    if(valuefavicon =='yes'){
        jQuery('#setting_interiart_favicon').slideDown();
    }else{
        jQuery('#setting_interiart_favicon').slideUp();
    }

    jQuery('#interiart_favicon_onoff').change(function(){
        if(jQuery(this).attr('value')=='yes'){
            jQuery('#setting_interiart_favicon').slideDown();
        }else{
            jQuery('#setting_interiart_favicon').slideUp();
        }
    });

// footer option type 1

    jQuery('#interiart_footer_columns').change(function(){

        var footerchange = jQuery(this).attr('value');

        switch (footerchange){
            case'1':
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideUp();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiartfooterwidth1').slideDown();
                jQuery('#setting_interiartfooterwidth2').slideUp();
                jQuery('#setting_interiartfooterwidth3').slideUp();
                jQuery('#setting_interiartfooterwidth4').slideUp();
                break;
            case'2':
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiartfooterwidth1').slideDown();
                jQuery('#setting_interiartfooterwidth2').slideDown();
                jQuery('#setting_interiartfooterwidth3').slideUp();
                jQuery('#setting_interiartfooterwidth4').slideUp();
                break;
            case'3':
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiartfooterwidth1').slideDown();
                jQuery('#setting_interiartfooterwidth2').slideDown();
                jQuery('#setting_interiartfooterwidth3').slideDown();
                jQuery('#setting_interiartfooterwidth4').slideUp();
                break;
            case'4':
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiartfooterwidth1').slideDown();
                jQuery('#setting_interiartfooterwidth2').slideDown();
                jQuery('#setting_interiartfooterwidth3').slideDown();
                jQuery('#setting_interiartfooterwidth4').slideDown();
                break;
            default :
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiartfooterwidth1').slideDown();
                jQuery('#setting_interiartfooterwidth2').slideDown();
                jQuery('#setting_interiartfooterwidth3').slideDown();
                jQuery('#setting_interiartfooterwidth4').slideDown();
                break;
        }
    });
    var footervalue =  jQuery('#interiart_footer_columns').attr('value');

    switch (footervalue){
        case'1':
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideUp();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiartfooterwidth1').slideDown();
            jQuery('#setting_interiartfooterwidth2').slideUp();
            jQuery('#setting_interiartfooterwidth3').slideUp();
            jQuery('#setting_interiartfooterwidth4').slideUp();
            break;
        case'2':
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiartfooterwidth1').slideDown();
            jQuery('#setting_interiartfooterwidth2').slideDown();
            jQuery('#setting_interiartfooterwidth3').slideUp();
            jQuery('#setting_interiartfooterwidth4').slideUp();
            break;
        case'3':
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiartfooterwidth1').slideDown();
            jQuery('#setting_interiartfooterwidth2').slideDown();
            jQuery('#setting_interiartfooterwidth3').slideDown();
            jQuery('#setting_interiartfooterwidth4').slideUp();
            break;
        case'4':
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
            jQuery('#setting_interiartfooterwidth1').slideDown();
            jQuery('#setting_interiartfooterwidth2').slideDown();
            jQuery('#setting_interiartfooterwidth3').slideDown();
            jQuery('#setting_interiartfooterwidth4').slideDown();
            break;
        default :
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
            jQuery('#setting_interiartfooterwidth1').slideDown();
            jQuery('#setting_interiartfooterwidth2').slideDown();
            jQuery('#setting_interiartfooterwidth3').slideDown();
            jQuery('#setting_interiartfooterwidth4').slideDown();
            break;
    }

    // footer option type 2

    jQuery('#interiart_footerType2_columns').change(function(){

        var footertype2change = jQuery(this).attr('value');

        switch (footertype2change){
            case'1':
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideUp();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType2_width1').slideDown();
                jQuery('#setting_interiart_footerType2_width2').slideUp();
                jQuery('#setting_interiart_footerType2_width3').slideUp();
                jQuery('#setting_interiart_footerType2_width4').slideUp();
                break;
            case'2':
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType2_width1').slideDown();
                jQuery('#setting_interiart_footerType2_width2').slideDown();
                jQuery('#setting_interiart_footerType2_width3').slideUp();
                jQuery('#setting_interiart_footerType2_width4').slideUp();
                break;
            case'3':
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType2_width1').slideDown();
                jQuery('#setting_interiart_footerType2_width2').slideDown();
                jQuery('#setting_interiart_footerType2_width3').slideDown();
                jQuery('#setting_interiart_footerType2_width4').slideUp();
                break;
            case'4':
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiart_footerType2_width1').slideDown();
                jQuery('#setting_interiart_footerType2_width2').slideDown();
                jQuery('#setting_interiart_footerType2_width3').slideDown();
                jQuery('#setting_interiart_footerType2_width4').slideDown();
                break;
            default :
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiart_footerType2_width1').slideDown();
                jQuery('#setting_interiart_footerType2_width2').slideDown();
                jQuery('#setting_interiart_footerType2_width3').slideDown();
                jQuery('#setting_interiart_footerType2_width4').slideDown();
                break;
        }
    });
    var footertype2value =  jQuery('#interiart_footerType2_columns').attr('value');

    switch (footertype2value){
        case'1':
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideUp();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiart_footerType2_width1').slideDown();
            jQuery('#setting_interiart_footerType2_width2').slideUp();
            jQuery('#setting_interiart_footerType2_width3').slideUp();
            jQuery('#setting_interiart_footerType2_width4').slideUp();
            break;
        case'2':
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiart_footerType2_width1').slideDown();
            jQuery('#setting_interiart_footerType2_width2').slideDown();
            jQuery('#setting_interiart_footerType2_width3').slideUp();
            jQuery('#setting_interiart_footerType2_width4').slideUp();
            break;
        case'3':
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_interiart_footerType2_width1').slideDown();
            jQuery('#setting_interiart_footerType2_width2').slideDown();
            jQuery('#setting_interiart_footerType2_width3').slideDown();
            jQuery('#setting_interiart_footerType2_width4').slideUp();
            break;
        case'4':
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideDown();
            jQuery('#setting_interiart_footerType2_width1').slideDown();
            jQuery('#setting_interiart_footerType2_width2').slideDown();
            jQuery('#setting_interiart_footerType2_width3').slideDown();
            jQuery('#setting_interiart_footerType2_width4').slideDown();
            break;
        default :
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType2_image .option-tree-ui-radio-images:eq(3)').slideDown();
            jQuery('#setting_interiart_footerType2_width1').slideDown();
            jQuery('#setting_interiart_footerType2_width2').slideDown();
            jQuery('#setting_interiart_footerType2_width3').slideDown();
            jQuery('#setting_interiart_footerType2_width4').slideDown();
            break;
    }

    // footer option type 3

    jQuery('#interiart_footerType3_columns').change(function(){

        var footertype3change = jQuery(this).attr('value');

        switch (footertype3change){
            case'1':
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideUp();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType3_width1').slideDown();
                jQuery('#setting_interiart_footerType3_width2').slideUp();
                jQuery('#setting_interiart_footerType3_width3').slideUp();
                jQuery('#setting_interiart_footerType3_width4').slideUp();
                break;
            case'2':
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType3_width1').slideDown();
                jQuery('#setting_interiart_footerType3_width2').slideDown();
                jQuery('#setting_interiart_footerType3_width3').slideUp();
                jQuery('#setting_interiart_footerType3_width4').slideUp();
                break;
            case'3':
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_interiart_footerType3_width1').slideDown();
                jQuery('#setting_interiart_footerType3_width2').slideDown();
                jQuery('#setting_interiart_footerType3_width3').slideDown();
                jQuery('#setting_interiart_footerType3_width4').slideUp();
                break;
            case'4':
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiart_footerType3_width1').slideDown();
                jQuery('#setting_interiart_footerType3_width2').slideDown();
                jQuery('#setting_interiart_footerType3_width3').slideDown();
                jQuery('#setting_interiart_footerType3_width4').slideDown();
                break;
            default :
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_interiart_footerType3_width1').slideDown();
                jQuery('#setting_interiart_footerType3_width2').slideDown();
                jQuery('#setting_interiart_footerType3_width3').slideDown();
                jQuery('#setting_interiart_footerType3_width4').slideDown();
                break;
        }
    });
    var footerType3value =  jQuery('#interiart_footerType3_columns').attr('value');

    switch (footerType3value){
        case'1':
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideUp();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'2':
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'3':
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'4':
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideDown();
            break;
        default :
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_interiartfooterType3_image .option-tree-ui-radio-images:eq(3)').slideDown();
            break;
    }
});



// Background Type Event

jQuery('#interiart_background_type').on('change', function () {
    "use strict";

    var value = jQuery(this).val();
    if (String(value) === 'none') {
        jQuery('#setting_interiart_background_pattern, ' +
            '#setting_interiart_background_single_image').slideUp();
        jQuery('#setting_interiart_TZBackgroundColor').slideDown();
    }else if (String(value) === 'pattern') {
        jQuery('#setting_interiart_background_pattern').slideDown();
        jQuery('#setting_interiart_background_single_image').slideUp();
        jQuery('#setting_interiart_TZBackgroundColor').slideUp();
    }else {
        jQuery('#setting_interiart_background_pattern').slideUp();
        jQuery('#setting_interiart_background_single_image').slideDown();
        jQuery('#setting_interiart_TZBackgroundColor').slideUp();
    }
});

var background_type = jQuery('#interiart_background_type').val();
if (String(background_type) === 'none') {
    jQuery('#setting_interiart_background_pattern, ' +
        '#setting_interiart_background_single_image').slideUp();
    jQuery('#setting_interiart_TZBackgroundColor').slideDown();
}else if (String(background_type) === 'pattern') {
    jQuery('#setting_interiart_background_pattern').slideDown();
    jQuery('#setting_interiart_background_single_image').slideUp();
} else {
    jQuery('#setting_interiart_background_pattern').slideUp();
    jQuery('#setting_interiart_background_single_image').slideDown();

}

// Background Pattern Preview
jQuery('#setting_interiart_background_pattern .background_pattern').on('click', function () {
    "use strict";
    if (jQuery('#wpcontent').length > 0) {
        jQuery('#wpcontent').css('background', 'url("' + jQuery(this).attr('src') + '") repeat');
    }
});