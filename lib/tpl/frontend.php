<div class="<?php echo $this->get_module_name(); ?> px-3 px-md-4 py-4">
	<?php
	echo get_the_posts_pagination(
		array(
			'mid_size'				=> 2,
			'prev_text'				=> '<span class="dashicons dashicons-arrow-left-alt2"></span>',
			'next_text'				=> '<span class="dashicons dashicons-arrow-right-alt2"></span>',
			'screen_reader_text'	=> ' ',
		)
	);
	?>
</div>
