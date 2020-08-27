<?php
require('inc-header.php');
define('TITLE',"Reset year");

require('inc-html-head.php');
htmltitle(TITLE);

  //require("functions.php");
if ($_SESSION['administrator']){ // check admin
  if($_SERVER['REQUEST_METHOD']=='POST'){  // check post
    if($_POST["confirmid"]=="x1123y"){
    // TRUNCATE TABLE inscripcions
    executequery($dbc,"TRUNCATE TABLE inscripcions");
    // TRUNCATE TABLE `altres-cursos-extraescolar`
    executequery($dbc,"TRUNCATE TABLE `altres-cursos-extraescolar`");
    // TRUNCATE TABLE hores
    executequery($dbc,"TRUNCATE TABLE hores");
    // DELETE FROM sessions
    executequery($dbc,"DELETE FROM sessions");
    // DELETE FROM extraescolars
    executequery($dbc,"DELETE FROM extraescolars");
      echo "<p>Confirmat l'esborrat de la base de dades.</p>";
    }
    //echo "<a href='taula.php'>Següent</a>";
  } else { // check post
  
?>

<p class="error">
ATENCIÓ:
</p>
<ol>
  <li>- Si espitjau confirmar, esborrareu les dades d'inscripcions, extraescolars i sessions.</li> 
  <li>- Això només s'ha de fer abans de fer una importació per a començar el nou curs.</li> 
  <li>- Abans de dur a terme aquesta acció es recomana fer una còpia de la base de dades amb phpmyadmin per si de cas.</li>
  <li>- Teniu present que les dades dels alumnes s'esborren des de la pàgina corresponent.</li>
</ol>

<form action="" method="POST">
  <input type="hidden" name='confirmid' value='x1123y'>
<!--   <input type="submit" value="Confirmar"> -->
  <?php 
  htmlbuttonsubmit("Confirmar"); 
  ?>
</form>
  
<?php
  } // check post
        //Mogut al footer
        //htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
} else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin
  require('inc-html-foot.php');
?>
