<?php
get_header();
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');

$interiart_sidebar          =   ot_get_option('interiart_TzBlog_Sidebar','right');
?>

<section class="tzBlogDefault">
<div class="container">
<div class="row">
<?php
if($interiart_sidebar == 'left'){
    get_sidebar();
}
?>
<div class="col-md-9">
<div class="tzBlogContainer">
<?php
if ( have_posts() ) : while (have_posts()) : the_post() ;
    $interiart_item_type      = get_post_meta(get_the_ID(),'interiart_portfolio_type', TRUE);
    $interiart_image          = get_post_meta(get_the_ID(),'interiart_portfolio_image', TRUE);
    $interiart_slideshows     = get_post_meta(get_the_ID(),'interiart_portfolio_slideshows',true);
    $interiart_video_type     = get_post_meta(get_the_ID(),'interiart_portfolio_video_type',true);
    $interiart_video_id       = get_post_meta(get_the_ID(),'interiart_portfolio_video',true);
    $interiart_soundcloud_id  = get_post_meta(get_the_ID(),'interiart_portfolio_soundCloud_id',true);
    $interiart_bgvideo_image  = get_post_meta(get_the_ID(),'interiart_portfolio_bgvideo_image',true);
    $interiart_video_webm     = get_post_meta(get_the_ID(),'interiart_portfolio_video_webm',true);
    $interiart_video_mp4      = get_post_meta(get_the_ID(),'interiart_portfolio_video_mp4',true);
    $interiart_video_ogv      = get_post_meta(get_the_ID(),'interiart_portfolio_video_ogv',true);
    $interiart_comment_count  = wp_count_comments(get_the_ID());
    
    ?>
    <div id='post-<?php the_ID(); ?>' class="tzBlogItem">
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
                    if(get_the_terms($post -> ID,'portfolio-category') != false){
                        ?>
                        <span class="tzcategory">
                            <i class="fa fa-folder"></i>
                            <?php
                            the_terms( $post -> ID, 'portfolio-category','',', ' ) ;
                            ?>
                        </span>
                    <?php } ?>
                    <?php
                    if(get_the_terms($post -> ID,'portfolio-tags') != false){
                        ?>
                        <span class="tztag">
                            <i class="fa fa-tag"></i>
                            <?php the_terms( $post -> ID, 'portfolio-tags','',', ' ) ; ?>
                        </span>
                    <?php } ?>
                </span>
            </div>
        <?php
        }else{
            if($interiart_item_type == 'slideshows'){
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
            <?php
            }elseif($interiart_item_type == 'videohtml5'){
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
                <div class="tzBlog_video">
                    <?php
                    if($interiart_video_type == 'youtube'){
                        ?>
                        <iframe  class="iframe-full"
                                 src="http://www.youtube.com/embed/<?php echo esc_attr($interiart_video_id); ?>?hd=1&amp;wmode=opaque">
                        </iframe>
                    <?php
                    }else{
                        ?>
                        <iframe src="https://player.vimeo.com/video/<?php echo esc_attr($interiart_video_id) ; ?>?title=0&byline=0&portrait=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
                <h3 class="title"><a class="simple-ajax-popup-align-top" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <span class="tzInfomation">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php  esc_html_e('by ','interiart');?><?php the_author();?></a>
                        <small><i>|</i><?php echo get_the_date();?></small>
                        <small><i>|</i><?php echo esc_html($interiart_comment_count ->total_comments) . esc_html__(' Comments','interiart');?></small>
                        <?php
                            if(get_the_terms($post -> ID,'portfolio-category') != false){
                            ?>
                                <span class="tzcategory">
                                    <i class="fa fa-folder"></i>
                                    <?php
                                    the_terms( $post -> ID, 'portfolio-category','',', ' ) ;
                                    ?>
                                </span>
                        <?php } ?>
                        <?php
                            if(get_the_terms($post -> ID,'portfolio-tags') != false){
                                ?>
                                <span class="tztag">
                                    <i class="fa fa-tag"></i>
                                    <?php the_terms( $post -> ID, 'portfolio-tags','',', ' ) ; ?>
                                </span>
                        <?php } ?>
                    </span>
                <?php
                if ( ! has_excerpt() ) {
                    the_content( sprintf('<a href="%s" class="tzreadmore simple-ajax-popup-align-top">%s</a>',esc_url(get_permalink()), esc_html__('read more','interiart'),false ));
                    wp_link_pages();
                } else {
                    the_excerpt();
                    ?>
                    <a href="<?php the_permalink();?>" class="tzreadmore simple-ajax-popup-align-top"><?php  esc_html_e('read more','interiart');?></a>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
<?php
endwhile; // end while ( have_posts )
endif; // end if ( have_posts )
?>
</div>
<?php
if ( function_exists('wp_pagenavi') ):
    wp_pagenavi();
else:
    interiart_content_nav('bottom-nav');
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
</section>

<?php
interiart_footer_type();
get_footer();
?>

