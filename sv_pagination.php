<?php
	namespace sv100;
	
	class sv_pagination extends init {
		public function init() {
			$this->set_module_title( __( 'SV Pagination', 'sv100' ) )
				 ->set_module_desc( __( 'Manage pagination in posts and pages.', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path()
				->set_section_order(3900)
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_pagination {
			// Pagination Settings
			$this->get_setting( 'font' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
				 ->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				->set_is_responsive(true)
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1.4 )
				->set_is_responsive(true)
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				->set_is_responsive(true)
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
				->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'text_deco_color' )
				 ->set_title( __( 'Text underline color', 'sv100' ) )
				 ->set_description( __( 'Set the color of the underline.', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_thickness' )
				 ->set_title( __( 'Text underline thickness', 'sv100' ) )
				 ->set_description( __( 'Set the thickness of the underline, in pixel.', 'sv100' ) )
				 ->set_default_value( 2 )
				 ->set_min( 1 )
				->set_is_responsive(true)
				 ->load_type( 'number' );
			
			// Pagination Settings (Hover/Focus)
			$this->get_setting( 'text_color_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' )
				 ) )
				->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'text_deco_color_hover' )
				 ->set_title( __( 'Text underline color (Hover/Focus)', 'sv100' ) )
				 ->set_description( __( 'Set the color of the underline.', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			$this->get_setting( 'margin' )
				->set_title( __( 'Margin', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			$this->get_setting( 'padding' )
				->set_title( __( 'Padding', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'margin' );

			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'border' );
			
			return $this;
		}
		public function load( $settings = array() ): string {
			$output = '';

			$args = array(
				'mid_size'				=> 2,
				'prev_text'				=> __( 'Previous', 'sv100' ),
				'next_text'				=> __( 'Next', 'sv100' ),
				'screen_reader_text'	=> ' ',
			);

			if ( strlen( get_the_posts_pagination( $args  ) ) > 0 ) {
				if(!is_admin()){
					$this->load_settings()->register_scripts();
				}

				// Loads the template
				ob_start();
				require( $this->get_path( 'lib/tpl/frontend/default.php' ) );
				$output							        = ob_get_clean();
			}

			return $output;
		}
	}