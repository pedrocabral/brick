<?php
/**
 * @package brick
 *
 * Removes not used blog stuff
 */

// Remove not used meta tags
remove_action( 'wp_head', 'feed_links_extra', 3 ); // category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // general feeds
remove_action( 'wp_head', 'rsd_link' ); // EditURI
remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer manifest
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // post adjacent
remove_action( 'wp_head', 'wp_generator' ); // XHTML generator
remove_action( 'wp_head', 'wp_shortlink_wp_head'); // shortlink
remove_action( 'wp_head', 'rel_canonical' ); // Canonical

// Remove comment style
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');// Removes Recent Comments Stiles

// Remove meta links
add_filter( 'index_rel_link', 'disable_meta_links' );
add_filter( 'parent_post_rel_link', 'disable_meta_links' );
add_filter( 'start_post_rel_link', 'disable_meta_links' );
add_filter( 'previous_post_rel_link', 'disable_meta_links' );
add_filter( 'next_post_rel_link', 'disable_meta_links' );

function disable_meta_links( $data ) {
	return false;
}

// Remove 'blog' class from body
function remove_blog_from_classes($classes, $class){
	global $post;
		foreach($classes as &$str){
			if(strpos($str, "blog") > -1){
				$str = "";
			}
	}
	return $classes;
}
add_filter("body_class", "remove_blog_from_classes", 10, 2);

// Cleaning <body> classes
function filter_body_class( $wp_classes, $extra_classes ){

	// List of the only WP generated classes allowed
	$whitelist = array( 'home', 'archive', 'category', 'tag', 'error404', 'logged-in', 'admin-bar' );

	// List of the only WP generated classes that are not allowed
	$blacklist = array( '' );

	// Filter the body classes

	// Whitelist result: (comment if you want to blacklist classes)
	$wp_classes = array_intersect( $wp_classes, $whitelist );

	// Blacklist result: (uncomment if you want to blacklist classes)
	// $wp_classes = array_diff( $wp_classes, $blacklist );

	// Add the extra classes back untouched
	return array_merge( $wp_classes, (array) $extra_classes );
}
add_filter( 'body_class', 'filter_body_class', 10, 2 );

// Remove paragraph tags from around images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

?>
