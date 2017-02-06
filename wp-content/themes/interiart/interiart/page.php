<?php
get_header();
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');
?>
<div class="TzPage_Default">
    <div class="container">
        <?php
        if ( have_posts() ) : while (have_posts()) : the_post() ;
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class()?>>
                <?php the_content();
                wp_link_pages() ;
                ?>
            </div>
        <?php
        endwhile; endif;
        ?>
        <div class="tzComments">
            <?php comments_template( '', true ); ?>
        </div><!-- end comments -->
    </div>
</div>

<?php
interiart_footer_type();
get_footer();
?>

