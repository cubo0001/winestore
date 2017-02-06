<?php
$tzmaniva_current_path = __FILE__; //absolute path
$tzmaniva_path_arr = explode('wp-content', $tzmaniva_current_path);
require_once($tzmaniva_path_arr[0] . '/wp-load.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo esc_html__('List Shortcode', 'tz-plazart'); ?></title>
    <link rel="stylesheet" href="<?php echo THEME_PATH; ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo THEME_PATH; ?>/css/shortcode_admin.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
</head>
<body>
<div class="container">
    <form role="form">
        <div class="create_content">
            <div class="form-group">
                <label class="tzshortcodetitle"><?php echo esc_html__('Type List', 'tz-plazart');?></label>
                <select class="type_list">
                    <option value="no_underlined"><?php echo esc_html__('No Underlined', 'tz-plazart');?></option>
                    <option value="underlined"><?php echo esc_html__('Underlined', 'tz-plazart');?></option>
                    <option value="icon_highlight"><?php echo esc_html__('Icon Highlight', 'tz-plazart');?></option>
                </select>
            </div>
            <div class="create_item">

                <div class="form-group">
                    <label><?php echo esc_html__('List Icon', 'tz-plazart');?></label>
                    <input type="text" class="form-control tzlist_icon" placeholder=""> Example: fa-caret-right
                </div>
                <div class="form-group">
                    <label class="TzListTitle"><?php echo esc_html__('List Content', 'tz-plazart');?></label>
                    <textarea rows="5" class="tzContent tzlist_content tzvalue"></textarea>
                </div>
                <button class="tz-remove"></button>
            </div>
        </div>
        <button id="tz-new-list" class="tz-new" ><?php echo esc_html__('Add New', 'tz-plazart');?></button>
        <button class="button button-primary button-large" id="tz-insert-list"><?php echo esc_html__('Add shortcode', 'tz-plazart');?></button>
    </form>
</div>

<script type="text/javascript">

    jQuery('#tz-new-list').on('click', function (event){
        event.preventDefault();
        var list_item = jQuery('.create_item').first().clone();
        list_item.find('input').val('');
        list_item.find('.tz-remove').addClass('tz-remove-block tz-remove-img');
        jQuery('.create_content').append(list_item);
        jQuery('.tz-remove-block').on('click',function(){
            jQuery(this).parent().remove();
        });
    });
    // insert list
    jQuery('#tz-insert-list').on('click', function(){
        var $listtype   = jQuery('.type_list').val();
        var $list_item  = '';
        jQuery('.create_item').each(function(){
            var $item_icon      = jQuery(this).find('.tzlist_icon').val();
            var $item_content   = jQuery(this).find('.tzlist_content').val();
            $list_item          += '[list_item item_icon="'+$item_icon+'" item_content="'+$item_content+'"]';
        });
        var $viewlist = '[list type="'+$listtype+'"]'+$list_item+'[/list]';
        tinyMCEPopup.execCommand('mceReplaceContent', false, $viewlist);
        tinyMCEPopup.close();
    });
</script>
</body>
</html>