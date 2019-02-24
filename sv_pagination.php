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
		// Module Info
		$this->set_module_title( 'SV Pagination' );
		$this->set_module_desc( __( 'This module gives the ability to display pagination for posts & pages with the "[sv_pagination]" shortcode.', $this->get_module_name() ) );

		// Shortcodes
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );
	}

	public function shortcode( $settings, $content = '' ) {
		// Load Styles
		static::$scripts->create( $this )
		                ->set_source( $this->get_file_url( 'lib/css/frontend.css' ), $this->get_file_path( 'lib/css/frontend.css' ) );

		$settings								= shortcode_atts(
			array(
				'inline'						=> false
			),
			$settings,
			$this->get_module_name()
		);

		ob_start();
		include( $this->get_file_path( 'lib/tpl/frontend.php' ) );
		$output									= ob_get_contents();
		ob_end_clean();

		return $output;
	}
}