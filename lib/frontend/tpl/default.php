<?php
$args = array(
	'mid_size'				=> 2,
	'prev_text'				=> __( 'Previous', 'sv_pagination' ),
	'next_text'				=> __( 'Next', 'sv_pagination' ),
	'screen_reader_text'	=> ' ',
);

if ( ! empty( get_the_posts_pagination( $args  ) ) ) {
	echo '<div class="' . $this->get_prefix() . '">';
	echo get_the_posts_pagination( $args );
	echo '</div>';
}
