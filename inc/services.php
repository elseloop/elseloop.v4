<?php

/* ==========================================================================
   TYPEKIT
   ========================================================================== */
define('TYPEKIT_ID', ''); // xxxxxxx

function needmore_typekit() {
  
  ?><script type="text/javascript">
      (function() {
        var config = {
          kitId: '<?php echo TYPEKIT_ID; ?>',
          scriptTimeout: 3000
        };
        var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
      })();
  </script><?php

}

if (TYPEKIT_ID) {
  add_action( 'wp_head', 'needmore_typekit' );
}

/* ==========================================================================
   GOOGLE ANALYTICS
   ========================================================================== */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y

function nm_google_analytics() { 
  ?><script>
    var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
  </script><?php
}

if (GOOGLE_ANALYTICS_ID) {
  add_action('wp_footer', 'nm_google_analytics', 20);
}