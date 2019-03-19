<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions GmbH
 * @package			sv_100
 * @copyright		2017 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_pagination extends init {
	public function __construct() {

	}

	public function init() {
		// Translates the module
		load_theme_textdomain( $this->get_module_name(), $this->get_path( 'languages' ) );

		// Module Info
		$this->set_module_title( 'SV Pagination' );
		$this->set_module_desc( __( 'This module gives the ability to display pagination for posts & pages with the "[sv_pagination]" shortcode.', $this->get_module_name() ) );

		// Shortcodes
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );

		$this->scripts_queue['frontend']			= static::$scripts->create( $this )
			->set_ID('frontend')
			->set_path( 'lib/css/frontend.css' )
			->set_inline(true);
	}

	public function shortcode( $settings, $content = '' ) {
		$output			= '';
		if ( is_paged() ) {
			$settings								= shortcode_atts(
				array(
					'inline'						=> false
				),
				$settings,
				$this->get_module_name()
			);

			// Load Styles
			$this->scripts_queue['frontend']
				->set_inline($settings['inline'])
				->set_is_enqueued();

			ob_start();
			include( $this->get_path( 'lib/tpl/frontend.php' ) );
			$output									= ( is_home() || is_archive() ? ob_get_contents() : '' );
			ob_end_clean();

		}

		return $output;
	}
}