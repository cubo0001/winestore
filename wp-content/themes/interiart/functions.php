<?php

add_action( 'after_setup_theme', 'interiart_setup' );
if( !function_exists( 'interiart_setup' ) ) :
    function interiart_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'interiart', get_template_directory() . '/languages' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // add theme support title-tag
        add_theme_support( 'title-tag' );
        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background' );
        add_theme_support( 'custom-header' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menu('primary',esc_html__('Primary Menu','interiart'));
        register_nav_menu('primary-custom-1',esc_html__('Primary Custom Menu 1','interiart'));
        register_nav_menu('primary-custom-2',esc_html__('Primary Custom Menu 2','interiart'));
        register_nav_menu('primary-custom-3',esc_html__('Primary Custom Menu 3','interiart'));

        /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
        add_editor_style( array( 'css/editor-style.css', interiart_fonts_url()) );
    }
endif;

add_action('init', 'interiart_register_theme_scripts');
function interiart_register_theme_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {

        if (is_admin()) {
            add_action('admin_enqueue_scripts', 'interiart_register_back_end_scripts');
        }else{
            add_action('wp_enqueue_scripts', 'interiart_register_front_end_styles');
            add_action('wp_enqueue_scripts', 'interiart_register_front_end_scripts');
        }
    }
}

//Register Back-End script
function interiart_register_back_end_scripts(){



    wp_enqueue_style('interiart-admin-style', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
    wp_enqueue_style('interiart-theme-option-style', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');


    wp_register_script('interiart-portfolio-meta-boxes', get_template_directory_uri() . '/extension/assets/js/portfolio_meta_boxes.js', false, false, $in_footer=true);
    wp_enqueue_script('interiart-portfolio-meta-boxes');

    wp_register_script('interiart-portfolio-theme-option', get_template_directory_uri() . '/extension/assets/js/portfolio_theme_option.js', false, false, $in_footer=true);
    wp_enqueue_script('interiart-portfolio-theme-option');
}

//Register Front-End Styles
function interiart_register_front_end_styles()
{

    wp_enqueue_style( 'interiart-fonts', interiart_fonts_url(), array(), null );
    wp_enqueue_style('et-line', get_template_directory_uri().'/css/et-line.css', false );
    wp_enqueue_style('furniture', get_template_directory_uri() . '/fonts/furniture/styles.css', false );

    wp_enqueue_style('bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css', false );
    wp_enqueue_style('jpreloader', get_template_directory_uri().'/css/jpreloader.css', false );
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/css/magnific-popup.css', false );

    if(is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() || is_404()){
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false );
    }

    if (is_page_template('template-portfolio.php')){
        wp_enqueue_style('isotope', get_template_directory_uri().'/css/isotope.css', false );
        wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false );
    }

    if (is_page_template('template-blogcolumn.php')){
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false );
        wp_enqueue_style('isotope', get_template_directory_uri().'/css/isotope.css', false );
    }
    if(is_single()){
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false );
    }

    if(is_singular('portfolio')):
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false );
        wp_enqueue_style('owl.carousel', get_template_directory_uri().'/css/owl.carousel.css', false );

    endif;

    if( is_page()){
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
        wp_enqueue_style('et-line', get_template_directory_uri().'/css/et-line.css', false );
    }
    if(is_page_template('template-homepage.php')){
        wp_enqueue_style('elegant_font', get_template_directory_uri().'/css/elegant_font.css', false );
    }

    if (class_exists( 'WooCommerce')):
        if(is_product()) {
            wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', false);
            wp_enqueue_style('jquery.jcarousel', get_template_directory_uri() . '/css/jquery.jcarousel.css', false);
            wp_enqueue_style('skin', get_template_directory_uri() . '/css/skin.css', false);
        }
    endif;
    if(!is_child_theme()){
        wp_enqueue_style('interiart-style', get_template_directory_uri() . '/style.css', false );
    }
    wp_enqueue_style('interiart-inter', get_template_directory_uri() . '/css/interi.css', false );
}

