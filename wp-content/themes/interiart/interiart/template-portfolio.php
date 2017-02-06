<?php
    /*
     * Template Name: Template portfolio
     */
?>
<?php
get_header();
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');
?>

<?php
// OPTION FOR PAGE PORFOLIO
$interiart_catid              =  get_post_meta( get_the_ID(),'interiart_portfolio_catid', true ) ;
$interiart_fillter            =  get_post_meta( get_the_ID() ,'interiart_porfolio_filter', true ) ;
$interiart_fillter_status     =  get_post_meta( get_the_ID(),'interiart_porfolio_filter_status', true ) ;
$interiart_limit              =  get_post_meta( get_the_ID(),'interiart_portfolio_limit', true ) ;
$interiart_orderby            =  get_post_meta( get_the_ID(),'interiart_porfolio_orderby', true ) ;
$interiart_order              =  get_post_meta( get_the_ID(),'interiart_porfolio_order', true ) ;
$interiart_paging             =  get_post_meta( get_the_ID(),'interiart_paging', true ) ;
$interiart_load_text          =  get_post_meta( get_the_ID(),'interiart_ajaxbutton_text', true ) ;
$interiart_Height             =  get_post_meta( get_the_ID(),'interiart_option_height', true) ;
$interiart_Height_value       =  get_post_meta( get_the_ID(),'interiart_height_value', true) ;
$interiart_Sidebar            =  get_post_meta( get_the_ID(),'interiart_porfolio_sidebar', true) ;

$interiart_desktop            =  get_post_meta( get_the_ID(), 'interiart_desktop_column', true );
$interiart_tabletportrait     =  get_post_meta( get_the_ID(), 'interiart_tabletportrait_column', true );
$interiart_mobilelandscape    =  get_post_meta( get_the_ID(), 'interiart_mobilelandscape_column', true );
$interiart_mobileportrait     =  get_post_meta( get_the_ID(), 'interiart_mobileportrait_column', true );
$interiart_column_class = '';
if($interiart_desktop != ''){
    $interiart_column_class = ' desk_'.$interiart_desktop.'_column';
}else{
    $interiart_column_class = ' desk_5_column';
}

if($interiart_tabletportrait != ''){
    $interiart_column_class .= ' tabletportrait_'.$interiart_tabletportrait.'_column';
}else{
    $interiart_column_class .= ' tabletportrait_3_column';
}

if($interiart_mobilelandscape != ''){
    $interiart_column_class .= ' mobilelandscape_'.$interiart_mobilelandscape.'_column';
}else{
    $interiart_column_class .= ' mobilelandscape_2_column';
}

if($interiart_mobileportrait != ''){
    $interiart_column_class .= ' mobileportrait_'.$interiart_mobileportrait.'_column';
}else{
    $interiart_column_class .= ' mobileportrait_1_column';
}

if($interiart_Height == 'fix'){
    $interiart_column_class = 'tzPortfolio_Fix_Height';
}else{
    $interiart_column_class = 'tzPortfolio_auto_Height';
}


$interiart_class_sidebar = 'col-md-12';
if($interiart_Sidebar == 'right' || $interiart_Sidebar == 'left'){
    $interiart_class_sidebar = 'col-md-9';
}

$interiart_class_portfolio = '';
if($interiart_Width_option == 'in-grid'):
    $interiart_class_portfolio = 'tzPortfolio_grid';
else:
    $interiart_class_portfolio = 'tzPortfolio_full';
endif;

