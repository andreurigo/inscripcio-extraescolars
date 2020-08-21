<?php
require('inc-header.php');
define('TITLE',"Esborrat alumnes");

require('inc-html-head.php');
htmltitle(TITLE);
  //require("functions.php");
if ($_SESSION['administrator']){ // check admin
  if($_SERVER['REQUEST_METHOD']=='POST'){  // check post
    if($_POST["confirmid"]=="x1123y"){
    executequery($dbc,"DELETE FROM alumnes");
      echo "<p>Confirmat l'esborrat dels alumnes.</p>";
    }
    //echo "<a href='taula.php'>Següent</a>";
  } else { // check post
  
?>

<p>
ATENCIÓ:</p>
<ul> 
 <li>- Si espitjau confirmar, esborrareu la taula d'alumnes.</li> 
 <li>- Això només s'ha de fer abans de fer una importació per a començar el nou curs.</li>
 <li>- Abans d'esborrar la taula d'alumnes, s'han d'esborrar les inscripcions</li>
 <li>- Abans de dur a terme aquesta acció es recomana fer una còpia de la base de dades amb phpmyadmin per si de cas.</li> 
</ul>

<form action="" method="POST">
  <input type="hidden" name='confirmid' value='x1123y'>
<!--   <input type="submit" value="Confirmar"> -->
  <?php 
  htmlbuttonsubmit("Confirmar"); 
  ?>
</form>
<?php
      htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
  } // check post
} else { //check admin
?>
  <p class="error">
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin

require('inc-html-foot.php');
?>
  
