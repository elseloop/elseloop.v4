<?php

// Remove sticky class from sticky posts
if ( ! function_exists( 'nm_remove_sticky' ) ) :

function nm_remove_sticky( $classes ) {
  
  $classes = array_diff( $classes, array( "sticky" ) );
  return $classes;

}

add_filter('post_class','nm_remove_sticky');

endif;

// add helpful body classes
function nm_body_class($classes) {

  // Add post/page slug
  if ( is_single() || is_page() && !is_front_page() ) {
    $classes[] = "pg-" . basename( get_permalink() );
  }
  
  if ( is_page() && nm_is_child( get_the_id() ) ) {
    $classes[]  = needmore_get_parent_name( get_the_id() ) . "-child";
  }

  // Remove unnecessary classes
  $home_id_class = 'page-id-' . get_option('page_on_front');
  $remove_classes = array(
    'page-template-default',
    $home_id_class
  );
  $classes = array_diff($classes, $remove_classes);

  return $classes;
}

add_filter('body_class', 'nm_body_class');