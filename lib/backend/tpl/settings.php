<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

        <h3 class="divider"><?php _e( 'Pagination', 'sv100' ); ?></h3>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'font_family' )->form();
			echo $module->get_settings_component( 'font_size' )->form();
			echo $module->get_settings_component( 'text_color' )->form();
			echo $module->get_settings_component( 'line_height' )->form();
			?>
        </div>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'text_deco' )->form();
			echo $module->get_setting( 'text_deco_color' )->form();
			echo $module->get_setting( 'text_deco_thickness' )->form();
			?>
        </div>

        <h3 class="divider"><?php _e( 'Pagination (Hover/Focus)', 'sv100' ); ?></h3>
        <div class="sv_setting_flex">
			<?php
			echo $module->get_settings_component( 'text_color_hover' )->form();
			echo $module->get_settings_component( 'text_deco_hover' )->form();
			echo $module->get_setting( 'text_deco_color_hover' )->form();
			?>
        </div>
		<?php
	}