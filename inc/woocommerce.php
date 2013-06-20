<?php

// let's woo

// announce theme support for woocommerce
function nm_supports_woo() {
  add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'nm_supports_woo' );


// helper to get the shop id
function nm_get_shop_id() {
  $shop_obj = get_page_by_title("Shop");

  return $shop_obj->ID;

}

//
// Commonly used hooks and filters below; use as needed
//


// rewrite shop description function to add grid classes to wrapper
/*
if ( ! function_exists( 'nm_product_archive_description' ) ) {

  function nm_product_archive_description() {
    if ( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
      $shop_page   = get_post( woocommerce_get_page_id( 'shop' ) );
      $description = apply_filters( 'the_content', $shop_page->post_content );
      if ( $description ) {
        echo '<div class="page-description small-12 large-8 large-offset-2 columns">' . $description . '</div>';
      }
    }
  }
}
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'nm_product_archive_description', 10 );
*/


// moves product description (content) up below add to cart button
/*
if ( ! function_exists( 'nm_move_product_desc' ) ) {

  global $woocommerce, $post;

  function nm_move_product_desc() {
    the_content();
  }

}
add_action( 'woocommerce_single_product_summary', 'nm_move_product_desc', 40 );
*/


// adds social media buttons below product description
/*
if ( ! function_exists( 'nm_product_social_media_buttons' ) ) {

  global $woocommerce, $post;

  function nm_product_social_media_buttons() {
    
    get_template_part( 'sidebar', 'social' );

  }

}
add_action( 'woocommerce_single_product_summary', 'nm_product_social_media_buttons', 50 );
*/


/**
  * Whole bunch of unregistering hooks...uncomment as needed
  */

/*

// Remove those god damn breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Remove result count from above product list
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove Add to Cart button from product thumbnail on product category pages
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Remove the price from category archives
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

// Remove product meta from near Add to Cart button on 
// single view (moved it down into description pane)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove reviews and description from below product on single view
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


// remove product rating from category archives
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Remove category description from archive pages
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description');
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );

// Remove product meta from near Add to Cart button on 
// single view (moved it down into description pane)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Removes default related items output (completely) on single product pages.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Removes the ability (completely) to add cross sells to cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

*/