<?php
require('inc-header.php');
define('TITLE',"Sessió finalitzada");

require('inc-html-head.php');
htmltitle(TITLE);

?>
  
  <p>
    Heu finalitzat el procés d'inscripció. Podeu tancar la pestanya o tornar a començar tot espitjant el botó.
  </p>
<?php


unset($_SESSION);
session_destroy();

      htmlbuttonleftlink("Tornar a començar","index.php");

require('inc-html-foot.php');
    
?>
