<?php
/*
 * Element tz Portfolio Grid
 * */

function tzinteriart_view_portfolio($atts) {
    $tz_type = $tz_category = $tz_orderby = $tz_order = $tz_col_desktop = $tz_col_tabletportrait = $tz_col_mobilelandscape = $tz_col_mobile = $tz_limit = $tz_filter_option = $tz_filter_type = $tz_button_option = $tz_height_option = $tz_height_item = $tz_type_hover = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type'                   => 'grid',
        'tz_category'               =>  '',
        'tz_filter_option'          =>  '',
        'tz_filter_type'            =>  '',
        'tz_limit'                  =>  10,
        'tz_orderby'                =>  'date',
        'tz_order'                  =>  'desc',
        'tz_col_desktop'            =>  5,
        'tz_col_tabletportrait'     =>  3,
        'tz_col_mobilelandscape'    =>  2,
        'tz_col_mobile'             =>  1,
        'tz_button_option'          =>  '',
        'tz_height_item'            =>  '',
        'tz_type_hover'             =>  'type1',
        'tz_css_animation'          => '',
    ),$atts));
    ob_start();

    if($tz_type == 'carousel'){
        wp_enqueue_script('resize');
        wp_enqueue_script('owl.carousel');
        wp_enqueue_script('tz-portfolio-slide');
    }elseif($tz_type == 'slick'){
        wp_enqueue_script('resize');
        wp_enqueue_script( 'slick.min' );
        wp_enqueue_script('tz-portfolio-slick');
    }else{
        wp_enqueue_script('jquery.prettyPhoto');
        wp_enqueue_script('jquery.infinitescroll.min.min');
        wp_enqueue_script('resize');
        wp_enqueue_script('jsisotope');
        wp_enqueue_script('tz-portfolio-grid');
    }

    $tzinteriart_class = '';

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_class = ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    ?>
    <div class="tzElement_Portfolio <?php echo esc_attr($tzinteriart_class);?>">
        <?php
        if($tz_type == 'carousel'){
            ?>
            <div class="tzPortfolio_slide">
                <?php
                if($tz_category != ''){
                    $cat_id = explode(",",$tz_category);
                    $tzcat = array();

                    if(is_array($cat_id)){
                        sort($cat_id);
                        $count_cat  =   count($cat_id);

                        for($i=0; $i<$count_cat; $i++){
                            $tzcat[]  =   (int)$cat_id[$i];
                        }
                    }else{
                        $tzcat[]    = (int)$cat_id;
                    }

                    $args = array(
                        'post_type'         =>  'portfolio',
                        'posts_per_page'    =>  $tz_limit,
                        'orderby'           =>  $tz_orderby,
                        'order'             =>  $tz_order,
                        'tax_query'         =>  array(
                            array(
                                'taxonomy'  =>  'portfolio-category',
                                'filed'     =>  'id',
                                'terms'      =>  $tzcat,
                            )
                        )
                    );
                }else{
                    $args = array(
                        'post_type'         =>  'portfolio',
                        'posts_per_page'    =>  $tz_limit,
                        'orderby'           =>  $tz_orderby,
                        'order'             =>  $tz_order,
                    );
                }

                $psl_query = new WP_Query( $args );
                if ( $psl_query -> have_posts()):
                    while($psl_query -> have_posts()): $psl_query -> the_post();
                        $post_thumbnail_id = get_post_thumbnail_id( $psl_query->post->ID );
                        $image_src = wp_get_attachment_image_src( $post_thumbnail_id, 'feature-image' ); // get info image
                        ?>
                        <div class="tzPortfolio_slide_item">
                            <div class="tzPortfolioSlide_image">
                                <?php the_post_thumbnail('large');?>
                            </div>

                            <div class="tzPortfolio_hover">
                                <div class="tzPortfolio_hover_overlay"></div>
                                <div class="tzPortfolio_hover_info">
                                    <h3><a class="simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><?php the_title(); ?></a></h3>
                                    <span class="tzcat"><?php the_terms( $psl_query->post->ID, 'portfolio-category','',',' ) ; ?></span>
                                </div>
                                <a class="tzPortfolio_hover_more simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><i class="fa fa-external-link"></i><?php esc_html_e('View More','interiart'); ?></a>
                            </div>

                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <button class="tzprevslider"><i class="fa fa-angle-left "></i></button>
            <button class="tznextslider"><i class="fa fa-angle-right"></i></button>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    "use strict";

                    // Blog slider  -----------------
                    jQuery(".tzPortfolio_slide").each(function(){
                        jQuery(this).tzinteriart_owlCarousel({
                            items : <?php if($tz_col_desktop != ''){ echo esc_attr($tz_col_desktop);} else{ echo '3';}?>,
                            itemsDesktop : [1199,<?php if($tz_col_desktop != ''){ echo esc_attr($tz_col_desktop);} else{ echo '3';}?>],
                            itemsDesktopSmall : [979,<?php if($tz_col_tabletportrait != ''){ echo esc_attr($tz_col_tabletportrait);} else{ echo '3';}?>],
                            itemsTablet: [768, <?php if($tz_col_mobilelandscape != ''){ echo esc_attr($tz_col_mobilelandscape);} else{ echo '2';}?>],
                            itemsMobile: [479, <?php if($tz_col_mobile != ''){ echo esc_attr($tz_col_mobile);} else{ echo '1';}?>],
                            slideSpeed:500,
                            paginationSpeed:800,
                            rewindSpeed:1000,
                            autoPlay:false,
                            stopOnHover: false,
                            singleItem:false,
                            rewindNav:false,
                            pagination:false,
                            paginationNumbers:false,
                            itemsScaleUp:false,
                            mouseDrag:true
                        });
                    });

                    // Custom Navigation Events
                    jQuery(".tznextslider").click(function(){
                        jQuery(this).parent().find('.tzPortfolio_slide').trigger('owl.next');
                    }) ;
                    jQuery(".tzprevslider").click(function(){
                        jQuery(this).parent().find('.tzPortfolio_slide').trigger('owl.prev');
                    }) ;
                });
            </script>

            <?php
            }elseif($tz_type == 'slick'){
            ?>
            <div class="tzPortfolio_slick">
                <?php
                if($tz_category != ''){
                    $cat_id = explode(",",$tz_category);
                    $tzcat = array();

                    if(is_array($cat_id)){
                        sort($cat_id);
                        $count_cat  =   count($cat_id);

                        for($i=0; $i<$count_cat; $i++){
                            $tzcat[]  =   (int)$cat_id[$i];
                        }
                    }else{
                        $tzcat[]    = (int)$cat_id;
                    }

                    $args = array(
                        'post_type'         =>  'portfolio',
                        'posts_per_page'    =>  $tz_limit,
                        'orderby'           =>  $tz_orderby,
                        'order'             =>  $tz_order,
                        'tax_query'         =>  array(
                            array(
                                'taxonomy'  =>  'portfolio-category',
                                'filed'     =>  'id',
                                'terms'      =>  $tzcat,
                            )
                        )
                    );
                }else{
                    $args = array(
                        'post_type'         =>  'portfolio',
                        'posts_per_page'    =>  $tz_limit,
                        'orderby'           =>  $tz_orderby,
                        'order'             =>  $tz_order,
                    );
                }

                $psl_query = new WP_Query( $args );
                if ( $psl_query -> have_posts()):
                    while($psl_query -> have_posts()): $psl_query -> the_post();
                        $post_thumbnail_id = get_post_thumbnail_id( $psl_query->post->ID );
                        $image_src = wp_get_attachment_image_src( $post_thumbnail_id, 'feature-image' ); // get info image
                        ?>
                        <div class="tzPortfolio_slick_item">
                            <div class="tzPortfolioslick_image">
                                <?php the_post_thumbnail('large');?>
                            </div>

                            <div class="tzPortfolioslick_hover">
                                <div class="tzPortfolioslick_table">
                                    <div class="tzPortfolioslick_table_cell">
                                        <h3><a class="simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><?php the_title(); ?></a></h3>
                                        <span class="tzcat"><?php the_terms( $psl_query->post->ID, 'portfolio-category','',', ' ) ; ?></span>
                                    </div>
                                    <div class="tzPortfolioslick_line_left"></div>
                                    <div class="tzPortfolioslick_line_right"></div>
                                </div>
                            </div>

                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    "use strict";

                    // Blog slider  -----------------
                    jQuery(".tzPortfolio_slick").each(function(){
                        jQuery(this).slick({
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 5,
                            autoplay: false,
                            autoplaySpeed: 3000,
                            arrows: true,
                            infinite: true,
                            responsive: [
                                {
                                    breakpoint: 992,
                                    settings: {
                                        arrows: false,
                                        centerMode: true,
                                        centerPadding: '40px',
                                        slidesToShow: 3
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        arrows: false,
                                        centerMode: true,
                                        centerPadding: '40px',
                                        slidesToShow: 1
                                    }
                                }
                            ]
                        });
                    });
                });
            </script>
            <?php
            }else{
            ?>
            <?php
            $tzinteriart_column_class = '';
            if($tz_col_desktop != ''){
                $tzinteriart_column_class = ' desk_'.$tz_col_desktop.'_column';
            }

            if($tz_col_tabletportrait != ''){
                $tzinteriart_column_class .= ' tabletportrait_'.$tz_col_tabletportrait.'_column';
            }

            if($tz_col_mobilelandscape != ''){
                $tzinteriart_column_class .= ' mobilelandscape_'.$tz_col_mobilelandscape.'_column';
            }

            if($tz_col_mobile != ''){
                $tzinteriart_column_class .= ' mobileportrait_'.$tz_col_mobile.'_column';
            }
            ?>
            <div class="tzPortfolio_Grid <?php echo esc_attr($tzinteriart_column_class);?>">
                <?php
                if($tz_filter_option == 'show'){
                    ?>
                    <div  class="tzfilter" data-option-key="filter">
                        <div class="tzFillter_box">
                            <a href="#show-all" data-option-value="*" class="selected"><?php esc_html_e('Show all','tz-plazart');?></a>
                            <?php
                            $terms = get_terms($tz_filter_type) ;
                            if ( isset ( $terms ) && $terms != false && $terms != '' ):
                                foreach ( $terms as $term ):
                                    ?>
                                    <a class="TZHide" id="<?php echo 'interiart-'.esc_attr($term -> slug); ?>" href="#" data-option-value=".<?php echo 'interiart-'.esc_attr($term -> slug); ?>"><?php echo esc_html($term -> name); ?></a>
                                    <?php
                                endforeach ;
                            endif ;
                            ?>
                        </div>
                    </div><!--tzfilter-->
                    <?php
                }
                ?>
                <div class="tzPortfolioGrid_Content">
                    <?php
                    if( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                    }elseif ( get_query_var('page' ) ){
                        $paged = get_query_var('page') ;
                    }else{
                        $paged = 1;
                    }
                    if($tz_category != ''){
                        $cat_id = explode(",",$tz_category);
                        $tzcat = array();

                        if(is_array($cat_id)){
                            sort($cat_id);
                            $count_cat  =   count($cat_id);

                            for($i=0; $i<$count_cat; $i++){
                                $tzcat[]  =   (int)$cat_id[$i];
                            }
                        }else{
                            $tzcat[]    = (int)$cat_id;
                        }

                        $args = array(
                            'post_type'         =>  'portfolio',
                            'paged'             =>  $paged,
                            'posts_per_page'    =>  $tz_limit,
                            'orderby'           =>  $tz_orderby,
                            'order'             =>  $tz_order,
                            'tax_query'         =>  array(
                                array(
                                    'taxonomy'  =>  'portfolio-category',
                                    'filed'     =>  'id',
                                    'terms'      =>  $tzcat,
                                )
                            )
                        );
                    }else{
                        $args = array(
                            'post_type'         =>  'portfolio',
                            'paged'             =>  $paged,
                            'posts_per_page'    =>  $tz_limit,
                            'orderby'           =>  $tz_orderby,
                            'order'             =>  $tz_order,
                        );
                    }

                    $fp_query = new WP_Query( $args );
                    if ( $fp_query -> have_posts()): while($fp_query -> have_posts()): $fp_query -> the_post();
                        $terms_post = get_the_terms( $fp_query->post->ID, $tz_filter_type );
                        $interiart_feature    = get_post_meta( $fp_query->post->ID, 'interiart_portfolio_featured', true );
                        $class_filter  = '';
                        if ( isset ( $terms_post ) && $terms_post != false && $terms_post != '' ):
                            foreach ( $terms_post as $term_item ):
                                $class_filter .= 'interiart-'.$term_item -> slug .' ';
                            endforeach;
                        endif;

                        $class_feature = '';
                        if ( $interiart_feature == 'yes' ) :
                            $class_feature = 'tz_feature_item';
                        endif;

                        ?>
                        <div id="post-<?php the_ID() ; ?>" <?php post_class("tzPortfolioGrid-item $class_filter $class_feature") ; ?>>
                            <div class="tz-inner">
                                <div class="tzPortfolioBox">
                                    <div class="item-img">
                                        <?php the_post_thumbnail('large');?>
                                    </div>

                                    <div class="tzPortfolio_hover">
                                        <div class="tzPortfolio_hover_overlay"></div>
                                        <div class="tzPortfolio_hover_info">
                                            <h3><a class="simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><?php the_title(); ?></a></h3>
                                            <span class="tzcat"><?php the_terms( $fp_query->post->ID, 'portfolio-category','',',' ) ; ?></span>
                                        </div>
                                        <a class="tzPortfolio_hover_more simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><i class="fa fa-external-link"></i><?php esc_html_e('View More','interiart'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    endif;

                    ?>
                </div><!--end class tzPortfolio-->

                <?php
                if($tz_button_option == 'show'){
                    ?>
                    <div id="tz_append">
                        <a href="#tz_append"><i class="fa fa-plus"></i></a>
                    </div><!--end id tz_append-->
                    <?php
                }
                ?>
                <div id="loadajax" style="display: none;">
                    <?php
                    if ( function_exists('wp_pagenavi') ):
                        wp_pagenavi( array( 'query'    =>  $fp_query ));
                    endif;
                    ?>
                </div>

            </div><!--end class tzPortfolio_Grid-->
            <script>
                // set column
                var tzDesktop               =   <?php echo esc_attr($tz_col_desktop);?>,
                    tztabletportrait        =   <?php echo esc_attr($tz_col_tabletportrait);?>,
                    tzmobilelandscape       =   <?php echo esc_attr($tz_col_mobilelandscape);?>,
                    tzmobileportrait        =   <?php echo esc_attr($tz_col_mobile);?>,
                    tzheight_item           =   <?php echo esc_attr($tz_height_item);?>,
                    tzpg_resizeTimer        =  null;
            </script><!--end script recent-work-->
            <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-view-portfolio','tzinteriart_view_portfolio');
?>