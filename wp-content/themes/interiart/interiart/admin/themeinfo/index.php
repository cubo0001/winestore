<?php

global $wpdb;

/*
|--------------------------------------------------------------------------
| Add to Appearance Menu
|--------------------------------------------------------------------------
*/ 
add_action('admin_menu', 'interiart_theme_info_page');

function interiart_theme_info_page() {
    
	global $theme_path;
    add_theme_page('interiart'.' Interiart Info', 'Interiart Info','install_themes', 'view_info' , 'interiart_view_info');
}

/*
|--------------------------------------------------------------------------
| Output
|--------------------------------------------------------------------------
*/ 
function interiart_view_info() { ?>

<div class="wrap">
	
    <div class="icon32" id="icon-options-general"><br></div>
    <h2><?php  esc_html_e( 'Interiart Info' , 'interiart' ); ?></h2>
	<h3 class="title"><?php  esc_html_e( 'Please paste down these information when starting a support inquiry in our supportforum' , 'interiart' ); ?></h3>
	
    <table class="form-table">
    <tbody>
    
    <tr valign="top">
        <th scope="row">WordPress Version:</th>
        <td> <?php echo esc_attr(get_bloginfo('version')); ?> </td>
    </tr>
    
    <tr valign="top">
        <th scope="row">URL:</th>
        <td> <?php echo esc_url(site_url()); ?> </td>
    </tr>
    
    <tr valign="top">
        <th scope="row">Installed Theme:</th>
        <td> <?php echo esc_attr('interiart'); ?> </td>
    </tr>
    
    <tr valign="top">
        <th scope="row">Theme Version:</th>
        <td> 1.1.2 </td>
    </tr>
   
   	<tr valign="top">
        <th scope="row">PHP Version:</th>
        <td> <?php echo esc_attr(phpversion()); ?> </td>
    </tr>
    
    <?php if( is_array(get_option( 'active_plugins' ))) : ?>
    <tr valign="top">
        <th scope="row">Installed Plugins:</th>
        <td>
        
        <ul>
        <?php foreach(get_option( 'active_plugins' ) as $plugin) {
                echo '<li>'.esc_attr($plugin).'</li>';
        } ?>
        </ul>
        
        </td>
    </tr>
    <?php endif; ?>
        
    </tbody></table>
        
</div>

<?php } ?>