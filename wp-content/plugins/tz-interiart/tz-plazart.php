<?php
/**
 * @package Tz Interiart
 */
/*
Plugin Name: Tz Interiart
Plugin URI: http://templaza.com/
Description: This is plugin for Templaza. This plugin allows you to create post types, taxonomies and Visual Composer's shortcodes
Version: 1.0.0
Author: Templaza
Author URI: http://template.com/
License: GPLv2 or later
*/


/**
 * This is the TZ Interiart loader class.
 *
 * @package   TZ Interiart
 * @author    templaza (http:://templaza.com)
 * @copyright Copyright (c) 2014, Templaza
 */

if ( !class_exists('TZ_Interiart') ):

    class TZ_Interiart{

        /*
         * This method loads other methods of the class.
         */
        public function __construct(){
            /* load languages */
            $this -> load_languages();

            /*load all plazart*/
            $this -> load_plazart();

            /*load all script*/
            $this -> load_script();
        }

        /*
         * Load the languages before everything else.
         */
        public function load_languages(){
            add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        }

        /*
         * Load the text domain.
         */
        public function load_textdomain(){

            load_plugin_textdomain( 'tz-interiart', false, plugin_dir_url( __FILE__ ) . '/languages' );
        }

        /*
         * Load script
         */
        public function load_script(){
            if( is_admin() ){
                add_action('admin_enqueue_scripts', array( $this,'admin_scripts') );
            }else{
                add_action('wp_enqueue_scripts',array($this,'tzfrontend_scripts') );
                add_action('wp_enqueue_scripts',array($this,'tzInteriart_styles'));
            }
        }

        /*
         * Load tzInteriart on the 'after_setup_theme' action. Then filters will
         */
        public function load_plazart(){

            $this -> constants();

            $this -> admin_includes();


        }

        /**
         * Constants
         */
        private function constants(){

            define('PLUGIN_PREFIX', 'plazart');

            define('PLUGIN_PATH', plugin_dir_url( __FILE__ ));

            define('PLUGIN_SERVER_PATH',dirname( __FILE__ ) );
        }

        /*
         * Require file
         */
        public function  admin_includes(){
            require_once PLUGIN_SERVER_PATH.'/admin/admin-init.php';
        }

        /*
        * Require file
        */
        public function  admin_scripts(){
            global $pagenow;
            if ('post-new.php' == $pagenow || 'post.php' == $pagenow):
                wp_enqueue_style('thickbox');
                wp_enqueue_script('media-upload');
                wp_enqueue_script('thickbox');

                // load css
                wp_enqueue_style('jquery.fancybox', PLUGIN_PATH. 'assets/css/jquery.fancybox.css');
                wp_enqueue_style('shortocde_admin', PLUGIN_PATH. 'assets/css/tz_admin.css');

                // load js
                wp_register_script('jquery.fancybox_js', PLUGIN_PATH .'assets/js/jquery.fancybox.js', false, false, $in_footer=true);
                wp_enqueue_script('jquery.fancybox_js')  ;
            endif;
        }

        /**
         * Register scripts.
         */

        public function  tzfrontend_scripts(){

            wp_deregister_script('wow');
            wp_register_script('wow', PLUGIN_PATH . 'assets/js/wow.js', false, false, $in_footer=true);

            wp_deregister_script('jquery.easypiechart');
            wp_register_script('jquery.easypiechart', PLUGIN_PATH . 'assets/js/jquery.easypiechart.js', false, false, $in_footer=true);

            wp_deregister_script('video');
            wp_register_script('video', PLUGIN_PATH . 'assets/js/video.js', false,false, $in_footer=true);

            wp_deregister_script('owl.carousel');
            wp_register_script('owl.carousel', PLUGIN_PATH . 'assets/js/owl.carousel.js', false,false, $in_footer=true);

            wp_deregister_script('jquery.flexslider-min');
            wp_register_script('jquery.flexslider-min', PLUGIN_PATH . 'assets/js/jquery.flexslider-min.js', false,false, $in_footer=true);

            wp_deregister_script('jquery.prettyPhoto');
            wp_register_script('jquery.prettyPhoto', PLUGIN_PATH . 'assets/js/jquery.prettyPhoto.js', false,false, $in_footer=true);

            wp_deregister_script('jquery.infinitescroll.min.min');
            wp_register_script('jquery.infinitescroll.min.min', PLUGIN_PATH . 'assets/js/jquery.infinitescroll.min.min.js', false,false, $in_footer=true);


            wp_deregister_script('resize');
            wp_register_script('resize', PLUGIN_PATH . 'assets/js/resize.js', false,false, $in_footer=true);

            wp_deregister_script('jsisotope');
            wp_register_script('jsisotope', PLUGIN_PATH . 'assets/js/jquery.isotope.min.js', false,false, $in_footer=true);

            wp_deregister_script('tz-view-post');
            wp_register_script('tz-view-post', PLUGIN_PATH . 'assets/js/tz-view-post.js', false,false, $in_footer=true);

            wp_deregister_script('tz-slide-advance');
            wp_register_script('tz-slide-advance', PLUGIN_PATH . 'assets/js/tz-slide-advance.js', false,false, $in_footer=true);

            wp_deregister_script('tz-portfolio-grid');
            wp_register_script('tz-portfolio-grid', PLUGIN_PATH . 'assets/js/tz-portfolio-grid.js', false,false, $in_footer=true);

            wp_deregister_script('nav');
            wp_register_script('nav', PLUGIN_PATH . 'assets/js/nav.js', false,false, $in_footer=true);

            wp_deregister_script('tz-counter');
            wp_register_script('tz-counter', PLUGIN_PATH . 'assets/js/tz-counter.js', false,false, $in_footer=true);

            wp_deregister_script('slick.min');
            wp_register_script('slick.min', PLUGIN_PATH . 'assets/js/slick.min.js', false,false, $in_footer=true);

            wp_deregister_script('tz-slick-slider');
            wp_register_script('tz-slick-slider', PLUGIN_PATH . 'assets/js/tz-slick-slider.js', false,false, $in_footer=true);

            wp_deregister_script('tz-owl-carousel-slider');
            wp_register_script('tz-owl-carousel-slider', PLUGIN_PATH . 'assets/js/tz-owl-carousel-slider.js', false,false, $in_footer=true);

            wp_deregister_script('tz-slide-advance');
            wp_register_script('tz-slide-advance', PLUGIN_PATH . 'assets/js/tz-slide-advance.js', false,false, $in_footer=true);

            wp_deregister_script('tz-ourteam');
            wp_register_script('tz-ourteam', PLUGIN_PATH . 'assets/js/tz-ourteam.js', false,false, $in_footer=true);

            wp_deregister_script('tz-gmaps');
            wp_register_script('tz-gmaps', PLUGIN_PATH . 'assets/js/tz-gmaps.js', false,false, $in_footer=true);

            wp_deregister_script('tz-portfolio-slide');
            wp_register_script('tz-portfolio-slide', PLUGIN_PATH . 'assets/js/tz-portfolio-slide.js', false,false, $in_footer=true);

            wp_deregister_script('tz-portfolio-slick');
            wp_register_script('tz-portfolio-slick', PLUGIN_PATH . 'assets/js/tz-portfolio-slick.js', false,false, $in_footer=true);
        }

        /**
         * Register style sheet.
         */
        function tzInteriart_styles(){
            if(is_page() && !is_page_template()){
                wp_register_style( 'animate', PLUGIN_PATH . 'assets/css/animate.css', false );
                wp_enqueue_style( 'animate');
            }
            if(is_page_template('template-homepage.php')){
                wp_register_style( 'isotope', PLUGIN_PATH . 'assets/css/isotope.css', false );
                wp_enqueue_style( 'isotope');
                wp_register_style( 'owl.carousel', PLUGIN_PATH . 'assets/css/owl.carousel.css', false );
                wp_enqueue_style( 'owl.carousel');
                wp_register_style( 'flexslider', PLUGIN_PATH . 'assets/css/flexslider.css', false );
                wp_enqueue_style( 'flexslider');
                wp_register_style( 'prettyPhoto', PLUGIN_PATH . 'assets/css/prettyPhoto.css', false );
                wp_enqueue_style( 'prettyPhoto');
                wp_register_style( 'animate', PLUGIN_PATH . 'assets/css/animate.css', false );
                wp_enqueue_style( 'animate');
                wp_register_style( 'slick', PLUGIN_PATH . 'assets/css/slick.css', false );
                wp_enqueue_style( 'slick' );
                wp_register_style( 'slick-theme', PLUGIN_PATH . 'assets/css/slick-theme.css', false );
            }
        }

    }
    $oj_plazart = new TZ_Interiart();

endif;

?>