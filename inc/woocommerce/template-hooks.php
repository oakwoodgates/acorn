<?php
/**
 * Acorn WooCommerce support.
 *
 * @class   Acorn_Woo_Template_Hooks
 * @since   0.1.0
 * @package WooCommerce/Classes
 */

defined( 'ABSPATH' ) || exit;

/**
 * Acorn_Woo_Template_Hooks class.
 */
class Acorn_Woo_Template_Hooks {

  /**
	 * Theme init.
	 */
   public static function init() {
 		// Remove default wrappers.
 		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
 		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

 		// Add custom wrappers.
 		add_action( 'woocommerce_before_main_content', array( __CLASS__, 'output_content_wrapper' ) );
 		add_action( 'woocommerce_after_main_content', array( __CLASS__, 'output_content_wrapper_end' ) );
	}

  /**
	 * Open archive wrappers.
	 */
	public static function output_content_wrapper() {
		echo '<div id="primary" class="content-area"><main id="main" class="site-main" role="main">';
	}

	/**
	 * Close archive wrappers.
	 */
	public static function output_content_wrapper_end() {
		echo '</main></div><!-- /.primary -->';
	}
}

Acorn_Woo_Template_Hooks::init();