//Register Front-End Scripts
function interiart_register_front_end_scripts()
{
    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
    wp_enqueue_script( 'jpreloader', get_template_directory_uri().'/js/jpreloader.js', array(), false, true );
    wp_enqueue_script( 'scoll-navbar', get_template_directory_uri().'/js/scoll-navbar.js', array(), false, true );

    if ( is_page_template('template-homepage.php') ):
        wp_enqueue_script( 'jquery.magnific-popup.min', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array(), false, true );
    endif;

    if ( is_page_template('template-portfolio.php') ):

        $interiart_desktop                =  get_post_meta( get_the_ID(), 'interiart_desktop_column', true );
        $interiart_tabletportrait         =  get_post_meta( get_the_ID(), 'interiart_tabletportrait_column', true );
        $interiart_mobilelandscape        =  get_post_meta( get_the_ID(), 'interiart_mobilelandscape_column', true );
        $interiart_mobileportrait         =  get_post_meta( get_the_ID(), 'interiart_mobileportrait_column', true );
        $interiart_filter_status          =  get_post_meta( get_the_ID(), 'interiart_porfolio_filter_status', true ) ;
        $interiart_paging                 =  get_post_meta( get_the_ID(), 'interiart_paging', true ) ;
        $interiart_image                  =  get_post_meta( get_the_ID(), 'interiart_porfolio_loadding', true) ;
        $interiart_Height                 =  get_post_meta( get_the_ID(), 'interiart_option_height', true) ;
        $interiart_Height_value           =  get_post_meta( get_the_ID(), 'interiart_height_value', true) ;
        $interiart_Width_option           =  get_post_meta( get_the_ID(),'interiart_option_width', true) ;

        if ( isset ( $interiart_image ) && $interiart_image == '' ):
            $interiart_image =  get_template_directory_uri().'/images/ajax-loader.gif' ;
        endif;

        wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

        wp_enqueue_script('jsisotope', get_template_directory_uri().'/js/jquery.isotope.min.js',array(),false,true);

        wp_enqueue_script( 'jquery.magnific-popup.min', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array(), false, true );

        if ( $interiart_paging != 'pagenavi' ) :
            wp_enqueue_script( 'infinitescroll', get_template_directory_uri().'/js/jquery.infinitescroll.min.min.js', array(), false, true );
        endif;

        wp_enqueue_script( 'interiart-portfolio', get_template_directory_uri().'/js/portfolio.js', array(), false, true );

        $interiart_variables_portfolio = array(
            'desktop'         =>    $interiart_desktop,
            'tabletportrait'  =>    $interiart_tabletportrait,
            'mobilelandscape' =>    $interiart_mobilelandscape,
            'mobileportrait'  =>    $interiart_mobileportrait,
            'filter_status'   =>    $interiart_filter_status,
            'paging'          =>    $interiart_paging,
            'image'           =>    $interiart_image,
            'height_option'   =>    $interiart_Height,
            'height_value'    =>    $interiart_Height_value,
            'width_option'    =>    $interiart_Width_option[0],
        );
        wp_localize_script( 'interiart-portfolio', 'variables_portfolio', $interiart_variables_portfolio ) ;

    endif;

    if( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home()){

        wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

        wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);

        wp_register_script('video', get_template_directory_uri().'/js/video.js',array(),false,true);

        wp_enqueue_script( 'interiart-blog', get_template_directory_uri().'/js/tzblog.js', array(), false, true );
    }

    if (is_page_template('template-blogcolumn.php')):

        $interiart_desktop            =  get_post_meta( get_the_ID(), 'interiart_blogColumn_desktop', true );
        $interiart_tabletportrait     =  get_post_meta( get_the_ID(), 'interiart_blogColumn_tabletportrait', true );
        $interiart_mobilelandscape    =  get_post_meta( get_the_ID(), 'interiart_blogColumn_mobilelandscape', true );
        $interiart_mobileportrait     =  get_post_meta( get_the_ID(), 'interiart_blogColumn_mobile', true );

        wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

        wp_enqueue_script('jsisotope', get_template_directory_uri().'/js/jquery.isotope.min.js',array(),false,true);

        wp_register_script('video', get_template_directory_uri().'/js/video.js',array(),false,true);

        wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);

        wp_enqueue_script( 'interiart-blogcolumn', get_template_directory_uri().'/js/blogcolumn.js', array(), false, true );

        $interiart_variables_blog = array(
            'desktop'         =>    $interiart_desktop,
            'tabletportrait'  =>    $interiart_tabletportrait,
            'mobilelandscape' =>    $interiart_mobilelandscape,
            'mobileportrait'  =>    $interiart_mobileportrait,
        );
        wp_localize_script( 'interiart-blogcolumn', 'variables_blog', $interiart_variables_blog ) ;
    endif;

    if ( is_single() ):

        wp_register_script('widgets', get_template_directory_uri().'/js/widgets.js',array(),false,true);

        wp_register_script('video', get_template_directory_uri().'/js/video.js',array(),false,true);

        wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);

        wp_enqueue_script( 'interiart-single_blog', get_template_directory_uri().'/js/tzsingle_blog.js', array(), false, true );
    endif;

    if (class_exists( 'WooCommerce')):
        if (is_shop() || is_product_category()) {

            wp_enqueue_script('jquery.cookie', get_template_directory_uri().'/js/jquery.cookie.js',array(),false,true);

            wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

            wp_enqueue_script( 'interiart-shop', get_template_directory_uri().'/js/shop.js', array(), false, true );
        }

        if (is_product()) {
            wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

            wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js',array(),false,true);

            wp_enqueue_script('jquery.jcarousel.pack', get_template_directory_uri().'/js/jquery.jcarousel.pack.js',array(),false,true);

            wp_enqueue_script( 'interiart-shop-detail', get_template_directory_uri().'/js/shop-detail.js', array(), false, true );
        }

        if(is_cart()){

            wp_enqueue_script('interiart-resize', get_template_directory_uri().'/js/resize.js',array(),false,true);

            wp_enqueue_script( 'interiart-cart', get_template_directory_uri().'/js/cart.js', array(), false, true );
        }
    endif;

    wp_enqueue_script( 'interiart-script', get_template_directory_uri().'/js/tzswift.js', array('jquery'), false, true );
}

