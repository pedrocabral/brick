<?php
/**
 * @package brick
 */
?>

					<article id="post-<?php the_ID(); ?>" class="article-<?php the_slug(true);?>"><!-- content-index.php -->
						<header class="entry-header">
							<h1 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_excerpt();?>
						</div><!-- .entry-content -->
					</article><!-- #post-## --><!-- content-index.php -->
