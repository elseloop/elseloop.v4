<?php

/**
  * Excerpts
  */

// Changing the number of words returned by the_excerpt() && get_the_excerpt()
function needmore_new_excerpt_length($length) {
  return 15; // change number as needed
}

add_filter('excerpt_length', 'needmore_new_excerpt_length');

// Stripping [...] from the more link on automatic post excerpts
function needmore_excerpt_more($more) {
  return '&hellip;';
}

add_filter('excerpt_more', 'needmore_excerpt_more');