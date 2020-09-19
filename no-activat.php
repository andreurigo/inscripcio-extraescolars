<?php
require('inc-header.php');
define('TITLE',"Estat procés d'inscripció");

require('inc-html-head.php');

htmltitle(TITLE);

  
  //require("connect.php");
  //require("functions.php");


  
        if ($_SESSION['activat']) {
        echo "El procés d'inscripció està actualment obert";
      } else {
        echo "La inscripció s'activarà a les $hour:$minute el $day del $month de $year";
        if ($faltenminuts<600) echo "<br />Falten $faltenminuts minuts";
      }

      htmlbuttonleftlink("Tornar a començar","index.php");
 
require('inc-html-foot.php');
?>
