<?php
/**
 * Custom template tags
 * @package brick
 */

/*
 * return Slug
 */
if ( ! function_exists( 'the_slug' ) ) :

function the_slug($echo = true){
	global $post;
	if ($post){
		if ($echo == true){
			echo $post->post_name;
		} else {
			return $post->post_name;
		}
	}
}
endif;

if ( ! function_exists( 'brick_paging_nav' ) ) :
/**
 * Posts Navigation
 */
function brick_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>

					<nav class="navigation paging-navigation" role="navigation">
						<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'brick' ); ?></h1>
						<div class="nav-links"><?php
						 if ( get_next_posts_link() ) {
								echo "\n\t\t\t\t\t\t\t" . '<div class="nav-previous">';
								next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brick' ) );
								echo '</div>';
								echo chr(0x0D).chr(0x0A);
							} else {
								echo chr(0x0D).chr(0x0A);
							}
							  if ( get_previous_posts_link() ) {
								echo "\t\t\t\t\t\t\t" . '<div class="nav-next">';
								previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brick' ) );
								echo '</div>';
								echo chr(0x0D).chr(0x0A);
							}?>
						</div><!-- .nav-links -->
					</nav><!-- .navigation -->
<?php 
}
endif;
