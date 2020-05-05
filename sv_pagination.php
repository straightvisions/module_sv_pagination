<?php
	namespace sv100;
	
	/**
	 * @version         4.024
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_pagination extends init {
		public function init() {
			$this->set_module_title( __( 'SV Pagination', 'sv100' ) )
				 ->set_module_desc( __( 'Manage pagination in posts and pages.', 'sv100' ) )
				 ->load_settings()
				 ->register_scripts()
				 ->set_section_title( __( 'Pagination', 'sv100' ) )
				 ->set_section_desc( __( 'Text & Color settings', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
		}
		
		protected function load_settings(): sv_pagination {
			// Pagination Settings
			$this->get_setting( 'font_family' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 23 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'none' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_deco_color' )
				 ->set_title( __( 'Text underline color', 'sv100' ) )
				 ->set_description( __( 'Set the color of the underline.', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_thickness' )
				 ->set_title( __( 'Text underline thickness', 'sv100' ) )
				 ->set_description( __( 'Set the thickness of the underline, in pixel.', 'sv100' ) )
				 ->set_default_value( 2 )
				 ->set_min( 1 )
				 ->load_type( 'number' );
			
			// Pagination Settings (Hover/Focus)
			$this->get_setting( 'text_color_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_deco_color_hover' )
				 ->set_title( __( 'Text underline color (Hover/Focus)', 'sv100' ) )
				 ->set_description( __( 'Set the color of the underline.', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_pagination {
			// Register Styles
			$this->get_script( 'common' )
				 ->set_path( 'lib/frontend/css/common.css' )
				 ->set_inline( true )
				 ->set_is_enqueued();
			
			// Inline Config
			$this->get_script( 'config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true )
				 ->set_is_enqueued();
	
			return $this;
		}
	
		public function load( $settings = array() ): string {
			$settings			= shortcode_atts(
				array(
					'inline'	=> false,
				),
				$settings,
				$this->get_module_name()
			);
	
			return $this->router( $settings );
		}
	
		// Handles the routing of the templates
		protected function router( array $settings ): string {
			$template = array(
				'name'      => 'default'
			);
	
			return $this->load_template( $template );
		}
	
		// Loads the templates
		protected function load_template( array $template ): string {
			ob_start();
			
			$args = array(
				'mid_size'				=> 2,
				'prev_text'				=> __( 'Previous', 'sv100' ),
				'next_text'				=> __( 'Next', 'sv100' ),
				'screen_reader_text'	=> ' ',
			);
			
			if ( strlen( get_the_posts_pagination( $args  ) ) > 0 ) {
				
				// Loads the template
				include( $this->get_path( 'lib/frontend/tpl/' . $template['name'] . '.php' ) );
			}
			
			$output							        = ob_get_contents();
			ob_end_clean();
			
			return $output;
		}
	}