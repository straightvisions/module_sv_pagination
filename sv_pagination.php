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

		$this->register_scripts();
	}

	protected function register_scripts() :sv_pagination {
		// Register Styles
		$this->scripts_queue['default']        = static::$scripts
			->create( $this )
			->set_ID( 'default' )
			->set_path( 'lib/frontend/css/default.css' )
			->set_inline( true );

		return $this;
	}

	public function shortcode( $settings, $content = '' ) :string {
		$settings								= shortcode_atts(
			array(
				'inline'						=> false,
			),
			$settings,
			$this->get_module_name()
		);

		return $this->router( $settings );
	}

	// Handles the routing of the templates
	protected function router( array $settings ) :string {
		$template = array(
			'name'      => 'default',
			'scripts'   => array(
				$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
			),
		);

		return $this->load_template( $template, $settings );
	}

	// Loads the templates
	protected function load_template( array $template, array $settings ) :string {
		ob_start();
		foreach ( $template['scripts'] as $script ) {
			$script->set_is_enqueued();
		}

		// Loads the template
		include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );
		$output							        = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}