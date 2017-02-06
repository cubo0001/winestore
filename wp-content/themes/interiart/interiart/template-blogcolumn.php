<?php
    /*
     * Template Name: Template Blog Column
     */
?>
<?php
    get_header();
    get_template_part('template_inc/inc','header');
    get_template_part('template_inc/inc','breadcrumb');
?>
<?php
// OPTION FOR PAGE BLOG COLUMN
$interiart_catid          =  get_post_meta( get_the_ID(), 'interiart_blogColumn_catid', true ) ;
$interiart_limit          =  get_post_meta( get_the_ID(), 'interiart_blogColumn_limit', true ) ;
$interiart_orderby        =  get_post_meta( get_the_ID(), 'interiart_blogColumn_orderby', true ) ;
$interiart_order          =  get_post_meta( get_the_ID(), 'interiart_blogColumn_order', true ) ;
$interiart_sidebar        =  get_post_meta( get_the_ID(), 'interiart_blogColumn_sidebar', true ) ;

$interiart_desktop            =  get_post_meta( $post -> ID, 'interiart_blogColumn_desktop', true );
$interiart_tabletportrait     =  get_post_meta( $post -> ID, 'interiart_blogColumn_tabletportrait', true );
$interiart_mobilelandscape    =  get_post_meta( $post -> ID, 'interiart_blogColumn_mobilelandscape', true );
$interiart_mobileportrait     =  get_post_meta( $post -> ID, 'interiart_blogColumn_mobile', true );
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

$interiart_class_sidebar  = 'no_sidebar';
if($interiart_sidebar == 'left' || $interiart_sidebar == 'right'){
    $interiart_class_sidebar = 'yes_sidebar';
}

