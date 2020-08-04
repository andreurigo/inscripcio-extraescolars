<?php
require('inc-header.php');
define('TITLE',"Estat procés d'inscripció");



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
  <p>
    
  <?php

  
  //require("connect.php");
  //require("functions.php");


  
        if ($_SESSION['activat']) {
        echo "El procés d'inscripció està actualment obert";
      } else {
        echo "La inscripció s'activarà a les $hour:$minute el $day del $month de $year";
      }
  

?>
  </p>
</body>
</html>