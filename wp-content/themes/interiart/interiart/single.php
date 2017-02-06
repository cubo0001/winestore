<?php
    get_header();
    get_template_part('template_inc/inc','header');
    get_template_part('template_inc/inc','breadcrumb');
    $interiart_sidebar    = ot_get_option('interiart_TzSinglePost_Sidebar','right');
    $interiart_media      = ot_get_option('interiart_TzSinglePost_Media','show');
    $interiart_title      = ot_get_option('interiart_TzSinglePost_Title','show');
    $interiart_author     = ot_get_option('interiart_TzSinglePost_author','show');
    $interiart_date       = ot_get_option('interiart_TzSinglePost_date','show');
    $interiart_category   = ot_get_option('interiart_TzSinglePost_category','show');
    $interiart_tag        = ot_get_option('interiart_TzSinglePost_tag','show');
    $interiart_content    = ot_get_option('interiart_TzSinglePost_content','show');
    $interiart_share      = ot_get_option('interiart_TzSinglePost_share','show');
    $interiart_infoAuthor = ot_get_option('interiart_TzSinglePost_infoAuthor','show');
    $interiart_Comment    = ot_get_option('interiart_TzSinglePost_Comment','show');

?>

<div class="tzBlogSingle">
    <div class="container">
        <div class="row">
            <?php
            if($interiart_sidebar == 'left'){
                get_sidebar();
            }
            ?>
            <div class="col-md-9">
            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;
                interiart_setPostViews(get_the_ID());
                $interiart_comment_count = wp_count_comments($post->ID);

                $interiart_item_type      = get_post_meta(get_the_ID(),'interiart_portfolio_type', TRUE);
                $interiart_imagefull      = get_post_meta(get_the_ID(),'interiart_portfolio_image',true);
                $interiart_slideshows     = get_post_meta(get_the_ID(),'interiart_portfolio_slideshows',true);
                $interiart_bgvideo_image  = get_post_meta(get_the_ID(),'interiart_portfolio_bgvideo_image',true);
                $interiart_video_webm     = get_post_meta(get_the_ID(),'interiart_portfolio_video_webm',true);
                $interiart_video_mp4      = get_post_meta(get_the_ID(),'interiart_portfolio_video_mp4',true);
                $interiart_video_ogv      = get_post_meta(get_the_ID(),'interiart_portfolio_video_ogv',true);
                $interiart_video_type     = get_post_meta(get_the_ID(),'interiart_portfolio_video_type',true);
                $interiart_video_id       = get_post_meta(get_the_ID(),'interiart_portfolio_video',true);
                $interiart_soundcloud_id  = get_post_meta(get_the_ID(),'interiart_portfolio_soundCloud_id',true);

                ?>
                <div class="tzBlogSingleContainer">
                    <?php
                    if($interiart_media == 'show'){
                        if($interiart_item_type == 'slideshows' && $interiart_slideshows != ''){
                            ?>
                            <div class="tzBlogSingleSlider">
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
                            <div class="tzBlogSingle_videoHtml5">
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
                            <div class="tzBlogSingle_video">
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
                            <div class="tzBlogSingleAudio">
                                <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($interiart_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                                </iframe>
                            </div>
                        <?php
                        }elseif($interiart_item_type == 'image'){
                            ?>
                            <div class="tzBlogSingleImage">
                                <img src="<?php echo esc_url($interiart_imagefull);?>" alt="<?php the_title();?>">
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="tzBlogSingleImage">
                                <?php the_post_thumbnail();?>
                                <?php
                                if(has_post_thumbnail()):
                                ?>
                                <?php
                                endif;
                                ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                    <div class="tzBlogSingle_content">
                        <?php
                        if($interiart_title == 'show'){
                            ?>
                            <h3 class="tzBlogSingle_title"><?php the_title();?></h3>
                            <?php
                        }
                        ?>

                        <span class="tzInfomation">
                            <?php
                            if($interiart_author == 'show'){
                                ?>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php  esc_html_e('by ','interiart');?><?php the_author();?></a>
                                <?php
                            }
                            ?>

                            <?php
                            if($interiart_date == 'show'){
                                ?>
                                <small><i>|</i><?php echo get_the_date();?></small>
                                <?php
                            }
                            ?>

                            <?php
                            if(get_the_category() !=false && $interiart_category == 'show'){
                                ?>
                                <span class="tzcategory">
                                    <i>|</i>
                                    <?php
                                    the_category(', ');
                                    ?>
                                </span>
                            <?php } ?>
                        </span>
                        <?php
                        if($interiart_content == 'show'){
                            ?>
                            <div class="single-content">
                                <?php
                                the_content();
                                wp_link_pages();
                                ?>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="tzBlogSingle_bottom">
                            <div class="row">
                                <div class="col-md-5">
                                    <?php
                                    if(get_the_tags() != false && $interiart_tag == 'show'){
                                        ?>
                                        <div class="tztag">
                                            <span><?php  esc_html_e('Tags','interiart');?>:</span>
                                            <?php
                                            the_tags('',' , ');
                                            ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-7">
                                    <?php
                                    if($interiart_share == 'show'){
                                        ?>
                                        <div class="tzshare">
                                            <div class="TzLikeButtonInner">
                                                <span><?php  esc_html_e('Share this post:', 'interiart') ; ?></span>
                                                <!-- Facebook Button -->
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                                                <a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php print interiart_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                                                <?php $interiart_pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
                                                <a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_attr($interiart_pin_image); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
                                                <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                                            </div><!--end class TzLikeButtonInner-->
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end class blog-single-content-->
            <?php
            endwhile;
            endif;
            ?>
                <?php
                if($interiart_infoAuthor == 'show'){
                    ?>
                    <div class="author">
                        <div class="author-avata">
                            <div class="author-img">
                                <?php echo get_avatar( get_the_author_meta('ID'),159); ?>
                            </div>

                            <?php
                            $interiart_twitter    =  get_the_author_meta('twitter');
                            $interiart_facebook   =  get_the_author_meta('facebook');
                            $interiart_gplus      =  get_the_author_meta('gplus');
                            $interiart_dribbble   =  get_the_author_meta('dribbble');
                            $interiart_linkedin   =  get_the_author_meta('linkedin');
                            ?>
                            <span class="author-social">
                            <?php
                            if(isset($interiart_facebook) && !empty($interiart_facebook)){
                                ?>
                                <a class="TzSocialLink TzSocialFacebook" href="<?php echo esc_url($interiart_facebook);?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            <?php
                            }
                            ?>

                                <?php
                                if(isset($interiart_twitter) && !empty($interiart_twitter)){
                                    ?>
                                    <a class="TzSocialLink TzSocialTwitter" href="<?php echo esc_url($interiart_twitter);?>">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                <?php
                                }
                                ?>

                                <?php
                                if(isset($interiart_linkedin) && !empty($interiart_linkedin)){
                                    ?>
                                    <a class="TzSocialLink TzSocialLinkedin" href="<?php echo esc_url($interiart_linkedin);?>">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                <?php
                                }
                                ?>

                                <?php
                                if(isset($interiart_dribbble) && !empty($interiart_dribbble)){
                                    ?>
                                    <a class="TzSocialLink TzSocialDribbble" href="<?php echo esc_url($interiart_dribbble);?>">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                <?php
                                }
                                ?>

                                <?php
                                if(isset($interiart_gplus) && !empty($interiart_gplus)){
                                    ?>
                                    <a class="TzSocialLink TzSocialGPlus" href="<?php echo esc_url($interiart_gplus);?>">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                <?php
                                }
                                ?>
                        </span>
                        </div>
                        <div class="author-info">
                            <h3><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author();?></a></h3>
                            <?php
                            $job        =  get_the_author_meta('job');
                            ?>
                            <?php
                            if($job != ''){
                                ?>
                                <span><?php echo esc_html($job);?></span>
                            <?php
                            }
                            ?>
                            <p><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if($interiart_Comment == 'show'){
                    ?>
                    <div class="tzComments">
                        <?php comments_template( '', true ); ?>
                    </div><!-- end comments -->
                    <?php
                }
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

