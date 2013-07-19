## Needmore Starter Theme

Theme Name: Needmore Starter Theme   
Theme URI: [http://needmoredesigns.com](http://needmoredesigns.com)   
Description: Needmore's starting place for custom client themes, based on [Foundation for WordPress](https://github.com/drewsymo/Foundation) by [Drew Morris](http://drewsymo.com/).   
Author: Needmore Designs   
Author URI: [http://needmoredesigns.com](http://needmoredesigns.com)   
Version: 1.0   
License: GNU General Public License v2 or later   
License URI: http://www.gnu.org/licenses/gpl-2.0.html   
Text Domain: foundation   

####Getting Started

1. Clone this repo to the themes directory of your new local WP install
2. Add the new theme directory (created by step 1) to CodeKit
3. Because there's a config.rb file in the theme already, CodeKit will automatically hand over control to Compass, so...
4. ...open your terminal and navigate to the this directory
5. Type `compass watch`
6. Head back over to CodeKit
7. Have CodeKit import (prepend) foundation.js & StickyFooter.js into scripts.js
8. Also have CodeKit import whatever Foundation js plugins you might need (foundation.reveal.js, etc)
9. Your theme specific styles will go into /sass/custom as partials (_file-name.scss; note the underscore)
10.  Go!

If you're not using CodeKit, this will be considerably different.