<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Importació classes</title>
  <meta name="description" content="Importació classes">
  <meta name="author" content="Andreu Rigo">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <!-- <script src="js/scripts.js"></script> -->
  <h1>Importació classes</h1>
<?php
   $cursos=["PRIMER DE PRIMARIA","SEGON DE PRIMARIA","TERCER DE PRIMARIA","QUART DE PRIMARIA","CINQUE DE PRIMARIA","SISE DE PRIMARIA"];
  require("connect.php");
// INSERT INTO `curs`(`cursid`, `nom`) VALUES (NULL,"test")
  foreach ($cursos as $curs){
  $q = "INSERT INTO `curs`(`cursid`, `nom`) VALUES (NULL,\"$curs\")";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r){
      echo "$curs instertat a la base de dades<br>";
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
  }
  
?>
</body>
</html>