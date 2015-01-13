<?php
/**
 * @package brick
 */

get_header(); ?>

			<div id="primary" class="content-area"><!-- 404.php -->
				<main id="main" class="site-main" role="main">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'brick' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'brick' ); ?></p>
							<?php get_search_form(); echo "\n";?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary --><!-- 404.php -->
<?php get_footer(); ?>