/*
 * Required: include plugin theme scripts
 */
require get_template_directory() . '/extension/tz-process-option.php';

/**
 * Required: include plugin Aqua Resizer
 */
require get_template_directory() . '/extension/aq_resizer.php';


/*
 * Required: megamenu
 */
require get_template_directory() . '/extension/megamenu/themeple_init.php';


if ( class_exists('OT_Loader') ):
    /*
     * Required: Theme option
     */
    require get_template_directory() . '/extension/ot-support/theme-options.php';

    /*
     * Required: Metabox
     */
    require get_template_directory() . '/extension/ot-support/add-meta-boxes.php';
endif;

if  ( class_exists('WooCommerce') ):

    /*
     * Required: woocommerce
     */
    require get_template_directory() . '/extension/tzswift-woocommerce.php';

endif;

/*
 * Adds JavaScript to pages with the comment form to support
 * sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

add_action( 'widgets_init', 'interiart_widgets_init');

function interiart_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Right', 'interiart'),
        'id'            => 'interiart-sidebar-right',
        'description'   => esc_html__( 'Display sidebar right on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Left', 'interiart' ),
        'id'            => 'interiart-sidebar-left',
        'description'   => esc_html__( 'Display sidebar left on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Shop', 'interiart' ),
        'id'            => 'interiart-sidebar-shop',
        'description'   => esc_html__( 'Display sidebar shop on page of woocommerce.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'interiart' ),
        'id'            => 'interiart-footer-1',
        'description'   => esc_html__( 'Display footer column 1 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'interiart' ),
        'id'            => 'interiart-footer-2',
        'description'   => esc_html__( 'Display footer column 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'interiart' ),
        'id'            => 'interiart-footer-3',
        'description'   => esc_html__( 'Display footer column 3 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'interiart' ),
        'id'            => 'interiart-footer-4',
        'description'   => esc_html__( 'Display footer column 4 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Top Type 2', 'interiart' ),
        'id'            => 'interiart-footer-type2-top',
        'description'   => esc_html__( 'Display Footer Top of type 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 2 - Column 1', 'interiart' ),
        'id'            => 'interiart-footer-type2-1',
        'description'   => esc_html__( 'Display Column 1 of Footer Type 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 2 - Column 2', 'interiart' ),
        'id'            => 'interiart-footer-type2-2',
        'description'   => esc_html__( 'Display Column 2 of Footer Type 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 2 - Column 3', 'interiart' ),
        'id'            => 'interiart-footer-type2-3',
        'description'   => esc_html__( 'Display Column 3 of Footer Type 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 2 - Column 4', 'interiart' ),
        'id'            => 'interiart-footer-type2-4',
        'description'   => esc_html__( 'Display Column 4 of Footer Type 2 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 3 - Column 1', 'interiart' ),
        'id'            => 'interiart-footer-type3-1',
        'description'   => esc_html__( 'Display Column 1 of Footer Type 3 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 3 - Column 2', 'interiart' ),
        'id'            => 'interiart-footer-type3-2',
        'description'   => esc_html__( 'Display Column 2 of Footer Type 3 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 3 - Column 3', 'interiart' ),
        'id'            => 'interiart-footer-type3-3',
        'description'   => esc_html__( 'Display Column 3 of Footer Type 3 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Type 3 - Column 4', 'interiart' ),
        'id'            => 'interiart-footer-type3-4',
        'description'   => esc_html__( 'Display Column 4 of Footer Type 3 on all page.', 'interiart' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );
}

if ( ! function_exists( 'interiart_comment' ) ) :
    function interiart_comment( $interiart_comment, $interiart_args, $interiart_depth ) {
        switch ( $interiart_comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments.
                ?>
                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php  esc_html_e( 'Pingback:', 'interiart'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(  esc_html__( '(Edit)', 'interiart'), '<span class="edit-link">', '</span>' ); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <header class="comment-meta comment-author vcard">
                        <?php echo get_avatar( $interiart_comment, 90 ); ?>
                    </header><!-- .comment-meta -->

                    <?php if ( '0' == $interiart_comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php  esc_html_e( 'Your comment is awaiting moderation.', 'interiart'); ?></p>
                    <?php endif; ?>

                    <div class="comment-content comment">
                        <?php
                        printf( '<h5 class="fn">%1$s</h5>',
                            get_comment_author_link()
                        );
                        ?>
                        <div class="tz-commentInfo">
                            <?php
                            printf( '<a class="comments-datetime" href="%1$s">&nbsp;&nbsp;&nbsp;<time datetime="%2$s">%3$s</time></a>',
                                esc_url( get_comment_link( $interiart_comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf('%1$s at %2$s', get_comment_date('d M, Y'), get_comment_time() )
                            );
                            edit_comment_link('<i class="fa fa-pencil-square-o"></i>' . esc_html__('Edit','interiart') );
                            comment_reply_link( array_merge( $interiart_args, array( 'reply_text' => '<i class="fa fa-reply"></i>' . esc_html__('Reply','interiart'), 'depth' => $interiart_depth, 'max_depth' => $interiart_args['max_depth'] ) ) );
                            ?>
                        </div>

                        <?php
                        comment_text();
                        ?>

                    </div><!-- .comment-content -->
                    <div class="clearfix"></div>
                </article><!-- #comment-## -->
                <?php
                break;
        endswitch; // end comment_type check
    }
endif;

if ( ! function_exists( 'interiart_comment_nav' ) ) :
    /**
     * Display navigation to next/previous comments when applicable.
     *
     * @since Twenty Fifteen 1.0
     */
    function interiart_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php  esc_html_e( 'Comment navigation', 'interiart'); ?></h2>
                <div class="nav-links">
                    <?php
                    if ( $interiart_prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'interiart') ) ) :
                        printf( '<div class="nav-previous">%s</div>', $interiart_prev_link );
                    endif;

                    if ( $interiart_next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'interiart') ) ) :
                        printf( '<div class="nav-next">%s</div>', $interiart_next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
        endif;
    }
