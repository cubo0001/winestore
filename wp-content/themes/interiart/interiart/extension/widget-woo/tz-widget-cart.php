<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class interiart_WC_Widget_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description =  esc_html__( "Display the user's Cart in the sidebar.", 'interiart' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        =  esc_html__( 'WooCommerce Cart', 'interiart' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   =>  esc_html__( 'Cart', 'interiart' ),
				'label' =>  esc_html__( 'Title', 'interiart' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' =>  esc_html__( 'Hide if cart is empty', 'interiart' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $interiart_args
	 * @param array $interiart_instance
	 */
	public function widget( $interiart_args, $interiart_instance ) {

//		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
//			return;
//		}

		$interiart_hide_if_empty = empty( $interiart_instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $interiart_args, $interiart_instance );

		if ( $interiart_hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load
		echo '<div class="widget_shopping_cart_content"></div>';

		if ( $interiart_hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $interiart_args );
	}
}
