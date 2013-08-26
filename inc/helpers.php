<?php


// Check if on a child page
function nm_is_child( $id ) {
    
    $this_post    = get_page( $id );
    $parent_pg    = $this_post->post_parent;
    $post_type    = get_post_type( $id );
    $ancestors    = get_ancestors( $id, $post_type );
    $anc          = end( $ancestors );
    
    if ( 0 != $parent_pg && $parent_pg == $anc )
      return true;

    return false;
    
}


function needmore_get_parent_name($id) {

  $this_post    = get_page( $id );
  $parent_pg    = $this_post->post_parent;
  $parent_obj   = get_page( $parent_pg );
  $parent_name  = $parent_obj->post_title;

  if ( nm_is_child( $id ) )
    return strtolower( sanitize_html_class( $parent_name ) );

  return false;
  
}


function nm_is_parent( $id ) {
  
  $this_post      = get_page($id);
  
  // if it's the blog, bail
  if ( is_home() || is_single() )
    return;
  
  // get all children of this page, making sure to match post type
  $pt       = get_post_type( $this_post );
  $children = get_page_children( $id, get_pages( array( 'post_type' => $pt ) ) );
  
  // if there actually are children, return true
  if ( count( $children ) > 0 )
    return true;
  
  // otherwise...
  return false;
  
}


// Checks URL value for http://
function addhttp( $url ) {
  
  if ( !preg_match( "~^(?:f|ht)tps?://~i", $url ) ) {
    
    $url = "http://" . $url;
    
  }
  
  return $url;
  
}


// nm_get_thumbnail()
function nm_get_thumbnail( $size = "full", $class = "thumb" ) {
  
  if ( has_post_thumbnail() ) :
    
    return the_post_thumbnail( $size, array(
      'alt'   =>  get_the_title(),
      'title' =>  "",
      'class' =>  $class
    ));
  
  else :

    return false;

  endif;

}


// nm_get_thumbnail_outside_loop()
function nm_get_thumbnail_outside_loop( $id='', $size = "full", $class = "thumb" ) {
  
  if ( has_post_thumbnail( $id ) ) :
    
    return get_the_post_thumbnail( $id, $size, array(
      'alt'   =>  get_the_title(),
      'title' =>  "",
      'class' =>  $class
    ));

  endif;

}


if ( ! function_exists( 'needmore_twitter' ) ) {
  
  function needmore_twitter() {
   
     $tweet_btn = '<p class="tweet-this-wrap">';
     $tweet_btn .= '<a href="http://twitter.com/share" class="twitter-share-button" data-url=" '.  get_permalink() . '" data-text="' . get_the_title() . '" data-count="horizontal" data-via="Equality_House">Tweet This</a>';
     $tweet_btn .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>';
     $tweet_btn .= '</p>';
  
     return $tweet_btn;
     
  } // needmore_twitter

} // needmore_twitter exists


// pass data through get_template_part()
function get_template_part_data() {
  $func = wp_list_filter( debug_backtrace(), array( 'function' => 'get_template_part' ) );
  if ( $func )
    return $func[key($func)]['args'][2];
}


/**
 * Custom Title Tag
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function nm_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'foundation' ), max( $paged, $page ) );

  return $title;
}

add_filter( 'wp_title', 'nm_title', 10, 2 );