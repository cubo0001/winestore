/*! Max Mega Menu jQuery Plugin */
(function($){"use strict";$.maxmegamenu=function(menu,options){var plugin=this;var $menu=$(menu);var defaults={event:$menu.attr("data-event"),effect:$menu.attr("data-effect"),effect_speed:parseInt($menu.attr("data-effect-speed")),panel_width:$menu.attr("data-panel-width"),panel_inner_width:$menu.attr("data-panel-inner-width"),second_click:$menu.attr("data-second-click"),vertical_behaviour:$menu.attr("data-vertical-behaviour"),document_click:$menu.attr("data-document-click"),breakpoint:$menu.attr("data-breakpoint"),unbind_events:$menu.attr("data-unbind")};plugin.settings={};plugin.hidePanel=function(anchor,immediate){if(!immediate&&plugin.settings.effect=='slide'){anchor.siblings(".mega-sub-menu").animate({"height":"hide"},plugin.settings.effect_speed,function(){anchor.siblings(".mega-sub-menu").css("display","");anchor.parent().removeClass("mega-toggle-on").triggerHandler("close_panel");});return;}
if(immediate){anchor.siblings(".mega-sub-menu").css("display","none").delay(plugin.settings.effect_speed).queue(function(){$(this).css("display","").dequeue();});}
anchor.parent().removeClass("mega-toggle-on").triggerHandler("close_panel");plugin.addAnimatingClass(anchor.parent());};plugin.addAnimatingClass=function(element){if(plugin.settings.effect==="disabled"){return;}
$(".mega-animating").removeClass("mega-animating");var timeout=plugin.settings.effect_speed+parseInt(megamenu.timeout,10);element.addClass("mega-animating");setTimeout(function(){element.removeClass("mega-animating");},timeout);};plugin.hideAllPanels=function(){$(".mega-toggle-on > a.mega-menu-link",$menu).each(function(){plugin.hidePanel($(this),false);});};plugin.hideSiblingPanels=function(anchor,immediate){anchor.parent().parent().find(".mega-toggle-on").children("a.mega-menu-link").each(function(){plugin.hidePanel($(this),immediate);});};plugin.isDesktopView=function(){return Math.max(window.outerWidth,$(window).width())>=plugin.settings.breakpoint;};plugin.isMobileView=function(){return!plugin.isDesktopView();};plugin.showPanel=function(anchor){$(".mega-animating").removeClass("mega-animating");if(plugin.isMobileView()&&anchor.parent().hasClass("mega-hide-sub-menu-on-mobile")){return;}
if(plugin.isDesktopView()&&($menu.hasClass("mega-menu-horizontal")||$menu.hasClass("mega-menu-vertical"))){plugin.hideSiblingPanels(anchor,true);}
if((plugin.isMobileView()&&$menu.hasClass("mega-keyboard-navigation"))||plugin.settings.vertical_behaviour==="accordion"){plugin.hideSiblingPanels(anchor,false);}
plugin.calculateDynamicSubmenuWidths(anchor);if(plugin.settings.effect=="slide"){anchor.siblings(".mega-sub-menu").css("display","none").animate({'height':'show'},plugin.settings.effect_speed);}
anchor.parent().addClass("mega-toggle-on").triggerHandler("open_panel");};plugin.calculateDynamicSubmenuWidths=function(anchor){if(anchor.parent().hasClass("mega-menu-megamenu")&&plugin.settings.panel_width&&$(plugin.settings.panel_width).length>0){if(plugin.isDesktopView()){var submenu_offset=$menu.offset();var target_offset=$(plugin.settings.panel_width).offset();anchor.siblings(".mega-sub-menu").css({width:$(plugin.settings.panel_width).outerWidth(),left:(target_offset.left-submenu_offset.left)+"px"});}else{anchor.siblings(".mega-sub-menu").css({width:"",left:""});}}
if(anchor.parent().hasClass("mega-menu-megamenu")&&plugin.settings.panel_inner_width&&$(plugin.settings.panel_inner_width).length>0){var target_width=0;if($(plugin.settings.panel_inner_width).length){target_width=parseInt($(plugin.settings.panel_inner_width).width(),10);}else{target_width=parseInt(plugin.settings.panel_inner_width,10);}
var submenu_width=parseInt(anchor.siblings(".mega-sub-menu").innerWidth(),10);if(plugin.isDesktopView()&&target_width>0&&target_width<submenu_width){anchor.siblings(".mega-sub-menu").css({"paddingLeft":(submenu_width-target_width)/2+"px","paddingRight":(submenu_width-target_width)/2+"px"});}else{anchor.siblings(".mega-sub-menu").css({"paddingLeft":"","paddingRight":""});}}}
var bindClickEvents=function(){var dragging=false;$(document).on({"touchmove":function(e){dragging=true;},"touchstart":function(e){dragging=false;}});$(document).on("click touchend",function(e){if(!dragging&&plugin.settings.document_click==="collapse"&&!$(e.target).closest(".mega-menu li").length){plugin.hideAllPanels();}
dragging=false;});var items_with_submenus=$("li.mega-menu-megamenu.mega-menu-item-has-children > a.mega-menu-link, li.mega-menu-flyout.mega-menu-item-has-children > a.mega-menu-link, li.mega-menu-tabbed > ul.mega-sub-menu > li.mega-menu-item-has-children > a.mega-menu-link, li.mega-menu-flyout li.mega-menu-item-has-children > a.mega-menu-link",menu);items_with_submenus.on("click.megamenu touchend.megamenu",function(e){if(plugin.isDesktopView()&&$(this).parent().hasClass("mega-toggle-on")&&$(this).parent().parent().parent().hasClass("mega-menu-tabbed")){e.preventDefault();return;}
if(dragging){return;}
if(plugin.isMobileView()&&$(this).parent().hasClass("mega-hide-sub-menu-on-mobile")){return;}
if(plugin.settings.second_click==="go"||$(this).parent().hasClass("mega-click-click-go")){if(!$(this).parent().hasClass("mega-toggle-on")){e.preventDefault();plugin.showPanel($(this));}}else{e.preventDefault();if($(this).parent().hasClass("mega-toggle-on")){plugin.hidePanel($(this),false);}else{plugin.showPanel($(this));}}});};var bindHoverEvents=function(){$("li.mega-menu-item-has-children",menu).not("li.mega-menu-megamenu:not(.mega-menu-tabbed) li.mega-menu-item-has-children",menu).on({mouseenter:function(){plugin.unbindClickEvents();if(!$(this).hasClass("mega-toggle-on")){plugin.showPanel($(this).children("a.mega-menu-link"));}},mouseleave:function(){if($(this).hasClass("mega-toggle-on")&&!$(this).parent().parent().hasClass("mega-menu-tabbed")){plugin.hidePanel($(this).children("a.mega-menu-link"),false);}}});};var bindHoverIntentEvents=function(){$("li.mega-menu-item-has-children",menu).not("li.mega-menu-megamenu:not(.mega-menu-tabbed) li.mega-menu-item-has-children",menu).hoverIntent({over:function(){plugin.unbindClickEvents();if(!$(this).hasClass("mega-toggle-on")){plugin.showPanel($(this).children("a.mega-menu-link"));}},out:function(){if($(this).hasClass("mega-toggle-on")&&!$(this).parent().parent().hasClass("mega-menu-tabbed")){plugin.hidePanel($(this).children("a.mega-menu-link"),false);}},timeout:megamenu.timeout,interval:megamenu.interval});};plugin.unbindClickEvents=function(){$("a.mega-menu-link",menu).off("click.megamenu touchend.megamenu");};plugin.keyboardNavigation=function(){var tab_key=9;var escape_key=27;$("body").on("keyup",function(e){var keyCode=e.keyCode||e.which;if(keyCode===escape_key){$menu.removeClass("mega-keyboard-navigation");plugin.hideAllPanels();}
if($menu.hasClass("mega-keyboard-navigation")&&!$(event.target).closest(".mega-menu li").length){$menu.removeClass("mega-keyboard-navigation");plugin.hideAllPanels();}});$menu.parent().on("keyup",function(e){var keyCode=e.keyCode||e.which;var active_link=$(e.target);if(keyCode===tab_key){$menu.addClass("mega-keyboard-navigation");if(active_link.parent().hasClass("mega-menu-item-has-children")){plugin.showPanel(active_link);}else if(active_link.parent().parent().hasClass("mega-menu")){plugin.hideAllPanels();}
if(active_link.hasClass("mega-menu-toggle")){active_link.toggleClass("mega-menu-open");}}});};plugin.unbindAllEvents=function(){$("ul.mega-sub-menu, li.mega-menu-item, a.mega-menu-link",menu).off().unbind();};plugin.bindMegaMenuEvents=function(){if(plugin.isDesktopView()&&plugin.settings.event==="hover_intent"){bindHoverIntentEvents();}
if(plugin.isDesktopView()&&plugin.settings.event==="hover"){bindHoverEvents();}
bindClickEvents();};plugin.monitorView=function(){if(plugin.isDesktopView()){$menu.data("view","desktop");}else{$menu.data("view","mobile");plugin.switchToMobile();}
plugin.checkWidth();$(window).resize(function(){plugin.checkWidth();});};plugin.checkWidth=function(){if(plugin.isMobileView()&&$menu.data("view")==="desktop"){$menu.data("view","mobile");plugin.switchToMobile();}
if(plugin.isDesktopView()&&$menu.data("view")==="mobile"){$menu.data("view","desktop");plugin.switchToDesktop();}
if(plugin.isDesktopView()){plugin.calculateDynamicSubmenuWidths($("li.mega-menu-megamenu.mega-toggle-on > a.mega-menu-link",$menu));}};plugin.reverseRightAlignedItems=function(){$menu.append($menu.children("li.mega-item-align-right").get().reverse());};plugin.switchToMobile=function(){plugin.unbindAllEvents();plugin.bindMegaMenuEvents();plugin.reverseRightAlignedItems();plugin.hideAllPanels();};plugin.switchToDesktop=function(){plugin.unbindAllEvents();plugin.bindMegaMenuEvents();plugin.reverseRightAlignedItems();plugin.hideAllPanels();};plugin.init=function(){$menu.triggerHandler("before_mega_menu_init");plugin.settings=$.extend({},defaults,options);$menu.removeClass("mega-no-js");$menu.siblings(".mega-menu-toggle").on("click",function(e){if($(e.target).is(".mega-menu-toggle-block, .mega-menu-toggle")){$(this).toggleClass("mega-menu-open");}});if(plugin.settings.unbind_events=='true'){plugin.unbindAllEvents();}
plugin.bindMegaMenuEvents();plugin.monitorView();plugin.keyboardNavigation();$menu.triggerHandler("after_mega_menu_init");};plugin.init();};$.fn.maxmegamenu=function(options){return this.each(function(){if(undefined===$(this).data("maxmegamenu")){var plugin=new $.maxmegamenu(this,options);$(this).data("maxmegamenu",plugin);}});};$(function(){$(".mega-menu").maxmegamenu();});})(jQuery);
;!function(a,b){"use strict";function c(){if(!e){e=!0;var a,c,d,f,g=-1!==navigator.appVersion.indexOf("MSIE 10"),h=!!navigator.userAgent.match(/Trident.*rv:11\./),i=b.querySelectorAll("iframe.wp-embedded-content");for(c=0;c<i.length;c++){if(d=i[c],!d.getAttribute("data-secret"))f=Math.random().toString(36).substr(2,10),d.src+="#?secret="+f,d.setAttribute("data-secret",f);if(g||h)a=d.cloneNode(!0),a.removeAttribute("security"),d.parentNode.replaceChild(a,d)}}}var d=!1,e=!1;if(b.querySelector)if(a.addEventListener)d=!0;if(a.wp=a.wp||{},!a.wp.receiveEmbedMessage)if(a.wp.receiveEmbedMessage=function(c){var d=c.data;if(d.secret||d.message||d.value)if(!/[^a-zA-Z0-9]/.test(d.secret)){var e,f,g,h,i,j=b.querySelectorAll('iframe[data-secret="'+d.secret+'"]'),k=b.querySelectorAll('blockquote[data-secret="'+d.secret+'"]');for(e=0;e<k.length;e++)k[e].style.display="none";for(e=0;e<j.length;e++)if(f=j[e],c.source===f.contentWindow){if(f.removeAttribute("style"),"height"===d.message){if(g=parseInt(d.value,10),g>1e3)g=1e3;else if(~~g<200)g=200;f.height=g}if("link"===d.message)if(h=b.createElement("a"),i=b.createElement("a"),h.href=f.getAttribute("src"),i.href=d.value,i.host===h.host)if(b.activeElement===f)a.top.location.href=d.value}else;}},d)a.addEventListener("message",a.wp.receiveEmbedMessage,!1),b.addEventListener("DOMContentLoaded",c,!1),a.addEventListener("load",c,!1)}(window,document);
;var woof_redirect='';jQuery(function(){jQuery('body').append('<div id="woof_html_buffer" class="woof_info_popup" style="display: none;"></div>');jQuery.fn.life=function(types,data,fn){jQuery(this.context).on(types,this.selector,data,fn);return this;};jQuery.extend(jQuery.fn,{within:function(pSelector){return this.filter(function(){return jQuery(this).closest(pSelector).length;});}});if(jQuery('#woof_results_by_ajax').length>0){woof_is_ajax=1;}
woof_autosubmit=parseInt(jQuery('.woof').eq(0).data('autosubmit'),10);woof_ajax_redraw=parseInt(jQuery('.woof').eq(0).data('ajax-redraw'),10);woof_ext_init_functions=jQuery.parseJSON(woof_ext_init_functions);woof_init_native_woo_price_filter();jQuery('body').bind('price_slider_change',function(event,min,max){if(woof_autosubmit&&!woof_show_price_search_button&&jQuery('.price_slider_wrapper').length<2){jQuery('.woof .widget_price_filter form').trigger('submit');}else{var min_price=jQuery(this).find('.price_slider_amount #min_price').val();var max_price=jQuery(this).find('.price_slider_amount #max_price').val();woof_current_values.min_price=min_price;woof_current_values.max_price=max_price;}});jQuery('.woof_price_filter_dropdown').life('change',function(){var val=jQuery(this).val();if(parseInt(val,10)==-1){delete woof_current_values.min_price;delete woof_current_values.max_price;}else{var val=val.split("-");woof_current_values.min_price=val[0];woof_current_values.max_price=val[1];}
if(woof_autosubmit||jQuery(this).within('.woof').length==0){woof_submit_link(woof_get_submit_link());}});woof_recount_text_price_filter();jQuery('.woof_price_filter_txt').life('change',function(){var from=parseInt(jQuery(this).parent().find('.woof_price_filter_txt_from').val(),10);var to=parseInt(jQuery(this).parent().find('.woof_price_filter_txt_to').val(),10);if(to<from||from===0){delete woof_current_values.min_price;delete woof_current_values.max_price;}else{if(typeof woocs_current_currency!=='undefined'){from=Math.ceil(from/parseFloat(woocs_current_currency.rate));to=Math.ceil(to/parseFloat(woocs_current_currency.rate));}
woof_current_values.min_price=from;woof_current_values.max_price=to;}
if(woof_autosubmit||jQuery(this).within('.woof').length==0){woof_submit_link(woof_get_submit_link());}});jQuery('.woof_open_hidden_li_btn').life('click',function(){var state=jQuery(this).data('state');var type=jQuery(this).data('type');if(state=='closed'){jQuery(this).parents('.woof_list').find('.woof_hidden_term').addClass('woof_hidden_term2');jQuery(this).parents('.woof_list').find('.woof_hidden_term').removeClass('woof_hidden_term');if(type=='image'){jQuery(this).find('img').attr('src',jQuery(this).data('opened'));}else{jQuery(this).html(jQuery(this).data('opened'));}
jQuery(this).data('state','opened');}else{jQuery(this).parents('.woof_list').find('.woof_hidden_term2').addClass('woof_hidden_term');jQuery(this).parents('.woof_list').find('.woof_hidden_term2').removeClass('woof_hidden_term2');if(type=='image'){jQuery(this).find('img').attr('src',jQuery(this).data('closed'));}else{jQuery(this).text(jQuery(this).data('closed'));}
jQuery(this).data('state','closed');}
return false;});woof_open_hidden_li();jQuery('.widget_rating_filter li.wc-layered-nav-rating a').click(function(){var is_chosen=jQuery(this).parent().hasClass('chosen');var parsed_url=woof_parse_url(jQuery(this).attr('href'));var rate=0;if(parsed_url.query!==undefined){if(parsed_url.query.indexOf('min_rating')!==-1){var arrayOfStrings=parsed_url.query.split('min_rating=');rate=parseInt(arrayOfStrings[1],10);}}
jQuery(this).parents('ul').find('li').removeClass('chosen');if(is_chosen){delete woof_current_values.min_rating;}else{woof_current_values.min_rating=rate;jQuery(this).parent().addClass('chosen');}
woof_submit_link(woof_get_submit_link());return false;});jQuery('.woof_start_filtering_btn').life('click',function(){var shortcode=jQuery(this).parents('.woof.woof_sid').data('shortcode');jQuery(this).html(woof_lang_loading);jQuery(this).addClass('woof_start_filtering_btn2');jQuery(this).removeClass('woof_start_filtering_btn');var data={action:"woof_draw_products",page:1,shortcode:'woof_nothing',woof_shortcode:shortcode};jQuery.post(woof_ajaxurl,data,function(content){content=jQuery.parseJSON(content);jQuery('div.woof_redraw_zone').replaceWith(jQuery(content.form).find('.woof_redraw_zone'));woof_mass_reinit();});return false;});window.onpopstate=function(event){try{if(Object.keys(woof_current_values).length){woof_show_info_popup(woof_lang_loading);window.location.reload();return false;}}catch(e){console.log(e);}};woof_init_ion_sliders();woof_init_show_auto_form();woof_init_hide_auto_form();woof_remove_empty_elements();woof_init_search_form();woof_init_pagination();woof_init_orderby();woof_init_reset_button();woof_init_beauty_scroll();woof_draw_products_top_panel();woof_shortcode_observer();if(!woof_is_ajax){woof_redirect_init();}
woof_init_toggles();});function woof_redirect_init(){try{if(jQuery('.woof').length){if(undefined!==jQuery('.woof').val()){woof_redirect=jQuery('.woof').eq(0).data('redirect');if(woof_redirect.length>0){woof_shop_page=woof_current_page_link=woof_redirect;}
return woof_redirect;}}}catch(e){console.log(e);}}
function woof_init_orderby(){jQuery('form.woocommerce-ordering').life('submit',function(){return false;});jQuery('form.woocommerce-ordering select.orderby').life('change',function(){woof_current_values.orderby=jQuery(this).val();woof_ajax_page_num=1;woof_submit_link(woof_get_submit_link());return false;});}
function woof_init_reset_button(){jQuery('.woof_reset_search_form').life('click',function(){woof_ajax_page_num=1;if(woof_is_permalink){woof_current_values={};woof_submit_link(woof_get_submit_link().split("page/")[0]);}else{var link=woof_shop_page;if(woof_current_values.hasOwnProperty('page_id')){link=location.protocol+'//'+location.host+"/?page_id="+woof_current_values.page_id;woof_current_values={'page_id':woof_current_values.page_id};woof_get_submit_link();}
woof_submit_link(link);if(woof_is_ajax){history.pushState({},"",link);if(woof_current_values.hasOwnProperty('page_id')){woof_current_values={'page_id':woof_current_values.page_id};}else{woof_current_values={};}}}
return false;});}
function woof_init_pagination(){if(woof_is_ajax===1){jQuery('a.page-numbers').life('click',function(){var l=jQuery(this).attr('href');if(woof_ajax_first_done){var res=l.split("paged=");if(typeof res[1]!=='undefined'){woof_ajax_page_num=parseInt(res[1]);}else{woof_ajax_page_num=1;}}else{var res=l.split("page/");if(typeof res[1]!=='undefined'){woof_ajax_page_num=parseInt(res[1]);}else{woof_ajax_page_num=1;}}
{woof_submit_link(woof_get_submit_link());}
return false;});}}
function woof_init_search_form(){woof_init_checkboxes();woof_init_mselects();woof_init_radios();woof_init_selects();if(woof_ext_init_functions!==null){jQuery.each(woof_ext_init_functions,function(type,func){eval(func+'()');});}
jQuery('.woof_submit_search_form').click(function(){if(woof_ajax_redraw){woof_ajax_redraw=0;woof_is_ajax=0;}
woof_submit_link(woof_get_submit_link());return false;});jQuery('ul.woof_childs_list').parent('li').addClass('woof_childs_list_li');woof_remove_class_widget();woof_checkboxes_slide();}
var woof_submit_link_locked=false;function woof_submit_link(link){if(woof_submit_link_locked){return;}
woof_submit_link_locked=true;woof_show_info_popup(woof_lang_loading);if(woof_is_ajax===1&&!woof_ajax_redraw){woof_ajax_first_done=true;var data={action:"woof_draw_products",link:link,page:woof_ajax_page_num,shortcode:jQuery('#woof_results_by_ajax').data('shortcode'),woof_shortcode:jQuery('div.woof').data('shortcode')};jQuery.post(woof_ajaxurl,data,function(content){content=jQuery.parseJSON(content);if(jQuery('.woof_results_by_ajax_shortcode').length){jQuery('#woof_results_by_ajax').replaceWith(content.products);}else{jQuery('.woof_shortcode_output').replaceWith(content.products);}
jQuery('div.woof_redraw_zone').replaceWith(jQuery(content.form).find('.woof_redraw_zone'));woof_draw_products_top_panel();woof_mass_reinit();woof_submit_link_locked=false;jQuery.each(jQuery('#woof_results_by_ajax'),function(index,item){if(index==0){return;}
jQuery(item).removeAttr('id');});woof_js_after_ajax_done();});}else{if(woof_ajax_redraw){var data={action:"woof_draw_products",link:link,page:1,shortcode:'woof_nothing',woof_shortcode:jQuery('div.woof').eq(0).data('shortcode')};jQuery.post(woof_ajaxurl,data,function(content){content=jQuery.parseJSON(content);jQuery('div.woof_redraw_zone').replaceWith(jQuery(content.form).find('.woof_redraw_zone'));woof_mass_reinit();woof_submit_link_locked=false;});}else{window.location=link;}}}
function woof_remove_empty_elements(){jQuery.each(jQuery('.woof_container select'),function(index,select){var size=jQuery(select).find('option').size();if(size===0){jQuery(select).parents('.woof_container').remove();}});jQuery.each(jQuery('ul.woof_list'),function(index,ch){var size=jQuery(ch).find('li').size();if(size===0){jQuery(ch).parents('.woof_container').remove();}});}
function woof_get_submit_link(){if(woof_is_ajax){woof_current_values.page=woof_ajax_page_num;}
if(Object.keys(woof_current_values).length>0){jQuery.each(woof_current_values,function(index,value){if(index==swoof_search_slug){delete woof_current_values[index];}
if(index=='s'){delete woof_current_values[index];}
if(index=='product'){delete woof_current_values[index];}
if(index=='really_curr_tax'){delete woof_current_values[index];}});}
if(Object.keys(woof_current_values).length===2){if(('min_price'in woof_current_values)&&('max_price'in woof_current_values)){var l=woof_current_page_link+'?min_price='+woof_current_values.min_price+'&max_price='+woof_current_values.max_price;if(woof_is_ajax){history.pushState({},"",l);}
return l;}}
if(Object.keys(woof_current_values).length===0){if(woof_is_ajax){history.pushState({},"",woof_current_page_link);}
return woof_current_page_link;}
if(Object.keys(woof_really_curr_tax).length>0){woof_current_values['really_curr_tax']=woof_really_curr_tax.term_id+'-'+woof_really_curr_tax.taxonomy;}
var link=woof_current_page_link+"?"+swoof_search_slug+"=1";if(!woof_is_permalink){if(woof_redirect.length>0){link=woof_redirect+"?"+swoof_search_slug+"=1";if(woof_current_values.hasOwnProperty('page_id')){delete woof_current_values.page_id;}}else{link=location.protocol+'//'+location.host+"?"+swoof_search_slug+"=1";}}
var woof_exclude_accept_array=['path'];if(Object.keys(woof_current_values).length>0){jQuery.each(woof_current_values,function(index,value){if(index=='page'&&woof_is_ajax){index='paged';}
if(typeof value!=='undefined'){if((typeof value&&value.length>0)||typeof value=='number')
{if(jQuery.inArray(index,woof_exclude_accept_array)==-1){link=link+"&"+index+"="+value;}}}});}
link=link.replace(new RegExp(/page\/(\d+)\//),"");if(woof_is_ajax){history.pushState({},"",link);}
return link;}
function woof_show_info_popup(text){if(woof_overlay_skin=='default'){jQuery("#woof_html_buffer").text(text);jQuery("#woof_html_buffer").fadeTo(200,0.9);}else{switch(woof_overlay_skin){case'loading-balls':case'loading-bars':case'loading-bubbles':case'loading-cubes':case'loading-cylon':case'loading-spin':case'loading-spinning-bubbles':case'loading-spokes':jQuery('body').plainOverlay('show',{progress:function(){return jQuery('<div id="woof_svg_load_container"><img style="height: 100%;width: 100%" src="'+woof_link+'img/loading-master/'+woof_overlay_skin+'.svg" alt=""></div>');}});break;default:jQuery('body').plainOverlay('show',{duration:-1});break;}}}
function woof_hide_info_popup(){if(woof_overlay_skin=='default'){window.setTimeout(function(){jQuery("#woof_html_buffer").fadeOut(400);},200);}else{jQuery('body').plainOverlay('hide');}}
function woof_draw_products_top_panel(){if(jQuery('.woof_products_top_panel').length){if(woof_is_ajax){jQuery('#woof_results_by_ajax').prev('.woof_products_top_panel').remove();}
var panel=jQuery('.woof_products_top_panel');panel.html('');if(Object.keys(woof_current_values).length>0){panel.show();panel.html('<ul></ul>');var is_price_in=false;jQuery.each(woof_current_values,function(index,value){if(jQuery.inArray(index,woof_accept_array)==-1){return;}
if((index=='min_price'||index=='max_price')&&is_price_in){return;}
if((index=='min_price'||index=='max_price')&&!is_price_in){is_price_in=true;index='price';value=woof_lang_pricerange;}
value=value.toString().trim();if(value.search(',')){value=value.split(',');}
jQuery.each(value,function(i,v){if(index=='page'){return;}
if(index=='post_type'){return;}
var txt=v;if(index=='orderby'){if(woof_lang[v]!==undefined){txt=woof_lang.orderby+': '+woof_lang[v];}else{txt=woof_lang.orderby+': '+v;}}else if(index=='perpage'){txt=woof_lang.perpage;}else if(index=='price'){txt=woof_lang.pricerange;}else{var is_in_custom=false;if(Object.keys(woof_lang_custom).length>0){jQuery.each(woof_lang_custom,function(i,tt){if(i==index){is_in_custom=true;txt=tt;if(index=='woof_sku'){txt+=" "+v;}}});}
if(!is_in_custom){try{txt=jQuery("input[data-anchor='woof_n_"+index+'_'+v+"']").val();}catch(e){console.log(e);}
if(typeof txt==='undefined')
{txt=v;}}}
panel.find('ul').append(jQuery('<li>').append(jQuery('<a>').attr('href',v).attr('data-tax',index).append(jQuery('<span>').attr('class','woof_remove_ppi').append(txt))));});});}
if(jQuery(panel).find('li').size()==0){panel.hide();}
jQuery('.woof_remove_ppi').parent().click(function(){var tax=jQuery(this).data('tax');var name=jQuery(this).attr('href');if(tax!='price'){values=woof_current_values[tax];values=values.split(',');var tmp=[];jQuery.each(values,function(index,value){if(value!=name){tmp.push(value);}});values=tmp;if(values.length){woof_current_values[tax]=values.join(',');}else{delete woof_current_values[tax];}}else{delete woof_current_values['min_price'];delete woof_current_values['max_price'];}
woof_ajax_page_num=1;{woof_submit_link(woof_get_submit_link());}
jQuery('.woof_products_top_panel').find("[data-tax='"+tax+"'][href='"+name+"']").hide(333);return false;});}}
function woof_shortcode_observer(){if(jQuery('.woof_shortcode_output').length){woof_current_page_link=location.protocol+'//'+location.host+location.pathname;}
if(jQuery('#woof_results_by_ajax').length){woof_is_ajax=1;}}
function woof_init_beauty_scroll(){if(woof_use_beauty_scroll){try{var anchor=".woof_section_scrolled, .woof_sid_auto_shortcode .woof_container_radio .woof_block_html_items, .woof_sid_auto_shortcode .woof_container_checkbox .woof_block_html_items, .woof_sid_auto_shortcode .woof_container_label .woof_block_html_items";jQuery(""+anchor).mCustomScrollbar('destroy');jQuery(""+anchor).mCustomScrollbar({scrollButtons:{enable:true},advanced:{updateOnContentResize:true,updateOnBrowserResize:true},theme:"dark-2",horizontalScroll:false,mouseWheel:true,scrollType:'pixels',contentTouchScroll:true});}catch(e){console.log(e);}}}
function woof_remove_class_widget(){jQuery('.woof_container_inner').find('.widget').removeClass('widget');}
function woof_init_show_auto_form(){jQuery('.woof_show_auto_form').unbind('click');jQuery('.woof_show_auto_form').click(function(){var _this=this;jQuery(_this).addClass('woof_hide_auto_form').removeClass('woof_show_auto_form');jQuery(".woof_auto_show").show().animate({height:(jQuery(".woof_auto_show_indent").height()+20)+"px",opacity:1},377,function(){woof_init_hide_auto_form();jQuery('.woof_auto_show').removeClass('woof_overflow_hidden');jQuery('.woof_auto_show_indent').removeClass('woof_overflow_hidden');jQuery(".woof_auto_show").height('auto');});return false;});}
function woof_init_hide_auto_form(){jQuery('.woof_hide_auto_form').unbind('click');jQuery('.woof_hide_auto_form').click(function(){var _this=this;jQuery(_this).addClass('woof_show_auto_form').removeClass('woof_hide_auto_form');jQuery(".woof_auto_show").show().animate({height:"1px",opacity:0},377,function(){jQuery('.woof_auto_show').addClass('woof_overflow_hidden');jQuery('.woof_auto_show_indent').addClass('woof_overflow_hidden');woof_init_show_auto_form();});return false;});}
function woof_checkboxes_slide(){if(woof_checkboxes_slide_flag==true){var childs=jQuery('ul.woof_childs_list');if(childs.size()){jQuery.each(childs,function(index,ul){if(jQuery(ul).parents('.woof_no_close_childs').length){return;}
var span_class='woof_is_closed';if(jQuery(ul).find('input[type=checkbox],input[type=radio]').is(':checked')){jQuery(ul).show();span_class='woof_is_opened';}
jQuery(ul).before('<a href="javascript:void(0);" class="woof_childs_list_opener"><span class="'+span_class+'"></span></a>');});jQuery.each(jQuery('a.woof_childs_list_opener'),function(index,a){jQuery(a).click(function(){var span=jQuery(this).find('span');if(span.hasClass('woof_is_closed')){jQuery(this).parent().find('ul.woof_childs_list').first().show(333);span.removeClass('woof_is_closed');span.addClass('woof_is_opened');}else{jQuery(this).parent().find('ul.woof_childs_list').first().hide(333);span.removeClass('woof_is_opened');span.addClass('woof_is_closed');}
return false;});});}}}
function woof_init_ion_sliders(){jQuery.each(jQuery('.woof_range_slider'),function(index,input){try{jQuery(input).ionRangeSlider({min:jQuery(input).data('min'),max:jQuery(input).data('max'),from:jQuery(input).data('min-now'),to:jQuery(input).data('max-now'),type:'double',prefix:jQuery(input).data('slider-prefix'),postfix:jQuery(input).data('slider-postfix'),prettify:true,hideMinMax:false,hideFromTo:false,grid:true,step:jQuery(input).data('step'),onFinish:function(ui){woof_current_values.min_price=parseInt(ui.from,10);woof_current_values.max_price=parseInt(ui.to,10);if(typeof woocs_current_currency!=='undefined'){woof_current_values.min_price=Math.ceil(woof_current_values.min_price/parseFloat(woocs_current_currency.rate));woof_current_values.max_price=Math.ceil(woof_current_values.max_price/parseFloat(woocs_current_currency.rate));}
woof_ajax_page_num=1;if(woof_autosubmit||jQuery(input).within('.woof').length==0){woof_submit_link(woof_get_submit_link());}
return false;}});}catch(e){}});}
function woof_init_native_woo_price_filter(){jQuery('.widget_price_filter form').unbind('submit');jQuery('.widget_price_filter form').submit(function(){var min_price=jQuery(this).find('.price_slider_amount #min_price').val();var max_price=jQuery(this).find('.price_slider_amount #max_price').val();woof_current_values.min_price=min_price;woof_current_values.max_price=max_price;woof_ajax_page_num=1;if(woof_autosubmit||jQuery(input).within('.woof').length==0){woof_submit_link(woof_get_submit_link());}
return false;});}
function woof_reinit_native_woo_price_filter(){if(typeof woocommerce_price_slider_params==='undefined'){return false;}
jQuery('input#min_price, input#max_price').hide();jQuery('.price_slider, .price_label').show();var min_price=jQuery('.price_slider_amount #min_price').data('min'),max_price=jQuery('.price_slider_amount #max_price').data('max'),current_min_price=parseInt(min_price,10),current_max_price=parseInt(max_price,10);if(woof_current_values.hasOwnProperty('min_price')){current_min_price=parseInt(woof_current_values.min_price,10);current_max_price=parseInt(woof_current_values.max_price,10);}else{if(woocommerce_price_slider_params.min_price){current_min_price=parseInt(woocommerce_price_slider_params.min_price,10);}
if(woocommerce_price_slider_params.max_price){current_max_price=parseInt(woocommerce_price_slider_params.max_price,10);}}
jQuery(document.body).bind('price_slider_create price_slider_slide',function(event,min,max){if(typeof woocs_current_currency!=='undefined'){var label_min=min;var label_max=max;if(woocs_current_currency.rate!==1){label_min=Math.ceil(label_min*parseFloat(woocs_current_currency.rate));label_max=Math.ceil(label_max*parseFloat(woocs_current_currency.rate));}
label_min=number_format(label_min,2,'.',',');label_max=number_format(label_max,2,'.',',');if(jQuery.inArray(woocs_current_currency.name,woocs_array_no_cents)||woocs_current_currency.hide_cents==1){label_min=label_min.replace('.00','');label_max=label_max.replace('.00','');}
if(woocs_current_currency.position==='left'){jQuery('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol+label_min);jQuery('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol+label_max);}else if(woocs_current_currency.position==='left_space'){jQuery('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol+" "+label_min);jQuery('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol+" "+label_max);}else if(woocs_current_currency.position==='right'){jQuery('.price_slider_amount span.from').html(label_min+woocommerce_price_slider_params.currency_symbol);jQuery('.price_slider_amount span.to').html(label_max+woocommerce_price_slider_params.currency_symbol);}else if(woocs_current_currency.position==='right_space'){jQuery('.price_slider_amount span.from').html(label_min+" "+woocommerce_price_slider_params.currency_symbol);jQuery('.price_slider_amount span.to').html(label_max+" "+woocommerce_price_slider_params.currency_symbol);}}else{if(woocommerce_price_slider_params.currency_pos==='left'){jQuery('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol+min);jQuery('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol+max);}else if(woocommerce_price_slider_params.currency_pos==='left_space'){jQuery('.price_slider_amount span.from').html(woocommerce_price_slider_params.currency_symbol+' '+min);jQuery('.price_slider_amount span.to').html(woocommerce_price_slider_params.currency_symbol+' '+max);}else if(woocommerce_price_slider_params.currency_pos==='right'){jQuery('.price_slider_amount span.from').html(min+woocommerce_price_slider_params.currency_symbol);jQuery('.price_slider_amount span.to').html(max+woocommerce_price_slider_params.currency_symbol);}else if(woocommerce_price_slider_params.currency_pos==='right_space'){jQuery('.price_slider_amount span.from').html(min+' '+woocommerce_price_slider_params.currency_symbol);jQuery('.price_slider_amount span.to').html(max+' '+woocommerce_price_slider_params.currency_symbol);}}
jQuery(document.body).trigger('price_slider_updated',[min,max]);});jQuery('.price_slider').slider({range:true,animate:true,min:min_price,max:max_price,values:[current_min_price,current_max_price],create:function(){jQuery('.price_slider_amount #min_price').val(current_min_price);jQuery('.price_slider_amount #max_price').val(current_max_price);jQuery(document.body).trigger('price_slider_create',[current_min_price,current_max_price]);},slide:function(event,ui){jQuery('input#min_price').val(ui.values[0]);jQuery('input#max_price').val(ui.values[1]);jQuery(document.body).trigger('price_slider_slide',[ui.values[0],ui.values[1]]);},change:function(event,ui){jQuery(document.body).trigger('price_slider_change',[ui.values[0],ui.values[1]]);}});woof_init_native_woo_price_filter();}
function woof_mass_reinit(){woof_remove_empty_elements();woof_open_hidden_li();woof_init_search_form();woof_hide_info_popup();woof_init_beauty_scroll();woof_init_ion_sliders();woof_reinit_native_woo_price_filter();woof_recount_text_price_filter();woof_draw_products_top_panel();}
function woof_recount_text_price_filter(){if(typeof woocs_current_currency!=='undefined'){jQuery.each(jQuery('.woof_price_filter_txt_from, .woof_price_filter_txt_to'),function(i,item){jQuery(this).val(Math.ceil(jQuery(this).data('value')));});}}
function woof_init_toggles(){jQuery('.woof_front_toggle').life('click',function(){if(jQuery(this).data('condition')=='opened'){jQuery(this).removeClass('woof_front_toggle_opened');jQuery(this).addClass('woof_front_toggle_closed');jQuery(this).data('condition','closed');if(woof_toggle_type=='text'){jQuery(this).text(woof_toggle_closed_text);}else{jQuery(this).find('img').prop('src',woof_toggle_closed_image);}}else{jQuery(this).addClass('woof_front_toggle_opened');jQuery(this).removeClass('woof_front_toggle_closed');jQuery(this).data('condition','opened');if(woof_toggle_type=='text'){jQuery(this).text(woof_toggle_opened_text);}else{jQuery(this).find('img').prop('src',woof_toggle_opened_image);}}
jQuery(this).parents('.woof_container_inner').find('.woof_block_html_items').toggle(500);return false;});}
function woof_open_hidden_li(){if(jQuery('.woof_open_hidden_li_btn').length>0){jQuery.each(jQuery('.woof_open_hidden_li_btn'),function(i,b){if(jQuery(b).parents('ul').find('li.woof_hidden_term input[type=checkbox],li.woof_hidden_term input[type=radio]').is(':checked')){jQuery(b).trigger('click');}});}}
function $_woof_GET(q,s){s=(s)?s:window.location.search;var re=new RegExp('&'+q+'=([^&]*)','i');return(s=s.replace(/^\?/,'&').match(re))?s=s[1]:s='';}
function woof_parse_url(url){var pattern=RegExp("^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\\?([^#]*))?(#(.*))?");var matches=url.match(pattern);return{scheme:matches[2],authority:matches[4],path:matches[5],query:matches[7],fragment:matches[9]};};function woof_init_radios(){if(icheck_skin!='none'){jQuery('.woof_radio_term').iCheck('destroy');jQuery('.woof_radio_term').iCheck({radioClass:'iradio_'+icheck_skin.skin+'-'+icheck_skin.color,});jQuery('.woof_radio_term').unbind('ifChecked');jQuery('.woof_radio_term').on('ifChecked',function(event){jQuery(this).attr("checked",true);jQuery(this).parents('.woof_list').find('.woof_radio_term_reset').removeClass('woof_radio_term_reset_visible');jQuery(this).parents('.woof_list').find('.woof_radio_term_reset').hide();jQuery(this).parents('li').eq(0).find('.woof_radio_term_reset').eq(0).addClass('woof_radio_term_reset_visible');var slug=jQuery(this).data('slug');var name=jQuery(this).attr('name');var term_id=jQuery(this).data('term-id');woof_radio_direct_search(term_id,name,slug);});}else{jQuery('.woof_radio_term').on('change',function(event){jQuery(this).attr("checked",true);var slug=jQuery(this).data('slug');var name=jQuery(this).attr('name');var term_id=jQuery(this).data('term-id');woof_radio_direct_search(term_id,name,slug);});}
jQuery('.woof_radio_term_reset').click(function(){woof_radio_direct_search(jQuery(this).data('term-id'),jQuery(this).attr('name'),0);jQuery(this).parents('.woof_list').find('.checked').removeClass('checked');jQuery(this).parents('.woof_list').find('input[type=radio]').removeAttr('checked');jQuery(this).remove();return false;});}
function woof_radio_direct_search(term_id,name,slug){jQuery.each(woof_current_values,function(index,value){if(index==name){delete woof_current_values[name];return;}});if(slug!=0){woof_current_values[name]=slug;jQuery('a.woof_radio_term_reset_'+term_id).hide();jQuery('woof_radio_term_'+term_id).filter(':checked').parents('li').find('a.woof_radio_term_reset').show();jQuery('woof_radio_term_'+term_id).parents('ul.woof_list').find('label').css({'fontWeight':'normal'});jQuery('woof_radio_term_'+term_id).filter(':checked').parents('li').find('label.woof_radio_label_'+slug).css({'fontWeight':'bold'});}else{jQuery('a.woof_radio_term_reset_'+term_id).hide();jQuery('woof_radio_term_'+term_id).attr('checked',false);jQuery('woof_radio_term_'+term_id).parent().removeClass('checked');jQuery('woof_radio_term_'+term_id).parents('ul.woof_list').find('label').css({'fontWeight':'normal'});}
woof_ajax_page_num=1;if(woof_autosubmit){woof_submit_link(woof_get_submit_link());}};function woof_init_checkboxes(){if(icheck_skin!='none'){jQuery('.woof_checkbox_term').iCheck('destroy');jQuery('.woof_checkbox_term').iCheck({checkboxClass:'icheckbox_'+icheck_skin.skin+'-'+icheck_skin.color,});jQuery('.woof_checkbox_term').unbind('ifChecked');jQuery('.woof_checkbox_term').on('ifChecked',function(event){jQuery(this).attr("checked",true);woof_checkbox_process_data(this,true);});jQuery('.woof_checkbox_term').unbind('ifUnchecked');jQuery('.woof_checkbox_term').on('ifUnchecked',function(event){jQuery(this).attr("checked",false);woof_checkbox_process_data(this,false);});jQuery('.woof_checkbox_label').unbind();jQuery('label.woof_checkbox_label').click(function(){if(jQuery(this).prev().find('.woof_checkbox_term').is(':checked')){jQuery(this).prev().find('.woof_checkbox_term').trigger('ifUnchecked');jQuery(this).prev().removeClass('checked');}else{jQuery(this).prev().find('.woof_checkbox_term').trigger('ifChecked');jQuery(this).prev().addClass('checked');}
return false;});}else{jQuery('.woof_checkbox_term').on('change',function(event){if(jQuery(this).is(':checked')){jQuery(this).attr("checked",true);woof_checkbox_process_data(this,true);}else{jQuery(this).attr("checked",false);woof_checkbox_process_data(this,false);}});}}
function woof_checkbox_process_data(_this,is_checked){var tax=jQuery(_this).data('tax');var name=jQuery(_this).attr('name');var term_id=jQuery(_this).data('term-id');woof_checkbox_direct_search(term_id,name,tax,is_checked);}
function woof_checkbox_direct_search(term_id,name,tax,is_checked){var values='';var checked=true;if(is_checked){if(tax in woof_current_values){woof_current_values[tax]=woof_current_values[tax]+','+name;}else{woof_current_values[tax]=name;}
checked=true;}else{values=woof_current_values[tax];values=values.split(',');var tmp=[];jQuery.each(values,function(index,value){if(value!=name){tmp.push(value);}});values=tmp;if(values.length){woof_current_values[tax]=values.join(',');}else{delete woof_current_values[tax];}
checked=false;}
jQuery('.woof_checkbox_term_'+term_id).attr('checked',checked);woof_ajax_page_num=1;if(woof_autosubmit){woof_submit_link(woof_get_submit_link());}};function woof_init_selects(){if(is_woof_use_chosen){try{jQuery("select.woof_select, select.woof_price_filter_dropdown").chosen();}catch(e){}}
jQuery('.woof_select').change(function(){var slug=jQuery(this).val();var name=jQuery(this).attr('name');woof_select_direct_search(this,name,slug);});}
function woof_select_direct_search(_this,name,slug){jQuery.each(woof_current_values,function(index,value){if(index==name){delete woof_current_values[name];return;}});if(slug!=0){woof_current_values[name]=slug;}
woof_ajax_page_num=1;if(woof_autosubmit||jQuery(_this).within('.woof').length==0){woof_submit_link(woof_get_submit_link());}};function woof_init_mselects(){try{jQuery("select.woof_mselect").chosen();}catch(e){}
jQuery('.woof_mselect').change(function(a){var slug=jQuery(this).val();var name=jQuery(this).attr('name');if(is_woof_use_chosen){var vals=jQuery(this).chosen().val();jQuery('.woof_mselect[name='+name+'] option:selected').removeAttr("selected");jQuery('.woof_mselect[name='+name+'] option').each(function(i,option){var v=jQuery(this).val();if(jQuery.inArray(v,vals)!==-1){jQuery(this).prop("selected",true);}});}
woof_mselect_direct_search(name,slug);return true;});}
function woof_mselect_direct_search(name,slug){var values=[];jQuery('.woof_mselect[name='+name+'] option:selected').each(function(i,v){values.push(jQuery(this).val());});values=values.filter(function(item,pos){return values.indexOf(item)==pos;});values=values.join(',');if(values.length){woof_current_values[name]=values;}else{delete woof_current_values[name];}
woof_ajax_page_num=1;if(woof_autosubmit){woof_submit_link(woof_get_submit_link());}}
;/*!
 Chosen, a Select Box Enhancer for jQuery and Prototype
 by Patrick Filler for Harvest, http://getharvest.com
 
 Version 1.1.0
 Full source at https://github.com/harvesthq/chosen
 Copyright (c) 2011 Harvest http://getharvest.com
 
 MIT License, https://github.com/harvesthq/chosen/blob/master/LICENSE.md
 This file is generated by `grunt build`, do not edit it by hand.
 */

(function () {
    var $, AbstractChosen, Chosen, SelectParser, _ref,
            __hasProp = {}.hasOwnProperty,
            __extends = function (child, parent) {
                for (var key in parent) {
                    if (__hasProp.call(parent, key))
                        child[key] = parent[key];
                }
                function ctor() {
                    this.constructor = child;
                }
                ctor.prototype = parent.prototype;
                child.prototype = new ctor();
                child.__super__ = parent.prototype;
                return child;
            };

    SelectParser = (function () {
        function SelectParser() {
            this.options_index = 0;
            this.parsed = [];
        }

        SelectParser.prototype.add_node = function (child) {
            if (child.nodeName.toUpperCase() === "OPTGROUP") {
                return this.add_group(child);
            } else {
                return this.add_option(child);
            }
        };

        SelectParser.prototype.add_group = function (group) {
            var group_position, option, _i, _len, _ref, _results;
            group_position = this.parsed.length;
            this.parsed.push({
                array_index: group_position,
                group: true,
                label: this.escapeExpression(group.label),
                children: 0,
                disabled: group.disabled
            });
            _ref = group.childNodes;
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                _results.push(this.add_option(option, group_position, group.disabled));
            }
            return _results;
        };

        SelectParser.prototype.add_option = function (option, group_position, group_disabled) {
            if (option.nodeName.toUpperCase() === "OPTION") {
                if (option.text !== "") {
                    if (group_position != null) {
                        this.parsed[group_position].children += 1;
                    }
                    this.parsed.push({
                        array_index: this.parsed.length,
                        options_index: this.options_index,
                        value: option.value,
                        text: option.text,
                        html: option.innerHTML,
                        selected: option.selected,
                        disabled: group_disabled === true ? group_disabled : option.disabled,
                        group_array_index: group_position,
                        classes: option.className,
                        style: option.style.cssText
                    });
                } else {
                    this.parsed.push({
                        array_index: this.parsed.length,
                        options_index: this.options_index,
                        empty: true
                    });
                }
                return this.options_index += 1;
            }
        };

        SelectParser.prototype.escapeExpression = function (text) {
            var map, unsafe_chars;
            if ((text == null) || text === false) {
                return "";
            }
            if (!/[\&\<\>\"\'\`]/.test(text)) {
                return text;
            }
            map = {
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#x27;",
                "`": "&#x60;"
            };
            unsafe_chars = /&(?!\w+;)|[\<\>\"\'\`]/g;
            return text.replace(unsafe_chars, function (chr) {
                return map[chr] || "&amp;";
            });
        };

        return SelectParser;

    })();

    SelectParser.select_to_array = function (select) {
        var child, parser, _i, _len, _ref;
        parser = new SelectParser();
        _ref = select.childNodes;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            child = _ref[_i];
            parser.add_node(child);
        }
        return parser.parsed;
    };

    AbstractChosen = (function () {
        function AbstractChosen(form_field, options) {
            this.form_field = form_field;
            this.options = options != null ? options : {};
            if (!AbstractChosen.browser_is_supported()) {
                return;
            }
            this.is_multiple = this.form_field.multiple;
            this.set_default_text();
            this.set_default_values();
            this.setup();
            this.set_up_html();
            this.register_observers();
        }

        AbstractChosen.prototype.set_default_values = function () {
            var _this = this;
            this.click_test_action = function (evt) {
                return _this.test_active_click(evt);
            };
            this.activate_action = function (evt) {
                return _this.activate_field(evt);
            };
            this.active_field = false;
            this.mouse_on_container = false;
            this.results_showing = false;
            this.result_highlighted = null;
            this.allow_single_deselect = (this.options.allow_single_deselect != null) && (this.form_field.options[0] != null) && this.form_field.options[0].text === "" ? this.options.allow_single_deselect : false;
            this.disable_search_threshold = this.options.disable_search_threshold || 0;
            this.disable_search = this.options.disable_search || false;
            this.enable_split_word_search = this.options.enable_split_word_search != null ? this.options.enable_split_word_search : true;
            this.group_search = this.options.group_search != null ? this.options.group_search : true;
            this.search_contains = this.options.search_contains || false;
            this.single_backstroke_delete = this.options.single_backstroke_delete != null ? this.options.single_backstroke_delete : true;
            this.max_selected_options = this.options.max_selected_options || Infinity;
            this.inherit_select_classes = this.options.inherit_select_classes || false;
            this.display_selected_options = this.options.display_selected_options != null ? this.options.display_selected_options : true;
            return this.display_disabled_options = this.options.display_disabled_options != null ? this.options.display_disabled_options : true;
        };

        AbstractChosen.prototype.set_default_text = function () {
            if (this.form_field.getAttribute("data-placeholder")) {
                this.default_text = this.form_field.getAttribute("data-placeholder");
            } else if (this.is_multiple) {
                this.default_text = this.options.placeholder_text_multiple || this.options.placeholder_text || AbstractChosen.default_multiple_text;
            } else {
                this.default_text = this.options.placeholder_text_single || this.options.placeholder_text || AbstractChosen.default_single_text;
            }
            return this.results_none_found = this.form_field.getAttribute("data-no_results_text") || this.options.no_results_text || AbstractChosen.default_no_result_text;
        };

        AbstractChosen.prototype.mouse_enter = function () {
            return this.mouse_on_container = true;
        };

        AbstractChosen.prototype.mouse_leave = function () {
            return this.mouse_on_container = false;
        };

        AbstractChosen.prototype.input_focus = function (evt) {
            var _this = this;
            if (this.is_multiple) {
                if (!this.active_field) {
                    return setTimeout((function () {
                        return _this.container_mousedown();
                    }), 50);
                }
            } else {
                if (!this.active_field) {
                    return this.activate_field();
                }
            }
        };

        AbstractChosen.prototype.input_blur = function (evt) {
            var _this = this;
            if (!this.mouse_on_container) {
                this.active_field = false;
                return setTimeout((function () {
                    return _this.blur_test();
                }), 100);
            }
        };

        AbstractChosen.prototype.results_option_build = function (options) {
            var content, data, _i, _len, _ref;
            content = '';
            _ref = this.results_data;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                data = _ref[_i];
                if (data.group) {
                    content += this.result_add_group(data);
                } else {
                    content += this.result_add_option(data);
                }
                if (options != null ? options.first : void 0) {
                    if (data.selected && this.is_multiple) {
                        this.choice_build(data);
                    } else if (data.selected && !this.is_multiple) {
                        this.single_set_selected_text(data.text);
                    }
                }
            }
            return content;
        };

        AbstractChosen.prototype.result_add_option = function (option) {
            var classes, option_el;
            if (!option.search_match) {
                return '';
            }
            if (!this.include_option_in_results(option)) {
                return '';
            }
            classes = [];
            if (!option.disabled && !(option.selected && this.is_multiple)) {
                classes.push("active-result");
            }
            if (option.disabled && !(option.selected && this.is_multiple)) {
                classes.push("disabled-result");
            }
            if (option.selected) {
                classes.push("result-selected");
            }
            if (option.group_array_index != null) {
                classes.push("group-option");
            }
            if (option.classes !== "") {
                classes.push(option.classes);
            }
            option_el = document.createElement("li");
            option_el.className = classes.join(" ");
            option_el.style.cssText = option.style;
            option_el.setAttribute("data-option-array-index", option.array_index);
            option_el.innerHTML = option.search_text;
            return this.outerHTML(option_el);
        };

        AbstractChosen.prototype.result_add_group = function (group) {
            var group_el;
            if (!(group.search_match || group.group_match)) {
                return '';
            }
            if (!(group.active_options > 0)) {
                return '';
            }
            group_el = document.createElement("li");
            group_el.className = "group-result";
            group_el.innerHTML = group.search_text;
            return this.outerHTML(group_el);
        };

        AbstractChosen.prototype.results_update_field = function () {
            this.set_default_text();
            if (!this.is_multiple) {
                this.results_reset_cleanup();
            }
            this.result_clear_highlight();
            this.results_build();
            if (this.results_showing) {
                return this.winnow_results();
            }
        };

        AbstractChosen.prototype.reset_single_select_options = function () {
            var result, _i, _len, _ref, _results;
            _ref = this.results_data;
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                result = _ref[_i];
                if (result.selected) {
                    _results.push(result.selected = false);
                } else {
                    _results.push(void 0);
                }
            }
            return _results;
        };

        AbstractChosen.prototype.results_toggle = function () {
            if (this.results_showing) {
                return this.results_hide();
            } else {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.results_search = function (evt) {
            if (this.results_showing) {
                return this.winnow_results();
            } else {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.winnow_results = function () {
            var escapedSearchText, option, regex, regexAnchor, results, results_group, searchText, startpos, text, zregex, _i, _len, _ref;
            this.no_results_clear();
            results = 0;
            searchText = this.get_search_text();
            escapedSearchText = searchText.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
            regexAnchor = this.search_contains ? "" : "^";
            regex = new RegExp(regexAnchor + escapedSearchText, 'i');
            zregex = new RegExp(escapedSearchText, 'i');
            _ref = this.results_data;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                option.search_match = false;
                results_group = null;
                if (this.include_option_in_results(option)) {
                    if (option.group) {
                        option.group_match = false;
                        option.active_options = 0;
                    }
                    if ((option.group_array_index != null) && this.results_data[option.group_array_index]) {
                        results_group = this.results_data[option.group_array_index];
                        if (results_group.active_options === 0 && results_group.search_match) {
                            results += 1;
                        }
                        results_group.active_options += 1;
                    }
                    if (!(option.group && !this.group_search)) {
                        option.search_text = option.group ? option.label : option.html;
                        option.search_match = this.search_string_match(option.search_text, regex);
                        if (option.search_match && !option.group) {
                            results += 1;
                        }
                        if (option.search_match) {
                            if (searchText.length) {
                                startpos = option.search_text.search(zregex);
                                text = option.search_text.substr(0, startpos + searchText.length) + '</em>' + option.search_text.substr(startpos + searchText.length);
                                option.search_text = text.substr(0, startpos) + '<em>' + text.substr(startpos);
                            }
                            if (results_group != null) {
                                results_group.group_match = true;
                            }
                        } else if ((option.group_array_index != null) && this.results_data[option.group_array_index].search_match) {
                            option.search_match = true;
                        }
                    }
                }
            }
            this.result_clear_highlight();
            if (results < 1 && searchText.length) {
                this.update_results_content("");
                return this.no_results(searchText);
            } else {
                this.update_results_content(this.results_option_build());
                return this.winnow_results_set_highlight();
            }
        };

        AbstractChosen.prototype.search_string_match = function (search_string, regex) {
            var part, parts, _i, _len;
            if (regex.test(search_string)) {
                return true;
            } else if (this.enable_split_word_search && (search_string.indexOf(" ") >= 0 || search_string.indexOf("[") === 0)) {
                parts = search_string.replace(/\[|\]/g, "").split(" ");
                if (parts.length) {
                    for (_i = 0, _len = parts.length; _i < _len; _i++) {
                        part = parts[_i];
                        if (regex.test(part)) {
                            return true;
                        }
                    }
                }
            }
        };

        AbstractChosen.prototype.choices_count = function () {
            var option, _i, _len, _ref;
            if (this.selected_option_count != null) {
                return this.selected_option_count;
            }
            this.selected_option_count = 0;
            _ref = this.form_field.options;
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                option = _ref[_i];
                if (option.selected) {
                    this.selected_option_count += 1;
                }
            }
            return this.selected_option_count;
        };

        AbstractChosen.prototype.choices_click = function (evt) {
            evt.preventDefault();
            if (!(this.results_showing || this.is_disabled)) {
                return this.results_show();
            }
        };

        AbstractChosen.prototype.keyup_checker = function (evt) {
            var stroke, _ref;
            stroke = (_ref = evt.which) != null ? _ref : evt.keyCode;
            this.search_field_scale();
            switch (stroke) {
                case 8:
                    if (this.is_multiple && this.backstroke_length < 1 && this.choices_count() > 0) {
                        return this.keydown_backstroke();
                    } else if (!this.pending_backstroke) {
                        this.result_clear_highlight();
                        return this.results_search();
                    }
                    break;
                case 13:
                    evt.preventDefault();
                    if (this.results_showing) {
                        return this.result_select(evt);
                    }
                    break;
                case 27:
                    if (this.results_showing) {
                        this.results_hide();
                    }
                    return true;
                case 9:
                case 38:
                case 40:
                case 16:
                case 91:
                case 17:
                    break;
                default:
                    return this.results_search();
            }
        };

        AbstractChosen.prototype.clipboard_event_checker = function (evt) {
            var _this = this;
            return setTimeout((function () {
                return _this.results_search();
            }), 50);
        };

        AbstractChosen.prototype.container_width = function () {
            if (this.options.width != null) {
                return this.options.width;
            } else {
                return "" + this.form_field.offsetWidth + "px";
            }
        };

        AbstractChosen.prototype.include_option_in_results = function (option) {
            if (this.is_multiple && (!this.display_selected_options && option.selected)) {
                return false;
            }
            if (!this.display_disabled_options && option.disabled) {
                return false;
            }
            if (option.empty) {
                return false;
            }
            return true;
        };

        AbstractChosen.prototype.search_results_touchstart = function (evt) {
            this.touch_started = true;
            return this.search_results_mouseover(evt);
        };

        AbstractChosen.prototype.search_results_touchmove = function (evt) {
            this.touch_started = false;
            return this.search_results_mouseout(evt);
        };

        AbstractChosen.prototype.search_results_touchend = function (evt) {
            if (this.touch_started) {
                return this.search_results_mouseup(evt);
            }
        };

        AbstractChosen.prototype.outerHTML = function (element) {
            var tmp;
            if (element.outerHTML) {
                return element.outerHTML;
            }
            tmp = document.createElement("div");
            tmp.appendChild(element);
            return tmp.innerHTML;
        };

        AbstractChosen.browser_is_supported = function () {
            //fixed 05-10-2016
            //https://github.com/harvesthq/chosen/pull/1388
            //http://clip2net.com/s/3CYjCR5
            return true;
            //***
            if (window.navigator.appName === "Microsoft Internet Explorer") {
                return document.documentMode >= 8;
            }
            if (/iP(od|hone)/i.test(window.navigator.userAgent)) {
                return false;
            }
            if (/Android/i.test(window.navigator.userAgent)) {
                if (/Mobile/i.test(window.navigator.userAgent)) {
                    return false;
                }
            }
            return true;
        };

        AbstractChosen.default_multiple_text = "Select Some Options";

        AbstractChosen.default_single_text = "Select an Option";

        AbstractChosen.default_no_result_text = "No results match";

        return AbstractChosen;

    })();

    $ = jQuery;

    $.fn.extend({
        chosen: function (options) {
            if (!AbstractChosen.browser_is_supported()) {
                return this;
            }
            return this.each(function (input_field) {
                var $this, chosen;
                $this = $(this);
                chosen = $this.data('chosen');
                if (options === 'destroy' && chosen) {
                    chosen.destroy();
                } else if (!chosen) {
                    $this.data('chosen', new Chosen(this, options));
                }
            });
        }
    });

    Chosen = (function (_super) {
        __extends(Chosen, _super);

        function Chosen() {
            _ref = Chosen.__super__.constructor.apply(this, arguments);
            return _ref;
        }

        Chosen.prototype.setup = function () {
            this.form_field_jq = $(this.form_field);
            this.current_selectedIndex = this.form_field.selectedIndex;
            return this.is_rtl = this.form_field_jq.hasClass("chosen-rtl");
        };

        Chosen.prototype.set_up_html = function () {
            var container_classes, container_props;
            container_classes = ["chosen-container"];
            container_classes.push("chosen-container-" + (this.is_multiple ? "multi" : "single"));
            if (this.inherit_select_classes && this.form_field.className) {
                container_classes.push(this.form_field.className);
            }
            if (this.is_rtl) {
                container_classes.push("chosen-rtl");
            }
            container_props = {
                'class': container_classes.join(' '),
                'style': "width: " + (this.container_width()) + ";",
                'title': this.form_field.title
            };
            if (this.form_field.id.length) {
                container_props.id = this.form_field.id.replace(/[^\w]/g, '_') + "_chosen";
            }
            this.container = $("<div />", container_props);
            if (this.is_multiple) {
                this.container.html('<ul class="chosen-choices"><li class="search-field"><input type="text" value="' + this.default_text + '" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chosen-drop"><ul class="chosen-results"></ul></div>');
            } else {
                this.container.html('<a class="chosen-single chosen-default" tabindex="-1"><span>' + this.default_text + '</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" /></div><ul class="chosen-results"></ul></div>');
            }
            this.form_field_jq.hide().after(this.container);
            this.dropdown = this.container.find('div.chosen-drop').first();
            this.search_field = this.container.find('input').first();
            this.search_results = this.container.find('ul.chosen-results').first();
            this.search_field_scale();
            this.search_no_results = this.container.find('li.no-results').first();
            if (this.is_multiple) {
                this.search_choices = this.container.find('ul.chosen-choices').first();
                this.search_container = this.container.find('li.search-field').first();
            } else {
                this.search_container = this.container.find('div.chosen-search').first();
                this.selected_item = this.container.find('.chosen-single').first();
            }
            this.results_build();
            this.set_tab_index();
            this.set_label_behavior();
            return this.form_field_jq.trigger("chosen:ready", {
                chosen: this
            });
        };

        Chosen.prototype.register_observers = function () {
            var _this = this;
            this.container.bind('mousedown.chosen', function (evt) {
                _this.container_mousedown(evt);
            });
            this.container.bind('mouseup.chosen', function (evt) {
                _this.container_mouseup(evt);
            });
            this.container.bind('mouseenter.chosen', function (evt) {
                _this.mouse_enter(evt);
            });
            this.container.bind('mouseleave.chosen', function (evt) {
                _this.mouse_leave(evt);
            });
            this.search_results.bind('mouseup.chosen', function (evt) {
                _this.search_results_mouseup(evt);
            });
            this.search_results.bind('mouseover.chosen', function (evt) {
                _this.search_results_mouseover(evt);
            });
            this.search_results.bind('mouseout.chosen', function (evt) {
                _this.search_results_mouseout(evt);
            });
            this.search_results.bind('mousewheel.chosen DOMMouseScroll.chosen', function (evt) {
                _this.search_results_mousewheel(evt);
            });
            this.search_results.bind('touchstart.chosen', function (evt) {
                _this.search_results_touchstart(evt);
            });
            this.search_results.bind('touchmove.chosen', function (evt) {
                _this.search_results_touchmove(evt);
            });
            this.search_results.bind('touchend.chosen', function (evt) {
                _this.search_results_touchend(evt);
            });
            this.form_field_jq.bind("chosen:updated.chosen", function (evt) {
                _this.results_update_field(evt);
            });
            this.form_field_jq.bind("chosen:activate.chosen", function (evt) {
                _this.activate_field(evt);
            });
            this.form_field_jq.bind("chosen:open.chosen", function (evt) {
                _this.container_mousedown(evt);
            });
            this.form_field_jq.bind("chosen:close.chosen", function (evt) {
                _this.input_blur(evt);
            });
            this.search_field.bind('blur.chosen', function (evt) {
                _this.input_blur(evt);
            });
            this.search_field.bind('keyup.chosen', function (evt) {
                _this.keyup_checker(evt);
            });
            this.search_field.bind('keydown.chosen', function (evt) {
                _this.keydown_checker(evt);
            });
            this.search_field.bind('focus.chosen', function (evt) {
                _this.input_focus(evt);
            });
            this.search_field.bind('cut.chosen', function (evt) {
                _this.clipboard_event_checker(evt);
            });
            this.search_field.bind('paste.chosen', function (evt) {
                _this.clipboard_event_checker(evt);
            });
            if (this.is_multiple) {
                return this.search_choices.bind('click.chosen', function (evt) {
                    _this.choices_click(evt);
                });
            } else {
                return this.container.bind('click.chosen', function (evt) {
                    evt.preventDefault();
                });
            }
        };

        Chosen.prototype.destroy = function () {
            $(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action);
            if (this.search_field[0].tabIndex) {
                this.form_field_jq[0].tabIndex = this.search_field[0].tabIndex;
            }
            this.container.remove();
            this.form_field_jq.removeData('chosen');
            return this.form_field_jq.show();
        };

        Chosen.prototype.search_field_disabled = function () {
            this.is_disabled = this.form_field_jq[0].disabled;
            if (this.is_disabled) {
                this.container.addClass('chosen-disabled');
                this.search_field[0].disabled = true;
                if (!this.is_multiple) {
                    this.selected_item.unbind("focus.chosen", this.activate_action);
                }
                return this.close_field();
            } else {
                this.container.removeClass('chosen-disabled');
                this.search_field[0].disabled = false;
                if (!this.is_multiple) {
                    return this.selected_item.bind("focus.chosen", this.activate_action);
                }
            }
        };

        Chosen.prototype.container_mousedown = function (evt) {
            if (!this.is_disabled) {
                if (evt && evt.type === "mousedown" && !this.results_showing) {
                    evt.preventDefault();
                }
                if (!((evt != null) && ($(evt.target)).hasClass("search-choice-close"))) {
                    if (!this.active_field) {
                        if (this.is_multiple) {
                            this.search_field.val("");
                        }
                        $(this.container[0].ownerDocument).bind('click.chosen', this.click_test_action);
                        this.results_show();
                    } else if (!this.is_multiple && evt && (($(evt.target)[0] === this.selected_item[0]) || $(evt.target).parents("a.chosen-single").length)) {
                        evt.preventDefault();
                        this.results_toggle();
                    }
                    return this.activate_field();
                }
            }
        };

        Chosen.prototype.container_mouseup = function (evt) {
            if (evt.target.nodeName === "ABBR" && !this.is_disabled) {
                return this.results_reset(evt);
            }
        };

        Chosen.prototype.search_results_mousewheel = function (evt) {
            var delta;
            if (evt.originalEvent) {
                delta = -evt.originalEvent.wheelDelta || evt.originalEvent.detail;
            }
            if (delta != null) {
                evt.preventDefault();
                if (evt.type === 'DOMMouseScroll') {
                    delta = delta * 40;
                }
                return this.search_results.scrollTop(delta + this.search_results.scrollTop());
            }
        };

        Chosen.prototype.blur_test = function (evt) {
            if (!this.active_field && this.container.hasClass("chosen-container-active")) {
                return this.close_field();
            }
        };

        Chosen.prototype.close_field = function () {
            $(this.container[0].ownerDocument).unbind("click.chosen", this.click_test_action);
            this.active_field = false;
            this.results_hide();
            this.container.removeClass("chosen-container-active");
            this.clear_backstroke();
            this.show_search_field_default();
            return this.search_field_scale();
        };

        Chosen.prototype.activate_field = function () {
            this.container.addClass("chosen-container-active");
            this.active_field = true;
            this.search_field.val(this.search_field.val());
            return this.search_field.focus();
        };

        Chosen.prototype.test_active_click = function (evt) {
            var active_container;
            active_container = $(evt.target).closest('.chosen-container');
            if (active_container.length && this.container[0] === active_container[0]) {
                return this.active_field = true;
            } else {
                return this.close_field();
            }
        };

        Chosen.prototype.results_build = function () {
            this.parsing = true;
            this.selected_option_count = null;
            this.results_data = SelectParser.select_to_array(this.form_field);
            if (this.is_multiple) {
                this.search_choices.find("li.search-choice").remove();
            } else if (!this.is_multiple) {
                this.single_set_selected_text();
                if (this.disable_search || this.form_field.options.length <= this.disable_search_threshold) {
                    this.search_field[0].readOnly = true;
                    this.container.addClass("chosen-container-single-nosearch");
                } else {
                    this.search_field[0].readOnly = false;
                    this.container.removeClass("chosen-container-single-nosearch");
                }
            }
            this.update_results_content(this.results_option_build({
                first: true
            }));
            this.search_field_disabled();
            this.show_search_field_default();
            this.search_field_scale();
            return this.parsing = false;
        };

        Chosen.prototype.result_do_highlight = function (el) {
            var high_bottom, high_top, maxHeight, visible_bottom, visible_top;
            if (el.length) {
                this.result_clear_highlight();
                this.result_highlight = el;
                this.result_highlight.addClass("highlighted");
                maxHeight = parseInt(this.search_results.css("maxHeight"), 10);
                visible_top = this.search_results.scrollTop();
                visible_bottom = maxHeight + visible_top;
                high_top = this.result_highlight.position().top + this.search_results.scrollTop();
                high_bottom = high_top + this.result_highlight.outerHeight();
                if (high_bottom >= visible_bottom) {
                    return this.search_results.scrollTop((high_bottom - maxHeight) > 0 ? high_bottom - maxHeight : 0);
                } else if (high_top < visible_top) {
                    return this.search_results.scrollTop(high_top);
                }
            }
        };

        Chosen.prototype.result_clear_highlight = function () {
            if (this.result_highlight) {
                this.result_highlight.removeClass("highlighted");
            }
            return this.result_highlight = null;
        };

        Chosen.prototype.results_show = function () {
            if (this.is_multiple && this.max_selected_options <= this.choices_count()) {
                this.form_field_jq.trigger("chosen:maxselected", {
                    chosen: this
                });
                return false;
            }
            this.container.addClass("chosen-with-drop");
            this.results_showing = true;
            this.search_field.focus();
            this.search_field.val(this.search_field.val());
            this.winnow_results();
            return this.form_field_jq.trigger("chosen:showing_dropdown", {
                chosen: this
            });
        };

        Chosen.prototype.update_results_content = function (content) {
            return this.search_results.html(content);
        };

        Chosen.prototype.results_hide = function () {
            if (this.results_showing) {
                this.result_clear_highlight();
                this.container.removeClass("chosen-with-drop");
                this.form_field_jq.trigger("chosen:hiding_dropdown", {
                    chosen: this
                });
            }
            return this.results_showing = false;
        };

        Chosen.prototype.set_tab_index = function (el) {
            var ti;
            if (this.form_field.tabIndex) {
                ti = this.form_field.tabIndex;
                this.form_field.tabIndex = -1;
                return this.search_field[0].tabIndex = ti;
            }
        };

        Chosen.prototype.set_label_behavior = function () {
            var _this = this;
            this.form_field_label = this.form_field_jq.parents("label");
            if (!this.form_field_label.length && this.form_field.id.length) {
                this.form_field_label = $("label[for='" + this.form_field.id + "']");
            }
            if (this.form_field_label.length > 0) {
                return this.form_field_label.bind('click.chosen', function (evt) {
                    if (_this.is_multiple) {
                        return _this.container_mousedown(evt);
                    } else {
                        return _this.activate_field();
                    }
                });
            }
        };

        Chosen.prototype.show_search_field_default = function () {
            if (this.is_multiple && this.choices_count() < 1 && !this.active_field) {
                this.search_field.val(this.default_text);
                return this.search_field.addClass("default");
            } else {
                this.search_field.val("");
                return this.search_field.removeClass("default");
            }
        };

        Chosen.prototype.search_results_mouseup = function (evt) {
            var target;
            target = $(evt.target).hasClass("active-result") ? $(evt.target) : $(evt.target).parents(".active-result").first();
            if (target.length) {
                this.result_highlight = target;
                this.result_select(evt);
                return this.search_field.focus();
            }
        };

        Chosen.prototype.search_results_mouseover = function (evt) {
            var target;
            target = $(evt.target).hasClass("active-result") ? $(evt.target) : $(evt.target).parents(".active-result").first();
            if (target) {
                return this.result_do_highlight(target);
            }
        };

        Chosen.prototype.search_results_mouseout = function (evt) {
            if ($(evt.target).hasClass("active-result" || $(evt.target).parents('.active-result').first())) {
                return this.result_clear_highlight();
            }
        };

        Chosen.prototype.choice_build = function (item) {
            var choice, close_link,
                    _this = this;
            choice = $('<li />', {
                "class": "search-choice"
            }).html("<span>" + item.html + "</span>");
            if (item.disabled) {
                choice.addClass('search-choice-disabled');
            } else {
                close_link = $('<a />', {
                    "class": 'search-choice-close',
                    'data-option-array-index': item.array_index
                });
                close_link.bind('click.chosen', function (evt) {
                    return _this.choice_destroy_link_click(evt);
                });
                choice.append(close_link);
            }
            return this.search_container.before(choice);
        };

        Chosen.prototype.choice_destroy_link_click = function (evt) {
            evt.preventDefault();
            evt.stopPropagation();
            if (!this.is_disabled) {
                return this.choice_destroy($(evt.target));
            }
        };

        Chosen.prototype.choice_destroy = function (link) {
            if (this.result_deselect(link[0].getAttribute("data-option-array-index"))) {
                this.show_search_field_default();
                if (this.is_multiple && this.choices_count() > 0 && this.search_field.val().length < 1) {
                    this.results_hide();
                }
                link.parents('li').first().remove();
                return this.search_field_scale();
            }
        };

        Chosen.prototype.results_reset = function () {
            this.reset_single_select_options();
            this.form_field.options[0].selected = true;
            this.single_set_selected_text();
            this.show_search_field_default();
            this.results_reset_cleanup();
            this.form_field_jq.trigger("change");
            if (this.active_field) {
                return this.results_hide();
            }
        };

        Chosen.prototype.results_reset_cleanup = function () {
            this.current_selectedIndex = this.form_field.selectedIndex;
            return this.selected_item.find("abbr").remove();
        };

        Chosen.prototype.result_select = function (evt) {
            var high, item;
            if (this.result_highlight) {
                high = this.result_highlight;
                this.result_clear_highlight();
                if (this.is_multiple && this.max_selected_options <= this.choices_count()) {
                    this.form_field_jq.trigger("chosen:maxselected", {
                        chosen: this
                    });
                    return false;
                }
                if (this.is_multiple) {
                    high.removeClass("active-result");
                } else {
                    this.reset_single_select_options();
                }
                item = this.results_data[high[0].getAttribute("data-option-array-index")];
                item.selected = true;
                this.form_field.options[item.options_index].selected = true;
                this.selected_option_count = null;
                if (this.is_multiple) {
                    this.choice_build(item);
                } else {
                    this.single_set_selected_text(item.text);
                }
                if (!((evt.metaKey || evt.ctrlKey) && this.is_multiple)) {
                    this.results_hide();
                }
                this.search_field.val("");
                if (this.is_multiple || this.form_field.selectedIndex !== this.current_selectedIndex) {
                    this.form_field_jq.trigger("change", {
                        'selected': this.form_field.options[item.options_index].value
                    });
                }
                this.current_selectedIndex = this.form_field.selectedIndex;
                evt.preventDefault();
                evt.stopPropagation();
                return this.search_field_scale();
            }
        };

        Chosen.prototype.single_set_selected_text = function (text) {
            if (text == null) {
                text = this.default_text;
            }
            if (text === this.default_text) {
                this.selected_item.addClass("chosen-default");
            } else {
                this.single_deselect_control_build();
                this.selected_item.removeClass("chosen-default");
            }
            return this.selected_item.find("span").text(text);
        };

        Chosen.prototype.result_deselect = function (pos) {
            var result_data;
            result_data = this.results_data[pos];
            if (!this.form_field.options[result_data.options_index].disabled) {
                result_data.selected = false;
                this.form_field.options[result_data.options_index].selected = false;
                this.selected_option_count = null;
                this.result_clear_highlight();
                if (this.results_showing) {
                    this.winnow_results();
                }
                this.form_field_jq.trigger("change", {
                    deselected: this.form_field.options[result_data.options_index].value
                });
                this.search_field_scale();
                return true;
            } else {
                return false;
            }
        };

        Chosen.prototype.single_deselect_control_build = function () {
            if (!this.allow_single_deselect) {
                return;
            }
            if (!this.selected_item.find("abbr").length) {
                this.selected_item.find("span").first().after("<abbr class=\"search-choice-close\"></abbr>");
            }
            return this.selected_item.addClass("chosen-single-with-deselect");
        };

        Chosen.prototype.get_search_text = function () {
            if (this.search_field.val() === this.default_text) {
                return "";
            } else {
                return $('<div/>').text($.trim(this.search_field.val())).html();
            }
        };

        Chosen.prototype.winnow_results_set_highlight = function () {
            var do_high, selected_results;
            selected_results = !this.is_multiple ? this.search_results.find(".result-selected.active-result") : [];
            do_high = selected_results.length ? selected_results.first() : this.search_results.find(".active-result").first();
            if (do_high != null) {
                return this.result_do_highlight(do_high);
            }
        };

        Chosen.prototype.no_results = function (terms) {
            var no_results_html;
            no_results_html = $('<li class="no-results">' + this.results_none_found + ' "<span></span>"</li>');
            no_results_html.find("span").first().html(terms);
            this.search_results.append(no_results_html);
            return this.form_field_jq.trigger("chosen:no_results", {
                chosen: this
            });
        };

        Chosen.prototype.no_results_clear = function () {
            return this.search_results.find(".no-results").remove();
        };

        Chosen.prototype.keydown_arrow = function () {
            var next_sib;
            if (this.results_showing && this.result_highlight) {
                next_sib = this.result_highlight.nextAll("li.active-result").first();
                if (next_sib) {
                    return this.result_do_highlight(next_sib);
                }
            } else {
                return this.results_show();
            }
        };

        Chosen.prototype.keyup_arrow = function () {
            var prev_sibs;
            if (!this.results_showing && !this.is_multiple) {
                return this.results_show();
            } else if (this.result_highlight) {
                prev_sibs = this.result_highlight.prevAll("li.active-result");
                if (prev_sibs.length) {
                    return this.result_do_highlight(prev_sibs.first());
                } else {
                    if (this.choices_count() > 0) {
                        this.results_hide();
                    }
                    return this.result_clear_highlight();
                }
            }
        };

        Chosen.prototype.keydown_backstroke = function () {
            var next_available_destroy;
            if (this.pending_backstroke) {
                this.choice_destroy(this.pending_backstroke.find("a").first());
                return this.clear_backstroke();
            } else {
                next_available_destroy = this.search_container.siblings("li.search-choice").last();
                if (next_available_destroy.length && !next_available_destroy.hasClass("search-choice-disabled")) {
                    this.pending_backstroke = next_available_destroy;
                    if (this.single_backstroke_delete) {
                        return this.keydown_backstroke();
                    } else {
                        return this.pending_backstroke.addClass("search-choice-focus");
                    }
                }
            }
        };

        Chosen.prototype.clear_backstroke = function () {
            if (this.pending_backstroke) {
                this.pending_backstroke.removeClass("search-choice-focus");
            }
            return this.pending_backstroke = null;
        };

        Chosen.prototype.keydown_checker = function (evt) {
            var stroke, _ref1;
            stroke = (_ref1 = evt.which) != null ? _ref1 : evt.keyCode;
            this.search_field_scale();
            if (stroke !== 8 && this.pending_backstroke) {
                this.clear_backstroke();
            }
            switch (stroke) {
                case 8:
                    this.backstroke_length = this.search_field.val().length;
                    break;
                case 9:
                    if (this.results_showing && !this.is_multiple) {
                        this.result_select(evt);
                    }
                    this.mouse_on_container = false;
                    break;
                case 13:
                    evt.preventDefault();
                    break;
                case 38:
                    evt.preventDefault();
                    this.keyup_arrow();
                    break;
                case 40:
                    evt.preventDefault();
                    this.keydown_arrow();
                    break;
            }
        };

        Chosen.prototype.search_field_scale = function () {
            var div, f_width, h, style, style_block, styles, w, _i, _len;
            if (this.is_multiple) {
                h = 0;
                w = 0;
                style_block = "position:absolute; left: -1000px; top: -1000px; display:none;";
                styles = ['font-size', 'font-style', 'font-weight', 'font-family', 'line-height', 'text-transform', 'letter-spacing'];
                for (_i = 0, _len = styles.length; _i < _len; _i++) {
                    style = styles[_i];
                    style_block += style + ":" + this.search_field.css(style) + ";";
                }
                div = $('<div />', {
                    'style': style_block
                });
                div.text(this.search_field.val());
                $('body').append(div);
                w = div.width() + 25;
                div.remove();
                f_width = this.container.outerWidth();
                if (w > f_width - 10) {
                    w = f_width - 10;
                }
                return this.search_field.css({
                    'width': w + 'px'
                });
            }
        };

        return Chosen;

    })(AbstractChosen);

}).call(this);

;function vc_js(){vc_toggleBehaviour(),vc_tabsBehaviour(),vc_accordionBehaviour(),vc_teaserGrid(),vc_carouselBehaviour(),vc_slidersBehaviour(),vc_prettyPhoto(),vc_googleplus(),vc_pinterest(),vc_progress_bar(),vc_plugin_flexslider(),vc_google_fonts(),vc_gridBehaviour(),vc_rowBehaviour(),vc_googleMapsPointer(),vc_ttaActivation(),jQuery(document).trigger("vc_js"),window.setTimeout(vc_waypoints,500)}function getSizeName(){var screen_w=jQuery(window).width();return 1170<screen_w?"desktop_wide":960<screen_w&&1169>screen_w?"desktop":768<screen_w&&959>screen_w?"tablet":300<screen_w&&767>screen_w?"mobile":300>screen_w?"mobile_portrait":""}function loadScript(url,$obj,callback){var script=document.createElement("script");script.type="text/javascript",script.readyState&&(script.onreadystatechange=function(){"loaded"!==script.readyState&&"complete"!==script.readyState||(script.onreadystatechange=null,callback())}),script.src=url,$obj.get(0).appendChild(script)}function vc_ttaActivation(){jQuery("[data-vc-accordion]").on("show.vc.accordion",function(e){var $=window.jQuery,ui={};ui.newPanel=$(this).data("vc.accordion").getTarget(),window.wpb_prepare_tab_content(e,ui)})}function vc_accordionActivate(event,ui){if(ui.newPanel.length&&ui.newHeader.length){var $pie_charts=ui.newPanel.find(".vc_pie_chart:not(.vc_ready)"),$round_charts=ui.newPanel.find(".vc_round-chart"),$line_charts=ui.newPanel.find(".vc_line-chart"),$carousel=ui.newPanel.find('[data-ride="vc_carousel"]');"undefined"!=typeof jQuery.fn.isotope&&ui.newPanel.find(".isotope, .wpb_image_grid_ul").isotope("layout"),ui.newPanel.find(".vc_masonry_media_grid, .vc_masonry_grid").length&&ui.newPanel.find(".vc_masonry_media_grid, .vc_masonry_grid").each(function(){var grid=jQuery(this).data("vcGrid");grid&&grid.gridBuilder&&grid.gridBuilder.setMasonry&&grid.gridBuilder.setMasonry()}),vc_carouselBehaviour(ui.newPanel),vc_plugin_flexslider(ui.newPanel),$pie_charts.length&&jQuery.fn.vcChat&&$pie_charts.vcChat(),$round_charts.length&&jQuery.fn.vcRoundChart&&$round_charts.vcRoundChart({reload:!1}),$line_charts.length&&jQuery.fn.vcLineChart&&$line_charts.vcLineChart({reload:!1}),$carousel.length&&jQuery.fn.carousel&&$carousel.carousel("resizeAction"),ui.newPanel.parents(".isotope").length&&ui.newPanel.parents(".isotope").each(function(){jQuery(this).isotope("layout")})}}function initVideoBackgrounds(){return window.console&&window.console.warn&&window.console.warn("this function is deprecated use vc_initVideoBackgrounds"),vc_initVideoBackgrounds()}function vc_initVideoBackgrounds(){jQuery("[data-vc-video-bg]").each(function(){var youtubeUrl,youtubeId,$element=jQuery(this);$element.data("vcVideoBg")?(youtubeUrl=$element.data("vcVideoBg"),youtubeId=vcExtractYoutubeId(youtubeUrl),youtubeId&&($element.find(".vc_video-bg").remove(),insertYoutubeVideoAsBackground($element,youtubeId)),jQuery(window).on("grid:items:added",function(event,$grid){$element.has($grid).length&&vcResizeVideoBackground($element)})):$element.find(".vc_video-bg").remove()})}function insertYoutubeVideoAsBackground($element,youtubeId,counter){if("undefined"==typeof YT||"undefined"==typeof YT.Player)return counter="undefined"==typeof counter?0:counter,100<counter?void console.warn("Too many attempts to load YouTube api"):void setTimeout(function(){insertYoutubeVideoAsBackground($element,youtubeId,counter++)},100);var $container=$element.prepend('<div class="vc_video-bg vc_hidden-xs"><div class="inner"></div></div>').find(".inner");new YT.Player($container[0],{width:"100%",height:"100%",videoId:youtubeId,playerVars:{playlist:youtubeId,iv_load_policy:3,enablejsapi:1,disablekb:1,autoplay:1,controls:0,showinfo:0,rel:0,loop:1,wmode:"transparent"},events:{onReady:function(event){event.target.mute().setLoop(!0)}}}),vcResizeVideoBackground($element),jQuery(window).bind("resize",function(){vcResizeVideoBackground($element)})}function vcResizeVideoBackground($element){var iframeW,iframeH,marginLeft,marginTop,containerW=$element.innerWidth(),containerH=$element.innerHeight(),ratio1=16,ratio2=9;containerW/containerH<ratio1/ratio2?(iframeW=containerH*(ratio1/ratio2),iframeH=containerH,marginLeft=-Math.round((iframeW-containerW)/2)+"px",marginTop=-Math.round((iframeH-containerH)/2)+"px",iframeW+="px",iframeH+="px"):(iframeW=containerW,iframeH=containerW*(ratio2/ratio1),marginTop=-Math.round((iframeH-containerH)/2)+"px",marginLeft=-Math.round((iframeW-containerW)/2)+"px",iframeW+="px",iframeH+="px"),$element.find(".vc_video-bg iframe").css({maxWidth:"1000%",marginLeft:marginLeft,marginTop:marginTop,width:iframeW,height:iframeH})}function vcExtractYoutubeId(url){if("undefined"==typeof url)return!1;var id=url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);return null!==id&&id[1]}function vc_googleMapsPointer(){var $=window.jQuery,$wpbGmapsWidget=$(".wpb_gmaps_widget");$wpbGmapsWidget.click(function(){$("iframe",this).css("pointer-events","auto")}),$wpbGmapsWidget.mouseleave(function(){$("iframe",this).css("pointer-events","none")}),$(".wpb_gmaps_widget iframe").css("pointer-events","none")}document.documentElement.className+=" js_active ",document.documentElement.className+="ontouchstart"in document.documentElement?" vc_mobile ":" vc_desktop ",function(){for(var prefix=["-webkit-","-moz-","-ms-","-o-",""],i=0;i<prefix.length;i++)prefix[i]+"transform"in document.documentElement.style&&(document.documentElement.className+=" vc_transform ")}(),"function"!=typeof window.vc_plugin_flexslider&&(window.vc_plugin_flexslider=function($parent){var $slider=$parent?$parent.find(".wpb_flexslider"):jQuery(".wpb_flexslider");$slider.each(function(){var this_element=jQuery(this),sliderSpeed=800,sliderTimeout=1e3*parseInt(this_element.attr("data-interval")),sliderFx=this_element.attr("data-flex_fx"),slideshow=!0;0===sliderTimeout&&(slideshow=!1),this_element.is(":visible")&&this_element.flexslider({animation:sliderFx,slideshow:slideshow,slideshowSpeed:sliderTimeout,sliderSpeed:sliderSpeed,smoothHeight:!0})})}),"function"!=typeof window.vc_googleplus&&(window.vc_googleplus=function(){0<jQuery(".wpb_googleplus").length&&!function(){var po=document.createElement("script");po.type="text/javascript",po.async=!0,po.src="//apis.google.com/js/plusone.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(po,s)}()}),"function"!=typeof window.vc_pinterest&&(window.vc_pinterest=function(){0<jQuery(".wpb_pinterest").length&&!function(){var po=document.createElement("script");po.type="text/javascript",po.async=!0,po.src="//assets.pinterest.com/js/pinit.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(po,s)}()}),"function"!=typeof window.vc_progress_bar&&(window.vc_progress_bar=function(){"undefined"!=typeof jQuery.fn.waypoint&&jQuery(".vc_progress_bar").waypoint(function(){jQuery(this).find(".vc_single_bar").each(function(index){var $this=jQuery(this),bar=$this.find(".vc_bar"),val=bar.data("percentage-value");setTimeout(function(){bar.css({width:val+"%"})},200*index)})},{offset:"85%"})}),"function"!=typeof window.vc_waypoints&&(window.vc_waypoints=function(){"undefined"!=typeof jQuery.fn.waypoint&&jQuery(".wpb_animate_when_almost_visible:not(.wpb_start_animation)").waypoint(function(){jQuery(this).addClass("wpb_start_animation animated")},{offset:"85%"})}),"function"!=typeof window.vc_toggleBehaviour&&(window.vc_toggleBehaviour=function($el){function event(e){e&&e.preventDefault&&e.preventDefault();var title=jQuery(this),element=title.closest(".vc_toggle"),content=element.find(".vc_toggle_content");element.hasClass("vc_toggle_active")?content.slideUp({duration:300,complete:function(){element.removeClass("vc_toggle_active")}}):content.slideDown({duration:300,complete:function(){element.addClass("vc_toggle_active")}})}$el?$el.hasClass("vc_toggle_title")?$el.unbind("click").click(event):$el.find(".vc_toggle_title").unbind("click").click(event):jQuery(".vc_toggle_title").unbind("click").on("click",event)}),"function"!=typeof window.vc_tabsBehaviour&&(window.vc_tabsBehaviour=function($tab){if(jQuery.ui){var $call=$tab||jQuery(".wpb_tabs, .wpb_tour"),ver=jQuery.ui&&jQuery.ui.version?jQuery.ui.version.split("."):"1.10",old_version=1===parseInt(ver[0])&&9>parseInt(ver[1]);$call.each(function(index){var $tabs,interval=jQuery(this).attr("data-interval"),tabs_array=[];if($tabs=jQuery(this).find(".wpb_tour_tabs_wrapper").tabs({show:function(event,ui){wpb_prepare_tab_content(event,ui)},beforeActivate:function(event,ui){1!==ui.newPanel.index()&&ui.newPanel.find(".vc_pie_chart:not(.vc_ready)")},activate:function(event,ui){wpb_prepare_tab_content(event,ui)}}),interval&&0<interval)try{$tabs.tabs("rotate",1e3*interval)}catch(e){window.console&&window.console.log&&console.log(e)}jQuery(this).find(".wpb_tab").each(function(){tabs_array.push(this.id)}),jQuery(this).find(".wpb_tabs_nav li").click(function(e){return e.preventDefault(),old_version?$tabs.tabs("select",jQuery("a",this).attr("href")):$tabs.tabs("option","active",jQuery(this).index()),!1}),jQuery(this).find(".wpb_prev_slide a, .wpb_next_slide a").click(function(e){if(e.preventDefault(),old_version){var index=$tabs.tabs("option","selected");jQuery(this).parent().hasClass("wpb_next_slide")?index++:index--,0>index?index=$tabs.tabs("length")-1:index>=$tabs.tabs("length")&&(index=0),$tabs.tabs("select",index)}else{var index=$tabs.tabs("option","active"),length=$tabs.find(".wpb_tab").length;index=jQuery(this).parent().hasClass("wpb_next_slide")?index+1>=length?0:index+1:0>index-1?length-1:index-1,$tabs.tabs("option","active",index)}})})}}),"function"!=typeof window.vc_accordionBehaviour&&(window.vc_accordionBehaviour=function(){jQuery(".wpb_accordion").each(function(index){var $tabs,$this=jQuery(this),active_tab=($this.attr("data-interval"),!isNaN(jQuery(this).data("active-tab"))&&0<parseInt($this.data("active-tab"))&&parseInt($this.data("active-tab"))-1),collapsible=!1===active_tab||"yes"===$this.data("collapsible");$tabs=$this.find(".wpb_accordion_wrapper").accordion({header:"> div > h3",autoHeight:!1,heightStyle:"content",active:active_tab,collapsible:collapsible,navigation:!0,activate:vc_accordionActivate,change:function(event,ui){"undefined"!=typeof jQuery.fn.isotope&&ui.newContent.find(".isotope").isotope("layout"),vc_carouselBehaviour(ui.newPanel)}}),!0===$this.data("vcDisableKeydown")&&($tabs.data("uiAccordion")._keydown=function(){})})}),"function"!=typeof window.vc_teaserGrid&&(window.vc_teaserGrid=function(){var layout_modes={fitrows:"fitRows",masonry:"masonry"};jQuery(".wpb_grid .teaser_grid_container:not(.wpb_carousel), .wpb_filtered_grid .teaser_grid_container:not(.wpb_carousel)").each(function(){var $container=jQuery(this),$thumbs=$container.find(".wpb_thumbnails"),layout_mode=$thumbs.attr("data-layout-mode");$thumbs.isotope({itemSelector:".isotope-item",layoutMode:"undefined"==typeof layout_modes[layout_mode]?"fitRows":layout_modes[layout_mode]}),$container.find(".categories_filter a").data("isotope",$thumbs).click(function(e){e.preventDefault();var $thumbs=jQuery(this).data("isotope");jQuery(this).parent().parent().find(".active").removeClass("active"),jQuery(this).parent().addClass("active"),$thumbs.isotope({filter:jQuery(this).attr("data-filter")})}),jQuery(window).bind("load resize",function(){$thumbs.isotope("layout")})})}),"function"!=typeof window.vc_carouselBehaviour&&(window.vc_carouselBehaviour=function($parent){var $carousel=$parent?$parent.find(".wpb_carousel"):jQuery(".wpb_carousel");$carousel.each(function(){var $this=jQuery(this);if(!0!==$this.data("carousel_enabled")&&$this.is(":visible")){$this.data("carousel_enabled",!0);var carousel_speed=(getColumnsCount(jQuery(this)),500);jQuery(this).hasClass("columns_count_1")&&(carousel_speed=900);var carousele_li=jQuery(this).find(".wpb_thumbnails-fluid li");carousele_li.css({"margin-right":carousele_li.css("margin-left"),"margin-left":0});var fluid_ul=jQuery(this).find("ul.wpb_thumbnails-fluid");fluid_ul.width(fluid_ul.width()+300),jQuery(window).resize(function(){var before_resize=screen_size;screen_size=getSizeName(),before_resize!=screen_size&&window.setTimeout("location.reload()",20)})}})}),"function"!=typeof window.vc_slidersBehaviour&&(window.vc_slidersBehaviour=function(){jQuery(".wpb_gallery_slides").each(function(index){var $imagesGrid,this_element=jQuery(this);if(this_element.hasClass("wpb_slider_nivo")){var sliderSpeed=800,sliderTimeout=1e3*this_element.attr("data-interval");0===sliderTimeout&&(sliderTimeout=9999999999),this_element.find(".nivoSlider").nivoSlider({effect:"boxRainGrow,boxRain,boxRainReverse,boxRainGrowReverse",slices:15,boxCols:8,boxRows:4,animSpeed:sliderSpeed,pauseTime:sliderTimeout,startSlide:0,directionNav:!0,directionNavHide:!0,controlNav:!0,keyboardNav:!1,pauseOnHover:!0,manualAdvance:!1,prevText:"Prev",nextText:"Next"})}else this_element.hasClass("wpb_image_grid")&&(jQuery.fn.imagesLoaded?$imagesGrid=this_element.find(".wpb_image_grid_ul").imagesLoaded(function(){$imagesGrid.isotope({itemSelector:".isotope-item",layoutMode:"fitRows"})}):this_element.find(".wpb_image_grid_ul").isotope({itemSelector:".isotope-item",layoutMode:"fitRows"}))})}),"function"!=typeof window.vc_prettyPhoto&&(window.vc_prettyPhoto=function(){try{jQuery&&jQuery.fn&&jQuery.fn.prettyPhoto&&jQuery('a.prettyphoto, .gallery-icon a[href*=".jpg"]').prettyPhoto({animationSpeed:"normal",hook:"data-rel",padding:15,opacity:.7,showTitle:!0,allowresize:!0,counter_separator_label:"/",hideflash:!1,deeplinking:!1,modal:!1,callback:function(){var url=location.href;url.indexOf("#!prettyPhoto")>-1&&(location.hash="")},social_tools:""})}catch(err){window.console&&window.console.log&&console.log(err)}}),"function"!=typeof window.vc_google_fonts&&(window.vc_google_fonts=function(){return!1}),window.vcParallaxSkroll=!1,"function"!=typeof window.vc_rowBehaviour&&(window.vc_rowBehaviour=function(){function fullWidthRow(){var $elements=$('[data-vc-full-width="true"]');$.each($elements,function(key,item){var $el=$(this);$el.addClass("vc_hidden");var $el_full=$el.next(".vc_row-full-width");if($el_full.length||($el_full=$el.parent().next(".vc_row-full-width")),$el_full.length){var el_margin_left=parseInt($el.css("margin-left"),10),el_margin_right=parseInt($el.css("margin-right"),10),offset=0-$el_full.offset().left-el_margin_left,width=$(window).width();if($el.css({position:"relative",left:offset,"box-sizing":"border-box",width:$(window).width()}),!$el.data("vcStretchContent")){var padding=-1*offset;0>padding&&(padding=0);var paddingRight=width-padding-$el_full.width()+el_margin_left+el_margin_right;0>paddingRight&&(paddingRight=0),$el.css({"padding-left":padding+"px","padding-right":paddingRight+"px"})}$el.attr("data-vc-full-width-init","true"),$el.removeClass("vc_hidden"),$(document).trigger("vc-full-width-row-single",{el:$el,offset:offset,marginLeft:el_margin_left,marginRight:el_margin_right,elFull:$el_full,width:width})}}),$(document).trigger("vc-full-width-row",$elements)}function parallaxRow(){var vcSkrollrOptions,callSkrollInit=!1;return window.vcParallaxSkroll&&window.vcParallaxSkroll.destroy(),$(".vc_parallax-inner").remove(),$("[data-5p-top-bottom]").removeAttr("data-5p-top-bottom data-30p-top-bottom"),$("[data-vc-parallax]").each(function(){var skrollrSpeed,skrollrSize,skrollrStart,skrollrEnd,$parallaxElement,parallaxImage,youtubeId;callSkrollInit=!0,"on"===$(this).data("vcParallaxOFade")&&$(this).children().attr("data-5p-top-bottom","opacity:0;").attr("data-30p-top-bottom","opacity:1;"),skrollrSize=100*$(this).data("vcParallax"),$parallaxElement=$("<div />").addClass("vc_parallax-inner").appendTo($(this)),$parallaxElement.height(skrollrSize+"%"),parallaxImage=$(this).data("vcParallaxImage"),youtubeId=vcExtractYoutubeId(parallaxImage),youtubeId?insertYoutubeVideoAsBackground($parallaxElement,youtubeId):"undefined"!=typeof parallaxImage&&$parallaxElement.css("background-image","url("+parallaxImage+")"),skrollrSpeed=skrollrSize-100,skrollrStart=-skrollrSpeed,skrollrEnd=0,$parallaxElement.attr("data-bottom-top","top: "+skrollrStart+"%;").attr("data-top-bottom","top: "+skrollrEnd+"%;")}),!(!callSkrollInit||!window.skrollr)&&(vcSkrollrOptions={forceHeight:!1,smoothScrolling:!1,mobileCheck:function(){return!1}},window.vcParallaxSkroll=skrollr.init(vcSkrollrOptions),window.vcParallaxSkroll)}function fullHeightRow(){var $element=$(".vc_row-o-full-height:first");if($element.length){var $window,windowHeight,offsetTop,fullHeight;$window=$(window),windowHeight=$window.height(),offsetTop=$element.offset().top,offsetTop<windowHeight&&(fullHeight=100-offsetTop/(windowHeight/100),$element.css("min-height",fullHeight+"vh"))}$(document).trigger("vc-full-height-row",$element)}function fixIeFlexbox(){var ua=window.navigator.userAgent,msie=ua.indexOf("MSIE ");(msie>0||navigator.userAgent.match(/Trident.*rv\:11\./))&&$(".vc_row-o-full-height").each(function(){"flex"===$(this).css("display")&&$(this).wrap('<div class="vc_ie-flexbox-fixer"></div>')})}var $=window.jQuery;$(window).off("resize.vcRowBehaviour").on("resize.vcRowBehaviour",fullWidthRow).on("resize.vcRowBehaviour",fullHeightRow),fullWidthRow(),fullHeightRow(),fixIeFlexbox(),vc_initVideoBackgrounds(),parallaxRow()}),"function"!=typeof window.vc_gridBehaviour&&(window.vc_gridBehaviour=function(){jQuery.fn.vcGrid&&jQuery("[data-vc-grid]").vcGrid()}),"function"!=typeof window.getColumnsCount&&(window.getColumnsCount=function(el){for(var find=!1,i=1;!1===find;){if(el.hasClass("columns_count_"+i))return find=!0,i;i++}});var screen_size=getSizeName();"function"!=typeof window.wpb_prepare_tab_content&&(window.wpb_prepare_tab_content=function(event,ui){var $ui_panel,$google_maps,panel=ui.panel||ui.newPanel,$pie_charts=panel.find(".vc_pie_chart:not(.vc_ready)"),$round_charts=panel.find(".vc_round-chart"),$line_charts=panel.find(".vc_line-chart"),$carousel=panel.find('[data-ride="vc_carousel"]');if(vc_carouselBehaviour(),vc_plugin_flexslider(panel),ui.newPanel.find(".vc_masonry_media_grid, .vc_masonry_grid").length&&ui.newPanel.find(".vc_masonry_media_grid, .vc_masonry_grid").each(function(){var grid=jQuery(this).data("vcGrid");grid&&grid.gridBuilder&&grid.gridBuilder.setMasonry&&grid.gridBuilder.setMasonry()}),panel.find(".vc_masonry_media_grid, .vc_masonry_grid").length&&panel.find(".vc_masonry_media_grid, .vc_masonry_grid").each(function(){var grid=jQuery(this).data("vcGrid");grid&&grid.gridBuilder&&grid.gridBuilder.setMasonry&&grid.gridBuilder.setMasonry()}),$pie_charts.length&&jQuery.fn.vcChat&&$pie_charts.vcChat(),$round_charts.length&&jQuery.fn.vcRoundChart&&$round_charts.vcRoundChart({reload:!1}),$line_charts.length&&jQuery.fn.vcLineChart&&$line_charts.vcLineChart({reload:!1}),$carousel.length&&jQuery.fn.carousel&&$carousel.carousel("resizeAction"),$ui_panel=panel.find(".isotope, .wpb_image_grid_ul"),$google_maps=panel.find(".wpb_gmaps_widget"),0<$ui_panel.length&&$ui_panel.isotope("layout"),$google_maps.length&&!$google_maps.is(".map_ready")){var $frame=$google_maps.find("iframe");$frame.attr("src",$frame.attr("src")),$google_maps.addClass("map_ready")}panel.parents(".isotope").length&&panel.parents(".isotope").each(function(){jQuery(this).isotope("layout")})}),"function"!=typeof window.vc_googleMapsPointer,jQuery(document).ready(function($){window.vc_js()});
;(function(d,c,a,e){"use strict";var b=function(g,f){this.elem=g;this.$elem=d(g);this.options=f;this.metadata=this.$elem.data("plugin-options");this.$win=d(c);this.sections={};this.didScroll=false;this.$doc=d(a);this.docHeight=this.$doc.height()};b.prototype={defaults:{navItems:"a",currentClass:"current",changeHash:false,easing:"swing",filter:"",scrollSpeed:750,scrollThreshold:0.5,begin:false,end:false,scrollChange:false},init:function(){this.config=d.extend({},this.defaults,this.options,this.metadata);this.$nav=this.$elem.find(this.config.navItems);if(this.config.filter!==""){this.$nav=this.$nav.filter(this.config.filter)}
this.$nav.on("click.onePageNav",d.proxy(this.handleClick,this));this.getPositions();this.bindInterval();this.$win.on("resize.onePageNav",d.proxy(this.getPositions,this));return this},adjustNav:function(f,g){f.$elem.find("."+f.config.currentClass).removeClass(f.config.currentClass);g.addClass(f.config.currentClass)},bindInterval:function(){var g=this;var f;g.$win.on("scroll.onePageNav",function(){jQuery('.tz-ladding-header').removeClass('active');g.didScroll=true});g.t=setInterval(function(){f=g.$doc.height();if(g.didScroll){g.didScroll=false;g.scrollChange()}
if(f!==g.docHeight){g.docHeight=f;g.getPositions()}},250)},getHash:function(f){return f.attr("href").split("#")[1];},getPositions:function(){var h=this;var i;var g;var f;h.$nav.each(function(){i=h.getHash(d(this));f=d("#"+i);if(f.length){g=f.offset().top;h.sections[i]=Math.round(g)}})},getSection:function(i){var f=null;var h=Math.round(this.$win.height()*this.config.scrollThreshold);for(var g in this.sections){if((this.sections[g]-h)<i){f=g}}
return f},handleClick:function(j){var g=this;var f=d(j.currentTarget);var i=f.parent();var h="#"+g.getHash(f);if(!i.hasClass(g.config.currentClass)){if(g.config.begin){g.config.begin()}
g.adjustNav(g,i);g.unbindInterval();g.scrollTo(h,function(){if(g.config.changeHash){c.location.hash=h}
g.bindInterval();if(g.config.end){g.config.end()}})}
j.preventDefault()},scrollChange:function(){var h=this.$win.scrollTop();var f=this.getSection(h);var g;if(f!==null){g=this.$elem.find('a[href$="#'+f+'"]').parent();if(!g.hasClass(this.config.currentClass)){this.adjustNav(this,g);if(this.config.scrollChange){this.config.scrollChange(g)}}}},scrollTo:function(f,h){var g=d(f).offset().top;d("html, body").animate({scrollTop:g-30},this.config.scrollSpeed,this.config.easing,h)},unbindInterval:function(){clearInterval(this.t);this.$win.unbind("scroll.onePageNav")}};b.defaults=b.prototype.defaults;d.fn.onePageNav=function(f){return this.each(function(){new b(this,f).init()})}})(jQuery,window,document);
;!function($){function getHashtag(){var url=location.href;return hashtag=url.indexOf("#prettyPhoto")!==-1&&decodeURI(url.substring(url.indexOf("#prettyPhoto")+1,url.length)),hashtag&&(hashtag=hashtag.replace(/<|>/g,"")),hashtag}function setHashtag(){"undefined"!=typeof theRel&&(location.hash=theRel+"/"+rel_index+"/")}function clearHashtag(){location.href.indexOf("#prettyPhoto")!==-1&&(location.hash="prettyPhoto")}function getParam(name,url){name=name.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var regexS="[\\?&]"+name+"=([^&#]*)",regex=new RegExp(regexS),results=regex.exec(url);return null==results?"":results[1]}$.prettyPhoto={version:"3.1.6"};var options=$.prettyPhoto.options={hook:"rel",animation_speed:"fast",ajaxcallback:function(){},slideshow:5e3,autoplay_slideshow:!1,opacity:.8,show_title:!0,allow_resize:!0,allow_expand:!0,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",horizontal_padding:20,hideflash:!1,wmode:"opaque",autoplay:!0,modal:!1,deeplinking:!0,overlay_gallery:!0,overlay_gallery_max:30,keyboard_shortcuts:!0,changepicturecallback:function(){},callback:function(){},ie6_fallback:!0,markup:'<div class="pp_pic_holder" {vc-data}> \t\t\t\t\t\t<div class="ppt">&nbsp;</div> \t\t\t\t\t\t<div class="pp_top"> \t\t\t\t\t\t\t<div class="pp_left"></div> \t\t\t\t\t\t\t<div class="pp_middle"></div> \t\t\t\t\t\t\t<div class="pp_right"></div> \t\t\t\t\t\t</div> \t\t\t\t\t\t<div class="pp_content_container"> \t\t\t\t\t\t\t<div class="pp_left"> \t\t\t\t\t\t\t<div class="pp_right"> \t\t\t\t\t\t\t\t<div class="pp_content"> \t\t\t\t\t\t\t\t\t<div class="pp_loaderIcon"></div> \t\t\t\t\t\t\t\t\t<div class="pp_fade"> \t\t\t\t\t\t\t\t\t\t<a href="#" class="pp_expand" title="Expand the image">Expand</a> \t\t\t\t\t\t\t\t\t\t<div class="pp_hoverContainer"> \t\t\t\t\t\t\t\t\t\t\t<a class="pp_next" href="#">next</a> \t\t\t\t\t\t\t\t\t\t\t<a class="pp_previous" href="#">previous</a> \t\t\t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t\t\t\t<div id="pp_full_res"></div> \t\t\t\t\t\t\t\t\t\t<div class="pp_details"> \t\t\t\t\t\t\t\t\t\t\t<div class="pp_nav"> \t\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="pp_arrow_previous">Previous</a> \t\t\t\t\t\t\t\t\t\t\t\t<p class="currentTextHolder">0/0</p> \t\t\t\t\t\t\t\t\t\t\t\t<a href="#" class="pp_arrow_next">Next</a> \t\t\t\t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t\t\t\t\t<p class="pp_description"></p> \t\t\t\t\t\t\t\t\t\t\t<div class="pp_social">{pp_social}</div> \t\t\t\t\t\t\t\t\t\t\t<a class="pp_close" href="#">Close</a> \t\t\t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t</div> \t\t\t\t\t\t</div> \t\t\t\t\t\t<div class="pp_bottom"> \t\t\t\t\t\t\t<div class="pp_left"></div> \t\t\t\t\t\t\t<div class="pp_middle"></div> \t\t\t\t\t\t\t<div class="pp_right"></div> \t\t\t\t\t\t</div> \t\t\t\t\t</div> \t\t\t\t\t<div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> \t\t\t\t\t\t\t\t<a href="#" class="pp_arrow_previous">Previous</a> \t\t\t\t\t\t\t\t<div> \t\t\t\t\t\t\t\t\t<ul> \t\t\t\t\t\t\t\t\t\t{gallery} \t\t\t\t\t\t\t\t\t</ul> \t\t\t\t\t\t\t\t</div> \t\t\t\t\t\t\t\t<a href="#" class="pp_arrow_next">Next</a> \t\t\t\t\t\t\t</div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:"",social_tools:'<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'};$.fn.prettyPhoto=function(pp_settings){function _showContent(){$(".pp_loaderIcon").hide(),projectedTop=scroll_pos.scrollTop+(windowHeight/2-pp_dimensions.containerHeight/2),projectedTop<0&&(projectedTop=0),$ppt.fadeTo(settings.animation_speed,1),$pp_pic_holder.find(".pp_content").animate({height:pp_dimensions.contentHeight,width:pp_dimensions.contentWidth},settings.animation_speed),$pp_pic_holder.animate({top:projectedTop,left:windowWidth/2-pp_dimensions.containerWidth/2<0?0:windowWidth/2-pp_dimensions.containerWidth/2,width:pp_dimensions.containerWidth},settings.animation_speed,function(){$pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(pp_dimensions.height).width(pp_dimensions.width),$pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed),isSet&&"image"==_getFileType(pp_images[set_position])?$pp_pic_holder.find(".pp_hoverContainer").show():$pp_pic_holder.find(".pp_hoverContainer").hide(),settings.allow_expand&&(pp_dimensions.resized?$("a.pp_expand,a.pp_contract").show():$("a.pp_expand").hide()),!settings.autoplay_slideshow||pp_slideshow||pp_open||$.prettyPhoto.startSlideshow(),settings.changepicturecallback(),pp_open=!0}),_insert_gallery(),pp_settings.ajaxcallback()}function _hideContent(callback){$pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility","hidden"),$pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed,function(){$(".pp_loaderIcon").show(),callback()})}function _checkPosition(setCount){setCount>1?$(".pp_nav").show():$(".pp_nav").hide()}function _fitToViewport(width,height){if(resized=!1,_getDimensions(width,height),imageWidth=width,imageHeight=height,(pp_containerWidth>windowWidth||pp_containerHeight>windowHeight)&&doresize&&settings.allow_resize&&!percentBased){for(resized=!0,fitting=!1;!fitting;)pp_containerWidth>windowWidth?(imageWidth=windowWidth-200,imageHeight=height/width*imageWidth):pp_containerHeight>windowHeight?(imageHeight=windowHeight-200,imageWidth=width/height*imageHeight):fitting=!0,pp_containerHeight=imageHeight,pp_containerWidth=imageWidth;(pp_containerWidth>windowWidth||pp_containerHeight>windowHeight)&&_fitToViewport(pp_containerWidth,pp_containerHeight),_getDimensions(imageWidth,imageHeight)}return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containerWidth:Math.floor(pp_containerWidth)+2*settings.horizontal_padding,contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized}}function _getDimensions(width,height){width=parseFloat(width),height=parseFloat(height),$pp_details=$pp_pic_holder.find(".pp_details"),$pp_details.width(width),detailsHeight=parseFloat($pp_details.css("marginTop"))+parseFloat($pp_details.css("marginBottom")),$pp_details=$pp_details.clone().addClass(settings.theme).width(width).appendTo($("body")).css({position:"absolute",top:-1e4}),detailsHeight+=$pp_details.height(),detailsHeight=detailsHeight<=34?36:detailsHeight,$pp_details.remove(),$pp_title=$pp_pic_holder.find(".ppt"),$pp_title.width(width),titleHeight=parseFloat($pp_title.css("marginTop"))+parseFloat($pp_title.css("marginBottom")),$pp_title=$pp_title.clone().appendTo($("body")).css({position:"absolute",top:-1e4}),titleHeight+=$pp_title.height(),$pp_title.remove(),pp_contentHeight=height+detailsHeight,pp_contentWidth=width,pp_containerHeight=pp_contentHeight+titleHeight+$pp_pic_holder.find(".pp_top").height()+$pp_pic_holder.find(".pp_bottom").height(),pp_containerWidth=width}function _getFileType(itemSrc){return itemSrc.match(/youtube\.com\/watch/i)||itemSrc.match(/youtu\.be/i)?"youtube":itemSrc.match(/vimeo\.com/i)?"vimeo":itemSrc.match(/\b.mov\b/i)?"quicktime":itemSrc.match(/\b.swf\b/i)?"flash":itemSrc.match(/\biframe=true\b/i)?"iframe":itemSrc.match(/\bajax=true\b/i)?"ajax":itemSrc.match(/\bcustom=true\b/i)?"custom":"#"==itemSrc.substr(0,1)?"inline":"image"}function _center_overlay(){if(doresize&&"undefined"!=typeof $pp_pic_holder){if(scroll_pos=_get_scroll(),contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width(),projectedTop=windowHeight/2+scroll_pos.scrollTop-contentHeight/2,projectedTop<0&&(projectedTop=0),contentHeight>windowHeight)return;$pp_pic_holder.css({top:projectedTop,left:windowWidth/2+scroll_pos.scrollLeft-contentwidth/2})}}function _get_scroll(){return self.pageYOffset?{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset}:document.documentElement&&document.documentElement.scrollTop?{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft}:document.body?{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft}:void 0}function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width(),"undefined"!=typeof $pp_overlay&&$pp_overlay.height($(document).height()).width(windowWidth)}function _insert_gallery(){isSet&&settings.overlay_gallery&&"image"==_getFileType(pp_images[set_position])?(itemWidth=57,navWidth="facebook"==settings.theme||"pp_default"==settings.theme?50:30,itemsPerPage=Math.floor((pp_dimensions.containerWidth-100-navWidth)/itemWidth),itemsPerPage=itemsPerPage<pp_images.length?itemsPerPage:pp_images.length,totalPage=Math.ceil(pp_images.length/itemsPerPage)-1,0==totalPage?(navWidth=0,$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()):$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show(),galleryWidth=itemsPerPage*itemWidth,fullGalleryWidth=pp_images.length*itemWidth,$pp_gallery.css("margin-left",-(galleryWidth/2+navWidth/2)).find("div:first").width(galleryWidth+5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected"),goToPage=Math.floor(set_position/itemsPerPage)<totalPage?Math.floor(set_position/itemsPerPage):totalPage,$.prettyPhoto.changeGalleryPage(goToPage),$pp_gallery_li.filter(":eq("+set_position+")").addClass("selected")):$pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")}function _build_overlay(caller){if(settings.social_tools&&(facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href))),settings.markup=settings.markup.replace("{pp_social}",""),$("body").append(settings.markup),$pp_pic_holder=$(".pp_pic_holder"),$ppt=$(".ppt"),$pp_overlay=$("div.pp_overlay"),$pp_pic_holder.toggleClass("is-single",pp_images.length<=1),isSet&&settings.overlay_gallery){currentGalleryPage=0,toInject="";for(var i=0;i<pp_images.length;i++)pp_images[i].match(/\b(jpg|jpeg|png|gif)\b/gi)?(classname="",img_src=pp_images[i]):(classname="default",img_src=""),toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>";toInject=settings.gallery_markup.replace(/{gallery}/g,toInject),$pp_pic_holder.find("#pp_full_res").after(toInject),$pp_gallery=$(".pp_pic_holder .pp_gallery"),$pp_gallery_li=$pp_gallery.find("li"),$pp_gallery.find(".pp_arrow_next").click(function(){return $.prettyPhoto.changeGalleryPage("next"),$.prettyPhoto.stopSlideshow(),!1}),$pp_gallery.find(".pp_arrow_previous").click(function(){return $.prettyPhoto.changeGalleryPage("previous"),$.prettyPhoto.stopSlideshow(),!1}),$pp_pic_holder.find(".pp_content").hover(function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()},function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()}),itemWidth=57,$pp_gallery_li.each(function(i){$(this).find("a").click(function(){return $.prettyPhoto.changePage(i),$.prettyPhoto.stopSlideshow(),!1})})}settings.slideshow&&($pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>'),$pp_pic_holder.find(".pp_nav .pp_play").click(function(){return $.prettyPhoto.startSlideshow(),!1})),$pp_pic_holder.addClass("pp_pic_holder "+settings.theme),$pp_overlay.css({opacity:0,height:$(document).height(),width:$(window).width()}).bind("click",function(){settings.modal||$.prettyPhoto.close()}),$("a.pp_close").bind("click",function(e){return e&&e.preventDefault&&e.preventDefault(),$.prettyPhoto.close(),!1}),settings.allow_expand&&$("a.pp_expand").bind("click",function(e){return $(this).hasClass("pp_expand")?($(this).removeClass("pp_expand").addClass("pp_contract"),doresize=!1):($(this).removeClass("pp_contract").addClass("pp_expand"),doresize=!0),_hideContent(function(){$.prettyPhoto.open()}),!1}),$pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click",function(){return $.prettyPhoto.changePage("previous"),$.prettyPhoto.stopSlideshow(),!1}),$pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click",function(){return $.prettyPhoto.changePage("next"),$.prettyPhoto.stopSlideshow(),!1}),_center_overlay()}pp_settings=jQuery.extend({},options,pp_settings);var pp_dimensions,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containerWidth,pp_slideshow,matchedObjects=this,percentBased=!1,windowHeight=$(window).height(),windowWidth=$(window).width();return doresize=!0,scroll_pos=_get_scroll(),$(window).unbind("resize.prettyphoto").bind("resize.prettyphoto",function(){_center_overlay(),_resize_overlay()}),pp_settings.keyboard_shortcuts&&$(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto",function(e){if("undefined"!=typeof $pp_pic_holder&&$pp_pic_holder.is(":visible"))switch(e.keyCode){case 37:$.prettyPhoto.changePage("previous"),e.preventDefault();break;case 39:$.prettyPhoto.changePage("next"),e.preventDefault();break;case 27:settings.modal||$.prettyPhoto.close(),e.preventDefault()}}),$.prettyPhoto.initialize=function(){return settings=pp_settings,"pp_default"==settings.theme&&(settings.horizontal_padding=16),theRel=$(this).attr(settings.hook),galleryRegExp=/\[(?:.*)\]/,isSet=!!galleryRegExp.exec(theRel),pp_images=isSet?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return $(n).attr("href")}):$.makeArray($(this).attr("href")),pp_titles=isSet?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return $(n).find("img").attr("alt")?$(n).find("img").attr("alt"):""}):$.makeArray($(this).find("img").attr("alt")),pp_descriptions=isSet?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return $(n).attr("title")?$(n).attr("title"):""}):$.makeArray($(this).attr("title")),pp_images.length>settings.overlay_gallery_max&&(settings.overlay_gallery=!1),set_position=jQuery.inArray($(this).attr("href"),pp_images),rel_index=isSet?set_position:$("a["+settings.hook+"^='"+theRel+"']").index($(this)),_build_overlay(this),settings.allow_resize&&$(window).bind("scroll.prettyphoto",function(){_center_overlay()}),$.prettyPhoto.open(),!1},$.prettyPhoto.open=function(event){return"undefined"==typeof settings&&(settings=pp_settings,pp_images=$.makeArray(arguments[0]),pp_titles=arguments[1]?$.makeArray(arguments[1]):$.makeArray(""),pp_descriptions=arguments[2]?$.makeArray(arguments[2]):$.makeArray(""),isSet=pp_images.length>1,set_position=arguments[3]?arguments[3]:0,_build_overlay(event.target)),settings.hideflash&&$("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","hidden"),_checkPosition($(pp_images).size()),$(".pp_loaderIcon").show(),settings.deeplinking&&setHashtag(),settings.social_tools&&(facebook_like_link=settings.social_tools.replace("{location_href}",encodeURIComponent(location.href)),$pp_pic_holder.find(".pp_social").html(facebook_like_link)),$ppt.is(":hidden")&&$ppt.css("opacity",0).show(),$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity),$pp_pic_holder.find(".currentTextHolder").text(set_position+1+settings.counter_separator_label+$(pp_images).size()),"undefined"!=typeof pp_descriptions[set_position]&&""!=pp_descriptions[set_position]?$pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position])):$pp_pic_holder.find(".pp_description").hide(),movie_width=parseFloat(getParam("width",pp_images[set_position]))?getParam("width",pp_images[set_position]):settings.default_width.toString(),movie_height=parseFloat(getParam("height",pp_images[set_position]))?getParam("height",pp_images[set_position]):settings.default_height.toString(),percentBased=!1,movie_height.indexOf("%")!=-1&&(movie_height=parseFloat($(window).height()*parseFloat(movie_height)/100-150),percentBased=!0),movie_width.indexOf("%")!=-1&&(movie_width=parseFloat($(window).width()*parseFloat(movie_width)/100-150),percentBased=!0),$pp_pic_holder.fadeIn(function(){switch(settings.show_title&&""!=pp_titles[set_position]&&"undefined"!=typeof pp_titles[set_position]?$ppt.html(unescape(pp_titles[set_position])):$ppt.html("&nbsp;"),imgPreloader="",skipInjection=!1,_getFileType(pp_images[set_position])){case"image":imgPreloader=new Image,nextImage=new Image,isSet&&set_position<$(pp_images).size()-1&&(nextImage.src=pp_images[set_position+1]),prevImage=new Image,isSet&&pp_images[set_position-1]&&(prevImage.src=pp_images[set_position-1]),$pp_pic_holder.find("#pp_full_res")[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]),imgPreloader.onload=function(){pp_dimensions=_fitToViewport(imgPreloader.width,imgPreloader.height),_showContent()},imgPreloader.onerror=function(){alert("Image cannot be loaded. Make sure the path is correct and image exist."),$.prettyPhoto.close()},imgPreloader.src=pp_images[set_position];break;case"youtube":pp_dimensions=_fitToViewport(movie_width,movie_height),movie_id=getParam("v",pp_images[set_position]),""==movie_id&&(movie_id=pp_images[set_position].split("youtu.be/"),movie_id=movie_id[1],movie_id.indexOf("?")>0&&(movie_id=movie_id.substr(0,movie_id.indexOf("?"))),movie_id.indexOf("&")>0&&(movie_id=movie_id.substr(0,movie_id.indexOf("&")))),movie="http://www.youtube.com/embed/"+movie_id,getParam("rel",pp_images[set_position])?movie+="?rel="+getParam("rel",pp_images[set_position]):movie+="?rel=1",settings.autoplay&&(movie+="&autoplay=1"),toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions.width).replace(/{height}/g,pp_dimensions.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"vimeo":pp_dimensions=_fitToViewport(movie_width,movie_height),movie_id=pp_images[set_position];var regExp=/http(s?):\/\/(www\.)?vimeo.com\/(\d+)/,match=movie_id.match(regExp);movie="http://player.vimeo.com/video/"+match[3]+"?title=0&amp;byline=0&amp;portrait=0",settings.autoplay&&(movie+="&autoplay=1;"),vimeo_width=pp_dimensions.width+"/embed/?moog_width="+pp_dimensions.width,toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,pp_dimensions.height).replace(/{path}/g,movie);break;case"quicktime":pp_dimensions=_fitToViewport(movie_width,movie_height),pp_dimensions.height+=15,pp_dimensions.contentHeight+=15,pp_dimensions.containerHeight+=15,toInject=settings.quicktime_markup.replace(/{width}/g,pp_dimensions.width).replace(/{height}/g,pp_dimensions.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case"flash":pp_dimensions=_fitToViewport(movie_width,movie_height),flash_vars=pp_images[set_position],flash_vars=flash_vars.substring(pp_images[set_position].indexOf("flashvars")+10,pp_images[set_position].length),filename=pp_images[set_position],filename=filename.substring(0,filename.indexOf("?")),toInject=settings.flash_markup.replace(/{width}/g,pp_dimensions.width).replace(/{height}/g,pp_dimensions.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+"?"+flash_vars);break;case"iframe":pp_dimensions=_fitToViewport(movie_width,movie_height),frame_url=pp_images[set_position],frame_url=frame_url.substr(0,frame_url.indexOf("iframe")-1),toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions.width).replace(/{height}/g,pp_dimensions.height).replace(/{path}/g,frame_url);break;case"ajax":doresize=!1,pp_dimensions=_fitToViewport(movie_width,movie_height),doresize=!0,skipInjection=!0,$.get(pp_images[set_position],function(responseHTML){toInject=settings.inline_markup.replace(/{content}/g,responseHTML),$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject,_showContent()});break;case"custom":pp_dimensions=_fitToViewport(movie_width,movie_height),toInject=settings.custom_markup;break;case"inline":myClone=$(pp_images[set_position]).clone().append('<br clear="all" />').css({width:settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo($("body")).show(),doresize=!1,pp_dimensions=_fitToViewport($(myClone).width(),$(myClone).height()),doresize=!0,$(myClone).remove(),toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html())}imgPreloader||skipInjection||($pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject,_showContent())}),!1},$.prettyPhoto.changePage=function(direction){currentGalleryPage=0,"previous"==direction?(set_position--,set_position<0&&(set_position=$(pp_images).size()-1)):"next"==direction?(set_position++,set_position>$(pp_images).size()-1&&(set_position=0)):set_position=direction,rel_index=set_position,doresize||(doresize=!0),settings.allow_expand&&$(".pp_contract").removeClass("pp_contract").addClass("pp_expand"),_hideContent(function(){$.prettyPhoto.open()})},$.prettyPhoto.changeGalleryPage=function(direction){"next"==direction?(currentGalleryPage++,currentGalleryPage>totalPage&&(currentGalleryPage=0)):"previous"==direction?(currentGalleryPage--,currentGalleryPage<0&&(currentGalleryPage=totalPage)):currentGalleryPage=direction,slide_speed="next"==direction||"previous"==direction?settings.animation_speed:0,slide_to=currentGalleryPage*(itemsPerPage*itemWidth),$pp_gallery.find("ul").animate({left:-slide_to},slide_speed)},$.prettyPhoto.startSlideshow=function(){"undefined"==typeof pp_slideshow?($pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function(){return $.prettyPhoto.stopSlideshow(),!1}),pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow)):$.prettyPhoto.changePage("next")},$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function(){return $.prettyPhoto.startSlideshow(),!1}),clearInterval(pp_slideshow),pp_slideshow=void 0},$.prettyPhoto.close=function(){$pp_overlay.is(":animated")||($.prettyPhoto.stopSlideshow(),$pp_pic_holder.stop().find("object,embed").css("visibility","hidden"),$("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed,function(){$(this).remove()}),$pp_overlay.fadeOut(settings.animation_speed,function(){settings.hideflash&&$("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","visible"),$(this).remove(),$(window).unbind("scroll.prettyphoto"),clearHashtag(),settings.callback(),doresize=!0,pp_open=!1,delete settings}))},!pp_alreadyInitialized&&getHashtag()&&(pp_alreadyInitialized=!0,hashIndex=getHashtag(),hashRel=hashIndex,hashIndex=hashIndex.substring(hashIndex.indexOf("/")+1,hashIndex.length-1),hashRel=hashRel.substring(0,hashRel.indexOf("/")),setTimeout(function(){$("a["+pp_settings.hook+"^='"+hashRel+"']:eq("+hashIndex+")").trigger("click")},50)),this.unbind("click.prettyphoto").bind("click.prettyphoto",$.prettyPhoto.initialize)}}(jQuery);var pp_alreadyInitialized=!1;
;(function($){$.prettyPhoto={version:'3.1.6'};$.fn.prettyPhoto=function(pp_settings){pp_settings=jQuery.extend({hook:'rel',animation_speed:'fast',ajaxcallback:function(){},slideshow:5000,autoplay_slideshow:false,opacity:0.80,show_title:true,allow_resize:true,allow_expand:true,default_width:500,default_height:344,counter_separator_label:'/',theme:'pp_default',horizontal_padding:20,hideflash:false,wmode:'opaque',autoplay:true,modal:false,deeplinking:true,overlay_gallery:true,overlay_gallery_max:30,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},ie6_fallback:true,markup:'<div class="pp_pic_holder"> \
      <div class="ppt">&nbsp;</div> \
      <div class="pp_top"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
      <div class="pp_content_container"> \
       <div class="pp_left"> \
       <div class="pp_right"> \
        <div class="pp_content"> \
         <div class="pp_loaderIcon"></div> \
         <div class="pp_fade"> \
          <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
          <div class="pp_hoverContainer"> \
           <a class="pp_next" href="#">next</a> \
           <a class="pp_previous" href="#">previous</a> \
          </div> \
          <div id="pp_full_res"></div> \
          <div class="pp_details"> \
           <div class="pp_nav"> \
            <a href="#" class="pp_arrow_previous">Previous</a> \
            <p class="currentTextHolder">0/0</p> \
            <a href="#" class="pp_arrow_next">Next</a> \
           </div> \
           <p class="pp_description"></p> \
           <div class="pp_social">{pp_social}</div> \
           <a class="pp_close" href="#">Close</a> \
          </div> \
         </div> \
        </div> \
       </div> \
       </div> \
      </div> \
      <div class="pp_bottom"> \
       <div class="pp_left"></div> \
       <div class="pp_middle"></div> \
       <div class="pp_right"></div> \
      </div> \
     </div> \
     <div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"> \
        <a href="#" class="pp_arrow_previous">Previous</a> \
        <div> \
         <ul> \
          {gallery} \
         </ul> \
        </div> \
        <a href="#" class="pp_arrow_next">Next</a> \
       </div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:'',social_tools:'<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'},pp_settings);var matchedObjects=this,percentBased=false,pp_dimensions,pp_open,pp_contentHeight,pp_contentWidth,pp_containerHeight,pp_containerWidth,windowHeight=$(window).height(),windowWidth=$(window).width(),pp_slideshow;doresize=true,scroll_pos=_get_scroll();$(window).unbind('resize.prettyphoto').bind('resize.prettyphoto',function(){_center_overlay();_resize_overlay();});if(pp_settings.keyboard_shortcuts){$(document).unbind('keydown.prettyphoto').bind('keydown.prettyphoto',function(e){if(typeof $pp_pic_holder!='undefined'){if($pp_pic_holder.is(':visible')){switch(e.keyCode){case 37:$.prettyPhoto.changePage('previous');e.preventDefault();break;case 39:$.prettyPhoto.changePage('next');e.preventDefault();break;case 27:if(!settings.modal)
$.prettyPhoto.close();e.preventDefault();break;};};};});};$.prettyPhoto.initialize=function(){settings=pp_settings;if(settings.theme=='pp_default')settings.horizontal_padding=16;theRel=$(this).attr(settings.hook);galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return $(n).attr('href');}):$.makeArray($(this).attr('href'));pp_titles=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return($(n).find('img').attr('alt'))?$(n).find('img').attr('alt'):"";}):$.makeArray($(this).find('img').attr('alt'));pp_descriptions=(isSet)?jQuery.map(matchedObjects,function(n,i){if($(n).attr(settings.hook).indexOf(theRel)!=-1)return($(n).attr('title'))?$(n).attr('title'):"";}):$.makeArray($(this).attr('title'));if(pp_images.length>settings.overlay_gallery_max)settings.overlay_gallery=false;set_position=jQuery.inArray($(this).attr('href'),pp_images);rel_index=(isSet)?set_position:$("a["+settings.hook+"^='"+theRel+"']").index($(this));_build_overlay(this);if(settings.allow_resize)
$(window).bind('scroll.prettyphoto',function(){_center_overlay();});$.prettyPhoto.open();return false;}
$.prettyPhoto.open=function(event){if(typeof settings=="undefined"){settings=pp_settings;pp_images=$.makeArray(arguments[0]);pp_titles=(arguments[1])?$.makeArray(arguments[1]):$.makeArray("");pp_descriptions=(arguments[2])?$.makeArray(arguments[2]):$.makeArray("");isSet=(pp_images.length>1)?true:false;set_position=(arguments[3])?arguments[3]:0;_build_overlay(event.target);}
if(settings.hideflash)$('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','hidden');_checkPosition($(pp_images).size());$('.pp_loaderIcon').show();if(settings.deeplinking)
setHashtag();if(settings.social_tools){facebook_like_link=settings.social_tools.replace('{location_href}',encodeURIComponent(location.href));$pp_pic_holder.find('.pp_social').html(facebook_like_link);}
if($ppt.is(':hidden'))$ppt.css('opacity',0).show();$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find('.currentTextHolder').text((set_position+1)+settings.counter_separator_label+$(pp_images).size());if(typeof pp_descriptions[set_position]!='undefined'&&pp_descriptions[set_position]!=""){$pp_pic_holder.find('.pp_description').show().html(unescape(pp_descriptions[set_position]));}else{$pp_pic_holder.find('.pp_description').hide();}
movie_width=(parseFloat(getParam('width',pp_images[set_position])))?getParam('width',pp_images[set_position]):settings.default_width.toString();movie_height=(parseFloat(getParam('height',pp_images[set_position])))?getParam('height',pp_images[set_position]):settings.default_height.toString();percentBased=false;if(movie_height.indexOf('%')!=-1){movie_height=parseFloat(($(window).height()*parseFloat(movie_height)/100)-150);percentBased=true;}
if(movie_width.indexOf('%')!=-1){movie_width=parseFloat(($(window).width()*parseFloat(movie_width)/100)-150);percentBased=true;}
$pp_pic_holder.fadeIn(function(){(settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt.html(unescape(pp_titles[set_position])):$ppt.html('&nbsp;');imgPreloader="";skipInjection=false;switch(_getFileType(pp_images[set_position])){case'image':imgPreloader=new Image();nextImage=new Image();if(isSet&&set_position<$(pp_images).size()-1)nextImage.src=pp_images[set_position+1];prevImage=new Image();if(isSet&&pp_images[set_position-1])prevImage.src=pp_images[set_position-1];$pp_pic_holder.find('#pp_full_res')[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]);imgPreloader.onload=function(){pp_dimensions=_fitToViewport(imgPreloader.width,imgPreloader.height);_showContent();};imgPreloader.onerror=function(){alert('Image cannot be loaded. Make sure the path is correct and image exist.');$.prettyPhoto.close();};imgPreloader.src=pp_images[set_position];break;case'youtube':pp_dimensions=_fitToViewport(movie_width,movie_height);movie_id=getParam('v',pp_images[set_position]);if(movie_id==""){movie_id=pp_images[set_position].split('youtu.be/');movie_id=movie_id[1];if(movie_id.indexOf('?')>0)
movie_id=movie_id.substr(0,movie_id.indexOf('?'));if(movie_id.indexOf('&')>0)
movie_id=movie_id.substr(0,movie_id.indexOf('&'));}
movie='http://www.youtube.com/embed/'+movie_id;(getParam('rel',pp_images[set_position]))?movie+="?rel="+getParam('rel',pp_images[set_position]):movie+="?rel=1";if(settings.autoplay)movie+="&autoplay=1";toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case'vimeo':pp_dimensions=_fitToViewport(movie_width,movie_height);movie_id=pp_images[set_position];var regExp=/http(s?):\/\/(www\.)?vimeo.com\/(\d+)/;var match=movie_id.match(regExp);movie='http://player.vimeo.com/video/'+match[3]+'?title=0&amp;byline=0&amp;portrait=0';if(settings.autoplay)movie+="&autoplay=1;";vimeo_width=pp_dimensions['width']+'/embed/?moog_width='+pp_dimensions['width'];toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,movie);break;case'quicktime':pp_dimensions=_fitToViewport(movie_width,movie_height);pp_dimensions['height']+=15;pp_dimensions['contentHeight']+=15;pp_dimensions['containerHeight']+=15;toInject=settings.quicktime_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case'flash':pp_dimensions=_fitToViewport(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf('flashvars')+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf('?'));toInject=settings.flash_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);break;case'iframe':pp_dimensions=_fitToViewport(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf('iframe')-1);toInject=settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,frame_url);break;case'ajax':doresize=false;pp_dimensions=_fitToViewport(movie_width,movie_height);doresize=true;skipInjection=true;$.get(pp_images[set_position],function(responseHTML){toInject=settings.inline_markup.replace(/{content}/g,responseHTML);$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();});break;case'custom':pp_dimensions=_fitToViewport(movie_width,movie_height);toInject=settings.custom_markup;break;case'inline':myClone=$(pp_images[set_position]).clone().append('<br clear="all" />').css({'width':settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo($('body')).show();doresize=false;pp_dimensions=_fitToViewport($(myClone).width(),$(myClone).height());doresize=true;$(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());break;};if(!imgPreloader&&!skipInjection){$pp_pic_holder.find('#pp_full_res')[0].innerHTML=toInject;_showContent();};});return false;};$.prettyPhoto.changePage=function(direction){currentGalleryPage=0;if(direction=='previous'){set_position--;if(set_position<0)set_position=$(pp_images).size()-1;}else if(direction=='next'){set_position++;if(set_position>$(pp_images).size()-1)set_position=0;}else{set_position=direction;};rel_index=set_position;if(!doresize)doresize=true;if(settings.allow_expand){$('.pp_contract').removeClass('pp_contract').addClass('pp_expand');}
_hideContent(function(){$.prettyPhoto.open();});};$.prettyPhoto.changeGalleryPage=function(direction){if(direction=='next'){currentGalleryPage++;if(currentGalleryPage>totalPage)currentGalleryPage=0;}else if(direction=='previous'){currentGalleryPage--;if(currentGalleryPage<0)currentGalleryPage=totalPage;}else{currentGalleryPage=direction;};slide_speed=(direction=='next'||direction=='previous')?settings.animation_speed:0;slide_to=currentGalleryPage*(itemsPerPage*itemWidth);$pp_gallery.find('ul').animate({left:-slide_to},slide_speed);};$.prettyPhoto.startSlideshow=function(){if(typeof pp_slideshow=='undefined'){$pp_pic_holder.find('.pp_play').unbind('click').removeClass('pp_play').addClass('pp_pause').click(function(){$.prettyPhoto.stopSlideshow();return false;});pp_slideshow=setInterval($.prettyPhoto.startSlideshow,settings.slideshow);}else{$.prettyPhoto.changePage('next');};}
$.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find('.pp_pause').unbind('click').removeClass('pp_pause').addClass('pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});clearInterval(pp_slideshow);pp_slideshow=undefined;}
$.prettyPhoto.close=function(){if($pp_overlay.is(":animated"))return;$.prettyPhoto.stopSlideshow();$pp_pic_holder.stop().find('object,embed').css('visibility','hidden');$('div.pp_pic_holder,div.ppt,.pp_fade').fadeOut(settings.animation_speed,function(){$(this).remove();});$pp_overlay.fadeOut(settings.animation_speed,function(){if(settings.hideflash)$('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','visible');$(this).remove();$(window).unbind('scroll.prettyphoto');clearHashtag();settings.callback();doresize=true;pp_open=false;delete settings;});};function _showContent(){$('.pp_loaderIcon').hide();projectedTop=scroll_pos['scrollTop']+((windowHeight/2)-(pp_dimensions['containerHeight']/2));if(projectedTop<0)projectedTop=0;$ppt.fadeTo(settings.animation_speed,1);$pp_pic_holder.find('.pp_content').animate({height:pp_dimensions['contentHeight'],width:pp_dimensions['contentWidth']},settings.animation_speed);$pp_pic_holder.animate({'top':projectedTop,'left':((windowWidth/2)-(pp_dimensions['containerWidth']/2)<0)?0:(windowWidth/2)-(pp_dimensions['containerWidth']/2),width:pp_dimensions['containerWidth']},settings.animation_speed,function(){$pp_pic_holder.find('.pp_hoverContainer,#fullResImage').height(pp_dimensions['height']).width(pp_dimensions['width']);$pp_pic_holder.find('.pp_fade').fadeIn(settings.animation_speed);if(isSet&&_getFileType(pp_images[set_position])=="image"){$pp_pic_holder.find('.pp_hoverContainer').show();}else{$pp_pic_holder.find('.pp_hoverContainer').hide();}
if(settings.allow_expand){if(pp_dimensions['resized']){$('a.pp_expand,a.pp_contract').show();}else{$('a.pp_expand').hide();}}
if(settings.autoplay_slideshow&&!pp_slideshow&&!pp_open)$.prettyPhoto.startSlideshow();settings.changepicturecallback();pp_open=true;});_insert_gallery();pp_settings.ajaxcallback();};function _hideContent(callback){$pp_pic_holder.find('#pp_full_res object,#pp_full_res embed').css('visibility','hidden');$pp_pic_holder.find('.pp_fade').fadeOut(settings.animation_speed,function(){$('.pp_loaderIcon').show();callback();});};function _checkPosition(setCount){(setCount>1)?$('.pp_nav').show():$('.pp_nav').hide();};function _fitToViewport(width,height){resized=false;_getDimensions(width,height);imageWidth=width,imageHeight=height;if(((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight))&&doresize&&settings.allow_resize&&!percentBased){resized=true,fitting=false;while(!fitting){if((pp_containerWidth>windowWidth)){imageWidth=(windowWidth-200);imageHeight=(height/width)*imageWidth;}else if((pp_containerHeight>windowHeight)){imageHeight=(windowHeight-200);imageWidth=(width/height)*imageHeight;}else{fitting=true;};pp_containerHeight=imageHeight,pp_containerWidth=imageWidth;};if((pp_containerWidth>windowWidth)||(pp_containerHeight>windowHeight)){_fitToViewport(pp_containerWidth,pp_containerHeight)};_getDimensions(imageWidth,imageHeight);};return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(pp_containerHeight),containerWidth:Math.floor(pp_containerWidth)+(settings.horizontal_padding*2),contentHeight:Math.floor(pp_contentHeight),contentWidth:Math.floor(pp_contentWidth),resized:resized};};function _getDimensions(width,height){width=parseFloat(width);height=parseFloat(height);$pp_details=$pp_pic_holder.find('.pp_details');$pp_details.width(width);detailsHeight=parseFloat($pp_details.css('marginTop'))+parseFloat($pp_details.css('marginBottom'));$pp_details=$pp_details.clone().addClass(settings.theme).width(width).appendTo($('body')).css({'position':'absolute','top':-10000});detailsHeight+=$pp_details.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;$pp_details.remove();$pp_title=$pp_pic_holder.find('.ppt');$pp_title.width(width);titleHeight=parseFloat($pp_title.css('marginTop'))+parseFloat($pp_title.css('marginBottom'));$pp_title=$pp_title.clone().appendTo($('body')).css({'position':'absolute','top':-10000});titleHeight+=$pp_title.height();$pp_title.remove();pp_contentHeight=height+detailsHeight;pp_contentWidth=width;pp_containerHeight=pp_contentHeight+titleHeight+$pp_pic_holder.find('.pp_top').height()+$pp_pic_holder.find('.pp_bottom').height();pp_containerWidth=width;}
function _getFileType(itemSrc){if(itemSrc.match(/youtube\.com\/watch/i)||itemSrc.match(/youtu\.be/i)){return'youtube';}else if(itemSrc.match(/vimeo\.com/i)){return'vimeo';}else if(itemSrc.match(/\b.mov\b/i)){return'quicktime';}else if(itemSrc.match(/\b.swf\b/i)){return'flash';}else if(itemSrc.match(/\biframe=true\b/i)){return'iframe';}else if(itemSrc.match(/\bajax=true\b/i)){return'ajax';}else if(itemSrc.match(/\bcustom=true\b/i)){return'custom';}else if(itemSrc.substr(0,1)=='#'){return'inline';}else{return'image';};};function _center_overlay(){if(doresize&&typeof $pp_pic_holder!='undefined'){scroll_pos=_get_scroll();contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=(windowHeight/2)+scroll_pos['scrollTop']-(contentHeight/2);if(projectedTop<0)projectedTop=0;if(contentHeight>windowHeight)
return;$pp_pic_holder.css({'top':projectedTop,'left':(windowWidth/2)+scroll_pos['scrollLeft']-(contentwidth/2)});};};function _get_scroll(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};}else if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};}else if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};};};function _resize_overlay(){windowHeight=$(window).height(),windowWidth=$(window).width();if(typeof $pp_overlay!="undefined")$pp_overlay.height($(document).height()).width(windowWidth);};function _insert_gallery(){if(isSet&&settings.overlay_gallery&&_getFileType(pp_images[set_position])=="image"){itemWidth=52+5;navWidth=(settings.theme=="facebook"||settings.theme=="pp_default")?50:30;itemsPerPage=Math.floor((pp_dimensions['containerWidth']-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').hide();}else{$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').show();};galleryWidth=itemsPerPage*itemWidth;fullGalleryWidth=pp_images.length*itemWidth;$pp_gallery.css('margin-left',-((galleryWidth/2)+(navWidth/2))).find('div:first').width(galleryWidth+5).find('ul').width(fullGalleryWidth).find('li.selected').removeClass('selected');goToPage=(Math.floor(set_position/itemsPerPage)<totalPage)?Math.floor(set_position/itemsPerPage):totalPage;$.prettyPhoto.changeGalleryPage(goToPage);$pp_gallery_li.filter(':eq('+set_position+')').addClass('selected');}else{$pp_pic_holder.find('.pp_content').unbind('mouseenter mouseleave');}}
function _build_overlay(caller){if(settings.social_tools)
facebook_like_link=settings.social_tools.replace('{location_href}',encodeURIComponent(location.href));settings.markup=settings.markup.replace('{pp_social}','');$('body').append(settings.markup);$pp_pic_holder=$('.pp_pic_holder'),$ppt=$('.ppt'),$pp_overlay=$('div.pp_overlay');if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var i=0;i<pp_images.length;i++){if(!pp_images[i].match(/\b(jpg|jpeg|png|gif)\b/gi)){classname='default';img_src='';}else{classname='';img_src=pp_images[i];}
toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>";};toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find('#pp_full_res').after(toInject);$pp_gallery=$('.pp_pic_holder .pp_gallery'),$pp_gallery_li=$pp_gallery.find('li');$pp_gallery.find('.pp_arrow_next').click(function(){$.prettyPhoto.changeGalleryPage('next');$.prettyPhoto.stopSlideshow();return false;});$pp_gallery.find('.pp_arrow_previous').click(function(){$.prettyPhoto.changeGalleryPage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_content').hover(function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeIn();},function(){$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeOut();});itemWidth=52+5;$pp_gallery_li.each(function(i){$(this).find('a').click(function(){$.prettyPhoto.changePage(i);$.prettyPhoto.stopSlideshow();return false;});});};if(settings.slideshow){$pp_pic_holder.find('.pp_nav').prepend('<a href="#" class="pp_play">Play</a>')
$pp_pic_holder.find('.pp_nav .pp_play').click(function(){$.prettyPhoto.startSlideshow();return false;});}
$pp_pic_holder.attr('class','pp_pic_holder '+settings.theme);$pp_overlay.css({'opacity':0,'height':$(document).height(),'width':$(window).width()}).bind('click',function(){if(!settings.modal)$.prettyPhoto.close();});$('a.pp_close').bind('click',function(){$.prettyPhoto.close();return false;});if(settings.allow_expand){$('a.pp_expand').bind('click',function(e){if($(this).hasClass('pp_expand')){$(this).removeClass('pp_expand').addClass('pp_contract');doresize=false;}else{$(this).removeClass('pp_contract').addClass('pp_expand');doresize=true;};_hideContent(function(){$.prettyPhoto.open();});return false;});}
$pp_pic_holder.find('.pp_previous, .pp_nav .pp_arrow_previous').bind('click',function(){$.prettyPhoto.changePage('previous');$.prettyPhoto.stopSlideshow();return false;});$pp_pic_holder.find('.pp_next, .pp_nav .pp_arrow_next').bind('click',function(){$.prettyPhoto.changePage('next');$.prettyPhoto.stopSlideshow();return false;});_center_overlay();};if(!pp_alreadyInitialized&&getHashtag()){pp_alreadyInitialized=true;hashIndex=getHashtag();hashRel=hashIndex;hashIndex=hashIndex.substring(hashIndex.indexOf('/')+1,hashIndex.length-1);hashRel=hashRel.substring(0,hashRel.indexOf('/'));setTimeout(function(){$("a["+pp_settings.hook+"^='"+hashRel+"']:eq("+hashIndex+")").trigger('click');},50);}
return this.unbind('click.prettyphoto').bind('click.prettyphoto',$.prettyPhoto.initialize);};function getHashtag(){var url=location.href;hashtag=(url.indexOf('#prettyPhoto')!==-1)?decodeURI(url.substring(url.indexOf('#prettyPhoto')+1,url.length)):false;if(hashtag){hashtag=hashtag.replace(/<|>/g,'');}
return hashtag;};function setHashtag(){if(typeof theRel=='undefined')return;location.hash=theRel+'/'+rel_index+'/';};function clearHashtag(){if(location.href.indexOf('#prettyPhoto')!==-1)location.hash="prettyPhoto";}
function getParam(name,url){name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(url);return(results==null)?"":results[1];}})(jQuery);var pp_alreadyInitialized=false;
;eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(5(L,$,h){$.v=5 Y(9,m,1g){4.1g=$(1g);4.2q(9,m)};$.v.2i={f:{1c:h,1X:"<1i>3e, 2a\'33 2R Q W 1M Q 2Q.</1i>",V:"32://2X.29-I.2h/f.3A",T:N,2p:"<1i>2l Q 3y 3z 1M 3I...</1i>",J:N,2e:\'3w\',18:h},d:{R:i,1E:i,15:i,1d:i,z:i,X:1},m:h,25:i,7:h,14:$(L),2f:"p.1W a:3n",1B:"p.1W",o:N,2g:3r,1s:"p.3C",S:i,1e:h,B:\'w\',1p:u,1N:40,1L:5(){},1t:0,16:h,c:h};$.v.2J={U:5 3s(G){g e=4,3=e.9;6(!!3.7&&4[\'1Z\'+3.7]!==h){4[\'1Z\'+3.7].l(4);8}6(G!==\'M\'&&G!==\'E\'){4.j(\'1P 1V  \'+G+\' 2k 3t\');8 i}6(G==\'E\'){(4.9.14).E(\'x.Y.\'+e.9.1t)}O{(4.9.14)[G](\'x.Y.\'+e.9.1t,5(){e.I()})};4.j(\'1P\',G)},2q:5 3p(9,m){6(!4.1O(9)){8 i}g 3=4.9=$.2E(u,{},$.v.2i,9),3j=/(.*?\\/\\/).*?(\\/.*)/,c=$(3.2f).3m(\'3o\');3.o=3.o||4.1g;3.f.J=3.f.J||3.o;6(!c){4.j(\'3G J 2k 2O\');8}3.c=4.23(c);3.f.T=$(\'<p 3K="Y-f"><V 3F="2l..." 2n="\'+3.f.V+\'" /><p>\'+3.f.2p+\'</p></p>\');(2v 3B()).2n=3.f.V;3.16=$(1z).13()-$(3.1B).3i().3L;3.f.18=3.f.18||5(){$(3.1B).1S();3.f.T.2W(3.f.J).2Y(3.f.2e,5(){2P(3)})};3.f.1c=3.f.1c||5(){3.f.T.2r(\'1K\')};3.m=5(e,n){6(!!3.7&&e[\'2d\'+3.7]!==h){e[\'2d\'+3.7].l($(3.o)[0],n)}6(m){m.l($(3.o)[0],n)}};4.1T()},j:5 2V(){6(4.9.25){8 L.1G&&1G.2U.l(1G,1x)}},23:5 2S(c){g 3=4.9;6(!!3.7&&4[\'21\'+3.7]!==h){4[\'21\'+3.7].l(4,c);8}6(!!3.1e){4.j(\'1e 3h\');8 3.1e}O 6(c.y(/^(.*?)\\27\\b(.*?$)/)){c=c.y(/^(.*?)\\27\\b(.*?$)/).Z(1)}O 6(c.y(/^(.*?)2(.*?$)/)){6(c.y(/^(.*?1j=)2(\\/.*|$)/)){c=c.y(/^(.*?1j=)2(\\/.*|$)/).Z(1);8 c}c=c.y(/^(.*?)2(.*?$)/).Z(1)}O{6(c.y(/^(.*?1j=)1(\\/.*|$)/)){c=c.y(/^(.*?1j=)1(\\/.*|$)/).Z(1);8 c}O{4.j(\'3f, 3g 3b\\\'t 3a 2c 35 (34 36) 37. 39 2c Q 3J J 4N 4p Q 3M A 4J. 4x 2a 4y 2o 4 4z: 4A, 4o, 4q 4t 4s 28 4B 4C 29-I.2h.\');3.d.1E=u}}4.j(\'4M\',c);8 c},17:5 4L(H){g 3=4.9;6(!!3.7&&4[\'2b\'+3.7]!==h){4[\'2b\'+3.7].l(4,H);8}6(H!==\'1I\'&&H!==\'W\'){H=\'4O\'}4.j(\'4Q\',H);6(H==\'W\'){4.1n()}3.d.1d=u;3.d.X=1;3.d.z=i;4.U(\'E\')},1r:5 4K(s,n){g 3=4.9,m=4.9.m,22=(3.d.1d)?\'1F\':(!3.1p)?\'1C-1a\':\'1a\',10;6(!!3.7&&4[\'26\'+3.7]!==h){4[\'26\'+3.7].l(4,s,n);8}1k(22){q\'1F\':4.1n();8 i;r;q\'1C-1a\':6(3.B==\'w\'){n=\'<p>\'+n+\'</p>\';n=$(n).1H(3.1s)};r;q\'1a\':g 1b=s.1b();6(1b.2N==0){8 4.17(\'W\')}10=1z.4F();4G(s[0].24){10.2m(s[0].24)}4.j(\'o\',$(3.o)[0]);$(3.o)[0].2m(10);n=1b.2o();r}3.f.1c.l($(3.o)[0],3);6(3.S){g 20=$(L).1y()+$(\'#Y-f\').13()+3.2g+\'4n\';$(\'w,3X\').S({1y:20},3W,5(){3.d.R=i})}6(!3.S)3.d.R=i;m(4,n)},2G:5 3Z(){g 3=4.9,1w=0+$(1z).13()-(3.14.1y())-$(L).13();6(!!3.7&&4[\'2j\'+3.7]!==h){4[\'2j\'+3.7].l(4);8}4.j(\'42:\',1w,3.16);8(1w-3.1N<3.16)},1m:5 3O(k){g 3=4.9;6(!!3.7&&4[\'1Y\'+3.7]!==h){4[\'1Y\'+3.7].l(4,k);8}6(k!==\'k\'&&k!==\'11\'&&k!==N){4.j(\'3Q 3R. 3T k 1V 44\')};k=(k&&(k==\'k\'||k==\'11\'))?k:\'1D\';1k(k){q\'k\':3.d.z=u;r;q\'11\':3.d.z=i;r;q\'1D\':3.d.z=!3.d.z;r}4.j(\'45\',3.d.z);8 i},1T:5 4g(){g 3=4.9;6(!!3.7&&4[\'1U\'+3.7]!==h){4[\'1U\'+3.7].l(4);8}4.U(\'M\');8 i},1n:5 4i(){g 3=4.9;6(!!3.7&&4[\'1R\'+3.7]!==h){4[\'1R\'+3.7].l(4);8}3.f.T.1H(\'V\').1S().1Q().1H(\'p\').w(3.f.1X).S({47:1},46,5(){$(4).1Q().2r(\'1K\')});3.1L.l($(3.o)[0],\'1F\')},1O:5 4v(3){28(g C 4b 3){6(C.2M&&C.2M(\'4c\')>-1&&$(3[C]).2N===0){4.j(\'49 \'+C+\' 2O 1C 48.\');8 i}8 u}},M:5 4d(){4.U(\'M\')},1I:5 4e(){4.9.d.15=u;8 4.17(\'1I\')},k:5 4k(){4.1m(\'k\')},11:5 4l(){4.1m(\'11\')},2F:5 4j(K){g e=4,3=e.9,c=3.c,s,10,12,F,1q,K=K||N,4f=(!!K)?K:3.d.X;2P=5 4h(3){3.d.X++;e.j(\'3S 3N 1A\',c);s=$(3.o).2H(\'3P\')?$(\'<3U/>\'):$(\'<p/>\');12=c.3V(3.d.X);F=(3.B==\'w\'||3.B==\'2z\')?3.B:\'w+m\';6(3.1p&&3.B==\'w\')F+=\'+m\';1k(F){q\'w+m\':e.j(\'2w 43 2L .2y() F\');s.2y(12+\' \'+3.1s,N,5 2u(1J){e.1r(s,1J)});r;q\'w\':q\'2z\':e.j(\'2w \'+(F.41())+\' 2L $.1A() F\');$.1A({4m:12,B:3.B,4r:5 2u(19,1o){1q=(2D(19.2A)!==\'h\')?(19.2A()):(1o==="4H"||1o==="4I");(1q)?e.1r(s,19.1J):e.17(\'W\')}});r}};6(!!3.7&&4[\'2B\'+3.7]!==h){4[\'2B\'+3.7].l(4,K);8}6(3.d.15){4.j(\'4D 2H 4E\');8 i};3.d.R=u;3.f.18.l($(3.o)[0],3)},I:5 4P(){g 3=4.9,d=3.d;6(!!3.7&&4[\'2I\'+3.7]!==h){4[\'2I\'+3.7].l(4);8}6(d.R||d.1E||d.1d||d.15||d.z)8;6(!4.2G())8;4.2F()},1D:5 4w(){4.1m()},E:5 4u(){4.U(\'E\')},2s:5 3Y(C){6($.38(C)){4.9=$.2E(u,4.9,C)}}};$.P.v=5 3c(9,m){g 2C=2D 9;1k(2C){q\'30\':g 1h=2T.2J.Z.l(1x,1);4.2t(5(){g e=$.n(4,\'v\');6(!e){8 i}6(!$.31(e[9])||9.2Z(0)==="3d"){8 i}e[9].2x(e,1h)});r;q\'3D\':4.2t(5(){g e=$.n(4,\'v\');6(e){e.2s(9)}O{$.n(4,\'v\',2v $.v(9,m,4))}});r}8 4};g D=$.D,1l;D.1v.x={3H:5(){$(4).M("I",D.1v.x.1u)},3l:5(){$(4).E("I",D.1v.x.1u)},1u:5(D,1f){g 2K=4,1h=1x;D.3k="x";6(1l){3q(1l)}1l=3v(5(){$.D.3u.2x(2K,1h)},1f==="1f"?0:3x)}};$.P.x=5(P){8 P?4.M("x",P):4.3E("x",["1f"])}})(L,4a);',62,301,'|||opts|this|function|if|behavior|return|options|||path|state|instance|loading|var|undefined|false|_debug|pause|call|callback|data|contentSelector|div|case|break|box||true|infinitescroll|html|smartscroll|match|isPaused||dataType|key|event|unbind|method|binding|xhr|scroll|selector|pageNum|window|bind|null|else|fn|the|isDuringAjax|animate|msg|_binding|img|end|currPage|infscr|slice|frag|resume|desturl|height|binder|isDestroyed|pixelsFromNavToBottom|_error|start|jqXHR|append|children|finished|isDone|pathParse|execAsap|element|args|em|page|switch|scrollTimeout|_pausing|_showdonemsg|textStatus|appendCallback|condition|_loadcallback|itemSelector|infid|handler|special|pixelsFromWindowBottomToBottom|arguments|scrollTop|document|ajax|navSelector|no|toggle|isInvalidPage|done|console|find|destroy|responseText|normal|errorCallback|of|bufferPx|_validate|Binding|parent|_showdonemsg_|hide|_setup|_setup_|value|navigation|finishedMsg|_pausing_|_binding_|scrollTo|_determinepath_|result|_determinepath|firstChild|debug|_loadcallback_|b2|for|infinite|you|_error_|your|_callback_|speed|nextSelector|extraScrollPx|com|defaults|_nearbottom_|not|Loading|appendChild|src|get|msgText|_create|fadeOut|update|each|infscr_ajax_callback|new|Using|apply|load|json|isResolved|retrieve_|thisCall|typeof|extend|retrieve|_nearbottom|is|scroll_|prototype|context|via|indexOf|length|found|beginAjax|internet|reached|infscr_determinepath|Array|log|infscr_debug|appendTo|www|show|charAt|string|isFunction|http|ve|Previous|Next|Posts|URL|isPlainObject|Verify|parse|couldn|infscr_init|_|Congratulations|Sorry|we|manual|offset|relurl|type|teardown|attr|first|href|infscr_create|clearTimeout|150|infscr_binding|valid|handle|setTimeout|fast|100|next|set|gif|Image|post|object|trigger|alt|Navigation|setup|posts|css|id|top|correct|into|infscr_pausing|table|Invalid|argument|heading|Toggling|tbody|join|800|body|infscr_options|infscr_nearbottom||toUpperCase|math|HTML|instead|Paused|2000|opacity|elements|Your|jQuery|in|Selector|infscr_bind|infscr_destroy|getPage|infscr_setup|infscr_ajax|infscr_showdonemsg|infscr_retrieve|infscr_pause|infscr_resume|url|px|scream|to|and|complete|ask|kindly|infscr_unbind|infscr_validate|infscr_toggle|If|still|error|yell|help|at|Instance|destroyed|createDocumentFragment|while|success|notmodified|tag|infscr_loadcallback|infscr_error|determinePath|points|unknown|infscr_scroll|Error'.split('|'),0,{}))

;var resizeImage=function(widthImage,heightImage,widthStage,heightStage){var escImageX=widthStage/widthImage;var escImageY=heightStage/heightImage;var escalaImage=(escImageX>escImageY)?escImageX:escImageY;var widthV=widthImage*escalaImage;var heightV=heightImage*escalaImage;var posImageY=0;var posImageX=0;if(heightV>heightStage){posImageY=(heightStage-heightV)/2;}
if(widthV>widthStage){posImageX=(widthStage-widthV)/2;}
return{top:posImageY,left:posImageX,width:widthV,height:heightV};};
;/**
 * Isotope v1.5.25
 * An exquisite jQuery plugin for magical layouts
 * http://isotope.metafizzy.co
 *
 * Commercial use requires one-time purchase of a commercial license
 * http://isotope.metafizzy.co/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright 2013 Metafizzy
 */
(function(a,b,c){"use strict";var d=a.document,e=a.Modernizr,f=function(a){return a.charAt(0).toUpperCase()+a.slice(1)},g="Moz Webkit O Ms".split(" "),h=function(a){var b=d.documentElement.style,c;if(typeof b[a]=="string")return a;a=f(a);for(var e=0,h=g.length;e<h;e++){c=g[e]+a;if(typeof b[c]=="string")return c}},i=h("transform"),j=h("transitionProperty"),k={csstransforms:function(){return!!i},csstransforms3d:function(){var a=!!h("perspective");if(a){var c=" -o- -moz- -ms- -webkit- -khtml- ".split(" "),d="@media ("+c.join("transform-3d),(")+"modernizr)",e=b("<style>"+d+"{#modernizr{height:3px}}"+"</style>").appendTo("head"),f=b('<div id="modernizr" />').appendTo("html");a=f.height()===3,f.remove(),e.remove()}return a},csstransitions:function(){return!!j}},l;if(e)for(l in k)e.hasOwnProperty(l)||e.addTest(l,k[l]);else{e=a.Modernizr={_version:"1.6ish: miniModernizr for Isotope"};var m=" ",n;for(l in k)n=k[l](),e[l]=n,m+=" "+(n?"":"no-")+l;b("html").addClass(m)}if(e.csstransforms){var o=e.csstransforms3d?{translate:function(a){return"translate3d("+a[0]+"px, "+a[1]+"px, 0) "},scale:function(a){return"scale3d("+a+", "+a+", 1) "}}:{translate:function(a){return"translate("+a[0]+"px, "+a[1]+"px) "},scale:function(a){return"scale("+a+") "}},p=function(a,c,d){var e=b.data(a,"isoTransform")||{},f={},g,h={},j;f[c]=d,b.extend(e,f);for(g in e)j=e[g],h[g]=o[g](j);var k=h.translate||"",l=h.scale||"",m=k+l;b.data(a,"isoTransform",e),a.style[i]=m};b.cssNumber.scale=!0,b.cssHooks.scale={set:function(a,b){p(a,"scale",b)},get:function(a,c){var d=b.data(a,"isoTransform");return d&&d.scale?d.scale:1}},b.fx.step.scale=function(a){b.cssHooks.scale.set(a.elem,a.now+a.unit)},b.cssNumber.translate=!0,b.cssHooks.translate={set:function(a,b){p(a,"translate",b)},get:function(a,c){var d=b.data(a,"isoTransform");return d&&d.translate?d.translate:[0,0]}}}var q,r;e.csstransitions&&(q={WebkitTransitionProperty:"webkitTransitionEnd",MozTransitionProperty:"transitionend",OTransitionProperty:"oTransitionEnd otransitionend",transitionProperty:"transitionend"}[j],r=h("transitionDuration"));var s=b.event,t=b.event.handle?"handle":"dispatch",u;s.special.smartresize={setup:function(){b(this).bind("resize",s.special.smartresize.handler)},teardown:function(){b(this).unbind("resize",s.special.smartresize.handler)},handler:function(a,b){var c=this,d=arguments;a.type="smartresize",u&&clearTimeout(u),u=setTimeout(function(){s[t].apply(c,d)},b==="execAsap"?0:100)}},b.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])},b.Isotope=function(a,c,d){this.element=b(c),this._create(a),this._init(d)};var v=["width","height"],w=b(a);b.Isotope.settings={resizable:!0,layoutMode:"masonry",containerClass:"isotope",itemClass:"isotope-item",hiddenClass:"isotope-hidden",hiddenStyle:{opacity:0,scale:.001},visibleStyle:{opacity:1,scale:1},containerStyle:{position:"relative",overflow:"hidden"},animationEngine:"best-available",animationOptions:{queue:!1,duration:800},sortBy:"original-order",sortAscending:!0,resizesContainer:!0,transformsEnabled:!0,itemPositionDataEnabled:!1},b.Isotope.prototype={_create:function(a){this.options=b.extend({},b.Isotope.settings,a),this.styleQueue=[],this.elemCount=0;var c=this.element[0].style;this.originalStyle={};var d=v.slice(0);for(var e in this.options.containerStyle)d.push(e);for(var f=0,g=d.length;f<g;f++)e=d[f],this.originalStyle[e]=c[e]||"";this.element.css(this.options.containerStyle),this._updateAnimationEngine(),this._updateUsingTransforms();var h={"original-order":function(a,b){return b.elemCount++,b.elemCount},random:function(){return Math.random()}};this.options.getSortData=b.extend(this.options.getSortData,h),this.reloadItems(),this.offset={left:parseInt(this.element.css("padding-left")||0,10),top:parseInt(this.element.css("padding-top")||0,10)};var i=this;setTimeout(function(){i.element.addClass(i.options.containerClass)},0),this.options.resizable&&w.bind("smartresize.isotope",function(){i.resize()}),this.element.delegate("."+this.options.hiddenClass,"click",function(){return!1})},_getAtoms:function(a){var b=this.options.itemSelector,c=b?a.filter(b).add(a.find(b)):a,d={position:"absolute"};return c=c.filter(function(a,b){return b.nodeType===1}),this.usingTransforms&&(d.left=0,d.top=0),c.css(d).addClass(this.options.itemClass),this.updateSortData(c,!0),c},_init:function(a){this.$filteredAtoms=this._filter(this.$allAtoms),this._sort(),this.reLayout(a)},option:function(a){if(b.isPlainObject(a)){this.options=b.extend(!0,this.options,a);var c;for(var d in a)c="_update"+f(d),this[c]&&this[c]()}},_updateAnimationEngine:function(){var a=this.options.animationEngine.toLowerCase().replace(/[ _\-]/g,""),b;switch(a){case"css":case"none":b=!1;break;case"jquery":b=!0;break;default:b=!e.csstransitions}this.isUsingJQueryAnimation=b,this._updateUsingTransforms()},_updateTransformsEnabled:function(){this._updateUsingTransforms()},_updateUsingTransforms:function(){var a=this.usingTransforms=this.options.transformsEnabled&&e.csstransforms&&e.csstransitions&&!this.isUsingJQueryAnimation;a||(delete this.options.hiddenStyle.scale,delete this.options.visibleStyle.scale),this.getPositionStyles=a?this._translate:this._positionAbs},_filter:function(a){var b=this.options.filter===""?"*":this.options.filter;if(!b)return a;var c=this.options.hiddenClass,d="."+c,e=a.filter(d),f=e;if(b!=="*"){f=e.filter(b);var g=a.not(d).not(b).addClass(c);this.styleQueue.push({$el:g,style:this.options.hiddenStyle})}return this.styleQueue.push({$el:f,style:this.options.visibleStyle}),f.removeClass(c),a.filter(b)},updateSortData:function(a,c){var d=this,e=this.options.getSortData,f,g;a.each(function(){f=b(this),g={};for(var a in e)!c&&a==="original-order"?g[a]=b.data(this,"isotope-sort-data")[a]:g[a]=e[a](f,d);b.data(this,"isotope-sort-data",g)})},_sort:function(){var a=this.options.sortBy,b=this._getSorter,c=this.options.sortAscending?1:-1,d=function(d,e){var f=b(d,a),g=b(e,a);return f===g&&a!=="original-order"&&(f=b(d,"original-order"),g=b(e,"original-order")),(f>g?1:f<g?-1:0)*c};this.$filteredAtoms.sort(d)},_getSorter:function(a,c){return b.data(a,"isotope-sort-data")[c]},_translate:function(a,b){return{translate:[a,b]}},_positionAbs:function(a,b){return{left:a,top:b}},_pushPosition:function(a,b,c){b=Math.round(b+this.offset.left),c=Math.round(c+this.offset.top);var d=this.getPositionStyles(b,c);this.styleQueue.push({$el:a,style:d}),this.options.itemPositionDataEnabled&&a.data("isotope-item-position",{x:b,y:c})},layout:function(a,b){var c=this.options.layoutMode;this["_"+c+"Layout"](a);if(this.options.resizesContainer){var d=this["_"+c+"GetContainerSize"]();this.styleQueue.push({$el:this.element,style:d})}this._processStyleQueue(a,b),this.isLaidOut=!0},_processStyleQueue:function(a,c){var d=this.isLaidOut?this.isUsingJQueryAnimation?"animate":"css":"css",f=this.options.animationOptions,g=this.options.onLayout,h,i,j,k;i=function(a,b){b.$el[d](b.style,f)};if(this._isInserting&&this.isUsingJQueryAnimation)i=function(a,b){h=b.$el.hasClass("no-transition")?"css":d,b.$el[h](b.style,f)};else if(c||g||f.complete){var l=!1,m=[c,g,f.complete],n=this;j=!0,k=function(){if(l)return;var b;for(var c=0,d=m.length;c<d;c++)b=m[c],typeof b=="function"&&b.call(n.element,a,n);l=!0};if(this.isUsingJQueryAnimation&&d==="animate")f.complete=k,j=!1;else if(e.csstransitions){var o=0,p=this.styleQueue[0],s=p&&p.$el,t;while(!s||!s.length){t=this.styleQueue[o++];if(!t)return;s=t.$el}var u=parseFloat(getComputedStyle(s[0])[r]);u>0&&(i=function(a,b){b.$el[d](b.style,f).one(q,k)},j=!1)}}b.each(this.styleQueue,i),j&&k(),this.styleQueue=[]},resize:function(){this["_"+this.options.layoutMode+"ResizeChanged"]()&&this.reLayout()},reLayout:function(a){this["_"+this.options.layoutMode+"Reset"](),this.layout(this.$filteredAtoms,a)},addItems:function(a,b){var c=this._getAtoms(a);this.$allAtoms=this.$allAtoms.add(c),b&&b(c)},insert:function(a,b){this.element.append(a);var c=this;this.addItems(a,function(a){var d=c._filter(a);c._addHideAppended(d),c._sort(),c.reLayout(),c._revealAppended(d,b)})},appended:function(a,b){var c=this;this.addItems(a,function(a){c._addHideAppended(a),c.layout(a),c._revealAppended(a,b)})},_addHideAppended:function(a){this.$filteredAtoms=this.$filteredAtoms.add(a),a.addClass("no-transition"),this._isInserting=!0,this.styleQueue.push({$el:a,style:this.options.hiddenStyle})},_revealAppended:function(a,b){var c=this;setTimeout(function(){a.removeClass("no-transition"),c.styleQueue.push({$el:a,style:c.options.visibleStyle}),c._isInserting=!1,c._processStyleQueue(a,b)},10)},reloadItems:function(){this.$allAtoms=this._getAtoms(this.element.children())},remove:function(a,b){this.$allAtoms=this.$allAtoms.not(a),this.$filteredAtoms=this.$filteredAtoms.not(a);var c=this,d=function(){a.remove(),b&&b.call(c.element)};a.filter(":not(."+this.options.hiddenClass+")").length?(this.styleQueue.push({$el:a,style:this.options.hiddenStyle}),this._sort(),this.reLayout(d)):d()},shuffle:function(a){this.updateSortData(this.$allAtoms),this.options.sortBy="random",this._sort(),this.reLayout(a)},destroy:function(){var a=this.usingTransforms,b=this.options;this.$allAtoms.removeClass(b.hiddenClass+" "+b.itemClass).each(function(){var b=this.style;b.position="",b.top="",b.left="",b.opacity="",a&&(b[i]="")});var c=this.element[0].style;for(var d in this.originalStyle)c[d]=this.originalStyle[d];this.element.unbind(".isotope").undelegate("."+b.hiddenClass,"click").removeClass(b.containerClass).removeData("isotope"),w.unbind(".isotope")},_getSegments:function(a){var b=this.options.layoutMode,c=a?"rowHeight":"columnWidth",d=a?"height":"width",e=a?"rows":"cols",g=this.element[d](),h,i=this.options[b]&&this.options[b][c]||this.$filteredAtoms["outer"+f(d)](!0)||g;h=Math.floor(g/i),h=Math.max(h,1),this[b][e]=h,this[b][c]=i},_checkIfSegmentsChanged:function(a){var b=this.options.layoutMode,c=a?"rows":"cols",d=this[b][c];return this._getSegments(a),this[b][c]!==d},_masonryReset:function(){this.masonry={},this._getSegments();var a=this.masonry.cols;this.masonry.colYs=[];while(a--)this.masonry.colYs.push(0)},_masonryLayout:function(a){var c=this,d=c.masonry;a.each(function(){var a=b(this),e=Math.ceil(a.outerWidth(!0)/d.columnWidth);e=Math.min(e,d.cols);if(e===1)c._masonryPlaceBrick(a,d.colYs);else{var f=d.cols+1-e,g=[],h,i;for(i=0;i<f;i++)h=d.colYs.slice(i,i+e),g[i]=Math.max.apply(Math,h);c._masonryPlaceBrick(a,g)}})},_masonryPlaceBrick:function(a,b){var c=Math.min.apply(Math,b),d=0;for(var e=0,f=b.length;e<f;e++)if(b[e]===c){d=e;break}var g=this.masonry.columnWidth*d,h=c;this._pushPosition(a,g,h);var i=c+a.outerHeight(!0),j=this.masonry.cols+1-f;for(e=0;e<j;e++)this.masonry.colYs[d+e]=i},_masonryGetContainerSize:function(){var a=Math.max.apply(Math,this.masonry.colYs);return{height:a}},_masonryResizeChanged:function(){return this._checkIfSegmentsChanged()},_fitRowsReset:function(){this.fitRows={x:0,y:0,height:0}},_fitRowsLayout:function(a){var c=this,d=this.element.width(),e=this.fitRows;a.each(function(){var a=b(this),f=a.outerWidth(!0),g=a.outerHeight(!0);e.x!==0&&f+e.x>d&&(e.x=0,e.y=e.height),c._pushPosition(a,e.x,e.y),e.height=Math.max(e.y+g,e.height),e.x+=f})},_fitRowsGetContainerSize:function(){return{height:this.fitRows.height}},_fitRowsResizeChanged:function(){return!0},_cellsByRowReset:function(){this.cellsByRow={index:0},this._getSegments(),this._getSegments(!0)},_cellsByRowLayout:function(a){var c=this,d=this.cellsByRow;a.each(function(){var a=b(this),e=d.index%d.cols,f=Math.floor(d.index/d.cols),g=(e+.5)*d.columnWidth-a.outerWidth(!0)/2,h=(f+.5)*d.rowHeight-a.outerHeight(!0)/2;c._pushPosition(a,g,h),d.index++})},_cellsByRowGetContainerSize:function(){return{height:Math.ceil(this.$filteredAtoms.length/this.cellsByRow.cols)*this.cellsByRow.rowHeight+this.offset.top}},_cellsByRowResizeChanged:function(){return this._checkIfSegmentsChanged()},_straightDownReset:function(){this.straightDown={y:0}},_straightDownLayout:function(a){var c=this;a.each(function(a){var d=b(this);c._pushPosition(d,0,c.straightDown.y),c.straightDown.y+=d.outerHeight(!0)})},_straightDownGetContainerSize:function(){return{height:this.straightDown.y}},_straightDownResizeChanged:function(){return!0},_masonryHorizontalReset:function(){this.masonryHorizontal={},this._getSegments(!0);var a=this.masonryHorizontal.rows;this.masonryHorizontal.rowXs=[];while(a--)this.masonryHorizontal.rowXs.push(0)},_masonryHorizontalLayout:function(a){var c=this,d=c.masonryHorizontal;a.each(function(){var a=b(this),e=Math.ceil(a.outerHeight(!0)/d.rowHeight);e=Math.min(e,d.rows);if(e===1)c._masonryHorizontalPlaceBrick(a,d.rowXs);else{var f=d.rows+1-e,g=[],h,i;for(i=0;i<f;i++)h=d.rowXs.slice(i,i+e),g[i]=Math.max.apply(Math,h);c._masonryHorizontalPlaceBrick(a,g)}})},_masonryHorizontalPlaceBrick:function(a,b){var c=Math.min.apply(Math,b),d=0;for(var e=0,f=b.length;e<f;e++)if(b[e]===c){d=e;break}var g=c,h=this.masonryHorizontal.rowHeight*d;this._pushPosition(a,g,h);var i=c+a.outerWidth(!0),j=this.masonryHorizontal.rows+1-f;for(e=0;e<j;e++)this.masonryHorizontal.rowXs[d+e]=i},_masonryHorizontalGetContainerSize:function(){var a=Math.max.apply(Math,this.masonryHorizontal.rowXs);return{width:a}},_masonryHorizontalResizeChanged:function(){return this._checkIfSegmentsChanged(!0)},_fitColumnsReset:function(){this.fitColumns={x:0,y:0,width:0}},_fitColumnsLayout:function(a){var c=this,d=this.element.height(),e=this.fitColumns;a.each(function(){var a=b(this),f=a.outerWidth(!0),g=a.outerHeight(!0);e.y!==0&&g+e.y>d&&(e.x=e.width,e.y=0),c._pushPosition(a,e.x,e.y),e.width=Math.max(e.x+f,e.width),e.y+=g})},_fitColumnsGetContainerSize:function(){return{width:this.fitColumns.width}},_fitColumnsResizeChanged:function(){return!0},_cellsByColumnReset:function(){this.cellsByColumn={index:0},this._getSegments(),this._getSegments(!0)},_cellsByColumnLayout:function(a){var c=this,d=this.cellsByColumn;a.each(function(){var a=b(this),e=Math.floor(d.index/d.rows),f=d.index%d.rows,g=(e+.5)*d.columnWidth-a.outerWidth(!0)/2,h=(f+.5)*d.rowHeight-a.outerHeight(!0)/2;c._pushPosition(a,g,h),d.index++})},_cellsByColumnGetContainerSize:function(){return{width:Math.ceil(this.$filteredAtoms.length/this.cellsByColumn.rows)*this.cellsByColumn.columnWidth}},_cellsByColumnResizeChanged:function(){return this._checkIfSegmentsChanged(!0)},_straightAcrossReset:function(){this.straightAcross={x:0}},_straightAcrossLayout:function(a){var c=this;a.each(function(a){var d=b(this);c._pushPosition(d,c.straightAcross.x,0),c.straightAcross.x+=d.outerWidth(!0)})},_straightAcrossGetContainerSize:function(){return{width:this.straightAcross.x}},_straightAcrossResizeChanged:function(){return!0}},b.fn.imagesLoaded=function(a){function h(){a.call(c,d)}function i(a){var c=a.target;c.src!==f&&b.inArray(c,g)===-1&&(g.push(c),--e<=0&&(setTimeout(h),d.unbind(".imagesLoaded",i)))}var c=this,d=c.find("img").add(c.filter("img")),e=d.length,f="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",g=[];return e||h(),d.bind("load.imagesLoaded error.imagesLoaded",i).each(function(){var a=this.src;this.src=f,this.src=a}),c};var x=function(b){a.console&&a.console.error(b)};b.fn.isotope=function(a,c){if(typeof a=="string"){var d=Array.prototype.slice.call(arguments,1);this.each(function(){var c=b.data(this,"isotope");if(!c){x("cannot call methods on isotope prior to initialization; attempted to call method '"+a+"'");return}if(!b.isFunction(c[a])||a.charAt(0)==="_"){x("no such method '"+a+"' for isotope instance");return}c[a].apply(c,d)})}else this.each(function(){var d=b.data(this,"isotope");d?(d.option(a),d._init(c)):b.data(this,"isotope",new b.Isotope(a,this,c))});return this}})(window,jQuery);
;var $container=jQuery('.tzPortfolioGrid_Content'),tzpg_resizeTimer=null;function TzTemplateResizeImage(obj){var widthStage;var heightStage;var widthImage;var heightImage;obj.each(function(i,el){heightStage=jQuery(this).height();widthStage=jQuery(this).width();var img_url=jQuery(this).find('img').attr('src');var image=new Image();image.src=img_url;image.onload=function(){}
widthImage=image.naturalWidth;heightImage=image.naturalHeight;var tzimg=new resizeImage(widthImage,heightImage,widthStage,heightStage);jQuery(this).find('img').css({top:tzimg.top,left:tzimg.left,width:tzimg.width,height:tzimg.height});});}
if(typeof tzDesktop=='undefined'){var tzDesktop=4}
if(typeof tztabletportrait=='undefined'){var tztabletportrait=3}
if(typeof tzmobilelandscape=='undefined'){var tzmobilelandscape=2}
if(typeof tzmobileportrait=='undefined'){var tzmobileportrait=1}
if(typeof tzheight_item=='undefined'){var tzheight_item=300}
function tzpg_create_tags(){var cat_status=[];jQuery('.tzPortfolioGrid_Content .tzPortfolioGrid-item').each(function(){var item_class=jQuery(this).attr('class');item_class=item_class.split(' ');for(var i=0;i<item_class.length;i++){if(parseInt(item_class[i].indexOf('interiart'),10)===0){if(jQuery.inArray(item_class[i],cat_status)){cat_status.push(item_class[i]);}}}});for(var index=0;index<cat_status.length;index++){jQuery('.tzfilter a#'+cat_status[index]).removeClass('TZHide');}}
function tzpg_init(tzDesktop,tztabletportrait,tzmobilelandscape,tzmobileportrait){var contentWidth=jQuery('.tzPortfolioGrid_Content').width();var numberItem=2;var newColWidth=0;var featureColWidth=0;var widthWindwow=jQuery(window).width();if(widthWindwow>=992){numberItem=tzDesktop;}else if(widthWindwow>=768){numberItem=tztabletportrait;}else if(widthWindwow>=480){numberItem=tzmobilelandscape;}else if(widthWindwow<480){numberItem=tzmobileportrait;}
newColWidth=Math.floor(contentWidth/numberItem);featureColWidth=newColWidth*2;jQuery('.tzPortfolioGrid-item').width(newColWidth);jQuery('.tz_feature_item').width(featureColWidth);jQuery('.tzPortfolioGrid-item .tz-inner .item-img').css('height',tzheight_item+'px');var $container=jQuery('.tzPortfolioGrid_Content');if(navigator.userAgent.indexOf('Safari')!=-1&&navigator.userAgent.indexOf('Chrome')==-1){$container.isotope({itemSelector:'.tzPortfolioGrid-item',masonry:{columnWidth:newColWidth}});}else{$container.imagesLoaded(function(){$container.isotope({itemSelector:'.tzPortfolioGrid-item',masonry:{columnWidth:newColWidth}});});}
TzTemplateResizeImage(jQuery('.tzPortfolioGrid-item .tz-inner .item-img'));jQuery('.simple-ajax-popup-align-top').magnificPopup({type:'ajax',alignTop:true,overflowY:'scroll',removalDelay:500,callbacks:{beforeOpen:function(){this.st.mainClass=this.st.el.attr('data-effect');},},closeOnContentClick:true,midClick:true});}
jQuery(window).bind('load resize',function(){if(tzpg_resizeTimer)clearTimeout(tzpg_resizeTimer);tzpg_resizeTimer=setTimeout("tzpg_init(tzDesktop, tztabletportrait, tzmobilelandscape, tzmobileportrait)",100);});function tzpg_loadPortfolio(){var $container=jQuery('.tzPortfolioGrid_Content');var $optionSets=jQuery('.tzfilter'),$optionLinks=$optionSets.find('a');$optionLinks.on('click',function(event){event.preventDefault();var $this=jQuery(this);if($this.hasClass('selected')){return false;}
var $optionSet=$this.parents('.tzfilter');$optionSet.find('.selected').removeClass('selected');$this.addClass('selected');var options={},key=$optionSet.attr('data-option-key'),value=$this.attr('data-option-value');value=value==='false'?false:value;options[key]=value;if(key==='layoutMode'&&typeof changeLayoutMode==='function'){changeLayoutMode($this,options);}else{$container.isotope(options);}
return false;});}
jQuery(document).ready(function(){jQuery('.simple-ajax-popup-align-top').magnificPopup({type:'ajax',alignTop:true,overflowY:'scroll',removalDelay:500,callbacks:{beforeOpen:function(){this.st.mainClass=this.st.el.attr('data-effect');},},closeOnContentClick:true,midClick:true});jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({social_tools:false,hook:'data-rel'});$container.imagesLoaded(function(){tzpg_init(tzDesktop,tztabletportrait,tzmobilelandscape,tzmobileportrait);});tzpg_create_tags();tzpg_loadPortfolio();});jQuery(function(){$container.infinitescroll({navSelector:'#loadajax a',nextSelector:'#loadajax a:first',itemSelector:'.tzPortfolioGrid-item',errorCallback:function(){jQuery('#tz_append a').addClass('tzNomore');},loading:{msgText:'',finishedMsg:'',img:'',selector:'#tz_append'}},function(newElements){var $newElems=jQuery(newElements).css({opacity:0});$newElems.imagesLoaded(function(){$newElems.animate({opacity:1});$container.isotope('appended',$newElems);if(String(jQuery.browser.safari)&&String(document.readyState)!=="complete"){tzpg_init(tzDesktop,tztabletportrait,tzmobilelandscape,tzmobileportrait);}else{tzpg_init(tzDesktop,tztabletportrait,tzmobilelandscape,tzmobileportrait);}
if($newElems.length){jQuery('div#tz_append').find('a:first').show();}});tzpg_create_tags();});jQuery(window).unbind('.infscr');jQuery('div#tz_append a').on('click',function(){jQuery('div#tz_append').find('a:first').hide();$container.infinitescroll('retrieve');});});