<?php 
 
class Acorn_Vars {

	/**
     * Basic usage
     *
     *  private static $some_var = 'something';
     *
     *  public static function get_some_var() {
     *      // Allow variable to be modified
     *      return apply_filters( 'acorn_vars_some_var', self::$some_var );
     *  }
     */


	protected static $single_instance = null;

	private static $header_is_full_width;

	private static $buddypress_has_container_wrapper;
	private static $buddypress_is_content_full_width;
	private static $buddypress_content_container;

	public static function get_instance() {
		if ( null === self::$single_instance ) {
			self::$single_instance = new self();
		}
		return self::$single_instance;
	}

	protected function __construct() {

		self::set_header_is_full_width();

		// set BuddyPress variables
		if ( class_exists( 'BuddyPress' ) && is_buddypress() ) {
			self::set_buddypress_has_container_wrapper();
			self::set_buddypress_is_content_full_width();
		}
	}

	private static function set_header_is_full_width() {
		self::$header_is_full_width = apply_filters( 'acorn_vars_header_is_full_width', true );
	}

	private static function set_buddypress_has_container_wrapper() {
		self::$buddypress_has_container_wrapper = apply_filters( 'acorn_vars_buddypress_has_container_wrapper', true );
	}

	public static function set_buddypress_is_content_full_width() {
		self::$buddypress_is_content_full_width = apply_filters( 'acorn_vars_buddypress_is_content_full_width', false );
	}


	public static function get_header_container() {
		if ( self::$header_is_full_width ) {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}
		return apply_filters( 'acorn_vars_get_header_container', $container );
	}

	public static function get_buddypress_container_wrapper() {

		if ( ! ( bp_is_user() || bp_is_group() ) ) {
			if ( self::$buddypress_is_content_full_width ) {
				$wrapper = 'container-fluid';
			} else {
				$wrapper = 'container';
			}
		} else {
			if ( self::$buddypress_has_container_wrapper ) {
				$wrapper = 'container px-0';
			} else {
				$wrapper = '';
			}
		}
		return apply_filters( 'acorn_vars_get_buddypress_container_wrapper', $wrapper );
	}

	public static function get_buddypress_content_container() {

		if ( self::$buddypress_is_content_full_width ) {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}

		return apply_filters( 'acorn_vars_get_buddypress_content_container', $container );
	}
 
}

Acorn_Vars::get_instance();
