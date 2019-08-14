<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

        <h3 class="divider"><?php _e( 'Pagination', 'sv100' ); ?></h3>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'font_family' )->run_type()->form();
			echo $module->get_settings_component( 'font_size' )->run_type()->form();
			echo $module->get_settings_component( 'text_color' )->run_type()->form();
			echo $module->get_settings_component( 'line_height' )->run_type()->form();
			?>
        </div>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'text_deco' )->run_type()->form();
			echo $module->get_setting( 'text_deco_color' )->run_type()->form();
			echo $module->get_setting( 'text_deco_thickness' )->run_type()->form();
			?>
        </div>

        <h3 class="divider"><?php _e( 'Pagination (Hover/Focus)', 'sv100' ); ?></h3>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'text_color_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_deco_hover' )->run_type()->form();
			echo $module->get_setting( 'text_deco_color_hover' )->run_type()->form();
			?>
        </div>
		<?php
	}