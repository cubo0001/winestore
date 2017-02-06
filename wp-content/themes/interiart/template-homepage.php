<?php
/*
 * Template Name: Template Home Page
 */
?>
<?php
    get_header();
//    get_template_part('template_inc/inc','header');
//    get_template_part('template_inc/inc','breadcrumb');
?>
<!--<section class="tzHomePage">-->
    <?php
    if(have_posts()):
        while(have_posts()):the_post();
            the_content();
            wp_link_pages();
        endwhile;
    endif;
    ?>
<!--</section>-->

<?php
    interiart_footer_type();
    get_footer();
?>