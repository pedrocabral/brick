<?php
/**
 * @package brick
 */
?>
<section class="no-results not-found"><!-- content-none.php -->
						<header class="page-header">
							<h1 class="page-title"><?php _e( 'Nothing Found', 'brick' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<?php if ( is_search() ) :
									echo '<p>';
									_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'brick' );
									echo '</p>';
									get_search_form();
								else :
									echo '<p>';
									_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'brick' );
									echo '</p>';
									get_search_form(); 
								endif; ?>
						</div><!-- .page-content -->
					</section><!-- .no-results --><!-- content-none.php -->
