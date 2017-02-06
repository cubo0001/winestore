<?php


update_option( 'ot_hide_cleanup', 1 );
/*
 * Initialize the options before anything else.
 */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

add_action('admin_init','interiart_theme_options',1);

/*
 * Build the custom settings & update OptionTree.
*/

function interiart_theme_options()
{

    /**
     * Get a copy of the saved settings array.
     */
    $interiart_saved_setting = get_option('option_tree_settings', array());

    // Pattern
    $interiart_patterns = array();
    if ($interiart_dir = opendir(get_template_directory() . '/images/patterns/')) {
        while (false !== ($interiart_file = readdir($interiart_dir))) {
            if ($interiart_file != '..' && $interiart_file != '.') {
                $interiart_patterns[] = array(
                    'value' => trim($interiart_file),
                    'label' => 'Click on pattern to preview',
                    'src'   => get_template_directory_uri() . '/images/patterns/' . $interiart_file, 40, 40, true
                );
            }
        }
        // Close directory handle
        closedir($interiart_dir);
    }

    $interiart_breadcrumb = get_template_directory_uri().'/images/breadcrumb.jpg';
    $interiart_background_footer = get_template_directory_uri().'/images/background_footer.png';

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $interiart_custom_settings = array(
        'contextual_help' => array(
            'content' => array(
                array(
                    'id'      => 'general_help',
                    'title'   => 'General',
                    'content' => '<p>Help content goes here!</p>'
                ),
            ),
            'sidebar' => '<p>Sidebar content goes here!</p>'
        ),
        'sections'        => array(
            array(
                'id'    => 'logo',
                'title' =>  esc_html__('Logo & Favicon', 'interiart'),
            ),
            array(
                'id'    =>  'TZThemecolor',
                'title' =>   esc_html__('Theme Color', 'interiart'),
            ),
            array(
                'id'    =>  'TzSyle',
                'title' =>   esc_html__('Font Option', 'interiart'),
            ),
            array(
                'id'    =>  'TZBody',
                'title' =>   esc_html__('Body Style', 'interiart'),
            ),

            array(
                'id'    =>  'TzFontHeader',
                'title' =>   esc_html__('Header Style', 'interiart'),
            ),
            array(
                'id'    =>  'TzFontMenu',
                'title' =>   esc_html__('Menu Style', 'interiart'),
            ),
            array(
                'id'    =>  'TzFontCustom',
                'title' =>   esc_html__('Custom Style', 'interiart'),
            ),
            array(
                'id'    =>  'TzCustomCss',
                'title' =>   esc_html__('Custom CSS', 'interiart'),
            ),
            array(
                'id'    =>  'TZBackground',
                'title' =>   esc_html__('Background style', 'interiart'),
            ),
            array(
                'id'    =>  'TzHeaderTopOption',
                'title' =>   esc_html__('Header Option', 'interiart'),
            ),
            array(
                'id'    =>  'TzBreadcrumbOption',
                'title' =>   esc_html__('Breadcrumb Option', 'interiart'),
            ),
            array(
                'id'    =>  'TzBlogOption',
                'title' =>   esc_html__('Blog Option', 'interiart'),
            ),
            array(
                'id'    =>  'TzSinglePostOption',
                'title' =>   esc_html__('Single Post Option', 'interiart'),
            ),
            array(
                'id'    =>  'TzSingleServiceOption',
                'title' =>   esc_html__('Single Service Option', 'interiart'),
            ),
            array(
                'id'    =>  'tzSinglePortfolioOption',
                'title' =>   esc_html__('Single Portfolio Option','interiart'),
            ),
            array(
                'id'    =>  'tzShopOption',
                'title' =>   esc_html__('Shop Option','interiart'),
            ),
            array(
                'id'    =>  'tzShopDetailOption',
                'title' =>   esc_html__('Shop Detail Option','interiart'),
            ),
            array(
                'id'    => '404',
                'title' =>  esc_html__('404 Page', 'interiart'),
            ),
            array(
                'id'    => 'footeroption',
                'title' =>  esc_html__('Footer Options', 'interiart'),
            ),
            array(
                'id'    => 'footeroptiontype1',
                'title' =>  esc_html__('Footer Type 1 Options', 'interiart'),
            ),
            array(
                'id'    => 'footeroptiontype2',
                'title' =>  esc_html__('Footer Type 2 Options', 'interiart'),
            ),
            array(
                'id'    => 'footeroptiontype3',
                'title' =>  esc_html__('Footer Type 3 Options', 'interiart'),
            ),
            array(
                'id'    => 'copyright',
                'title' =>  esc_html__('Copyright', 'interiart'),
            ),
        ),

        'settings'        => array(

            array(
                'id'        => 'interiart_logotype',
                'label'     =>  esc_html__('Logo Type', 'interiart'),
                'desc'      =>  esc_html__('select type for logo text or image', 'interiart'),
                'std'       => '1',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => '1',
                        'label' =>  esc_html__('Logo image', 'interiart'),
                    ),
                    array(
                        'value' => '0',
                        'label' =>  esc_html__('Logo text', 'interiart'),
                    )
                ),
            ),
            array(
                'id'        => 'interiart_logoText',
                'label'     =>  esc_html__('Logo Text', 'interiart'),
                'desc'      =>  esc_html__('logo name for your website', 'interiart'),
                'std'       => '',
                'type'      => 'text',
                'section'   => 'logo',
            ),

            array(
                'id'        =>  'interiart_logoTextcolor',
                'label'     =>  esc_html__('Color logo', 'interiart'),
                'desc'      =>  esc_html__('logo text color', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'interiart_logo',
                'label'     =>  esc_html__('Upload Logo', 'interiart'),
                'desc'      =>  esc_html__('Logo using for home page and page shop', 'interiart'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'interiart_favicon_onoff',
                'label'     =>  esc_html__('Enable Favicon', 'interiart'),
                'desc'      =>  esc_html__('Show or hide Favicon', 'interiart'),
                'std'       => 'no',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' =>  esc_html__('Yes', 'interiart'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' =>  esc_html__('No', 'interiart'),
                        'src'   => ''
                    )
                ),
            ),

            array(
                'id'        => 'interiart_favicon',
                'label'     =>  esc_html__('Upload Favicon Icon', 'interiart'),
                'desc'      =>  esc_html__('Please choose an image  to use for favicon.', 'interiart'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),

            /* ==========================================
            *  Option color theme
            ==========================================*/
            array(
                'id'        =>  'interiart_TZTypecolor',
                'label'     =>   esc_html__('Config Color', 'interiart'),
                'desc'      =>  '',
                'std'       =>  '0',
                'type'      =>  'select',
                'section'   =>  'TZThemecolor',
                'choices'   =>  array(
                    array(
                        'value' =>  '0',
                        'label' =>   esc_html__('Limited Color', 'interiart'),
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('Unlimited color', 'interiart'),
                    )
                ),
            ),

            array(
                'id'        =>  'interiart_TZThemecolor_limited',
                'label'     =>  esc_html__('Choose color','interiart'),
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'TZThemecolor',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/yellow.jpg'
                    ),
                    array(
                        'value' =>  '#57a6f0',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/blue.jpg'
                    ),
                    array(
                        'value' =>  '#fece15',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/orange.jpg'
                    ),
                    array(
                        'value' =>  '#e80f60',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/pink.jpg'
                    ),
                    array(
                        'value' =>  '#53c5a9',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/green.jpg'
                    ),
                    array(
                        'value' =>  '#77be32',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/limegreen.jpg'
                    ),
                    array(
                        'value' =>  '#d786fe',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/violet.jpg'
                    ),
                    array(
                        'value' =>  '#9b59b6',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/blueviolet.jpg'
                    ),
                    array(
                        'value' =>  '#c0392b',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/firebrick.jpg'
                    ),
                    array(
                        'value' =>  '#4cddf3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/skyblue.jpg'
                    ),
                    array(
                        'value' =>  '#f2333a',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/red.jpg'
                    ),
                    array(
                        'value' =>  '#3333f2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/darkblue.jpg'
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_TZThemecolor_unlimited',
                'label'     =>  esc_html__('Choose Color', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'TZThemecolor',
            ),

            /* ==========================================
            *  footer option
            ==========================================*/
            array(
                'id'        =>  'interiartfooter_description',
                'label'     =>   esc_html__('Footer Widgets', 'interiart'),
                'desc'      =>   esc_html__('Config footer', 'interiart'),
                'std'       =>  '',
                'type'      => 'textblock-titled',
                'section'   => 'footeroption',
                'rows'      => '5',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'interiart_footer_type',
                'label'     =>   esc_html__('Config Color', 'interiart'),
                'desc'      =>  '',
                'std'       =>  'type1',
                'type'      =>  'select',
                'section'   =>  'footeroption',
                'choices'   =>  array(
                    array(
                        'value' =>  'type1',
                        'label' =>   esc_html__('Footer Type 1', 'interiart'),
                    ),
                    array(
                        'value' =>  'type2',
                        'label' =>   esc_html__('Footer Type 2', 'interiart'),
                    ),
                    array(
                        'value' =>  'type3',
                        'label' =>   esc_html__('Footer Type 3', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        => 'interiartfooter_Background_Image',
                'label'     =>  esc_html__('Upload Image Background','interiart'),
                'desc'      =>  esc_html__('Please choose an image  to use for Background.','interiart'),
                'std'       => $interiart_background_footer,
                'type'      => 'upload',
                'section'   => 'footeroptiontype1',
            ),

            array(
                'id'        =>  'interiartfooter_image',
                'label'     => '',
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'footeroptiontype1',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'footer1',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' =>  'footer2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' =>  'footer3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' =>  'footer4',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label'     =>   esc_html__('Number of Footer Columns.', 'interiart'),
                'id'        =>  'interiart_footer_columns',
                'desc'      =>   esc_html__('Select the number of columns to display in the footer.', 'interiart'),
                'section'   =>  'footeroptiontype1',
                'std'       =>  '4',
                'type'      =>  'select',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3'
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2'
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1'
                    ),
                )
            ),
            array(
                'id'      =>    'interiartfooterwidth1',
                'label'   =>     esc_html__('Footer width 1', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype1',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiartfooterwidth2',
                'label'   =>     esc_html__('Footer width 2', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype1',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiartfooterwidth3',
                'label'   =>     esc_html__('Footer width 3', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype1',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiartfooterwidth4',
                'label'   =>     esc_html__('Footer width 4', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype1',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),

            array(
                'id'        =>  'interiartfooter_Social',
                'label'     =>   esc_html__('Social Footer Option', 'interiart'),
                'desc'      =>  '',
                'std'       =>  '',
                'type'      => 'textblock-titled',
                'section'   => 'footeroptiontype1',
                'rows'      => '5',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'    =>  'interiart_TzFooter_facebook',
                'label' =>   esc_html__('Facebook Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1',
            ),
            array(
                'id'    =>  'interiart_TzFooter_twitter',
                'label' =>   esc_html__('Twitter Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_tumblr',
                'label' =>   esc_html__('Tumblr Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_linkedin',
                'label' =>   esc_html__('Linkedin Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_youtube',
                'label' =>   esc_html__('Youtube Play Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_dribbble',
                'label' =>   esc_html__('Dribbble Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_behance',
                'label' =>   esc_html__('Behance Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_skype',
                'label' =>   esc_html__('Skype Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_pinterest',
                'label' =>   esc_html__('Pinterest Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),
            array(
                'id'    =>  'interiart_TzFooter_google_plus',
                'label' =>   esc_html__('Google Plus Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype1'
            ),

            /* Footer Type 2 Option */

            array(
                'id'        => 'interiartfooterType2_Background_Image',
                'label'     =>  esc_html__('Upload Image Background','interiart'),
                'desc'      =>  esc_html__('Please choose an image  to use for Background.','interiart'),
                'std'       => $interiart_background_footer,
                'type'      => 'upload',
                'section'   => 'footeroptiontype2',
            ),

            array(
                'id'        =>  'interiartfooterType2_image',
                'label'     => '',
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'footeroptiontype2',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'footer1',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' =>  'footer2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' =>  'footer3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' =>  'footer4',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label'     =>   esc_html__('Number of Footer Columns.', 'interiart'),
                'id'        =>  'interiart_footerType2_columns',
                'desc'      =>   esc_html__('Select the number of columns to display in the footer.', 'interiart'),
                'section'   =>  'footeroptiontype2',
                'std'       =>  '4',
                'type'      =>  'select',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3'
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2'
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1'
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType2_width1',
                'label'   =>     esc_html__('Footer width 1', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype2',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType2_width2',
                'label'   =>     esc_html__('Footer width 2', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype2',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType2_width3',
                'label'   =>     esc_html__('Footer width 3', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype2',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType2_width4',
                'label'   =>     esc_html__('Footer width 4', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype2',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),

            array(
                'id'        =>  'interiart_footerType2_Social',
                'label'     =>   esc_html__('Social Footer Option', 'interiart'),
                'desc'      =>  '',
                'std'       =>  '',
                'type'      => 'textblock-titled',
                'section'   => 'footeroptiontype2',
                'rows'      => '5',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'    =>  'interiart_TzFooterType2_facebook',
                'label' =>   esc_html__('Facebook Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2',
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_twitter',
                'label' =>   esc_html__('Twitter Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_tumblr',
                'label' =>   esc_html__('Tumblr Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_linkedin',
                'label' =>   esc_html__('Linkedin Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_youtube',
                'label' =>   esc_html__('Youtube Play Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_dribbble',
                'label' =>   esc_html__('Dribbble Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_behance',
                'label' =>   esc_html__('Behance Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_skype',
                'label' =>   esc_html__('Skype Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_pinterest',
                'label' =>   esc_html__('Pinterest Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),
            array(
                'id'    =>  'interiart_TzFooterType2_google_plus',
                'label' =>   esc_html__('Google Plus Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footeroptiontype2'
            ),

            /* Footer Type 3 Option */

            array(
                'id'        =>  'interiartfooterType3_image',
                'label'     => '',
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'footeroptiontype3',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'footer1',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' =>  'footer2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' =>  'footer3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' =>  'footer4',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label'     =>   esc_html__('Number of Footer Columns.', 'interiart'),
                'id'        =>  'interiart_footerType3_columns',
                'desc'      =>   esc_html__('Select the number of columns to display in the footer.', 'interiart'),
                'section'   =>  'footeroptiontype3',
                'std'       =>  '4',
                'type'      =>  'select',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3'
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2'
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1'
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType3_width1',
                'label'   =>     esc_html__('Footer width 1', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype3',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType3_width2',
                'label'   =>     esc_html__('Footer width 2', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype3',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType3_width3',
                'label'   =>     esc_html__('Footer width 3', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype3',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'interiart_footerType3_width4',
                'label'   =>     esc_html__('Footer width 4', 'interiart'),
                'desc'    =>     esc_html__('config width for footer', 'interiart'),
                'section' =>    'footeroptiontype3',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),

            // Copyright Settings
            array(
                'id'        => 'interiart_copyright',
                'label'     => 'Copyright',
                'desc'      => '',
                'std'       => 'Copyright &copy; Templaza',
                'type'      => 'textarea',
                'section'   => 'copyright',
                'rows'      => '15',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // 404

            array(
                'id'        => 'interiart_404_content',
                'label'     =>  esc_html__('404 Content', 'interiart'),
                'desc'      => '',
                'std'       => 'Look like something went wrong! The page you were looking for is not here. Go Home or try a search.',
                'type'      => 'textarea-simple',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),


            // style option
            array(
                'id' =>  'interiart_TzSyle',
                'label'     =>  esc_html__('StyleConfig', 'interiart'),
                'desc'      => '<p>'. esc_html__('Config for body style, header style, menu style, custom style, background', 'interiart').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TzSyle',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // font style body -----------------------------------------------------------------------
            array(
                'id'        =>  'interiart_TZFontType',
                'label'     =>   esc_html__('Font Type', 'interiart'),
                'desc'      =>   esc_html__('option font type', 'interiart'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TZBody',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  'btn-group',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>   esc_html__('Goole Font', 'interiart'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>   esc_html__('Standard Font', 'interiart'),
                    ),


                ),
            ),

            //  font
            array(
                'id'       =>   'interiart_TzFontDefault',
                'label'    =>    esc_html__('Select Standard Font', 'interiart'),
                'desc'     =>    esc_html__('Select a font to use font-family', 'interiart'),
                'type'     =>   'select',
                'section'  =>   'TZBody',
                'class'    =>   'TzFontStylet',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>   esc_html__('Arial', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>   esc_html__('Tahoma', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>   esc_html__('Verdana', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>   esc_html__('Georgia', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>   esc_html__('Impact', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>   esc_html__('Times', 'interiart'),
                    ),
                )
            ),



            // google url
            array(
                'id'    =>  'interiart_TzFontFami',
                'label' =>   esc_html__('Google Url', 'interiart'),
                'desc'  =>   esc_html__('import google font URL Eg: http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody'
            ),

            // body font
            array(
                'id'    =>  'interiart_TzFontFaminy',
                'label' =>   esc_html__('Font Family', 'interiart'),
                'desc'  =>   esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody',
            ),
            array(
                'id'        =>  'interiart_TzBodySelecter',
                'label'     =>   esc_html__('Body Selectors', 'interiart'),
                'desc'      =>   esc_html__('you can specify a selector for font used in the document body eg: div#description', 'interiart'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TZBody',
                'rows'      =>  '10',
            ),
            // color code

            array(
                'id'        =>  'interiart_TzBodyColor',
                'label'     =>  esc_html__('Color code', 'interiart'),
                'desc'      =>  esc_html__('Color for text', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'TZBody',
            ),
            // end font style body


            // font style Header -----------------------------------------------------------------------
            array(
                'id'        =>  'interiart_TZFontTypeHead',
                'label'     =>   esc_html__('Font Type', 'interiart'),
                'desc'      =>   esc_html__('option font type', 'interiart'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>   esc_html__('Goole Font', 'interiart'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>   esc_html__('Standard Font', 'interiart'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'interiart_TzFontHeadDefault',
                'label'    =>    esc_html__('Select Standard Font', 'interiart'),
                'desc'     =>    esc_html__('Select a font to use font-family', 'interiart'),
                'type'     =>   'select',
                'section'  =>   'TzFontHeader',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>   esc_html__('Arial', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>   esc_html__('Tahoma', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>   esc_html__('Verdana', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>   esc_html__('Georgia', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>   esc_html__('Impact', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>   esc_html__('Times', 'interiart'),
                    )
                )
            ),



            // google url
            array(
                'id'    =>  'interiart_TzFontHeadGoodurl',
                'label' =>   esc_html__('Google Url', 'interiart'),
                'desc'  =>   esc_html__('import google font URL Eg: http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader'
            ),

            // body font
            array(
                'id'    =>  'interiart_TzFontFaminyHead',
                'label' =>   esc_html__('Font Family', 'interiart'),
                'desc'  =>   esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader',
            ),
            array(
                'id'        =>  'interiart_TzHeadSelecter',
                'label'     =>   esc_html__('Header Selecter', 'interiart'),
                'desc'      =>   esc_html__('You can specify a selector for font used in the document Header Eg: div#description', 'interiart'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '10',
            ),

            array(
                'id'        =>  'interiart_TzHeaderFontColor',
                'label'     =>  esc_html__('Color code', 'interiart'),
                'desc'      =>  esc_html__('Color for text', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'TzFontHeader',
            ),
            // end font header

            // font  Menu -----------------------------------------------------------------------

            array(
                'id'        =>  'interiart_TZFontTypeMenu',
                'label'     =>   esc_html__('Font Type', 'interiart'),
                'desc'      =>   esc_html__('Option font type', 'interiart'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>   esc_html__('Goole Font', 'interiart'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>   esc_html__('Standard Font', 'interiart'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'interiart_TzFontMenuDefault',
                'label'    =>    esc_html__('Select Standard Font', 'interiart'),
                'desc'     =>    esc_html__('Select a font to use font-family', 'interiart'),
                'type'     =>   'select',
                'section'  =>   'TzFontMenu',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>   esc_html__('Arial', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>   esc_html__('Tahoma', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>   esc_html__('Verdana', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>   esc_html__('Georgia', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>   esc_html__('Impact', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>   esc_html__('Times', 'interiart'),
                    )
                )
            ),



            // google url
            array(
                'id'    =>  'interiart_TzFontMenuGoodurl',
                'label' =>   esc_html__('Google Url', 'interiart'),
                'desc'  =>   esc_html__('import google font URL Eg: http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu'
            ),

            // Font Family
            array(
                'id'    =>  'interiart_TzFontFaminyMenu',
                'label' =>   esc_html__('Font Family', 'interiart'),
                'desc'  =>   esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu',
            ),
            array(
                'id'        =>  'interiart_TzMenuSelecter',
                'label'     =>   esc_html__('Menu Selectors', 'interiart'),
                'desc'      =>   esc_html__('you can specify a selector for font used in the document body eg: div#menu', 'interiart'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '10',
            ),

            array(
                'id'    =>  'interiart_TzMenuFontColor',
                'label'     =>  esc_html__('Color code', 'interiart'),
                'desc'      =>  esc_html__('Color for text', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'TzFontMenu',
            ),

            /*---end menu font--*/
            // font style custom -----------------------------------------------------------------------
            array(
                'id'        =>  'interiart_TZFontTypeCustom',
                'label'     =>   esc_html__('Font Type', 'interiart'),
                'desc'      =>   esc_html__('option font type', 'interiart'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>   esc_html__('Goole Font', 'interiart'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>   esc_html__('Standard Font', 'interiart'),
                    ),

                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'interiart_TzFontCustomDefault',
                'label'    =>    esc_html__('Select Standard Font', 'interiart'),
                'desc'     =>    esc_html__('Select a font to use font-family', 'interiart'),
                'type'     =>   'select',
                'section'  =>   'TzFontCustom',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>   esc_html__('Arial', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>   esc_html__('Tahoma', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>   esc_html__('Verdana', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>   esc_html__('Georgia', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>   esc_html__('Impact', 'interiart'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>   esc_html__('Times', 'interiart'),
                    )
                )
            ),



            // google url
            array(
                'id'    =>  'interiart_TzFontCustomGoodurl',
                'label' =>   esc_html__('Google Url', 'interiart'),
                'desc'  =>   esc_html__('import google font URL Eg: http://fonts.googleapis.com/css?family=Monsieur+La+Doulaise', 'interiart'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontCustom'
            ),

            // body font
            array(
                'id'       =>  'interiart_TzFontFaminyCustom',
                'label'    =>   esc_html__('Font Family', 'interiart'),
                'desc'     =>   esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'interiart'),
                'std'      =>  '',
                'type'     =>  'text',
                'section'  => 'TzFontCustom',
            ),
            array(
                'id'        =>  'interiart_TzCustomSelecter',
                'label'     =>   esc_html__('Custom Selecter', 'interiart'),
                'desc'      =>   esc_html__('you can specify a selector for font used in the document body eg: div#custom', 'interiart'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '10',
            ),

            array(
                'id'        =>  'interiart_TzCustomFontColor',
                'label'     =>   esc_html__('Color code', 'interiart'),
                'desc'      =>   esc_html__('Color for text', 'interiart'),
                'std'       =>  '',
                'type'      => 'colorpicker',
                'section'   => 'TzFontCustom',
            ),
            // end font custom

            /*-------custom css-------*/
            array(
                 'id'        =>  'interiart_TzCustomCss',
                 'label'     =>   esc_html__('Code CSS', 'interiart'),
                 'desc'      =>   esc_html__('Paste your CSS code, do not include any tags or HTML in thie field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', 'interiart'),
                 'std'       =>  '',
                 'type'      => 'textarea-simple',
                 'section'   => 'TzCustomCss',
            ),
            // end custom css

            /* Background */
            array(
                'id'        => 'cbackground',
                'label'     => 'Background',
                'desc'      => '<p>'. esc_html__('Default background for Post, Page, Portfolio, Category, Archive, Seach page.', 'interiart').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_background_type',
                'label'     =>  esc_html__('Background Type', 'interiart'),
                'desc'      =>  esc_html__('You can choose the background you want between our pre-provided pattern and your custom image.', 'interiart'),
                'std'       => 'none',
                'type'      => 'select',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'none',
                        'label' =>  esc_html__('Default', 'interiart'),
                    ),
                    array(
                        'value' => 'pattern',
                        'label' =>  esc_html__('Pattern', 'interiart'),
                    ),
                    array(
                        'value' => 'single_image',
                        'label' =>  esc_html__('Single image', 'interiart'),
                    ),
                ),
            ),
            array(
                'id'        =>  'interiart_TZBackgroundColor',
                'label'     =>  esc_html__('Color code', 'interiart'),
                'desc'      =>  esc_html__('Background color code', 'interiart'),
                'std'       => '',
                'type'      => 'colorpicker',
                'section'   => 'TZBackground',
            ),
            array(
                'id'        => 'interiart_background_pattern',
                'label'     =>  esc_html__('Choose Pattern', 'interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'radio-image',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'background_pattern',
                'choices'   => $interiart_patterns
            ),
            array(
                'id'        => 'interiart_background_single_image',
                'label'     =>  esc_html__('Single Image Background', 'interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            /*  HEADER TOP OPTION */
            array(
                'id'        =>  'interiart_TzHeader_type',
                'label'     =>   esc_html__('Header Type Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose type of header.', 'interiart'),
                'std'       =>  '1',
                'type'      =>  'select',
                'section'   =>  'TzHeaderTopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('Header Type 1', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('Header Type 2', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('Header Type 3', 'interiart'),
                    ),
                ),
            ),
            array(
                'id'        =>  'interiart_TzHeaderTop_Language',
                'label'     =>   esc_html__('Language Dropdown Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide language dropdown option.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzHeaderTopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_Email',
                'label' =>   esc_html__('Email', 'interiart'),
                'desc'  =>   esc_html__('Import email contact.Ex: info@templaza.com', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_facebook',
                'label' =>   esc_html__('Facebook Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_twitter',
                'label' =>   esc_html__('Twitter Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_tumblr',
                'label' =>   esc_html__('Tumblr Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_linkedin',
                'label' =>   esc_html__('Linkedin Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_youtube',
                'label' =>   esc_html__('Youtube Play Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_dribbble',
                'label' =>   esc_html__('Dribbble Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_behance',
                'label' =>   esc_html__('Behance Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_skype',
                'label' =>   esc_html__('Skype Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_pinterest',
                'label' =>   esc_html__('Pinterest Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),
            array(
                'id'    =>  'interiart_TzHeaderTop_google_plus',
                'label' =>   esc_html__('Google Plus Url', 'interiart'),
                'desc'  =>   esc_html__('', 'interiart'),
                'std'   =>  'info@templaza.com',
                'type'  =>  'text',
                'section'=> 'TzHeaderTopOption'
            ),

            /* BREADCRUMB OPTION */

            array(
                'id'        =>  'interiarttzBreadcrumb',
                'label'     =>  esc_html__('Breadcrumb Option','interiart'),
                'desc'      =>  '',
                'std'       =>  '',
                'type'      => 'textblock-titled',
                'section'   => 'TzBreadcrumbOption',
                'rows'      => '5',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'interiart_tzBreadcrumb_title',
                'label'     =>   esc_html__('Title Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide title.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzBreadcrumbOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_tzBreadcrumb_breadcrumb',
                'label'     =>   esc_html__('Breadcrumb Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide breadcrumb.', 'interiart'),
                'std'       =>  'hide',
                'type'      =>  'select',
                'section'   =>  'TzBreadcrumbOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        => 'interiart_tzBreadcrumb_Imagebg',
                'label'     =>  esc_html__('Upload Image Background','interiart'),
                'desc'      =>  esc_html__('Please choose an image  to use for Background.','interiart'),
                'std'       => $interiart_breadcrumb,
                'type'      => 'upload',
                'section'   => 'TzBreadcrumbOption',
            ),

            array(
                'id'       =>  'interiart_tzBreadcrumb_padding_top',
                'label'    =>   esc_html__('Padding Top (px)', 'interiart'),
                'desc'     =>  '',
                'std'      =>  '',
                'type'     =>  'text',
                'section'  => 'TzBreadcrumbOption',
            ),

            array(
                'id'       =>  'interiart_tzBreadcrumb_padding_bottom',
                'label'    =>   esc_html__('Padding Bottom (px)', 'interiart'),
                'desc'     =>  '',
                'std'      =>  '',
                'type'     =>  'text',
                'section'  => 'TzBreadcrumbOption',
            ),

            /* BLOG OPTION */

            array(
                'id'        =>  'interiart_TzBlog_Sidebar',
                'label'     =>   esc_html__('Sidebar Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.', 'interiart'),
                'std'       =>  'right',
                'type'      =>  'select',
                'section'   =>  'TzBlogOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar left', 'interiart'),
                    ),
                ),
            ),

            /* SINGLE PORT OPTION */

            array(
                'id'        =>  'interiart_TzSinglePost_Sidebar',
                'label'     =>   esc_html__('Single Post Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.', 'interiart'),
                'std'       =>  'right',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar left', 'interiart'),
                    ),
                ),
            ),
            array(
                'id'        =>  'interiart_TzSinglePost_Media',
                'label'     =>   esc_html__('Media Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide media of post ( image or slider or video or audio ).', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_Title',
                'label'     =>   esc_html__('Title Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide Title of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_author',
                'label'     =>   esc_html__('Author Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide author of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_date',
                'label'     =>   esc_html__('Date Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide date of post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_category',
                'label'     =>   esc_html__('Category Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide category of post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_tag',
                'label'     =>   esc_html__('Tag Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide tag of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_content',
                'label'     =>   esc_html__('Content Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide content of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_share',
                'label'     =>   esc_html__('Share Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide share of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_infoAuthor',
                'label'     =>   esc_html__('Infomation Author Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide infomation author of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePost_Comment',
                'label'     =>   esc_html__('Comment Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide comment of single post.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSinglePostOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            /* SINGLE Service OPTION */

            array(
                'id'        =>  'interiart_TzSingleService_Sidebar',
                'label'     =>   esc_html__('Single Service Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.', 'interiart'),
                'std'       =>  'right',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar left', 'interiart'),
                    ),
                ),
            ),
            array(
                'id'        =>  'interiart_TzSingleService_Media',
                'label'     =>   esc_html__('Media Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide media of Service ( image or slider or video or audio ).', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_Title',
                'label'     =>   esc_html__('Title Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide Title of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_author',
                'label'     =>   esc_html__('Author Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide author of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_date',
                'label'     =>   esc_html__('Date Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide date of Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_category',
                'label'     =>   esc_html__('Category Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide category of Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_tag',
                'label'     =>   esc_html__('Tag Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide tag of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_content',
                'label'     =>   esc_html__('Content Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide content of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_share',
                'label'     =>   esc_html__('Share Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide share of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_infoAuthor',
                'label'     =>   esc_html__('Infomation Author Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide infomation author of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSingleService_Comment',
                'label'     =>   esc_html__('Comment Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide comment of single Service.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'TzSingleServiceOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            /* SINGLE PORTFOLIO OPTION */

            array(
                'id'        =>  'interiart_TzSinglePortfolio_Sidebar',
                'label'     =>   esc_html__('Sidebar Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.Default is no sidebar.', 'interiart'),
                'std'       =>  'no',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'no',
                        'label' =>   esc_html__('No Sidebar', 'interiart'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar Right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar Left', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        => 'cSinglePortfolioContentOption',
                'label'     => 'Single Portfolio Content Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzSinglePortfolioOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_Media',
                'label'     =>   esc_html__('Media Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide media of portfolio ( image or slider or video or audio ).', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_Title',
                'label'     =>   esc_html__('Title Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide Title of single portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_content',
                'label'     =>   esc_html__('Content Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide content of single portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_author',
                'label'     =>   esc_html__('Author Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide author of single portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_date',
                'label'     =>   esc_html__('Date Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide date of portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_category',
                'label'     =>   esc_html__('Category Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide category of portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzSinglePortfolio_tag',
                'label'     =>   esc_html__('Tag Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show or hide tag of single portfolio.', 'interiart'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'interiart'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        => 'SinglePortfolioRelatedOption',
                'label'     => 'Single Portfolio Related Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzSinglePortfolioOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_Limit',
                'label'    =>   esc_html__('Limit', 'interiart'),
                'desc'     =>  '',
                'std'      =>  '10',
                'type'     =>  'text',
                'section'  => 'tzSinglePortfolioOption',
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_NumberItem_desktop',
                'label'    =>   esc_html__('Number Item Desktop', 'interiart'),
                'desc'     =>  '',
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_NumberItem_desktopSmall',
                'label'    =>   esc_html__('Number Item Desktop Small', 'interiart'),
                'desc'     =>  '',
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_NumberItem_tablet',
                'label'    =>   esc_html__('Number Item Tablet', 'interiart'),
                'desc'     =>  '',
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_NumberItem_mobile',
                'label'    =>   esc_html__('Number Item Mobile', 'interiart'),
                'desc'     =>  '',
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzSinglePort_Related_hover',
                'label'    =>   esc_html__('Type Hover', 'interiart'),
                'desc'     =>  '',
                'std'       =>  '1',
                'type'      =>  'select',
                'section'   =>  'tzSinglePortfolioOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('Type 1', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('Type 2', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('Type 3', 'interiart'),
                    ),
                ),
            ),

            /* SHOP OPTION */

            array(
                'id'        => 'cShopOption',
                'label'     => 'Shop Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzShopOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_TzShop_Sidebar',
                'label'     =>   esc_html__('Sidebar Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.Default is no sidebar.', 'interiart'),
                'std'       =>  'no',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'no',
                        'label' =>   esc_html__('No Sidebar', 'interiart'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar Right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar Left', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzShopGrid_Column',
                'label'    =>   esc_html__('Number Column Shop Grid.', 'interiart'),
                'desc'     =>   esc_html__('You can set number column for shop page type grid.','interiart'),
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'       =>  'interiart_TzShopList_Column',
                'label'    =>   esc_html__('Number Column Shop List.', 'interiart'),
                'desc'     =>   esc_html__('You can set number column for shop page type list.','interiart'),
                'std'       =>  '1',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1', 'interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'interiart'),
                    ),
                ),
            ),

            /* SHOP DETAIL OPTION */

            array(
                'id'        => 'cShopDetailOption',
                'label'     => 'Shop Detail Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzShopDetailOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_TzShopDetail_Sidebar',
                'label'     =>   esc_html__('Sidebar Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.Default is no sidebar.', 'interiart'),
                'std'       =>  'no',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'no',
                        'label' =>   esc_html__('No Sidebar', 'interiart'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar Right', 'interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar Left', 'interiart'),
                    ),
                ),
            ),

            array(
                'id'        =>  'interiart_TzShopDetail_navigationSlide',
                'label'     =>   esc_html__('Navigation Slider Option', 'interiart'),
                'desc'      =>   esc_html__('You can choose position for navigation slider.Default is Left.', 'interiart'),
                'std'       =>  'left',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Left', 'interiart'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Right', 'interiart'),
                    ),
                ),
            ),

            /* End Background */

        ) // end setting
    );

    /* allow settings to be filtered before saving */

    $interiart_custom_settings = apply_filters('option_tree_settings_args', $interiart_custom_settings);

    /* settings are not the same update the DB */
    if ($interiart_saved_setting !== $interiart_custom_settings) {
        update_option('option_tree_settings', $interiart_custom_settings);
    }

}


?>
