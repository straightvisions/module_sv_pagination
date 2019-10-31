<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->run_type()->get_data();

		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}

    // ### Pagination Settings ###
    if ( $font_family ) {
        $font		            = $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
    } else {
        $font                   = false;
    }
?>
.sv100_sv_pagination .page-numbers,
.sv100_sv_pagination .page-numbers:visited,
.sv100_sv_content_page_links .post-page-numbers,
.sv100_sv_content_page_links .post-page-numbers:visited {
    font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
    font-weight: <?php echo ( $font ?  $font['weight'] : '400' ); ?>;
    font-size: <?php echo $font_size; ?>px;
    color: rgba(<?php echo $text_color; ?>);
    line-height: <?php echo $line_height; ?>px;
    text-decoration: <?php echo $text_deco === 'underline' ? '' : $text_deco; ?>;
}

.sv100_sv_pagination .page-numbers::after,
.sv100_sv_content_page_links .post-page-numbers::after {
    height: <?php echo $text_deco_thickness; ?>px;
    width: <?php echo $text_deco === 'underline' ? '100%' : '0'; ?>;
    background-color: rgba(<?php echo $text_deco_color ? $text_deco_color : 'transparent'; ?>);
}

.sv100_sv_pagination .page-numbers.current
.sv100_sv_pagination .page-numbers:hover,
.sv100_sv_pagination .page-numbers:focus,
.sv100_sv_content_page_links a.post-page-numbers.current,
.sv100_sv_content_page_links a.post-page-numbers:hover,
.sv100_sv_content_page_links a.post-page-numbers:focus {
    color: rgba(<?php echo $text_color_hover; ?>);
}

.sv100_sv_pagination .page-numbers.current::after,
.sv100_sv_pagination .page-numbers:hover::after,
.sv100_sv_pagination .page-numbers:focus::after,
.sv100_sv_content_page_links .post-page-numbers.current::after,
.sv100_sv_content_page_links .post-page-numbers:hover::after,
.sv100_sv_content_page_links .post-page-numbers:focus::after {
    width: <?php echo $text_deco_hover === 'underline' ? '100%' : '0'; ?>;
    background-color: rgba(<?php echo $text_deco_color_hover ? $text_deco_color_hover : 'transparent'; ?>);
}