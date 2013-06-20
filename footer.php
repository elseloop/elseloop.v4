<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

  </div> <?php // end .row; opened in header.php ?>
</div> <?php // end .outer-wrap; opened in header.php ?>

<footer class="site-footer">
  <div class="row"><?php 
    dynamic_sidebar('Sidebar Footer One');
    dynamic_sidebar('Sidebar Footer Two');
    dynamic_sidebar('Sidebar Footer Three');
    dynamic_sidebar('Sidebar Footer Four');
  ?></div>
</footer>

<?php wp_footer(); ?>

</body>
</html>