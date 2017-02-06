<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'interiart_custom_meta_boxes');

/*
 * Methor add meta boxes for custom post type
 */
function interiart_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */

    $interiart_post_meta_box =   array(
        'id'          =>  'post_meta_box',
        'title'       =>   esc_html__('Post Option', 'interiart'),
        'desc'        =>  '',
        'pages'       => array( 'post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     =>  esc_html__('Is Featured ?','interiart'),
                'id'        => 'interiart_portfolio_featured',
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'no',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' =>  esc_html__('Yes','interiart'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' =>  esc_html__('No','interiart'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'label'     =>   esc_html__('Post Type', 'interiart'),
                'id'        =>  'interiart_portfolio_type',
                'type'      =>  'select',
                'desc'      =>   esc_html__('Option type Post', 'interiart'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' =>  esc_html__('None', 'interiart')
                    ),
                    array(
                        'value' => 'image',
                        'label' =>  esc_html__('Image', 'interiart')
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' =>  esc_html__('Slideshows', 'interiart')
                    ),
                    array(
                        'value' => 'video',
                        'label' =>  esc_html__('Video', 'interiart')
                    ),
                    array(
                        'value' => 'videohtml5',
                        'label' =>  esc_html__('Video HTML5', 'interiart')
                    ),
                    array(
                        'value' => 'audio',
                        'label' =>  esc_html__('Audio', 'interiart')
                    ),
                    array(
                        'value' => 'quote',
                        'label' =>  esc_html__('Quote','interiart')
                    ),
                ),

            ),

            array(
                'label'     =>  esc_html__('Slideshow', 'interiart'),
                'id'        => 'interiart_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'interiart_portfolio_slideshow_item',
                        'label'     =>  esc_html__('Image', 'interiart'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(
                'label'     =>  esc_html__('Image', 'interiart'),
                'id'        => 'interiart_portfolio_image',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     =>  esc_html__('SoundCloud ID', 'interiart'),
                'id'        => 'interiart_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      =>  esc_html__('Only use for the SoundCloud', 'interiart'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),
            array(
                'id'        => 'interiart_portfolio_video_type',
                'label'     =>  esc_html__('Video Type','interiart'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',

                'choices' =>  array(
                    array(
                        'value'   =>  'youtube',
                        'label'   =>   esc_html__('Youtube','interiart'),
                    ),
                    array(
                        'value'  =>  'vimeo',
                        'label'   =>   esc_html__('vimeo','interiart'),
                    ),
                ),
            ),

            array(
                'label'     =>  esc_html__('Video ID','interiart'),
                'id'        => 'interiart_portfolio_video',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '4',
            ),
            array(
                'label'     =>  esc_html__('Background Image','interiart'),
                'id'        => 'interiart_portfolio_bgvideo_image',
                'type'      => 'upload',
                'desc'      =>  esc_html__('This is background image of video.','interiart'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'backgroundImage_video'
            ),
            array(
                'label'     =>  esc_html__('Video MP4', 'interiart'),
                'id'        => 'interiart_portfolio_video_mp4',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     =>  esc_html__('Video OGV', 'interiart'),
                'id'        => 'interiart_portfolio_video_ogv',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     =>  esc_html__('Video WEBM', 'interiart'),
                'id'        => 'interiart_portfolio_video_webm',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
        )
    );

    $interiart_portfolio_meta_box =   array(
        'id'          =>  'portfolio_meta_box',
        'title'       =>   esc_html__('Portfolio Option', 'interiart'),
        'desc'        =>  '',
        'pages'       => array( 'portfolio'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     =>  esc_html__('Is Featured ?','interiart'),
                'id'        => 'interiart_portfolio_featured',
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'no',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' =>  esc_html__('Yes','interiart'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' =>  esc_html__('No','interiart'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'label'     =>   esc_html__('Post Type', 'interiart'),
                'id'        =>  'interiart_portfolio_type',
                'type'      =>  'select',
                'desc'      =>   esc_html__('Option type Post', 'interiart'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' =>  esc_html__('None', 'interiart')
                    ),
                    array(
                        'value' => 'image',
                        'label' =>  esc_html__('Image', 'interiart')
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' =>  esc_html__('Slideshows', 'interiart')
                    ),
                    array(
                        'value' => 'video',
                        'label' =>  esc_html__('Video', 'interiart')
                    ),
                    array(
                        'value' => 'videohtml5',
                        'label' =>  esc_html__('Video HTML5', 'interiart')
                    ),
                    array(
                        'value' => 'audio',
                        'label' =>  esc_html__('Audio', 'interiart')
                    ),
                ),
            ),

            array(
                'label'     =>  esc_html__('Slideshow', 'interiart'),
                'id'        => 'interiart_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'interiart_portfolio_slideshow_item',
                        'label'     =>  esc_html__('Image', 'interiart'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(
                'label'     =>  esc_html__('Image', 'interiart'),
                'id'        => 'interiart_portfolio_image',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     =>  esc_html__('SoundCloud ID', 'interiart'),
                'id'        => 'interiart_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      =>  esc_html__('Only use for the SoundCloud', 'interiart'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),
            array(
                'id'        => 'interiart_portfolio_video_type',
                'label'     =>  esc_html__('Video Type','interiart'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',

                'choices' =>  array(
                    array(
                        'value'   =>  'youtube',
                        'label'   =>   esc_html__('Youtube','interiart'),
                    ),
                    array(
                        'value'  =>  'vimeo',
                        'label'   =>   esc_html__('vimeo','interiart'),
                    ),
                ),
            ),

            array(
                'label'     =>  esc_html__('Video ID','interiart'),
                'id'        => 'interiart_portfolio_video',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '4',
            ),
            array(
                'label'     =>  esc_html__('Background Image','interiart'),
                'id'        => 'interiart_portfolio_bgvideo_image',
                'type'      => 'upload',
                'desc'      =>  esc_html__('This is background image of video.','interiart'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'backgroundImage_video'
            ),
            array(
                'label'     =>  esc_html__('Video MP4', 'interiart'),
                'id'        => 'interiart_portfolio_video_mp4',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     =>  esc_html__('Video OGV', 'interiart'),
                'id'        => 'interiart_portfolio_video_ogv',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     =>  esc_html__('Video WEBM', 'interiart'),
                'id'        => 'interiart_portfolio_video_webm',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),

            array(
                'id'        =>  'interiart_portfolio_info',
                'label'     =>  esc_html__('Information Of Portfolio','interiart'),
                'desc'      =>  esc_html__('------------------','interiart'),
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_meta_key_1',
                'label'     =>  esc_html__('Meta Key 1','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_meta_value_1',
                'label'     =>  esc_html__('Meta Value 1','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_meta_key_2',
                'label'     =>  esc_html__('Meta Key 2','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_meta_value_2',
                'label'     =>  esc_html__('Meta Value 2','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),array(
                'id'        => 'interiart_portfolio_meta_key_3',
                'label'     =>  esc_html__('Meta Key 3','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_meta_value_3',
                'label'     =>  esc_html__('Meta Value 3','interiart'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
        )
    );

    $interiart_service_meta_box =   array(
        'id'          =>  'service_meta_box',
        'title'       =>   esc_html__('Service Option', 'interiart'),
        'desc'        =>  '',
        'pages'       => array( 'service'),
        'context'     => 'side',
        'priority'    => 'low',
        'fields'      => array(

            array(
                'label'     =>  esc_html__('Service Icon', 'interiart'),
                'id'        => 'interiart_service_icon',
                'type'      => 'text',
                'desc'      =>  esc_html__('Use font Furniture.You insert character mapping.Only use for element View Service in Visual Composer', 'interiart'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'service_icon'
            ),
        )
    );

    $interiart_pageportfolio_meta_box =   array(
        'id'          =>  'page_meta_box',
        'title'       =>   esc_html__('Portfolio Option', 'interiart'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'interiart_portfolio_column',
                'label'     =>  esc_html__('Config Portfolio Column', 'interiart'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'interiart_desktop_column',
                'label'     =>  esc_html__('Desktop column', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '4',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                    )
                )
            ),
            array(
                'id'        =>  'interiart_tabletportrait_column',
                'label'     =>   esc_html__('tablet portrait column', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'interiart_mobilelandscape_column',
                'label'     =>   esc_html__('mobile landscape column', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'interiart_mobileportrait_column',
                'label'     =>   esc_html__('mobile portrait column', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),

            array(
                'id'        => 'interiart_portfolio_catid',
                'label'     =>  esc_html__('Category', 'interiart'),
                'desc'      =>  esc_html__('Choose category portfolio', 'interiart'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'portfolio-category',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_portfolio_limit',
                'label'     =>  esc_html__('Limit portfolio', 'interiart'),
                'desc'      => '',
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_porfolio_orderby',
                'label'     =>  esc_html__('Orderby', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>   esc_html__('Date', 'interiart'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>   esc_html__('Title', 'interiart'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>   esc_html__('ID', 'interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_porfolio_order',
                'label'     =>   esc_html__('Order', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>   esc_html__('Z ---> A', 'interiart'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>   esc_html__('A ---> Z', 'interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_porfolio_filter_status',
                'label'     =>   esc_html__('Filter Status', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'show',
                'type'      =>  'select',
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
                )
            ),
            array(
                'id'        =>  'interiart_porfolio_filter',
                'label'     =>   esc_html__('Filter Porfolio', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'portfolio-tags',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'portfolio-tags',
                        'label' =>   esc_html__('Portfolio tags', 'interiart'),
                    ),
                    array(
                        'value' =>  'portfolio-category',
                        'label' =>   esc_html__('Portfolio category', 'interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_option_height',
                'label'     =>   esc_html__('Option Height', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'auto',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'auto',
                        'label' =>  'Auto Height',
                    ),
                    array(
                        'value' =>  'fix',
                        'label' =>  'Fix Height',
                    ),
                )
            ),
            array(
                'id'        => 'interiart_height_value',
                'label'     =>  esc_html__('Height Of Portfolio Item', 'interiart'),
                'desc'      => '',
                'std'       => '200',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),


            array(
                'id'        =>  'interiart_option_width',
                'label'     =>   esc_html__('Width Option', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'checkbox',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  esc_html__('If Portfolio is feature item, width of item x2.','interiart'),
                    ),
                )
            ),

            array(
                'id'        =>  'interiart_paging',
                'label'     =>   esc_html__('Paging', 'interiart'),
                'desc'      =>   esc_html__('choose type paging', 'interiart'),
                'sdt'       =>  'ajaxscroll',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'pagenavi',
                        'label' =>   esc_html__('Default ( 1, 2, 3 ... 8, 9 , 10)', 'interiart'),
                    ),
                    array(
                        'value' =>  'ajaxbutton',
                        'label' =>   esc_html__('Ajaxbutton', 'interiart'),
                    ),
                    array(
                        'value' =>  'ajaxscroll',
                        'label' =>   esc_html__('Ajax scroll', 'interiart'),
                    ),
                )
            ),
            array(
                'id'        => 'interiart_ajaxbutton_text',
                'label'     =>  esc_html__('Loading Text', 'interiart'),
                'desc'      => '',
                'std'       => 'Load More',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_porfolio_loadding',
                'label'     =>  esc_html__('Image loading', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'upload',
                'class'     =>  '',
            ),
            array(
                'id'        =>  'interiart_porfolio_option_width',
                'label'     =>  esc_html__('Option Width', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'full',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'full',
                        'label' =>   esc_html__('Full Width', 'interiart'),
                    ),
                    array(
                        'value' =>  'in-grid',
                        'label' =>   esc_html__('In Grid', 'interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_porfolio_sidebar',
                'label'     =>  esc_html__('Sidebar Option', 'interiart'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'select',
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
                )
            ),
        ) // end fields
    );
    $interiart_blogcolumn_meta_box =   array(
        'id'          =>  'blogColumn_meta_box',
        'title'       =>   esc_html__('Blog Column Option','interiart'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'interiart_blogColumn_column',
                'label'     =>  esc_html__('Config Blog Column','interiart'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_blogColumn_desktop',
                'label'     =>  esc_html__('Desktop column','interiart'),
                'desc'      =>  '',
                'sdt'       =>  '3',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2','interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3','interiart'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4','interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_blogColumn_tabletportrait',
                'label'     =>  esc_html__('Tablet Portrait Column','interiart'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2','interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3','interiart'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4','interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_blogColumn_mobilelandscape',
                'label'     =>  esc_html__('Mobile Landscape Column','interiart'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1','interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2','interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3','interiart'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4','interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_blogColumn_mobile',
                'label'     =>  esc_html__('Mobile Portrait Column','interiart'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>   esc_html__('1','interiart'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2','interiart'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3','interiart'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4','interiart'),
                    ),
                )
            ),

            array(
                'id'        => 'interiart_blogColumn_catid',
                'label'     =>  esc_html__('Category Blog','interiart'),
                'desc'      =>  esc_html__('Choose category blog','interiart'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'category',
                'class'     => ''
            ),
            array(
                'id'        => 'interiart_blogColumn_limit',
                'label'     =>  esc_html__('Limit Blog','interiart'),
                'desc'      =>  esc_html__('Limit Blog','interiart'),
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'interiart_blogColumn_orderby',
                'label'     =>  esc_html__('Orderby','interiart'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>   esc_html__('Date','interiart'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>   esc_html__('Title','interiart'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>   esc_html__('ID','interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_blogColumn_order',
                'label'     =>  esc_html__('Order','interiart'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>   esc_html__('Z ---> A','interiart'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>   esc_html__('A ---> Z','interiart'),
                    ),
                )
            ),
            array(
                'id'        =>  'interiart_blogColumn_sidebar',
                'label'     =>  esc_html__('Sidebar Option','interiart'),
                'desc'      =>  '',
                'sdt'       =>  'none',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'none',
                        'label' =>   esc_html__('No Sidebar','interiart'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar Right','interiart'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar Left','interiart'),
                    ),
                )
            ),
        ) // end fields
    );



    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $interiart_post_meta_box );
    ot_register_meta_box( $interiart_portfolio_meta_box );
    ot_register_meta_box( $interiart_service_meta_box );
    ot_register_meta_box( $interiart_pageportfolio_meta_box );
    ot_register_meta_box( $interiart_blogcolumn_meta_box );

}
?>