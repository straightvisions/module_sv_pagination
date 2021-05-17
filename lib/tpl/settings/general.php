<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'margin' )->form();
				echo $module->get_setting( 'padding' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'border' )->form();
			?>
		</div>
		<h2><?php _e('Items', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'font' )->form();
				echo $module->get_setting( 'font_size' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color' )->form();
				echo $module->get_setting( 'line_height' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_deco' )->form();
				echo $module->get_setting( 'text_deco_color' )->form();
				echo $module->get_setting( 'text_deco_thickness' )->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Pagination (Hover/Focus)', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color_hover' )->form();
				echo $module->get_setting( 'text_deco_hover' )->form();
				echo $module->get_setting( 'text_deco_color_hover' )->form();
			?>
		</div>
	</div>
<?php } ?>