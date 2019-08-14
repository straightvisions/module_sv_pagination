<?php
// ### Pagination Settings ###
$font_family		        = $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();

if ( $font_family ) {
	$font		            = $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
} else {
	$font                   = false;
}

$font_size		            = $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
$line_height		        = $script->get_parent()->get_setting( 'line_height' )->run_type()->get_data();
$text_color		            = $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
$text_color_hover           = $script->get_parent()->get_setting( 'text_color_hover' )->run_type()->get_data();
$text_deco		            = $script->get_parent()->get_setting( 'text_deco' )->run_type()->get_data();
$text_deco_hover            = $script->get_parent()->get_setting( 'text_deco_hover' )->run_type()->get_data();
$text_deco_color            = $script->get_parent()->get_setting( 'text_deco_color' )->run_type()->get_data();
$text_deco_color_hover      = $script->get_parent()->get_setting( 'text_deco_color_hover' )->run_type()->get_data();
$text_deco_thickness        = $script->get_parent()->get_setting( 'text_deco_thickness' )->run_type()->get_data();
?>
.sv100_sv_pagination .page-numbers,
.sv100_sv_pagination .page-numbers:visited,
.sv100_sv_content_page_links .post-page-numbers,
.sv100_sv_content_page_links .post-page-numbers:visited {
    font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
    font-weight: <?php echo ( $font ?  $font['weight'] : '400' ); ?>;
    font-size: <?php echo $font_size; ?>px;
    color: <?php echo $text_color; ?>;
    line-height: <?php echo $line_height; ?>px;
    text-decoration: <?php echo $text_deco === 'underline' ? '' : $text_deco; ?>;
}

.sv100_sv_pagination .page-numbers::after,
.sv100_sv_content_page_links .post-page-numbers::after {
    height: <?php echo $text_deco_thickness; ?>px;
    width: <?php echo $text_deco === 'underline' ? '100%' : '0'; ?>;
    background-color: <?php echo $text_deco_color ? $text_deco_color : 'transparent'; ?>;
}

.sv100_sv_pagination .page-numbers.current
.sv100_sv_pagination .page-numbers:hover,
.sv100_sv_pagination .page-numbers:focus,
.sv100_sv_content_page_links a.post-page-numbers.current,
.sv100_sv_content_page_links a.post-page-numbers:hover,
.sv100_sv_content_page_links a.post-page-numbers:focus {
    color: <?php echo $text_color_hover; ?>;
}

.sv100_sv_pagination .page-numbers.current::after,
.sv100_sv_pagination .page-numbers:hover::after,
.sv100_sv_pagination .page-numbers:focus::after,
.sv100_sv_content_page_links .post-page-numbers.current::after,
.sv100_sv_content_page_links .post-page-numbers:hover::after,
.sv100_sv_content_page_links .post-page-numbers:focus::after {
    width: <?php echo $text_deco_hover === 'underline' ? '100%' : '0'; ?>;
    background-color: <?php echo $text_deco_color_hover ? $text_deco_color_hover : 'transparent'; ?>;
}