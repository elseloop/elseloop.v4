<?php

/**
 * Enqueue Scripts and Styles for Front-End
 */

if ( ! function_exists( 'nm_scripts' ) ) :

function nm_scripts() {

  if (!is_admin()) {

    wp_enqueue_script('jquery');
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', array(), null, false );
    
    // Load JavaScripts
    if ( is_singular() ) {
      wp_enqueue_script( "comment-reply" );
    }

    // Load core stylesheets & scripts last, just in case they need to overwrite anything
    wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/app.css' );
    wp_enqueue_script( 'equality-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), null, true );
  
  }

}

add_action( 'wp_enqueue_scripts', 'nm_scripts' );

endif;