endif;

if ( ! function_exists( 'interiart_custom_paging_nav' ) ) :
    function interiart_custom_paging_nav($interiart_query_total) {
        global $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $interiart_query_total < 2 ) {
            return;
        }

        $interiart_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $interiart_pagenum_link = html_entity_decode( get_pagenum_link() );
        $interiart_query_args   = array();
        $interiart_url_parts    = explode( '?', $interiart_pagenum_link );

        if ( isset( $interiart_url_parts[1] ) ) {
            wp_parse_str( $interiart_url_parts[1], $interiart_query_args );
        }

        $interiart_pagenum_link = remove_query_arg( array_keys( $interiart_query_args ), $interiart_pagenum_link );
        $interiart_pagenum_link = trailingslashit( $interiart_pagenum_link ) . '%_%';

        $interiart_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $interiart_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $interiart_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $interiart_links = paginate_links( array(
            'base'     => $interiart_pagenum_link,
            'format'   => $interiart_format,
            'total'    => $interiart_query_total,
            'current'  => $interiart_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $interiart_query_args ),
            'prev_text' =>  esc_html__( 'Previous', 'interiart'),
            'next_text' =>  esc_html__( 'Next', 'interiart'),
        ) );

        if ( $interiart_links ) :

            ?>
            <nav class="navigation paging-navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo balanceTags($interiart_links); ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
            <?php
        endif;
    }
