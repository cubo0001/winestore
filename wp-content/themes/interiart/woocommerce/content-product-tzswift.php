<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$interiart_Shop_ColumnGrid        =   ot_get_option('interiart_TzShopGrid_Column','4');
$interiart_Shop_ColumnList        =   ot_get_option('interiart_TzShopList_Column','1');

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $interiart_Shop_ColumnGrid );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}

// TZ COLUMNS

if($interiart_Shop_ColumnGrid == '4'){
    $classes[] = 'tzShop-item tzShop-4column';
}elseif($interiart_Shop_ColumnGrid == '3'){
    $classes[] = 'tzShop-item tzShop-3column';
}else{
    $classes[] = 'tzShop-item tzShop-2column';
}

if($interiart_Shop_ColumnList == '2'){
    $classes[] = 'tzShopList-2column';
}else{
    $classes[] = 'tzShopList-1column';
}

?>

<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <div class="tzShop-item_inner">
        <div class="tzShop-item_image">
            <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>

            <div class="tzShop-item_overlay"></div>

            <?php echo interiart_wishlist_button(); ?>
            <div class="tzShop-item_button">
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );
                ?>
            </div>
            <div class="tzShop-item_detail">
                <a href="<?php the_permalink();?>"><?php esc_html_e('View Detail','interiart')?></a>
            </div>
        </div>
        <div class="tzShop-item_info">
            <h3 class="tzShop-item_title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <?php
            /**
             * woocommerce_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
//            do_action( 'woocommerce_shop_loop_item_title' );

            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>

            <div class="tzShop-item_des">
                <?php do_action( 'interiart_woocommerce_excerpt'); ?>
            </div>

            <div class="tzShop-item_button_list">
                <?php echo interiart_wishlist_button(); ?>
                <div class="tzShop-item_button">
                    <?php
                    /**
                     * woocommerce_after_shop_loop_item hook
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item' );
                    ?>
                </div>
            </div>
        </div>
        <span class="line-left"></span>
        <span class="line-right"></span>
    </div>
</li>
