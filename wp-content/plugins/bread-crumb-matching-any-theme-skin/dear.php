<?php
/*

Plugin Name: URL based Bread Crumb
Plugin URI: http://www.devilhunter.net/
Description: Go to Appearance > Widgets, and drag 'URL based Bread Crumb' in sidebar or footer or in any widgetized area. This PlugIn will automatically match your theme's color. No need to use any short-code or to edit settings.
Version: 1.1
Author: Tawhidur Rahman Dear
Author URI: https://www.facebook.com/tawhidurrahmandear/
License: GPLv2 or later 

Tawhidur Rahman Dear
Mailing Address: 
House - 304, Road - 10 Rupnagar Tinshed,
Pallabi, Mirpur,
Dhaka - 1216
BANGLADESH
tawhidurrahmandear@gmail.com
+8801716816283, (also in Viber, DUO, WhatsApp, IMO)
Skype & Google Hangout: tawhidurrahmandear
Facebook: http://www.facebook.com/tawhidurrahmandear/ 
Google Plus: http://plus.google.com/+tawhidurrahmandear/about
Personal Blog: http://tawhidurrahmandear.blogspot.com 
 
 */


namespace dearseven\dear\wordpress;

{require_once(__DIR__ . "/pluginfiles/widget.php");}

  class S extends Widget {
    static $widgetTitle = "dearseven_breadcrumb";

    public function __construct() {
      parent::__construct(null, "URL based Bread Crumb");
    }


    public function widgetContent($args, $instance)
    {
      ?>




<SCRIPT LANGUAGE="JavaScript">
var path = "";
var href = document.location.href;
var s = href.split("/");
for (var i=2;i<(s.length-1);i++) {
path+="<A HREF=\""+href.substring(0,href.indexOf("/"+s[i])+s[i].length+1)+"/\">"+s[i]+"</A> / ";
}
i=s.length-1;
path+="<A HREF=\""+href.substring(0,href.indexOf(s[i])+s[i].length)+"\">"+s[i]+"</A>";
var url = window.location.protocol + "//" + path;
document.writeln(url);
</script>

      <?php
    
    }
  }

  S::register("dearseven_breadcrumb");


