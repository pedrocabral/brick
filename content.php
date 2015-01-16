<?php
/**
 * @package brick
 */
?>

					<article id="post-<?php the_ID(); ?>" class="article-<?php the_slug();?>"><!-- content.php -->
						<header class="entry-header">
							<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
							echo chr(0x0D).chr(0x0A);?>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_excerpt();?>
						</div><!-- .entry-content -->
					</article><!-- #post-## --><!-- content.php -->
