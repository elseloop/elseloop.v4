// this will perhaps need tweaking, but should follow the same basic patterns
// @TODO make this an actual jQuery plugin so we don't keep carting around this file

var StickyFooter = {

  init: function() {
    // we're firing this on window ready in case there are any images
    // that will impact the height of the page
    jQuery(window).on( "load", function() {
           
      var footerHeight  = 0,
          footerTop     = 0,
          $footer       = jQuery( ".site-footer" ),
          $body         = jQuery( "body" ),
          $main         = jQuery( ".outer-wrap" );

      function positionFooter() {
        
        // fade out the footer from the giddy up so nobody sees our finagling
        $body
          .removeClass( "loaded" )
          .addClass( "loading" );

        footerHeight = $footer.outerHeight(true);
        
        // new footer position ==
        // ( any page outside of view + full window height ) - height of footer
        footerTop = ( jQuery(window).scrollTop() + jQuery(window).height() - footerHeight ) + "px";

        // if the total height of the page is less than the height of the window...
        if ( ( $main.height() + footerHeight ) < jQuery( window ).height() ) {
          
          // relocate the footer to the bottom of the window
          $footer.css({
            position: "absolute",
            top: footerTop,
            left: 0
          }).animate({
            // fade it back in
            opacity: 1
          }, 250, function() {
            // then let everyone know
            $body
              .removeClass( "loading")
              .addClass( "loaded" );
          });
          
        } else {
          
          // otherwise, just leave it alone
          $footer.css({
            position: "static"
          });
          $body
            .removeClass( "loading")
            .addClass( "loaded" );
        }

      }

      positionFooter();

      jQuery(window).resize(function(){
        setTimeout(function(){
          positionFooter();
        }, 150);
      });

    });

  }

};