<?php
$args = array(
	'mid_size'				=> 2,
	'prev_text'				=> __( 'Previous', 'straightvisions_100' ),
	'next_text'				=> __( 'Next', 'straightvisions_100' ),
	'screen_reader_text'	=> ' ',
);

if ( ! empty( get_the_posts_pagination( $args  ) ) ) {
	echo '<div class="' . $this->get_prefix() . '">';
	echo get_the_posts_pagination( $args );
	echo '</div>';
}
