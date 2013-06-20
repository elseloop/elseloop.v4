<?php

/** 
 * Comments Template
 */

if ( ! function_exists( 'foundation_comment' ) ) :

function foundation_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
    // Display trackbacks differently than normal comments.
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'foundation' ), '<span>', '</span>' ); ?></p>
  <?php
    break;
    default :
    global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <header>
        <?php
          echo "<span class='th alignleft' style='margin-right:1rem;'>";
          echo get_avatar( $comment, 44 );
          echo "</span>";
          printf( '%2$s %1$s',
            get_comment_author_link(),
            ( $comment->user_id === $post->post_author ) ? '<span class="label">' . __( 'Post Author', 'foundation' ) . '</span>' : ''
          );
          printf( '<br><a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            sprintf( __( '%1$s at %2$s', 'foundation' ), get_comment_date(), get_comment_time() )
          );
        ?>
      </header>

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p><?php _e( 'Your comment is awaiting moderation.', 'foundation' ); ?></p>
      <?php endif; ?>

      <section>
        <?php comment_text(); ?>
      </section><!-- .comment-content -->

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'foundation' ), 'after' => ' &darr; <br><br>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

      </div>
    </article>
  <?php
    break;
  endswitch;
}
endif;