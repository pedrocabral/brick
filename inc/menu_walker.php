<?php
/**
 * @package brick
 *
 */

class menu_walker extends Walker_Nav_Menu {

	public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", 6 + $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}
	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t",  6 + $depth);
		$indent1 = str_repeat("\t",  5 + $depth);
		$output .= "$indent</ul>\n$indent1";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = str_repeat( "\t", 5 + $depth);

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		/**
		 * Filter the CSS class(es) applied to a menu item's <li>.
		 */

		$blacklist = array( 'menu-item-type-post_type',
							'menu-item-type-taxonomy',
							'menu-item-object-page',
							'menu-item-object-post',
							'menu-item-object-tag',
							'menu-item-object-category',
							'menu-item-type-custom',
							'menu-item-object-custom',
							'current_page_item',
							'menu-item-home',
							'current-menu-parent',
							'current-menu-ancestor',
							'page_item',
							'page_item_has_children',
							'current_page_parent',
							'current_page_ancestor',
							'menu-item-has-children'
							);

		$classes = array_diff( $classes, $blacklist );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's <li>.
		 */
		//$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		//$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent .'<li' /*. $id*/ . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's <a>.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

		public function end_el( &$output, $item, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", 5 + $depth);
		$output .= "</li>\n";
	}

}
?>
