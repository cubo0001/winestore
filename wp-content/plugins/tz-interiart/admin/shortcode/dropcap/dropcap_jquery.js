(function() {
    tinymce.create('tinymce.plugins.plazartdropcap', {
        init : function(ed, url) {
            ed.addButton('plazartdropcap', {
                title : 'Add Dropcap',
                image : url+'/dropcap.png',
                onclick : function() {
                    tztitania_create_dropcap();
                    jQuery.fancybox({
                        'type' : 'inline',
                        'title' : 'Add dropcap',
                        'href' : '#create_dropcap',
                        helpers:  {
                            title : {
                                type : 'over',
                                position:'top'
                            }
                        }
                    });
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname:'Plazart TinyMCE Shortcode',
                author:'Plazart',
                authorurl:'http://templaza.com',
                infourl:'http://templaza.com',
                version:tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });
    tinymce.PluginManager.add('plazartdropcap', tinymce.plugins.plazartdropcap);
})();


function tztitania_create_dropcap() {
    if ( jQuery('#create_dropcap').length ) {
        jQuery('#create_dropcap').remove();
    }
    var $tzmaniva_html_image = jQuery('<div id="create_dropcap">\
                                    <div class="create_content">\
                                        <div class="TzDropcapContainer">\
                                            <label class="tzshortcodetitle">Type Dropcap</label>\
                                            <select id="type_dropcap">\
                                                    <option value="type1">Type1</option>\
                                                    <option value="type2">Type2</option>\
                                            </select>\
                                        </div>\
                                        <div class="TzDropcapContainer">\
                                            <label class="tzshortcodetitle">Letter</label>\
                                            <input type="text" class="form-control tzdropcap-letter" placeholder=""> Example: S\
                                        </div></br>\
                                    </div>\
                                    <button class="button button-primary button-large" id="tz-insert-dropcap">Add shortcode</button>\
                                    </div>\
                                </div>');
    $tzmaniva_html_image.appendTo('body');

    // insert image
    jQuery('#tz-insert-dropcap').on('click', function(){
        var $tzmaniva_type          = jQuery('#type_dropcap').val();
        var $tzmaniva_letter       = jQuery('.tzdropcap-letter').val();

        var $tzmaniva_view_dropcap = '[dropcap tzmaniva_type="'+$tzmaniva_type+'" tzmaniva_letter="'+$tzmaniva_letter+'"]';
        tinyMCE.activeEditor.execCommand('mceInsertContent',0,$tzmaniva_view_dropcap);
        jQuery.fancybox.close();
        jQuery('#create_dropcap').remove();
    });
}