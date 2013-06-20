<?php

// Initiate theme
// @TODO change textdomain to something more specific, theme-wide

if ( ! function_exists( 'nm_theme_init' ) ) :

function nm_theme_init() {

  // Content Width
  if ( ! isset( $content_width ) ) $content_width = 900;

  // Language Translations
  load_theme_textdomain( 'foundation', get_template_directory() . '/languages' );

  // Custom Editor Style Support
  add_editor_style();

  // Support for Featured Images
  add_theme_support( 'post-thumbnails' ); 

  // Automatic Feed Links & Post Formats
  add_theme_support( 'automatic-feed-links' );
  //add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

  // Custom Background
  add_theme_support( 'custom-background', array(
    'default-color' => 'fff',
  ) );

  // Custom Header
  add_theme_support( 'custom-header', array(
    'default-text-color' => '#000',
    'header-text'   => true,
    'height'    => '200',
    'uploads'       => true,
  ) );

}

add_action( 'after_setup_theme', 'nm_theme_init' );

endif;