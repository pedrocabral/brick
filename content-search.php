<?php
/**
 * @package brick
 */
?>				<article id="post-<?php the_ID(); ?>" class="results-<?php the_slug();?>"><!-- content-search.php -->
							<header class="entry-header">
								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

							</header><!-- .entry-header -->
							<div class="entry-summary">
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->
						</article><!-- #post-## --><!-- content-search.php -->
