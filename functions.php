<?php
/**
 * @package brick
 */

/*
 * Brick Setup
 */
if ( ! function_exists( 'brick_setup' ) ) :

function brick_setup() {

	// Enable title tag
	add_theme_support( 'title-tag' );

	// Enable theme translation
	load_theme_textdomain( 'brick', get_template_directory() . '/languages' );

	// Enable Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// Enable Post Formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// wp_nav_menu() usage
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'brick' ),
		'secondary' => __( 'Secondary Menu', 'brick' )
	) );

	// HTML5 output
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// WordPress custom background feature
	add_theme_support( 'custom-background', apply_filters( 'brick_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// oEmbed correction
	if ( ! isset( $content_width ) ) {
		$content_width = 640;
	}
}

endif; // Brick Setup

add_action( 'after_setup_theme', 'brick_setup' );

/*
 * Register Sidebar
 */
function brick_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'brick' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'brick_widgets_init' );

/*
 * CSS Styles Array to join and minify
 */
global $site_styles;

$site_styles = array(
	// Theme Base CSS (do not change)
	get_stylesheet_uri(),
	// Theme Custom CSS (change)
	get_template_directory_uri() . '/css/brick.css',
	// Font Awesome Icons
	get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css',
	// Fonts
	//'http://fonts.googleapis.com/css?family=Open+Sans'
);

/*
 * Enqueue scripts and styles.
 */
function brick_scripts() {
	// CSS Minifier
	wp_enqueue_style( 'style', get_template_directory_uri() .'/inc/style.php', array(), null );
	// Theme Base Scripts
	wp_enqueue_script( 'base-scripts', get_template_directory_uri() . '/js/main.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'brick_scripts' );


// Custom Header
// require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Plucker | disable unused stuff
require get_template_directory() . '/inc/plucker.php';

// Menu Walker - control the menu output @ item level
require get_template_directory() . '/inc/menu_walker.php';

/*
 * Add page title in body class
 */
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ){
	global $post;
	$classes[] = 'body-'. the_slug(); // custom template tag
	return $classes;
}
/*
 * Add first and last classes to menu items
 */
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/*
* fn - debug via browser console - console_echo();
* usage -> console_echo( $test_variable[, 'test-xxx'] );
*/
function console_echo( $data, $message = 'WP PHP Debug' ){
	if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('" . $message . " : " . json_encode($data) . "');</script>");
	} else {
		echo("<script>console.log('" . $message . " : " . $data . "');</script>");
	}
}

/*
 * Title Tag backwards compatibility
 */

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function theme_slug_render_title() { ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php }
	add_action( 'wp_head', 'theme_slug_render_title' );
endif;

// end
?>
