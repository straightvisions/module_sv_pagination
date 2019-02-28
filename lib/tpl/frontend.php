<div class="<?php echo $this->get_prefix(); ?>">
	<?php
	echo get_the_posts_pagination(
		array(
			'mid_size'				=> 2,
			'prev_text'				=> __( 'Previous', $this->get_module_name() ),
			'next_text'				=> __( 'Next', $this->get_module_name() ),
			'screen_reader_text'	=> ' ',
		)
	);
	?>
</div>
