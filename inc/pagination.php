<?php

/**
 * Create pagination
 */

if ( ! function_exists( 'foundation_pagination' ) ) :

function foundation_pagination() {

global $wp_query;

$big = 999999999;

$links = paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'prev_next' => true,
  'prev_text' => '&laquo;',
  'next_text' => '&raquo;',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages,
  'type' => 'list'
)
);

$pagination = str_replace('page-numbers','pagination',$links);

echo $pagination;

}

endif;