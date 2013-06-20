<?php

/**
 * Register Sidebars
 */

if ( ! function_exists( 'foundation_widgets' ) ) :

function foundation_widgets() {

  // Sidebar Right
  register_sidebar( array(
      'id' => 'foundation_sidebar_right',
      'name' => __( 'Sidebar Right', 'foundation' ),
      'description' => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );

  // Sidebar Footer Column One
  register_sidebar( array(
      'id' => 'foundation_sidebar_footer_one',
      'name' => __( 'Sidebar Footer One', 'foundation' ),
      'description' => __( 'This sidebar is located in column one of your theme footer.', 'foundation' ),
      'before_widget' => '<div class="large-3 columns">',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );

  // Sidebar Footer Column Two
  register_sidebar( array(
      'id' => 'foundation_sidebar_footer_two',
      'name' => __( 'Sidebar Footer Two', 'foundation' ),
      'description' => __( 'This sidebar is located in column two of your theme footer.', 'foundation' ),
      'before_widget' => '<div class="large-3 columns">',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );

  // Sidebar Footer Column Three
  register_sidebar( array(
      'id' => 'foundation_sidebar_footer_three',
      'name' => __( 'Sidebar Footer Three', 'foundation' ),
      'description' => __( 'This sidebar is located in column three of your theme footer.', 'foundation' ),
      'before_widget' => '<div class="large-3 columns">',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );

  // Sidebar Footer Column Four
  register_sidebar( array(
      'id' => 'foundation_sidebar_footer_four',
      'name' => __( 'Sidebar Footer Four', 'foundation' ),
      'description' => __( 'This sidebar is located in column four of your theme footer.', 'foundation' ),
      'before_widget' => '<div class="large-3 columns">',
      'after_widget' => '</div>',
      'before_title' => '<h5>',
      'after_title' => '</h5>',
    ) );

  }

add_action( 'widgets_init', 'foundation_widgets' );

endif;