endif;

function interiart_fonts_url() {
    $interiart_fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $interiart_Ubuntu = _x( 'on', 'Ubuntu font: on or off', 'interiart' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $interiart_Montserrat = _x( 'on', 'Montserrat font: on or off', 'interiart' );

    $interiart_DroidSerif = _x( 'on', 'Droid Serif font: on or off', 'interiart' );
    $interiart_Raleway = _x( 'on', 'Raleway font: on or off', 'interiart' );

//    wp_enqueue_style('Droidserif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400italic');

    if ( 'off' !== $interiart_Ubuntu || 'off' !== $interiart_Montserrat || 'off' !== $interiart_DroidSerif || 'off' !== $interiart_Raleway ) {
        $font_families = array();

        if ( 'off' !== $interiart_Ubuntu ) {
            $font_families[] = 'Ubuntu:300,500';
        }

        if ( 'off' !== $interiart_Montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }

        if( 'off' !== $interiart_DroidSerif && is_page_template('template-homepage.php')){
            $font_families[] = 'Droid Serif:400italic';
        }

        if ( 'off' !== $interiart_Raleway ) {
            $font_families[] = 'Raleway:300,400,500,700,800';
        }

        $interiart_query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $interiart_fonts_url = add_query_arg( $interiart_query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $interiart_fonts_url );
}

/*
 * Method add ot_get_option
 */

if(!is_admin()):

    if ( ! function_exists( 'ot_get_option' ) ) {
        function ot_get_option( $interiart_option_id, $interiart_default = '' ) {
            /* get the saved options */
            $interiart_options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $interiart_options[$interiart_option_id] ) && '' != $interiart_options[$interiart_option_id] ) {
                return $interiart_options[$interiart_option_id];
            }
            return $interiart_default;
        }
    }

endif;

