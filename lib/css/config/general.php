<?php

	echo $_s->build_css(
		'.sv100_sv_pagination',
		array_merge(
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers,
		.sv100_sv_pagination .page-numbers:visited,
		.sv100_sv_content_page_links .post-page-numbers,
		.sv100_sv_content_page_links .post-page-numbers:visited',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers.current,
		.sv100_sv_pagination .page-numbers:hover,
		.sv100_sv_pagination .page-numbers:focus,
		.sv100_sv_content_page_links a.post-page-numbers.current,
		.sv100_sv_content_page_links a.post-page-numbers:hover,
		.sv100_sv_content_page_links a.post-page-numbers:focus',
		array_merge(
			$module->get_setting('text_color_hover')->get_css_data()
		)
	);


	// Text Decoration
	$properties			= array();

	$value				= $module->get_setting('text_deco')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = $module->get_setting('text_deco_thickness')->get_data()[$breakpoint].'px solid rgba('.$module->get_setting('text_deco_color')->get_data()[$breakpoint].')';

			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
		}
	}

	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers:after,
		.sv100_sv_pagination .page-numbers:visited:after,
		.sv100_sv_content_page_links .post-page-numbers:after,
		.sv100_sv_content_page_links .post-page-numbers:visited:after',
		array_merge(
			$properties
		)
	);

	// Text Decoration Hover
	// @todo doubled code
	$properties			= array();

	$value				= $module->get_setting('text_deco_hover')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = $module->get_setting('text_deco_thickness')->get_data()[$breakpoint].'px solid rgba('.$module->get_setting('text_deco_color_hover')->get_data()[$breakpoint].')';
				$imploded['transition'][$breakpoint] = 'width .25s ease-in-out';
			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
			$properties['transition'] = $_s->prepare_css_property_responsive($imploded['transition'], '', '');
		}
	}

	echo $_s->build_css(
		'.sv100_sv_pagination .page-numbers.current:after,
		.sv100_sv_pagination .page-numbers:hover:after,
		.sv100_sv_pagination .page-numbers:focus:after,
		.sv100_sv_content_page_links a.post-page-numbers.current:after,
		.sv100_sv_content_page_links a.post-page-numbers:hover:after,
		.sv100_sv_content_page_links a.post-page-numbers:focus:after',
		array_merge(
			$properties
		)
	);