<?php
require('inc-header.php');
define('TITLE',"Reset year");
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo TITLE ?></title>
  <meta name="description" content="<?php echo TITLE ?>">
  <meta name="author" content="Andreu Rigo">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <!-- <script src="js/scripts.js"></script> -->
  <h1><?php echo TITLE ?></h1>
<?php
  require("functions.php");
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

<p>
ATENCIÓ: Si espitjau confirmar, esborrareu totes les dades de l'aplicació. Això només s'ha de fer abans de fer una importació per a començar el nou curs. Abans de dur a terme aquesta acció es recomana fer una còpia de la base de dades amb phpmyadmin per si de cas. 
</p>

<form action="" method="POST">
  <input type="hidden" name='confirmid' value='x1123y'>
  <input type="submit" value="Confirmar">
</form>
  
<?php
  } // check post
} else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin
?>
  
</body>
</html>