<?php

/**
  * Blog helper functions
**/

function dtm_get_most_recent_sticky_id() {

  // get all sticky posts
  $stickies = get_option( 'sticky_posts' );
  
  // if there aren't any, bail
  if ( ! $stickies )
    return false;
    
  /* sort sticky posts, newest at the top */
  rsort( $stickies );
  
  /* get the most recent one */
  $sticky = array_slice( $stickies, 0, 1 );
  $sticky = $sticky[0];

  // return the id
  return $sticky;

}

/**
  * Test if post is most recent sticky post
  *
  * @param int
  * @return bool
  */
function elkcove_is_most_recent_sticky( $id ) {
  
  $sticky = dtm_get_most_recent_sticky_id();
  
  // if there aren't any sticky posts, bail
  if ( ! $sticky )
    return;

  // if the current post is the most recent sticky post, party time 
  if ( $id === $sticky )
    return true;
  
  // otherwise, sad trombone  
  return false;
  
}