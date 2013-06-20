<?php
/**
 * Page
 *
 * Loop container for page content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header();

    ?><div role="main" class="row post-wrap"><?php

      if ( have_posts() ) :

        while ( have_posts() ) : the_post();
          
          get_template_part( 'content', 'page' );
        
        endwhile;

      endif;

    ?></div><?php

get_footer();