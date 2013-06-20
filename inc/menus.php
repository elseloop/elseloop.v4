<?php

/**
 * Register Navigation Menus
 */

if ( ! function_exists( 'foundation_menus' ) ) :

// Register wp_nav_menus
function foundation_menus() {

  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'foundation' )
    )
  );
  
}

add_action( 'init', 'foundation_menus' );

endif;

if ( ! function_exists( 'foundation_page_menu' ) ) :

function foundation_page_menu() {

  $args = array(
  'sort_column' => 'menu_order, post_title',
  'menu_class'  => 'large-12 columns',
  'include'     => '',
  'exclude'     => '',
  'echo'        => true,
  'show_home'   => false,
  'link_before' => '',
  'link_after'  => ''
  );

  wp_page_menu($args);

}

endif;

/**
 * Navigation Menu Adjustments
 */

// Add class to navigation sub-menu
class foundation_navigation extends Walker_Nav_Menu {

function start_lvl(&$output, $depth) {
  $indent = str_repeat("\t", $depth);
  $output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
  $id_field = $this->db_fields['id'];
  if ( !empty( $children_elements[ $element->$id_field ] ) ) {
    $element->classes[] = 'has-dropdown';
  }
    Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
}