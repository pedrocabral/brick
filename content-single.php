<?php
/**
 * @package brick
 */
?>
	<article id="post-<?php the_ID(); ?>" class="article-<?php the_slug();?>"><!-- content-single.php -->
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_content();?>
						</div><!-- .entry-content -->
					</article><!-- #post-## --><!-- content-single.php -->
