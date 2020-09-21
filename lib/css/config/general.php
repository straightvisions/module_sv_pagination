<?php
	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers,
		.sv100_sv_pagination .page-numbers:visited,
		.sv100_sv_content_page_links .post-page-numbers,
		.sv100_sv_content_page_links .post-page-numbers:visited',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data(),
			$module->get_setting('text_deco')->get_css_data('text-decoration'),
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers.current
		.sv100_sv_pagination .page-numbers:hover,
		.sv100_sv_pagination .page-numbers:focus,
		.sv100_sv_content_page_links a.post-page-numbers.current,
		.sv100_sv_content_page_links a.post-page-numbers:hover,
		.sv100_sv_content_page_links a.post-page-numbers:focus',
		array_merge(
			$module->get_setting('text_color_hover')->get_css_data()
		)
	);