if ( ! function_exists( 'interiart_content_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     */
    function interiart_content_nav( $interiart_html_id ) {
        global $wp_query;

        $interiart_html_id = esc_attr( $interiart_html_id );

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo esc_attr($interiart_html_id); ?>" class="plazart-navigation">
                <div class="nav-previous alignleft"><?php next_posts_link( '<span class="meta-nav">&larr;</span>' . esc_html__('Older posts', 'interiart' ) ); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link( esc_html__('Newer posts','interiart') . '<span class="meta-nav">&rarr;</span>'); ?></div>
            </nav><!-- #<?php echo esc_attr($interiart_html_id); ?> .navigation -->
        <?php endif;
    }
endif;

/*
* This function is used to get people to check out the article
*/
function interiart_getPostViews($interiart_postID){
    $interiart_count_key = 'post_views_count';
    $interiart_count = get_post_meta($interiart_postID, $interiart_count_key, true);
    if($interiart_count==''){ // If such views are not
        delete_post_meta($interiart_postID, $interiart_count_key);
        add_post_meta($interiart_postID, $interiart_count_key,'0');
        return "0"; // return value of 0
    }
    return $interiart_count; // Returns views
}
/*
* This function is used to set and update the article views.
*/
function interiart_setPostViews($interiart_postID) {
    $interiart_count_key = 'post_views_count';
    $interiart_count = get_post_meta($interiart_postID, $interiart_count_key, true);
    if($interiart_count==''){
        $interiart_count = 0;
        delete_post_meta($interiart_postID, $interiart_count_key);
        add_post_meta($interiart_postID, $interiart_count_key, '0');
    }else{
        $interiart_count++; // Incremental view
        update_post_meta($interiart_postID, $interiart_count_key, $interiart_count); // update count
    }
}

function interiart_modify_contact_methods($interiart_profile_fields) {
    // Add new fields
    $interiart_profile_fields['job'] = esc_html__('Job','interiart');
    $interiart_profile_fields['twitter'] = esc_html__('Twitter URL','interiart');
    $interiart_profile_fields['facebook'] = esc_html__('Facebook URL','interiart');
    $interiart_profile_fields['gplus'] = esc_html__('Google+ URL','interiart');
    $interiart_profile_fields['dribbble'] = esc_html__('Dribbble URL','interiart');
    $interiart_profile_fields['linkedin'] = esc_html__('Linkedin  URL','interiart');
    return $interiart_profile_fields;
}
add_filter('user_contactmethods', 'interiart_modify_contact_methods');

/*
 * footer option
 */
if ( ! function_exists( 'interiart_footer_type' ) ) :
    function interiart_footer_type() {
        $interiart_footer_type = '';
        if(isset($_GET["footer-type"]) && !empty($_GET["footer-type"])){
            $interiart_footer_type = $_GET["footer-type"];

        }else{
            $interiart_footer_type     =   ot_get_option('interiart_footer_type','type1');
        }

        if($interiart_footer_type == 'type1'){
            get_template_part('template_inc/inc','footer');
        }elseif($interiart_footer_type == 'type2'){
            get_template_part('template_inc/inc','footer-2');
        }elseif($interiart_footer_type == 'type3'){
            get_template_part('template_inc/inc','footer-3');
        }else{
            get_template_part('template_inc/inc','footer');
        }
    }
endif;

/*
 *  Show full editor
 * */

function interiart_ilc_mce_buttons($interiart_buttons){
    array_push($interiart_buttons,
        "backcolor",
        "anchor",
        "hr",
        "sub",
        "sup",
        "fontselect",
        "fontsizeselect",
        "styleselect",
        "cleanup"
    );
    return $interiart_buttons;
}
add_filter("mce_buttons_2", "interiart_ilc_mce_buttons");

function interiart_customize_text_sizes($interiart_initArray){
    $interiart_initArray['fontsize_formats'] = "8px 10px 12px 13px 14px 15px 16px 18px 20px 23px 26px 30px 32px 35px 38px 40px 45px 48px 50px 55px 60px 65px 70px 75px 80px";
    return $interiart_initArray;
}
add_filter('tiny_mce_before_init', 'interiart_customize_text_sizes');

// Function hex--rgb
function interiart_hex2rgb($plazart_interiart_hex,$plazart_interiart_o) {
    $plazart_interiart_hex = str_replace("#", "", $plazart_interiart_hex);

    if(strlen($plazart_interiart_hex) == 3) {
        $plazart_interiart_r = hexdec(substr($plazart_interiart_hex,0,1).substr($plazart_interiart_hex,0,1));
        $plazart_interiart_g = hexdec(substr($plazart_interiart_hex,1,1).substr($plazart_interiart_hex,1,1));
        $plazart_interiart_b = hexdec(substr($plazart_interiart_hex,2,1).substr($plazart_interiart_hex,2,1));
    } else {
        $plazart_interiart_r = hexdec(substr($plazart_interiart_hex,0,2));
        $plazart_interiart_g = hexdec(substr($plazart_interiart_hex,2,2));
        $plazart_interiart_b = hexdec(substr($plazart_interiart_hex,4,2));
    }
    $plazart_interiart_rgba = array($plazart_interiart_r, $plazart_interiart_g, $plazart_interiart_b,$plazart_interiart_o);
    return implode(",", $plazart_interiart_rgba); // returns the rgb values separated by commas
//                                return $rgb; // returns an array with the rgb values
}

/*
 * TWITTER AMPERSAND ENTITY DECODE
 */

function interiart_social_title( $interiart_title ) {
    $interiart_title = html_entity_decode( $interiart_title );
    $interiart_title = urlencode( $interiart_title );
    return $interiart_title;
}
/*
 * Fuction override post_class()
 * */
function interiart_post_classes( $classes, $class, $post_id ) {
    if (is_page_template('template-blogcolumn.php')):
        $classes[] = 'blogColumn-item';
        $interiart_feature        = get_post_meta( $post_id, 'interiart_portfolio_featured', true );
        if ( $interiart_feature == 'yes' ) :
            $classes[] .= ' tz_feature_item';
        endif;
    endif;

    if (is_page_template('template-portfolio.php')):
        $classes[] = 'portfolio-item';
        $interiart_feature        = get_post_meta( $post_id, 'interiart_portfolio_featured', true );
        if ( $interiart_feature == 'yes' ) :
            $classes[] .= ' tz_feature_item';
        endif;

        $interiart_category_post = get_the_terms( $post_id, 'portfolio-category');
        if ( isset ( $interiart_category_post ) && $interiart_category_post != false && $interiart_category_post != '' ):
            foreach ( $interiart_category_post as $cate_item ):
                $classes[] .= 'interiart-'.$cate_item -> slug .' ';
            endforeach;
        endif;

        $interiart_tags_post = get_the_terms( $post_id, 'portfolio-tags');
        if ( isset ( $interiart_tags_post ) && $interiart_tags_post != false && $interiart_tags_post != '' ):
            foreach ( $interiart_tags_post as $tags_item ):
                $classes[] .= 'interiart-'.$tags_item -> slug .' ';
            endforeach;
        endif;
    endif;

    if (class_exists( 'WooCommerce')):
        if (is_product()):
            $interiart_navigationSlide = ot_get_option('interiart_TzShopDetail_navigationSlide');
            $classes[] = 'tzShopDetail_Product';
            if($interiart_navigationSlide == 'right'){
                $classes[] .= ' tzShopDetail_navigationSlide_right';
            }
        endif;
    endif;

    return $classes;
}
add_filter( 'post_class', 'interiart_post_classes', 10, 3 );

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'interiart_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function interiart_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $interiart_plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'Tz Interiart', // The plugin name.
            'slug'               => 'tz-interiart', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/tz-interiart.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),


        array(
            'name'     				=> 'WPBakery Visual Composer', // The plugin name
            'slug'     				=> 'js_composer',// The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/js_composer.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '4.10', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
            'is_callable'           => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

        array(
            'name'     				=> 'Revolution Slider Plugin', // The plugin name
            'slug'     				=> 'revslider',// The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/revslider.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '5.2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
            'is_callable'           => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => 'OptionTree',
            'slug'      => 'option-tree',
            'required'  => true,
        ),
        array(
            'name'    => 'Max Mega Menu',
            'slug'    => 'megamenu',
            'required'  => false,
        ),
        array(
            'name'    => 'WooCommerce',
            'slug'    => 'woocommerce',
            'required'  => false,
        ),

        array(
            'name'    => 'YITH WooCommerce Wishlist',
            'slug'    => 'yith-woocommerce-wishlist',
            'required'  => false,
        ),

        array(
            'name'    => 'WOOF - WooCommerce Products Filter',
            'slug'    => 'woocommerce-products-filter',
            'required'  => false,
        ),

        array(
            'name'    => 'Newsletter',
            'slug'    => 'newsletter',
            'required'  => false,
        ),
        array(
            'name'    => 'WP Pagenavi Plugin',
            'slug'    => 'wp-pagenavi',
            'required'  => false,
        ),
        array(
            'name'    => 'DW Twitter',
            'slug'    => 'dw-twitter',
            'required'  => false,
        ),
        array(
            'name'    => 'TZ Flickr Widget',
            'slug'    => 'tz-flickr-widget',
            'required'  => false,
        ),
        array(
            'name'    => 'WP Editor Widget',
            'slug'    => 'wp-editor-widget',
            'required'  => false,
        ),
        array(
            'name'    => 'WP Editor Widget',
            'slug'    => 'wp-editor-widget',
            'required'  => false,
        ),
        array(
            'name'    => 'Contact Form 7',
            'slug'    => 'contact-form-7',
            'required'  => false,
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $interiart_config = array(
        'id'           => 'interiart',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      =>  esc_html__( 'Install Required Plugins', 'interiart' ),
            'menu_title'                      =>  esc_html__( 'Install Plugins', 'interiart' ),
            'installing'                      =>  esc_html__( 'Installing Plugin: %s', 'interiart' ), // %s = plugin name.
            'oops'                            =>  esc_html__( 'Something went wrong with the plugin API.', 'interiart' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe'      => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'interiart'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                'interiart'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'interiart'
            ),
            'update_link' 					  => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'interiart'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'interiart'
            ),
            'return'                          =>  esc_html__( 'Return to Required Plugins Installer', 'interiart' ),
            'plugin_activated'                =>  esc_html__( 'Plugin activated successfully.', 'interiart' ),
            'activated_successfully'          =>  esc_html__( 'The following plugin was activated successfully:', 'interiart' ),
            'plugin_already_active'           =>  esc_html__( 'No action taken. Plugin %1$s was already active.', 'interiart' ),  // %1$s = plugin name(s).
            'plugin_needs_higher_version'     =>  esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'interiart' ),  // %1$s = plugin name(s).
            'complete'                        =>  esc_html__( 'All plugins installed and activated successfully. %1$s', 'interiart' ), // %s = dashboard link.
            'contact_admin'                   =>  esc_html__( 'Please contact the administrator of this site for help.', 'interiart' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),
    );
    tgmpa( $interiart_plugins, $interiart_config );
}

if( is_admin() ){
    /* theme info page - displays information for support inquiries */
    include_once( get_template_directory() . '/admin/themeinfo/index.php' );

    /* theme demo importer */
    include_once( get_template_directory() . '/admin/tz-importer.php' );
}

add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products' );

function bbloomer_change_number_related_products( $args ) {

    $args['posts_per_page'] = 6; // # of related products
    $args['columns'] = 8; // # of columns per row
    return $args;
}
?>