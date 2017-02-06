/*global jQuery: false, themeprefix: false */

jQuery(function(){
  "use strict";

  var $type_value = jQuery('#interiart_portfolio_type').val();
  switch ($type_value) {
      case 'image':
          jQuery('#setting_interiart_portfolio_image').slideDown();
          jQuery('#setting_interiart_portfolio_slideshows').slideUp();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_interiart_portfolio_video_type').slideUp();
          jQuery('#setting_interiart_portfolio_video').slideUp();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
          jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
          jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
          jQuery('#setting_interiart_portfolio_video_webm').slideUp();
          break;
      case 'slideshows':
          jQuery('#setting_interiart_portfolio_image').slideUp();
          jQuery('#setting_interiart_portfolio_slideshows').slideDown();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_interiart_portfolio_video_type').slideUp();
          jQuery('#setting_interiart_portfolio_video').slideUp();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
          jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
          jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
          jQuery('#setting_interiart_portfolio_video_webm').slideUp();
          break;
      case 'audio':
          jQuery('#setting_interiart_portfolio_image').slideUp();
          jQuery('#setting_interiart_portfolio_slideshows').slideUp();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideDown();
          jQuery('#setting_interiart_portfolio_video_type').slideUp();
          jQuery('#setting_interiart_portfolio_video').slideUp();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
          jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
          jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
          jQuery('#setting_interiart_portfolio_video_webm').slideUp();
          break;
      case 'video':
          jQuery('#setting_interiart_portfolio_image').slideUp();
          jQuery('#setting_interiart_portfolio_slideshows').slideUp();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_interiart_portfolio_video_type').slideDown();
          jQuery('#setting_interiart_portfolio_video').slideDown();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
          jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
          jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
          jQuery('#setting_interiart_portfolio_video_webm').slideUp();
          break;
      case 'videohtml5':
          jQuery('#setting_interiart_portfolio_image').slideUp();
          jQuery('#setting_interiart_portfolio_slideshows').slideUp();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_interiart_portfolio_video_type').slideUp();
          jQuery('#setting_interiart_portfolio_video').slideUp();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideDown();
          jQuery('#setting_interiart_portfolio_video_mp4').slideDown();
          jQuery('#setting_interiart_portfolio_video_ogv').slideDown();
          jQuery('#setting_interiart_portfolio_video_webm').slideDown();
          break;
      default :
          jQuery('#setting_interiart_portfolio_image').slideUp();
          jQuery('#setting_interiart_portfolio_slideshows').slideUp();
          jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_interiart_portfolio_video_type').slideUp();
          jQuery('#setting_interiart_portfolio_video').slideUp();
          jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
          jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
          jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
          jQuery('#setting_interiart_portfolio_video_webm').slideUp();
          break;
  }

    jQuery('#interiart_portfolio_type').change(function(){
        switch (jQuery(this).val()) {
            case 'image':
                jQuery('#setting_interiart_portfolio_image').slideDown();
                jQuery('#setting_interiart_portfolio_slideshows').slideUp();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_interiart_portfolio_video_type').slideUp();
                jQuery('#setting_interiart_portfolio_video').slideUp();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
                jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
                jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
                jQuery('#setting_interiart_portfolio_video_webm').slideUp();
                break;
            case 'slideshows':
                jQuery('#setting_interiart_portfolio_image').slideUp();
                jQuery('#setting_interiart_portfolio_slideshows').slideDown();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_interiart_portfolio_video_type').slideUp();
                jQuery('#setting_interiart_portfolio_video').slideUp();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
                jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
                jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
                jQuery('#setting_interiart_portfolio_video_webm').slideUp();
                break;
            case 'audio':
                jQuery('#setting_interiart_portfolio_image').slideUp();
                jQuery('#setting_interiart_portfolio_slideshows').slideUp();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideDown();
                jQuery('#setting_interiart_portfolio_video_type').slideUp();
                jQuery('#setting_interiart_portfolio_video').slideUp();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
                jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
                jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
                jQuery('#setting_interiart_portfolio_video_webm').slideUp();
                break;
            case 'video':
                jQuery('#setting_interiart_portfolio_image').slideUp();
                jQuery('#setting_interiart_portfolio_slideshows').slideUp();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_interiart_portfolio_video_type').slideDown();
                jQuery('#setting_interiart_portfolio_video').slideDown();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
                jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
                jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
                jQuery('#setting_interiart_portfolio_video_webm').slideUp();
                break;
            case 'videohtml5':
                jQuery('#setting_interiart_portfolio_image').slideUp();
                jQuery('#setting_interiart_portfolio_slideshows').slideUp();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_interiart_portfolio_video_type').slideUp();
                jQuery('#setting_interiart_portfolio_video').slideUp();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideDown();
                jQuery('#setting_interiart_portfolio_video_mp4').slideDown();
                jQuery('#setting_interiart_portfolio_video_ogv').slideDown();
                jQuery('#setting_interiart_portfolio_video_webm').slideDown();
                break;
            default :
                jQuery('#setting_interiart_portfolio_image').slideUp();
                jQuery('#setting_interiart_portfolio_slideshows').slideUp();
                jQuery('#setting_interiart_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_interiart_portfolio_video_type').slideUp();
                jQuery('#setting_interiart_portfolio_video').slideUp();
                jQuery('#setting_interiart_portfolio_bgvideo_image').slideUp();
                jQuery('#setting_interiart_portfolio_video_mp4').slideUp();
                jQuery('#setting_interiart_portfolio_video_ogv').slideUp();
                jQuery('#setting_interiart_portfolio_video_webm').slideUp();
                break;
        }
    });


  var $checkpage = jQuery('#page_template').val();
    switch ($checkpage){
        case 'template-portfolio.php':
            jQuery('#page_meta_box').css('display','block');
            jQuery('#page_blog_meta_box').css('display','none');
            jQuery('#blogColumn_meta_box').css('display','none');
            break;
        case 'template-blog.php':
            jQuery('#page_meta_box').css('display','none');
            jQuery('#page_blog_meta_box').css('display','block');
            jQuery('#blogColumn_meta_box').css('display','none');
            break;
        case 'template-blogcolumn.php':
            jQuery('#page_meta_box').css('display','none');
            jQuery('#page_blog_meta_box').css('display','none');
            jQuery('#blogColumn_meta_box').css('display','block');
            break
        default :
            jQuery('#page_meta_box').css('display','none');
            jQuery('#page_blog_meta_box').css('display','none');
            jQuery('#blogColumn_meta_box').css('display','none');
            break;

    }

  jQuery('#page_template').change(function(){
     var $value = jQuery(this).val();
      switch ($value){
          case 'template-portfolio.php':
              jQuery('#page_meta_box').css('display','block');
              jQuery('#page_blog_meta_box').css('display','none');
              jQuery('#blogColumn_meta_box').css('display','none');
              break;
          case 'template-blog.php':
              jQuery('#page_meta_box').css('display','none');
              jQuery('#page_blog_meta_box').css('display','block');
              jQuery('#blogColumn_meta_box').css('display','none');
              break;
          case 'template-blogcolumn.php':
              jQuery('#page_meta_box').css('display','none');
              jQuery('#page_blog_meta_box').css('display','none');
              jQuery('#blogColumn_meta_box').css('display','block');
              break
          default :
              jQuery('#page_meta_box').css('display','none');
              jQuery('#page_blog_meta_box').css('display','none');
              jQuery('#blogColumn_meta_box').css('display','none');
              break;

      }
  });

    // jquery height option of portfolio

    var height_option = jQuery('#interiart_option_height').attr('value');
    if(height_option == 'auto'){
        jQuery('#setting_interiart_height_value').slideUp();
    }else{
        jQuery('#setting_interiart_height_value').slideDown();
    }

    jQuery('#interiart_option_height').change(function(){
        if(jQuery(this).attr('value')=='auto'){
            jQuery('#setting_interiart_height_value').slideUp();
        }else{
            jQuery('#setting_interiart_height_value').slideDown();
        }
    })

    // jquery loading option portfolio

    var $loading_option = jQuery('#interiart_paging').attr('value');
    switch ($loading_option) {
        case 'pagenavi':
            jQuery('#setting_interiart_porfolio_loadding').slideUp();
            jQuery('#setting_interiart_ajaxbutton_text').slideUp();
            break;
        case 'ajaxbutton':
            jQuery('#setting_interiart_porfolio_loadding').slideDown();
            jQuery('#setting_interiart_ajaxbutton_text').slideDown();
            break;
        case 'ajaxscroll':
            jQuery('#setting_interiart_porfolio_loadding').slideUp();
            jQuery('#setting_interiart_ajaxbutton_text').slideUp();
            break;
        default :
            jQuery('#setting_interiart_porfolio_loadding').slideUp();
            jQuery('#setting_interiart_ajaxbutton_text').slideUp();
            break;
    }

    jQuery('#interiart_paging').change(function(){
        var $loading_option = jQuery(this).val();
        switch ($loading_option) {
            case 'pagenavi':
                jQuery('#setting_interiart_porfolio_loadding').slideUp();
                jQuery('#setting_interiart_ajaxbutton_text').slideUp();
                break;
            case 'ajaxbutton':
                jQuery('#setting_interiart_porfolio_loadding').slideDown();
                jQuery('#setting_interiart_ajaxbutton_text').slideDown();
                break;
            case 'ajaxscroll':
                jQuery('#setting_interiart_porfolio_loadding').slideUp();
                jQuery('#setting_interiart_ajaxbutton_text').slideUp();
                break;
            default :
                jQuery('#setting_interiart_porfolio_loadding').slideUp();
                jQuery('#setting_interiart_ajaxbutton_text').slideUp();
                break;
        }
    });

    // jquery fillter option of portfolio

    var fillter_option = jQuery('#interiart_porfolio_filter_status').attr('value');
    if(fillter_option == 'show'){
        jQuery('#setting_interiart_porfolio_filter').slideDown();
    }else{
        jQuery('#setting_interiart_porfolio_filter').slideUp();
    }

    jQuery('#interiart_porfolio_filter_status').change(function(){
        if(jQuery(this).attr('value')=='show'){
            jQuery('#setting_interiart_porfolio_filter').slideDown();
        }else{
            jQuery('#setting_interiart_porfolio_filter').slideUp();
        }
    })

});