?>
<div class="tzPortfolio_Container <?php echo esc_attr($interiart_class_portfolio);?>">
    <div class="container">
        <div class="row">
            <?php
            if($interiart_Sidebar == 'left'){
                get_sidebar();
            }
            ?>
            <div class="<?php echo esc_attr($interiart_class_sidebar);?>">
                <?php if ( $interiart_fillter_status == 'show' ) : ?>
                    <div class="tzFilter" data-option-key="filter">
                        <div class="tzFillter_box">
                            <a data-option-value="*" class="selected" href="#show-all"><?php  esc_html_e('Show all','interiart');?></a>
                            <?php
                            $interiart_terms = get_terms($interiart_fillter) ;
                            if ( isset ( $interiart_terms ) && $interiart_terms != false && $interiart_terms != '' ):
                                foreach ( $interiart_terms as $term ) :
                                    ?>
                                    <a class="TZHide" id="<?php echo 'interiart-'.$term -> slug; ?>" data-option-value=".<?php echo 'interiart-'.$term -> slug; ?>" href="#"><?php echo esc_html($term -> name); ?></a>
                                <?php
                                endforeach ;
                            endif ;
                            ?>
                        </div>
                    </div><!--end class tzFilter-->
                <?php endif; ?>
                <div class="tzPortfolio <?php echo esc_attr($interiart_column_class);?>">
                    <?php
                    if ( get_query_var('paged') ):
                        $interiart_paged = get_query_var('paged');
                    else:
                        $interiart_paged = 1;
                    endif;
                    if($interiart_catid != ''){
                        $interiart_cat = array();
                        if(is_array($interiart_catid)){
                            sort($interiart_catid);
                            $interiart_count_cat  =   count($interiart_catid);

                            for($i=0; $i<$interiart_count_cat; $i++){
                                $interiart_cat[]  =   (int)$interiart_catid[$i];
                            }

                        }else{
                            $interiart_cat[]    = (int)$interiart_catid;
                        }
                        $args = array(
                            'post_type'         =>  'portfolio',
                            'paged'             =>  $interiart_paged,
                            'posts_per_page'    =>  $interiart_limit,
                            'orderby'           =>  $interiart_orderby,
                            'order'             =>  $interiart_order,
                            'tax_query'         =>  array(
                                array(
                                    'taxonomy'  =>  'portfolio-category',
                                    'filed'     =>  'id',
                                    'terms'      =>  $interiart_cat
                                )
                            )
                        );
                    }else{
                        $args = array(
                            'post_type'         =>  'portfolio',
                            'paged'             =>  $interiart_paged,
                            'posts_per_page'    =>  $interiart_limit,
                            'orderby'           =>  $interiart_orderby,
                            'order'             =>  $interiart_order,
                        );
                    }

                    $query = new WP_Query( $args ) ;
                    if ( $query -> have_posts() ): while ( $query -> have_posts() ): $query -> the_post() ;
                        ?>
                        <div id="post-<?php the_ID() ; ?>" <?php post_class();?>>
                            <div class="tz-inner">
                                <div class="tzPortfolioBox">
                                    <div class="item-img">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                    <div class="tzPortfolio_hover">
                                        <div class="tzPortfolio_hover_overlay"></div>
                                        <div class="tzPortfolio_hover_info">
                                            <h3><a class="simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><?php the_title(); ?></a></h3>
                                            <span class="tzcat"><?php the_terms( $post -> ID, 'portfolio-category','',',' ) ; ?></span>
                                        </div>
                                        <a class="tzPortfolio_hover_more simple-ajax-popup-align-top" href="<?php the_permalink(); ?>" data-effect="mfp-zoom-in"><i class="fa fa-external-link"></i><?php esc_html_e('View More','interiart'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile; // end while have posts
                        wp_reset_postdata();
                    endif;  // end if have posts
                    ?>
                </div><!--end class tzPortfolio-->
                <?php
                $interiart_load_class = '';

                if ( $interiart_paging != 'pagenavi'  ):

                    $interiart_load_class = "class =not_pagenavi" ;
                endif;

                $interiart_ajaxbutton_class = '';
                if ( $interiart_paging != 'ajaxbutton'  ):
                    $interiart_ajaxbutton_class = "class =not_pagenavi" ;
                endif;
                ?>
                <div id="tz_append" <?php echo esc_attr($interiart_ajaxbutton_class); ?>>
                    <a href="#tz_append"><?php echo esc_html($interiart_load_text);?></a>
                </div><!--end id tz_append-->
                <div id="loadajax" <?php echo esc_attr($interiart_load_class);?>>
                    <?php echo  interiart_custom_paging_nav($query->max_num_pages);  ?>
                </div>
            </div><!--end class col-md-12-->
            <?php
            if($interiart_Sidebar == 'right'){
                get_sidebar('right');
            }
            ?>
        </div>
    </div>
</div><!--end class container-->

<?php
interiart_footer_type();
get_footer();
?>