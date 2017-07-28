<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');

$interiart_Sidebar    = ot_get_option('interiart_TzShopDetail_Sidebar');
$interiart_class_col = '';
if($interiart_Sidebar == 'right' || $interiart_Sidebar == 'left'){
    $interiart_class_col = "col-lg-9 col-md-9 col-sm-12 col-xs-12 tzShopContentDetail";
}else{
    $interiart_class_col = "col-lg-12 col-md-12 col-sm-12 col-xs-12 tzShopContentDetail single-product-nosidebar";
}
?>
<div class="tzShopDetail-wrap">
    <div class="container">
        <div class="row">
            <?php
            if($interiart_Sidebar == 'left'){
                get_sidebar('shop');
            }
            ?>
            <div class="<?php echo esc_attr($interiart_class_col);?>">
                <?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action( 'woocommerce_before_main_content' );
                ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'single-product' ); ?>

                <?php endwhile; // end of the loop. ?>

                <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
                ?>
            </div>
            <?php
            if($interiart_Sidebar == 'right'){
                get_sidebar('shop');
            }
            ?>
        </div>
    </div>
</div>

<?php
interiart_footer_type();
get_footer( 'shop' );
?>
