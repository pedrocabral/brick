<?php
/**
 * @package brick
 */

get_header(); ?>

			<div id="primary" class="content-area"><!-- index.php -->
				<main id="main" class="site-main" role="main"><?php 
		if ( have_posts() ) :
	while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
			brick_paging_nav();
		else :
			get_template_part( 'content', 'none' ); ?>
<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #primary --><!-- index.php -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
