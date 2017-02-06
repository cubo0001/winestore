<?php
/*
 * Element Tz View Post
 * */

function tzinteriart_vew_post($atts) {
    $tz_type_view = $tz_category = $tz_limit = $tz_orderby = $tz_order = $tz_read_option = $tz_read_text = $tz_number_desktop = $tz_number_desktopsmall = $tz_number_tablet = $tz_number_mobile = $tz_height_option = $tz_height_value = $tz_css_animation = '';
    extract(shortcode_atts(array(
        'tz_type_view'              => '',
        'tz_category'               => '',
        'tz_limit'                  => '',
        'tz_orderby'                => '',
        'tz_order'                  => '',
        'tz_read_option'            => '',
        'tz_read_text'              => '',
        'tz_number_desktop'         => '',
        'tz_number_desktopsmall'    => '',
        'tz_number_tablet'          => '',
        'tz_number_mobile'          => '',
        'tz_height_option'          => '',
        'tz_height_value'           => '',
        'tz_css_animation'          => '',
    ),$atts));
    ob_start();

    if($tz_type_view == 'slide' || $tz_type_view == 'slide-type2') {
        wp_enqueue_script('owl.carousel');
        wp_enqueue_script('jquery.flexslider-min');
    }elseif($tz_type_view == 'slide-advance'){
        wp_enqueue_script('owl.carousel');
        wp_enqueue_script('resize');
        wp_enqueue_script('tz-slide-advance');

    }else{
        wp_enqueue_script('resize');
        wp_enqueue_script('jsisotope');
        wp_enqueue_script('tz-view-post');
    }

    $tzinteriart_viewpost_class = '';

    if($tz_type_view != ''){
        $tzinteriart_viewpost_class .= 'tzElement_viewPost_'.$tz_type_view;
    }

    if($tz_css_animation != ''){
        wp_enqueue_script( 'waypoints' );
        $tzinteriart_viewpost_class .= ' wpb_animate_when_almost_visible wpb_' . $tz_css_animation;
    }

    $tz_cat_id =  get_cat_ID( $tz_category );
    $tz_cat_link = get_category_link($tz_cat_id);

    if ( isset ( $tz_cat_id ) && $tz_cat_id != '' ):
        $tz_args = array(
            'post_type'         =>  'post',
            'posts_per_page'    => $tz_limit,
            'orderby'           =>  $tz_orderby,
            'order'             =>  $tz_order,
            'cat'               =>  $tz_cat_id,
            'meta_query'        => array(
                array(
                    'key' => 'plazart_portfolio_type',
                    'value' => 'quote',
                    'compare' => '!='
                ),
            )
        );
    else:
        $tz_args = array(
            'post_type'             => 'post',
            'posts_per_page'        => $tz_limit,
            'orderby'               =>  $tz_orderby,
            'order'                 =>  $tz_order,
            'meta_query'        => array(
                array(
                    'key' => 'plazart_portfolio_type',
                    'value' => 'quote',
                    'compare' => '!='
                ),
            )
        );
    endif;

    $tz_news_query = '';
    $tz_news_query = new WP_Query( $tz_args );
    if ( $tz_news_query -> have_posts() ):
    ?>
    <div class="tzElement_viewPost <?php echo esc_attr($tzinteriart_viewpost_class);?>">
        <?php
        if($tz_type_view == 'slide' || $tz_type_view == 'slide-type2') {
            ?>
            <div class="tzViewPost_slider">
                <?php
                while ($tz_news_query->have_posts()): $tz_news_query->the_post();
                    $tzinteriart_item_type = get_post_meta(get_the_ID(), 'interiart_portfolio_type', TRUE);
                    $tzinteriart_image = get_post_meta(get_the_ID(), 'interiart_portfolio_image', TRUE);
                    $tzinteriart_slideshows = get_post_meta(get_the_ID(), 'interiart_portfolio_slideshows', true);
                    $tzinteriart_video_type = get_post_meta(get_the_ID(), 'interiart_portfolio_video_type', true);
                    $tzinteriart_video_id = get_post_meta(get_the_ID(), 'interiart_portfolio_video', true);
                    $tzinteriart_soundcloud_id = get_post_meta(get_the_ID(), 'interiart_portfolio_soundCloud_id', true);
                    $tzinteriart_bgvideo_image = get_post_meta(get_the_ID(), 'interiart_portfolio_bgvideo_image', true);
                    $tzinteriart_video_webm = get_post_meta(get_the_ID(), 'interiart_portfolio_video_webm', true);
                    $tzinteriart_video_mp4 = get_post_meta(get_the_ID(), 'interiart_portfolio_video_mp4', true);
                    $tzinteriart_video_ogv = get_post_meta(get_the_ID(), 'interiart_portfolio_video_ogv', true);

                    ?>
                    <div class="tzViewPost_item">
                        <?php
                        if ($tzinteriart_item_type == 'slideshows') {
                            if($tzinteriart_slideshows != ''){
                                ?>
                                <div class="tzPost_Slider">
                                    <ul class="slides">
                                        <?php
                                        foreach ($tzinteriart_slideshows as $slide):
                                            ?>
                                            <li>
                                                <img src="<?php echo esc_url($slide['interiart_portfolio_slideshow_item']); ?>" alt="<?php the_title(); ?>">
                                            </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="tzPostImage">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <?php
                            }
                            ?>
                        <?php
                        } elseif ($tzinteriart_item_type == 'videohtml5') {
                            ?>
                            <div class="tzPost_videoHtml5">
                                <div class="tzPost_autoplay"><i class="fa fa-play"></i></div>
                                <div class="tzPost_pauses"><i class="fa fa-pause"></i></div>
                                <div class="tzPost_bgVideo" style="background-image: url(<?php echo esc_url($tzinteriart_bgvideo_image);?>);background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
                                <video class="tzPost_videoID">
                                    <source type="video/mp4" src="<?php echo esc_url($tzinteriart_video_mp4); ?>"/>
                                    <source type="video/ogv" src="<?php echo esc_url($tzinteriart_video_ogv); ?>"/>
                                    <source type="video/webm" src="<?php echo esc_url($tzinteriart_video_webm); ?>"/>
                                </video>
                            </div>
                        <?php
                        } elseif ($tzinteriart_item_type == 'video') {
                            ?>
                            <div class="tzPost_video">
                                <?php
                                if ($tzinteriart_video_type == 'youtube') {
                                    ?>
                                    <iframe class="iframe-full"
                                            src="http://www.youtube.com/embed/<?php echo esc_attr($tzinteriart_video_id); ?>?hd=1&amp;wmode=opaque">
                                    </iframe>
                                <?php
                                } else {
                                    ?>
                                    <iframe class="iframe-full"
                                            src="http://player.vimeo.com/video/<?php echo esc_attr($tzinteriart_video_id); ?>"
                                            allowFullScreen>
                                    </iframe>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        } elseif ($tzinteriart_item_type == 'audio') {
                            ?>
                            <div class="tzPost_Audio">
                                <iframe class="iframe-full-audio" allowfullscreen=""
                                        src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($tzinteriart_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                                </iframe>
                            </div>
                        <?php
                        } else {
                            ?>
                            <div class="tzPostImage">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="tzPost_info">
                            <h4 class="tzPost_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span class="tzPost_infomation">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php esc_html_e('by ', 'tz-plazart'); ?><?php the_author(); ?></a>
                                <small><?php echo get_the_time('M j, Y', get_the_ID()); ?></small>
                                <?php
                                if (get_the_category() != false) {
                                    ?>
                                    <span class="tzcategory">
                                        <?php
                                        the_category(', ');
                                        ?>
                                    </span>
                                <?php } ?>
                                <?php
                                if (get_the_tags() != false) {
                                    ?>
                                    <span class="tztag">
                                        <?php
                                        the_tags('', ', ');
                                        ?>
                                    </span>
                                <?php } ?>
                            </span>

                            <?php the_excerpt(); ?>


                            <?php
                            if($tz_read_option == 'show' && $tz_read_text != ''){
                                ?>
                                <a href="<?php the_permalink(); ?>" class="tzPost_readMore"><?php echo esc_html($tz_read_text); ?><i class="fa fa-angle-double-right"></i></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    "use strict";

                    // Blog slider  -----------------
                    jQuery(".tzViewPost_slider").each(function(){
                        jQuery(this).tzinteriart_owlCarousel({
                            items : <?php if($tz_number_desktop != ''){ echo esc_attr($tz_number_desktop);} else{ echo '3';}?>,
                            itemsDesktop : [1199,<?php if($tz_number_desktop != ''){ echo esc_attr($tz_number_desktop);} else{ echo '3';}?>],
                            itemsDesktopSmall : [979,<?php if($tz_number_desktopsmall != ''){ echo esc_attr($tz_number_desktopsmall);} else{ echo '3';}?>],
                            itemsTablet: [768, <?php if($tz_number_tablet != ''){ echo esc_attr($tz_number_tablet);} else{ echo '2';}?>],
                            itemsMobile: [479, <?php if($tz_number_mobile != ''){ echo esc_attr($tz_number_mobile);} else{ echo '1';}?>],
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

                    // JQUERY VIDEO HTML5

                    jQuery('.tzPost_autoplay').on('click',function(){
                        jQuery(this).hide();
                        jQuery(this).parent().parent().find('.tzPost_bgVideo').hide();
                        jQuery(this).parent().parent().find('.tzPost_pauses').show();
                        if (jQuery(this).parent().parent().find('.tzPost_videoID')[0].paused)
                            jQuery(this).parent().parent().find('.tzPost_videoID')[0].play();

                    }) ;
                    jQuery('.tzPost_pauses').on('click',function(){
                        jQuery(this).hide();
                        jQuery(this).parent().parent().find('.tzPost_bgVideo').show();
                        jQuery(this).parent().parent().find('.tzPost_autoplay').show();
                        if (jQuery(this).parent().parent().find('.tzPost_videoID')[0].play)
                            jQuery(this).parent().parent().find('.tzPost_videoID')[0].pause();
                    });
                });

                jQuery(window).load(function(){

                    jQuery('.tzPost_Slider').flexslider({
                        animation: "slide",
                        controlNav: false,
                        animationLoop: true,
                        directionNav: true,
                        prevText: "Previous",
                        nextText: "Next",
                        smoothHeight: true
                    });

                    // HEIGHT VIMEO + HTML5

                    var $width_vimeo = jQuery('.tzPost_video').width();
                    jQuery('.tzPost_video').css('height',(($width_vimeo*9)/16)+'px');

                    var $width_html5 = jQuery('.tzPost_videoHtml5').width();
                    jQuery('.tzPost_videoHtml5').css('height',(($width_html5*9)/16)+'px');
                });

            </script>
        <?php
        }elseif($tz_type_view == 'slide-advance'){
            ?>
            <div class="tzViewPost_slider_advance">
                <?php
                $swift_count = 1;
                $total = $tz_news_query->post_count;

                while ($tz_news_query->have_posts()): $tz_news_query->the_post();
                    $swift_comment_count = wp_count_comments(get_the_ID());
                    ?>
                    <?php
                    if($swift_count == 1){
                        $i=0;
                        ?>
                        <div class="tzViewPost_item">
                            <div class="tzViewPost_item_0">
                                <div class="tzViewPost_item_box">
                                    <div class="tzViewPost_image">
                                        <?php the_post_thumbnail();?>
                                    </div>
                                    <div class="tzViewPost_Overlay"></div>
                                    <div class="tzViewPost_info">
                                        <h3 class="tzViewPost_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                        <?php the_excerpt();?>
                                        <div class="tzViewPost_meta">
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php esc_html_e('by ', 'tz-plazart'); ?><?php the_author(); ?></a>
                                            <small>/</small>
                                        <span class="tzViewPost_date">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo get_the_time('M j, Y', get_the_ID()); ?>
                                        </span>
                                            <small>/</small>
                                        <span class="tzViewPost_comment">
                                            <i class="fa fa-comments"></i>
                                            <?php echo esc_html($swift_comment_count ->total_comments);?>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                    }
                    ?>

                    <?php
                    if($swift_count%4==1 && $swift_count > 4){
                        $i = 0;
                        ?>
                        <div class="tzViewPost_item">
                            <div class="tzViewPost_item_0">
                                <div class="tzViewPost_item_box">
                                    <div class="tzViewPost_image">
                                        <?php the_post_thumbnail();?>
                                    </div>
                                    <div class="tzViewPost_Overlay"></div>
                                    <div class="tzViewPost_info">
                                        <h3 class="tzViewPost_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                        <?php the_excerpt();?>
                                        <div class="tzViewPost_meta">
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php esc_html_e('by ', 'tz-plazart'); ?><?php the_author(); ?></a>
                                            <small>/</small>
                                        <span class="tzViewPost_date">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo get_the_time('M j, Y', get_the_ID()); ?>
                                        </span>
                                            <small>/</small>
                                        <span class="tzViewPost_comment">
                                            <i class="fa fa-comments"></i>
                                            <?php echo esc_html($swift_comment_count ->total_comments);?>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }elseif($swift_count != 1){
                        ?>
                            <div class="tzViewPost_item_<?php echo esc_attr($i);?>">
                                <div class="tzViewPost_item_box">
                                    <div class="tzViewPost_image">
                                        <?php the_post_thumbnail();?>
                                    </div>
                                    <div class="tzViewPost_Overlay"></div>
                                    <div class="tzViewPost_info">
                                        <h3 class="tzViewPost_title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                        <?php the_excerpt();?>
                                        <div class="tzViewPost_meta">
                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php esc_html_e('by ', 'tz-plazart'); ?><?php the_author(); ?></a>
                                            <small>/</small>
                                        <span class="tzViewPost_date">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo get_the_time('M j, Y', get_the_ID()); ?>
                                        </span>
                                            <small>/</small>
                                        <span class="tzViewPost_comment">
                                            <i class="fa fa-comments"></i>
                                            <?php echo esc_html($swift_comment_count ->total_comments);?>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        $i++;
                    ?>
                <?php
                if($swift_count%4==0 || $swift_count == $total){
                    ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                $swift_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <?php
        }else{
            ?>
            <div class="tzViewPost_Grid">
                <?php
                while ($tz_news_query->have_posts()): $tz_news_query->the_post();
                    $tzinteriart_item_type = get_post_meta(get_the_ID(), 'interiart_portfolio_type', TRUE);

                    $tzinteriart_class_icon = '';
                    if($tzinteriart_item_type == 'images'){
                        $tzinteriart_class_icon = 'fa-camera';
                    }elseif($tzinteriart_item_type == 'slideshows'){
                        $tzinteriart_class_icon = 'fa-picture-o';
                    }elseif($tzinteriart_item_type == 'video' || $tzinteriart_item_type == 'videohtml5'){
                        $tzinteriart_class_icon = 'fa-video-camera';
                    }elseif($tzinteriart_item_type == 'audio'){
                        $tzinteriart_class_icon = 'fa-soundcloud';
                    }else{
                        $tzinteriart_class_icon = 'fa-pencil-square-o';
                    }

                    ?>
                    <div class="element tzPost_Item">
                        <div class="tzPost_Box">
                            <div class="tzPost_Content">
                                <?php
                                $class_fix = '';
                                if($tz_height_option == 'fix'){
                                    $class_fix = 'tzPostImage_fixHeight';
                                }
                                ?>
                                <div class="tzPostImage <?php echo esc_attr($class_fix);?>">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="tzViewPost_Date">
                                        <div class="tzViewPost_Text">
                                            <span class="tzViewPost_Day"><?php echo get_the_time('j',$tz_news_query->post->ID);?></span>
                                            <span class="tzViewPost_Month"><?php echo get_the_time('M',$tz_news_query->post->ID);?></span>
                                        </div>
                                        <div class="tzViewPost_Icon">
                                            <i class="fa <?php echo esc_attr($tzinteriart_class_icon);?>"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="tzPost_info">
                                    <div class="tzPost_infomation">
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php esc_html_e('by ', 'tz-plazart'); ?><?php the_author(); ?></a>
                                        <small>/</small>
                                        <?php
                                        if (get_the_category() != false) {
                                            ?>
                                            <span class="tzcategory">
                                                <?php
                                                the_category(', ');
                                                ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                    <h4 class="tzPost_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php the_excerpt(); ?>
                                    <?php
                                    if($tz_read_option == 'show' && $tz_read_text != ''){
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="tzPost_readMore"><?php echo esc_html($tz_read_text); ?><i class="fa fa-angle-double-right"></i></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div><!--end class tzViewPost_Grid -->

            <script type="text/javascript">
                jQuery(document).ready(function() {
                    "use strict";

                    <?php
                    if($tz_height_option == 'fix'){
                    ?>
                    var $height_image = <?php echo esc_attr($tz_height_value);?>;
                    jQuery('.tzPostImage_fixHeight').css('height',$height_image + 'px');
                    <?php
                    }
                    ?>

                });

                // set column

                var Desktop             =   <?php echo esc_attr($tz_number_desktop);?>,
                    tabletportrait      =   <?php echo esc_attr($tz_number_desktopsmall);?>,
                    mobilelandscape     =   <?php echo esc_attr($tz_number_tablet);?>,
                    mobileportrait      =   <?php echo esc_attr($tz_number_mobile);?>,
                    resizeTimer         =   null;

            </script>
            <?php
        }
        ?>
    </div>
    <?php
    endif; // endif have_post
    return ob_get_clean();
}
add_shortcode('tz-view-post','tzinteriart_vew_post');
?>