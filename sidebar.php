<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package brick
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
			<div id="secondary" class="widget-area" role="complementary"><!-- sidebar.php -->
				<?php dynamic_sidebar( 'sidebar-1' ); echo chr(0x0D).chr(0x0A);?>
			</div><!-- #secondary --><!-- sidebar.php --><?php echo chr(0x0D).chr(0x0A);?>
