<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 7/14/13
 * Time: 8:50 PM
 * To change this template use File | Settings | File Templates.
 */

get_header();
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');

$interiart_content404 = ot_get_option('interiart_404_content');

?>
<section class="page-404">
    <div class="container error">
        <div class="bug-content">
            <h3><?php esc_html_e('Oops, This Page Could Not Be Found!', 'interiart');?></h3>
            <p><?php echo esc_html($interiart_content404);?></p>
            <span><?php esc_html_e('404', 'interiart');?></span>
            <a class="go-back" href="<?php echo home_url('/'); ?>"><?php echo  esc_html__('Go Back Home', 'interiart'); ?></a>
        </div>
    </div><!--end class tzjoom-content-->
</section><!--end class tzblog-wrap-->

<?php
interiart_footer_type();
get_footer();
?>