(function() {
    tinymce.create('tinymce.plugins.plazartlist', {
        init : function(ed, url) {
            // Register command
            ed.addCommand('interiart_list', function () {
                ed.windowManager.open({
                    file:url + '/list_form.php',
                    width:450 + parseInt(ed.getLang('list_form.delta_width', 0), 10),
                    height:450 + parseInt(ed.getLang('list_form.delta_height', 0), 10),
                    inline:1
                });
            });

            ed.addButton('plazartlist', {title:'Add List', cmd:'interiart_list', image:url + '/add_list.png' });
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
    tinymce.PluginManager.add('plazartlist', tinymce.plugins.plazartlist);
})();




