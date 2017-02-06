(function() {
    tinymce.create('tinymce.plugins.plazarttitle', {
        init : function(ed, url) {
            ed.addButton('plazarttitle', {
                title : 'Add Title',
                image : url+'/title.png',
                onclick : function() {
                    tzsimplelove_create_title();
                    jQuery.fancybox({
                        'type' : 'inline',
                        'title' : 'Add Title',
                        'href' : '#create_title',
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
    tinymce.PluginManager.add('plazarttitle', tinymce.plugins.plazarttitle);
})();

function tzsimplelove_create_title() {
    if ( jQuery('#create_title').length ) {
        jQuery('#create_title').remove();
    }
    var $html_image = jQuery('<div id="create_title">\
                                    <div class="create_content">\
                                        <label class="TzTitle">Title</label></br>\
                                        <input type="text" name="title" value="" class="tztitle tzinput tzvalue" /></br>\
                                        <button class="button button-primary button-large" id="tz-insert-title">Add shortcode</button>\
                                    </div>\
                                </div>');
    $html_image.appendTo('body');

    // insert title
    jQuery('#tz-insert-title').on('click', function(){
        var $title              = jQuery('.tztitle').val();

        var title_view = '[title title="'+$title+'"]';
        tinyMCE.activeEditor.execCommand('mceInsertContent',0, title_view);
        jQuery.fancybox.close();
        jQuery('#create_title').remove();
    });
}
