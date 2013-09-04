<?php

/**
  * Second post loop on homepage
**/

$sticky_id = get_template_part_data();

$posts = get_posts(array(
  'posts_per_page' =>  6,
  'exclude'   =>  $sticky_id
));

if ( $posts ) {

  ?><div class="beta-loop-header">
      <h2>Recent Posts</h2>
    </div><?php

  $count = 1;
  foreach ( $posts as $post ) {
    setup_postdata( $post );

    $thumb = nm_get_thumbnail_outside_loop( get_the_id(), $size = "thumbnail", $class = "post-thumb thumbnail" );
    $thumbclass = null;
    if ( ! $thumb )
      $thumbclass = sanitize_html_class( "thumbless" );
    
    ?><div <?php post_class( "in-list post-outer $thumbclass" ); ?>>
        
        <div class="post-inner-wrap">
          
          <div class="post-title">            
              <h3 class="post-title-inner"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

          <div class="post-body"><?php

            if ( $thumb ) {
              
              ?><div class='thumbnail-wrap'>
                  <a href="<?php the_permalink(); ?>"><?php echo $thumb; ?></a>
                </div><?php

            }

            ?><div class="excerpt"><?php the_excerpt(); ?></div>
          
            <div class="meta">

              <div class="pertinent">
                <p class="pubdate"><?php echo get_the_date( 'Y M d' ); ?></p>
              </div>
              
              <div class="featured-article--terms">
                  
                <div class="post-cats">
                  <h6 class="list-label">Categories</h6>
                  <ul class="unstyled term-list">
                    <li><a href="#">WordPress</a>,</li>
                    <li><a href="#">Tutorial</a></li>
                  </ul>
                </div> <?php // /.post-cats ?>
                
                <div class="post-cats post-tags">
                  <h6 class="list-label">Tags</h6> 
                  <ul class="unstyled term-list">
                    <li><a href="#">CPT</a>,</li>
                    <li><a href="#">PHP</a></li>
                  </ul>
                </div> <?php // /.post-tags ?>

              </div> <?php // /.featured-article--terms ?>

            </div> <?php // /.meta ?>
          
          </div> <?php // /.post-body ?>
        
        </div> <?php // /.post-inner-wrap
        
        if ( count($posts) != $count ) {
          ?><hr class="rule--ornamental"><?php
        }

    ?></div><?php // /.post-outer

    $count++;

  } // end foreach
} // end if