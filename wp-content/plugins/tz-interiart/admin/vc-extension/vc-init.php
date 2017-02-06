<?php

/*=====================================
 * Visual Composer
 =====================================*/



if ( class_exists('WPBakeryVisualComposerAbstract') ):
    function tzinteriart_includevisual(){
        $dir_vc = dirname( __FILE__ );

        /*
         * Icons Of Element In Admin Panel
         */

        require_once $dir_vc . '/visual-composer/tz_icon_element.php';

        /*
         * Overwrite Template Of VC && Nested Shortcodes (container)
         */

        require_once $dir_vc . '/visual-composer/vc_custom/vc_extend.php';
        $vc_templates_dir = $dir_vc . '/visual-composer/vc_custom/';
        vc_set_shortcodes_templates_dir($vc_templates_dir);

        /*
         * Template Of Templaza
         */

        $tz_templates_dir = $dir_vc . '/visual-composer/vc_templaza/';

        require_once $tz_templates_dir . '/skill/tz_skill.php';
        require_once $tz_templates_dir . '/skill/tz_skill_extend.php';

        require_once $tz_templates_dir . '/title/tz_title.php';
        require_once $tz_templates_dir . '/title/tz_title_extend.php';

        require_once $tz_templates_dir . '/counter/tz_counter.php';
        require_once $tz_templates_dir . '/counter/tz_counter_extend.php';

        require_once $tz_templates_dir . '/feature-item/tz_feature_item.php';
        require_once $tz_templates_dir . '/feature-item/tz_feature_item_extend.php';

        require_once $tz_templates_dir . '/header/tz_header.php';
        require_once $tz_templates_dir . '/header/tz_header_extend.php';

        require_once $tz_templates_dir . '/videohtml5/tz_videohtml5.php';
        require_once $tz_templates_dir . '/videohtml5/tz_videohtml5_extend.php';

        require_once $tz_templates_dir . '/view-post/tz_view_post.php';
        require_once $tz_templates_dir . '/view-post/tz_view_post_extend.php';

        require_once $tz_templates_dir . '/image-slide/tz_image_slide.php';
        require_once $tz_templates_dir . '/image-slide/tz_image_slide_extend.php';

        if (function_exists('newsletter_form')):
            require_once $tz_templates_dir . '/tznewsletter/tz_newsletter.php';
            require_once $tz_templates_dir . '/tznewsletter/tz_newsletter_extend.php';
        endif;

        require_once $tz_templates_dir . '/view-portfolio/tz_view_portfolio.php';
        require_once $tz_templates_dir . '/view-portfolio/tz_view_portfolio_extend.php';

        require_once $tz_templates_dir . '/team-member/tz_team_member.php';
        require_once $tz_templates_dir . '/team-member/tz_team_member_extend.php';
    }

    add_action('init', 'tzinteriart_includevisual', 20);
endif;

?>
