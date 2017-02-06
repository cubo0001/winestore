<div class="tzPortfolio_Single">
    <div class="container">
        <div class="row">
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

                $interiart_meta_key_1     = get_post_meta(get_the_ID(),'interiart_portfolio_meta_key_1',true);
                $interiart_meta_value_1   = get_post_meta(get_the_ID(),'interiart_portfolio_meta_value_1',true);
                $interiart_meta_key_2     = get_post_meta(get_the_ID(),'interiart_portfolio_meta_key_2',true);
                $interiart_meta_value_2   = get_post_meta(get_the_ID(),'interiart_portfolio_meta_value_2',true);
                $interiart_meta_key_3     = get_post_meta(get_the_ID(),'interiart_portfolio_meta_key_3',true);
                $interiart_meta_value_3   = get_post_meta(get_the_ID(),'interiart_portfolio_meta_value_3',true);

                ?>
                <span class="tzPortfolio_Single_Close"><i class="fa fa-times mfp-close"></i></span>
                <h3 class="tzPortfolio_Single_title"><?php the_title();?></h3>
                <div class="row">
                    <div class="col-md-9 tzPortfolio_Single_Content">
                        <?php
                        the_content();
                        wp_link_pages();
                        ?>
                    </div>
                    <div class="col-md-3 tzPortfolio_Single_Info">
                        <ul>
                            <li>
                                <label><?php  esc_html_e('Author ','interiart');?>:</label>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a>
                            </li>
                            <li>
                                <label><?php  esc_html_e('Date Post ','interiart');?>:</label>
                                <?php echo get_the_date();?>
                            </li>
                            <?php
                            if(get_the_terms($post -> ID,'portfolio-category') != false) {
                                ?>
                                    <li>
                                        <label><?php  esc_html_e('Category ', 'interiart')?>:</label>
                                        <?php the_terms($post->ID, 'portfolio-category', '', ', '); ?>
                                    </li>
                                <?php
                            }
                            ?>

                            <?php
                            if(get_the_terms($post -> ID,'portfolio-tags') != false) {
                                ?>
                                <li>
                                    <label><?php  esc_html_e('Tags ', 'interiart')?>:</label>
                                    <?php the_terms($post->ID, 'portfolio-tags', '', ', '); ?>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                            if($interiart_meta_key_1 != '' || $interiart_meta_value_1 != ''){
                                ?>
                                <li>
                                    <label><?php  echo esc_html($interiart_meta_key_1);?>:</label>
                                    <?php echo esc_html($interiart_meta_value_1);?>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                            if($interiart_meta_key_2 != '' || $interiart_meta_value_2 != ''){
                                ?>
                                <li>
                                    <label><?php  echo esc_html($interiart_meta_key_2);?>:</label>
                                    <?php echo esc_html($interiart_meta_value_2);?>
                                </li>
                                <?php
                            }
                            ?>

                            <?php
                            if($interiart_meta_key_3 != '' || $interiart_meta_value_3 != ''){
                                ?>
                                <li>
                                    <label><?php  echo esc_html($interiart_meta_key_3);?>:</label>
                                    <?php echo esc_html($interiart_meta_value_3);?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="tzPortfolio_Single_Media">
                    <?php
                    if($interiart_item_type == 'slideshows' && $interiart_slideshows != ''){
                        ?>
                        <div class="tzPortfolio_Single_Slider">
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
                        <div class="tzPortfolio_Single_videoHtml5">
                            <div class="tzPortfolio_autoplay"><i class="fa fa-play"></i></div>
                            <div class="tzPortfolio_pauses"><i class="fa fa-pause"></i></div>
                            <div class="bg-video" style="background-image: url(<?php echo esc_url($interiart_bgvideo_image);?>);background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
                            <video class="videoID">
                                <source type="video/mp4" src="<?php echo esc_url($interiart_video_mp4);?>" />
                                <source type="video/ogv" src="<?php echo esc_url($interiart_video_ogv);?>" />
                                <source type="video/webm" src="<?php echo esc_url($interiart_video_webm);?>" />
                            </video>
                        </div>
                    <?php }elseif($interiart_item_type == 'video'){
                        ?>
                        <div class="tzPortfolio_Single_video">
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
                        <div class="tzPortfolio_SingleAudio">
                            <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($interiart_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                            </iframe>
                        </div>
                        <?php
                    }elseif($interiart_item_type == 'image'){
                        ?>
                        <div class="tzPortfolio_SingleImage">
                            <img src="<?php echo esc_url($interiart_imagefull);?>" alt="<?php the_title();?>">
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="tzPortfolio_SingleImage">
                            <?php the_post_thumbnail();?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <span class="tzPortfolio_Single_Close"><i class="fa fa-times mfp-close"></i></span>
                <span class="tzPortfolio_Single_tks"><?php esc_html_e('Thanks for watching!','interiart');?></span>
                <?php
            endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

