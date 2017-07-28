<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="tzShopDetail_images">
    <div id="tzShopDetail_slide">
        <ul>
            <?php
            if ( has_post_thumbnail() ) {

                $image_object		= get_the_post_thumbnail( $post->ID, 'full' );
                $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_alt 			= esc_attr( get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) );
                $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );

                $image = aq_resize( $image_link, 562, NULL, true, false);

                if ($image) {

                    $image_html = '<img class="product-slider-image" data-zoom-image="'.$image_link.'" src="'.$image[0].'" alt="'.$image_alt.'" title="'.$image_title.'" />';

                    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li class="%s">%s<a href="%s" itemprop="image" class="woocommerce-main-image zoom" data-rel="prettyPhoto[product-gallery]"><i class="fa fa-search"></i>zoom</a></li>', $image_title, $image_html, $image_link), $post->ID );
                }
            }

            $loop = 0;
            $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

            if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {

                $attachment_ids = $product->get_gallery_attachment_ids();

                if ( $attachment_ids ) {

                    foreach ( $attachment_ids as $attachment_id ) {

                        $classes = array( 'zoom' );

                        if ( $loop == 0 || $loop % $columns == 0 )
                            $classes[] = 'first';

                        if ( ( $loop + 1 ) % $columns == 0 )
                            $classes[] = 'last';

                        $image_link = wp_get_attachment_url( $attachment_id );

                        if ( ! $image_link )
                            continue;

                        $image = aq_resize( $image_link, 562, NULL, true, false);

                        $image_class = esc_attr( implode( ' ', $classes ) );
                        $image_title = esc_attr( get_the_title( $attachment_id ) );
                        $image_alt = esc_attr( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) );

                        if ($image) {

                            $image_html = '<img class="product-slider-image" data-zoom-image="'.$image_link.'" src="'.$image[0].'" alt="'.$image_alt.'" title="'.$image_title.'" />';

                            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li class="%s">%s<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]"><i class="fa fa-search"></i>zoom</a></li>', $image_title, $image_html, $image_link, $image_class, $image_title, $image_alt ), $attachment_id, $post->ID, $image_class );

                        }
                        $loop++;
                    }
                }

            } else {

                $attachment_ids = get_posts( array(
                    'post_type' 	=> 'attachment',
                    'numberposts' 	=> -1,
                    'post_status' 	=> null,
                    'post_parent' 	=> $post->ID,
                    'post__not_in'	=> array( get_post_thumbnail_id() ),
                    'post_mime_type'=> 'image',
                    'orderby'		=> 'menu_order',
                    'order'			=> 'ASC'
                ) );

                if ($attachment_ids) {

                    $loop = 0;
                    $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

                    foreach ( $attachment_ids as $key => $attachment ) {

                        if ( get_post_meta( $attachment->ID, '_woocommerce_exclude_image', true ) == 1 )
                            continue;

                        $classes = array( 'zoom' );

                        if ( $loop == 0 || $loop % $columns == 0 )
                            $classes[] = 'first';

                        if ( ( $loop + 1 ) % $columns == 0 )
                            $classes[] = 'last';

                        $image_alt = esc_attr( get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) );

                        printf( '<a rel="%s" href="%s" title="%s" alt="%s" rel="thumbnails" class="%s">%s</a>', esc_attr( $attachment->post_title ), wp_get_attachment_url( $attachment->ID ), esc_attr( $attachment->post_title ), $image_alt, implode(' ', $classes), wp_get_attachment_image( $attachment->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ) );

                        $loop++;

                    }
                }
            }
            ?>
        </ul>
    </div>

    <?php if ( $attachment_ids ) { ?>
        <div id="tzShopDetailSlide-carousel">
            <ul id="tzShopDetail_carousel" class="jcarousel jcarousel-skin-tango">
                <?php if ( has_post_thumbnail() ) { ?>
                    <li><a href="#" data-link="<?php echo esc_attr( get_the_title( get_post_thumbnail_id() ) );?>"><?php echo get_the_post_thumbnail( $post->ID, 'shop_thumbnail' ); ?></a></li>
                <?php } ?>
                <?php
                foreach ( $attachment_ids as $attachment_id ) {
                    $image = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
                    $image_title = get_the_title( $attachment_id );
                    $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                    if ($image) {
                        ?>
                        <li><a href="#" data-link="<?php echo esc_attr($image_title);?>"><img class="tzslideshow_Img" src=" <?php echo esc_url($image[0]);?>" alt="<?php echo esc_attr($image_alt);?>" title="<?php echo esc_attr($image_title);?>" /></a></li>
                    <?php
                    }
                }
                ?>
<!--                --><?php //do_action( 'woocommerce_product_thumbnails' ); ?>
            </ul>
        </div>

    <?php } ?>
</div>