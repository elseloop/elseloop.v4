<?php

/**
  * Homepage template
  *
  * modified version of the blog index template
  * shows full text of the most recent sticky post
  * and only the six most recent posts beyond that
  *
**/

get_header();

?><div class="outer-wrap">
  
    <div <?php post_class( 'featured-post' ); ?>><?php
      
      $sticky_id = dtm_get_most_recent_sticky_id();
      $post = get_post($sticky_id);
      setup_postdata( $post );

      ?><div class="post-inner-wrap featured-article--title-block">
          
          <p class="pubdate"><?php echo get_the_date( 'Y M d' ); ?></p>
          
          <div class="featured-article--title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </div>

        </div><?php // /.post-inner-wrap
      
      // full-width banner image
      $banner = null;
      if ( function_exists('get_field') ) {
        $banner = get_field( 'blog_banner_img', $sticky_id );
      }
      if ( $banner ) {
        ?><div class="banner-wrap">
            <div class="banner-img" style="background-image: url(<?php echo $banner['url']; ?>); ">
              <img src="data:image/gif;base64,R0lGODlhAQACAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAIAAAICBAoAOw==" alt="">
            </div>
          </div><?php
      }

      ?><div class="post-inner-wrap featured-article-main"><?php
          
          ?><div class="featured-article--meta-wrap"><?php

            /* TL;DR BLOCK */
            if ( ! empty( $post->post_excerpt ) ) {
              
                $excerpt = $post->post_excerpt;
                
                ?><div class="featured-article--tldr">
                    <p class="tldr--head">tl;dr</p>
                    <div class="tldr--body"><?php
                      echo apply_filters( 'the_content', $excerpt );
                    ?></div>
                </div><?php // /.featured-article--tldr

            } // ! empty( $post->post_excerpt


            /* META BLOCK */
            ?><div class="featured-article--meta">
                
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
                       
            </div> <?php // /.featured-article--meta ?>

          </div> <?php // /.featured-article--meta-wrap ?>

          <div class="featured-article--body"><?php
            the_content();
          ?></div>

      </div><?php // /.featured-article-main

      wp_reset_postdata();

    ?></div><?php // /.featured-post

    
    /* RECENT POSTS BLOCK */
    ?><div class="recent-post-list"><?php
      
        get_template_part( 'templates/home', 'second-loop', $sticky_id );

    ?></div>

</div><?php // /.outer-wrap

get_footer();