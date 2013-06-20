// main scripts file
// import main foundation file via CodeKit or enqueue it from functions.js before this file

;(function($){
  var $body = $("body");
  
  // initialize Foundation scripts
  $(document).foundation();

  // initialize sticky footer
  StickyFooter.init();

})(jQuery);