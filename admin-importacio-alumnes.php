<?php
require('inc-header.php');
define('TITLE',"Importació alumnes");
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo TITLE;?></title>
  <meta name="description" content="<?php echo TITLE;?>">
  <meta name="author" content="Andreu Rigo">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <!-- <script src="js/scripts.js"></script> -->
  <h1><?php echo TITLE;?></h1>
<?php

  //require("functions.php");  
  //require("connect.php");
  $data=file("alumnes.csv");
  foreach($data as $line) {
    //echo $line."<br>\n";
    $fields=explode(",",$line);
    $curs=$fields[1];
    $classe=$fields[2];
    //echo "curs:".$curs."<br>\n";
    $cursid=findid($curs,"curs",$dbc);
    $classeid=findid($classe,"classe",$dbc);
    $nom=trim($fields[3]);
    $llinatge1=trim($fields[4]);
    $llinatge2=trim($fields[5]);
    //echo "cursid:".$cursid."<br>\n";
    //echo "classeid:".$classeid."<br>\n";
    // INSERT INTO `alumnes`(`alumneid`, `nom`, `llinatge1`, `llinatge2`, `cursid`, `classeid`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
    $q = "INSERT INTO `alumnes`(`alumneid`, `nom`, `llinatge1`, `llinatge2`, `cursid`, `classeid`) VALUES (NULL,'$nom','$llinatge1','$llinatge2','$cursid','$classeid')";
		$r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      echo "$line instertada a la base de dades<br>";
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
  }

  
?>
</body>
</html>