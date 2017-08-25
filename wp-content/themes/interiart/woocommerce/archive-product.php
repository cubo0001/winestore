<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
get_template_part('template_inc/inc','header');
get_template_part('template_inc/inc','breadcrumb');

$interiart_ShopSidebar        =   ot_get_option('interiart_TzShop_Sidebar');
$interiart_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
if($interiart_ShopSidebar == 'right' || $interiart_ShopSidebar == 'left'){
    $interiart_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
}else{
    $interiart_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}
$interiart_shop_type = '';
if(isset($_GET["type"]) && !empty($_GET["type"])) {
    $interiart_shop_type = $_GET["type"];
}

?>
<script type="text/javascript">

    jQuery(function($){
        "use strict";

        $.display = function(view) {
            if (view == 'list') {
                $('.product-grid').attr('class', 'product-list');
                $.cookie('display', 'list');

                jQuery(".tzShop-item_image").each(function(){
                    var $interiart_widthImage = jQuery(this).width();
                    var $interiart_heightImage = $interiart_widthImage * 0.92;
                    jQuery(this).css('height',$interiart_heightImage + 'px');

                });

                interiart_resize_image(jQuery('.tzShop-item_image'));

            } else {
                $('.product-list').attr('class', 'product-grid');
                $.cookie('display', 'grid');

                jQuery(".tzShop-item_image").each(function(){
                    var $interiart_widthImage = jQuery(this).width();
                    var $interiart_heightImage = $interiart_widthImage * 1.07;
                    jQuery(this).css('height',$interiart_heightImage + 'px');
                });

                interiart_resize_image(jQuery('.tzShop-item_image'));
            }
        }

        var $interiart_shop = '<?php echo $interiart_shop_type;?>';
        if($interiart_shop == 'list'){
            $.display('list');
        }
        $('.switchToList').on('click',function(){
            $.display('list');
        });
        $('.switchToGrid').on('click',function(){
            $.display('grid');
        });

        var view = $.cookie('display');

        if (view) {
            $.display(view);
        } else {
            $.display('grid');
        }

    });
</script>

<?php
        $find_price_url = array(
                'danh-muc/tim-theo-gia',
                'danh-muc/tim-theo-gia/ruou-vang-duoi-500-000-d/',
                'danh-muc/tim-theo-gia/ruou-vang-tu-500-000-d-999-000-d/',
                'danh-muc/tim-theo-gia/ruou-vang-tu-1-000-000-d-1-999-000-d/',
                'danh-muc/tim-theo-gia/ruou-vang-tu-2-000-000-d-5-000-000-d/',
                'danh-muc/tim-theo-gia/ruou-vang-tren-5-000-000-d/'
        );
        $find_location_url = array(
                'danh-muc/tim-theo-xuat-xu',
                'danh-muc/tim-theo-xuat-xu/ruou-vang-chile',
                'danh-muc/tim-theo-xuat-xu/ruou-vang-phap',
                'danh-muc/tim-theo-xuat-xu/ruou-vang-tay-ban-nha',
                'danh-muc/tim-theo-xuat-xu/ruou-vang-y'
        );
        $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        foreach($find_price_url as $url) {
            if (strpos($current_url, $url)) { ?>
                <div class="nav-menu-find-price">
                    <ul>
                        <li><a href="/danh-muc/tim-theo-gia/ruou-vang-duoi-500-000-d/">Dưới 500.000 đ</a></li>
                        <li><a href="/danh-muc/tim-theo-gia/ruou-vang-tu-500-000-d-999-000-d/">500.000 đ – 999.000 đ</a></li>
                        <li><a href="/danh-muc/tim-theo-gia/ruou-vang-tu-1-000-000-d-1-999-000-d/">1.000.000 đ – 1.999.000 đ</a></li>
                        <li><a href="/danh-muc/tim-theo-gia/ruou-vang-tu-2-000-000-d-5-000-000-d/">2.000.000 đ – 5.000.000 đ</a></li>
                        <li><a href="/danh-muc/tim-theo-gia/ruou-vang-tren-5-000-000-d/">Trên 5.000.000 đ</a></li>
                    </ul>
                </div>
            <?php
                break;
            }
        }

        foreach($find_location_url as $url) {
            if (strpos($current_url, $url)) {
                ?>
                <div class="nav-menu-find-price">
                    <ul>
                        <li><a href="/danh-muc/tim-theo-xuat-xu/ruou-vang-chile/">Chile</a></li>
                        <li><a href="/danh-muc/tim-theo-xuat-xu/ruou-vang-phap/">Pháp</a></li>
                        <li><a href="/danh-muc/tim-theo-xuat-xu/ruou-vang-tay-ban-nha/">Tây Ban Nha</a></li>
                        <li><a href="/danh-muc/tim-theo-xuat-xu/ruou-vang-y/">Ý</a></li>
                    </ul>
                </div>

            <?php
                break;
            }
        } ?>

<div class="tzshop-wrap">
    <div class="container">
        <div class="row">
            <?php
            if($interiart_ShopSidebar == 'left'){
                get_sidebar('shop');
            }
            ?>
            <div class="<?php echo esc_attr($interiart_class);?> col-padding">
                <?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action( 'woocommerce_before_main_content' );
                ?>

                <!--		--><?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <!--			<h1 class="page-title">--><?php //woocommerce_page_title(); ?><!--</h1>-->
                <!--		--><?php //endif; ?>

                <!--		--><?php //do_action( 'woocommerce_archive_description' ); ?>

                <?php
                if ( have_posts() ) :
                    if ( woocommerce_products_will_display() ) {
                        ?>
                        <div class="grid_pagination_block">
                            <?php
                            /**
                             * woocommerce_before_shop_loop hook
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action('woocommerce_before_shop_loop');
                            ?>
                        </div>
                    <?php
                    }
                        ?>
                    <div class="product-grid">
                        <!--                    <div class="product-list">-->
<!--                        <div class="row">-->
                            <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php wc_get_template_part( 'content', 'product-tzswift' ); ?>

                            <?php endwhile; // end of the loop. ?>

                            <?php woocommerce_product_loop_end(); ?>
<!--                        </div>-->
                    </div>

                    <?php
                    /**
                     * woocommerce_after_shop_loop hook
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>

                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                <?php endif; ?>

                <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
                ?>

            </div>
            <div class="category-description">
                <?php echo category_description(); ?>
            </div>
            <?php
            if($interiart_ShopSidebar == 'right'){
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
