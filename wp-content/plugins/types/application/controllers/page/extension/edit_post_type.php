<?php

/**
 * This controller extends all post edit pages
 *
 * @since 2.0
 */
final class Types_Page_Extension_Edit_Post_Type {

	private static $instance;

	public static function get_instance() {
		if( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		if( ! isset( $_GET['wpcf-post-type'] ) )
			return;

		Types_Helper_Placeholder::set_post_type( $_GET['wpcf-post-type'] );
		Types_Helper_Condition::set_post_type( $_GET['wpcf-post-type'] );

		$this->prepare();
	}

	private function __clone() { }


	public function prepare() {
		// documentation urls
		$documentation_urls = include( TYPES_DATA . '/information/documentation-urls.php' );

		// add links to use analytics
		Types_Helper_Url::add_urls( $documentation_urls );

		// set analytics medium
		Types_Helper_Url::set_medium( 'cpt_editor' );

		// add informations
		$this->prepare_informations();

	}

	private function prepare_informations() {
		$information = new Types_Information_Controller;
		$information->prepare();
	}
}