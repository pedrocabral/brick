<?php
/**
 * @package brick
 */

get_header(); ?>

			<div id="primary" class="content-area"><!-- single.php -->
				<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'content', 'single' );
					endwhile; // end of the loop. ?>
					<?php echo chr(0x0D).chr(0x0A);?>
				</main><!-- #main -->
			</div><!-- #primary --><!-- single.php -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
