<?php

/*
 * Display posts
 * Widgets display posts by category
 */

class interiart_latestproject extends WP_Widget{

    /* function construct*/
    function __construct() {
       parent::__construct(
           'tz_latest_project', esc_html__('Tz Latest Project', 'interiart'),
           array('description' =>  esc_html__(' Display post ', 'interiart'))
       );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);

            $interiart_portfolioargs = array(
                'post_type'         => 'portfolio',
                'posts_per_page'    => $instance['tzlmportfolio'],

            );


        ?>
            <aside class="tz-latest-project widget tz-latest-<?php echo esc_attr($instance['type']);?>">
                <h3 class="module-title title-widget"><span><?php echo esc_html($instance['title']); ?></span></h3>
                <ul>
                <?php
                    $interiart_query_portfolio = new WP_Query($interiart_portfolioargs);
                    if( $interiart_query_portfolio->have_posts() ):
                        while( $interiart_query_portfolio->have_posts() ): $interiart_query_portfolio->the_post();
                ?>
                    <li>
                        <?php
                            if ( has_post_thumbnail() ):
                                the_post_thumbnail('large');
                            else:
                                echo '<img src="'.get_template_directory_uri().'/images/recent.jpg" alt="noimage" />';
                            endif;
                        ?>
                        <?php if($instance['type'] == 'grid'):?>
                            <div class="tz-latest-overlay"></div>
                            <a href="<?php the_permalink(); ?>"><i class="fa fa-search-plus"></i></a>
                        <?php else:?>
                            <div class="tz-latest-content">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                        <?php endif; ?>
                    </li>
                  <?php
                            endwhile; // end while(have_posts)
                        endif;  // end if(have_posts)
                    wp_reset_postdata();
                    ?>
                </ul>
            </aside>
        <?php
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'             => 'Title',
            'type'             => 'list',
            'tzlmportfolio'       =>  5
        ) );

    ?>
         <p>
             <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                 <?php  esc_html_e('Title','interiart'); ?>
             </label>
             <br>
             <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" >
         </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>">
                <?php  esc_html_e('Display Type','interiart'); ?>
            </label>
            <select class="widefat"  name="<?php echo esc_attr($this->get_field_name('type')); ?>">
                <option value="list" <?php if($instance['type']=='list'){ echo 'selected="true"'; } ?>>List</option>
                <option value="grid" <?php if($instance['type']=='grid'){ echo 'selected="true"'; } ?>>Grid</option>
            </select>
        </p>

         <p>
             <label for="<?php echo esc_attr($this->get_field_id('tzlmportfolio')); ?>">
                <?php  esc_html_e('Limit Portfolio','interiart'); ?>
             </label>
             <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id('tzlmportfolio')); ?>" name="<?php echo esc_attr($this->get_field_name('tzlmportfolio')); ?>" value="<?php echo esc_attr($instance['tzlmportfolio']); ?>" >
         </p>

       <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['type']           =   $new_instance['type'];
        $instance['tzlmportfolio']       =   $new_instance['tzlmportfolio'];
        return $instance;
    }
}
add_action('widgets_init',create_function('','return register_widget("interiart_latestproject");'));

?>