?>
<div class="tzBlogColumn">
    <div class="container">
        <div class="row">
            <?php
            if($interiart_sidebar == 'left'){
                get_sidebar();
            }
            ?>
            <div class="col-md-<?php if($interiart_sidebar == 'left' || $interiart_sidebar == 'right'){ echo '9';} else{ echo '12';}?>">
                <div class="tzBlogContainer <?php echo esc_attr($interiart_class_sidebar);?><?php echo esc_attr($interiart_column_class);?>">
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
                        'post_type'         =>  'post',
                        'paged'             =>  $interiart_paged,
                        'posts_per_page'    =>  $interiart_limit,
                        'orderby'           =>  $interiart_orderby,
                        'order'             =>  $interiart_order,
                        'tax_query'         =>  array(
                            array(
                                'taxonomy'  =>  'category',
                                'filed'     =>  'id',
                                'terms'      =>  $interiart_cat
                            )
                        )
                    );
                }else{
                    $args = array(
                        'post_type'         =>  'post',
                        'paged'             =>  $interiart_paged,
                        'posts_per_page'    =>  $interiart_limit,
                        'orderby'           =>  $interiart_orderby,
                        'order'             =>  $interiart_order,
                    );
                }

                $query = new WP_Query( $args ) ;
                if ( $query -> have_posts() ): while ( $query -> have_posts() ): $query -> the_post() ;
                    $interiart_item_type      = get_post_meta(get_the_ID(),'interiart_portfolio_type', TRUE);
                    $interiart_image          = get_post_meta(get_the_ID(),'interiart_portfolio_fullsize_image', TRUE);
                    $interiart_slideshows     = get_post_meta(get_the_ID(),'interiart_portfolio_slideshows',true);
                    $interiart_bgvideo_image  = get_post_meta(get_the_ID(),'interiart_portfolio_bgvideo_image',true);
                    $interiart_video_webm     = get_post_meta(get_the_ID(),'interiart_portfolio_video_webm',true);
                    $interiart_video_mp4      = get_post_meta(get_the_ID(),'interiart_portfolio_video_mp4',true);
                    $interiart_video_ogv      = get_post_meta(get_the_ID(),'interiart_portfolio_video_ogv',true);
                    $interiart_video_type     = get_post_meta(get_the_ID(),'interiart_portfolio_video_type',true);
                    $interiart_video_id       = get_post_meta(get_the_ID(),'interiart_portfolio_video',true);
                    $interiart_soundcloud_id  = get_post_meta(get_the_ID(),'interiart_portfolio_soundCloud_id',true);
                    $interiart_comment_count  = wp_count_comments(get_the_ID());
                    $interiart_feature        = get_post_meta( $post -> ID, 'interiart_portfolio_featured', true );

                    $interiart_class_feature = '';

                    if ( $interiart_feature == 'yes' ) :
                        $interiart_class_feature = 'tz_feature_item';
                    endif;


                    ?>
                    <div id="post-<?php the_ID() ; ?>" <?php post_class();?>>
                        <div class="tzBlogInner">
                        <?php
                        if($interiart_item_type == 'quote'){
                            ?>
                            <div class="tzBlogQuote">
                                <div class="tzBlogQuote_bg">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="tzBlogQuote_overlay"></div>
                                <span class="tzBlogQuote_char" data-icon="&#x7b;"></span>
                                <?php the_content();?>
                                <span class="tzBlogQuote_info">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php  esc_html_e('by ','interiart');?><?php the_author();?></a>
                                <small><i>|</i><?php echo get_the_date();?></small>
                                    <?php
                                    if(get_the_category() !=false){
                                        ?>
                                        <span class="tzcategory">
                                        <i>|</i>
                                            <?php
                                            the_category(', ');
                                            ?>
                                    </span>
                                    <?php } ?>
                                    <?php
                                    if(get_the_tags() != false){
                                        ?>
                                        <span class="tztag">
                                        <i>|</i>
                                            <?php
                                            the_tags('',', ');
                                            ?>
                                        </span>
                                    <?php } ?>
                            </span>
                            </div>
                        <?php
                        }else{
                            if($interiart_item_type == 'slideshows' && $interiart_slideshows != ''){
                                ?>
                                <div class="tzBlogSlider">
                                    <ul class="slides">
                                        <?php
                                        foreach ( $interiart_slideshows as $slide ):
                                            ?>
                                            <li>
                                                <img src="<?php echo esc_url($slide['interiart_portfolio_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                                            </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </div>
                            <?php }elseif($interiart_item_type == 'videohtml5'){
                                ?>
                                <div class="tzBlog_videoHtml5">
                                    <div class="tzblog_autoplay"><i class="fa fa-play"></i></div>
                                    <div class="tzblog_pauses"><i class="fa fa-pause"></i></div>
                                    <div class="bg-video" style="background-image: url(<?php echo esc_url($interiart_bgvideo_image);?>);background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
                                    <video class="videoID">
                                        <source type="video/mp4" src="<?php echo esc_url($interiart_video_mp4);?>" />
                                        <source type="video/ogv" src="<?php echo esc_url($interiart_video_ogv);?>" />
                                        <source type="video/webm" src="<?php echo esc_url($interiart_video_webm);?>" />
                                    </video>
                                </div>
                            <?php }elseif($interiart_item_type == 'video'){
                                ?>
                                <div class="tzBlogVideo">
                                    <?php
                                    if($interiart_video_type == 'youtube'){
                                        ?>
                                        <iframe  class="iframe-full"
                                                 src="http://www.youtube.com/embed/<?php echo esc_attr($interiart_video_id); ?>?hd=1&amp;wmode=opaque&amp;autoplay=0">
                                        </iframe>
                                    <?php
                                    }else{
                                        ?>
                                        <iframe src="https://player.vimeo.com/video/<?php echo esc_attr($interiart_video_id) ; ?>?title=0&amp;byline=0&amp;portrait=0" allowfullscreen></iframe>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }elseif($interiart_item_type == 'audio'){
                                ?>
                                <div class="tzBlogAudio">
                                    <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($interiart_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                                    </iframe>
                                </div>
                            <?php
                            }else{
                                ?>
                                <div class="tzBlogImage">
                                    <?php the_post_thumbnail();?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="tzBlogContent">
                                <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <span class="tzInfomation">
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php  esc_html_e('by ','interiart');?><?php the_author();?></a>
                                        <small><i>|</i><?php echo get_the_date();?></small>
                                        <small><i>|</i><?php echo esc_html($interiart_comment_count ->total_comments) . esc_html__(' Comments','interiart');?></small>
                                        <?php
                                        if(get_the_category() !=false){
                                            ?>
                                            <span class="tzcategory">
                                                <i>|</i>
                                                <?php
                                                the_category(', ');
                                                ?>
                                            </span>
                                        <?php } ?>
                                        <?php
                                        if(get_the_tags() != false){
                                            ?>
                                            <span class="tztag">
                                                <i>|</i>
                                                <?php
                                                the_tags('',', ');
                                                ?>
                                                </span>
                                        <?php } ?>
                                    </span>
                                <?php
                                if ( ! has_excerpt() ) {
                                    the_content( sprintf('<a href="%s" class="tzreadmore">%s</a>',esc_url(get_permalink()), esc_html__('read more','interiart'),false ));
                                    wp_link_pages();
                                } else {
                                    the_excerpt();
                                    if($interiart_feature == 'yes'){
                                        ?>
                                        <a href="<?php the_permalink();?>" class="tzreadmore"><?php  esc_html_e('read more','interiart');?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                </div>
                <?php
                if ( function_exists('wp_pagenavi') ):
                    wp_pagenavi( array( 'query'    =>  $query ) );
                endif;
                ?>
            </div>
            <?php
            if($interiart_sidebar == 'right'){
                get_sidebar('right');
            }
            ?>
        </div>
    </div>
</div>
<?php
interiart_footer_type();
get_footer();
?>