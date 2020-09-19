<?php session_start(); ?>
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
  <h1>Importació cursos</h1>
<?php
if ($_SESSION['administrator']){ // check admin
   //$cursos=["PRIMER DE PRIMARIA","SEGON DE PRIMARIA","TERCER DE PRIMARIA","QUART DE PRIMARIA","CINQUE DE PRIMARIA","SISE DE PRIMARIA"];
  $cursos=["4T EI - A", "4T EI - B", "4T EI - C", "4T EI - D", "5E EI - A", "5E EI - B", "5E EI - C", "5E EI - D", "6E EI - A", "6E EI - B", "6E EI - C", "6E EI - D", "1R EP - A", "1R EP - B", "1R EP - C", "1R EP - D", "2N EP - A", "2N EP - B", "2N EP - C", "2N EP - D", "3R EP - A", "3R EP - B", "3R EP - C", "3R EP - D", "4T EP - A", "4T EP - B", "4T EP - C", "4T EP - D", "5E EP - A", "5E EP - B", "5E EP - C", "5E EP - D", "6E EP - A", "6E EP - B", "6E EP - C", "6E EP - D"];
  require("../connect.php");
// INSERT INTO `curs`(`cursid`, `nom`) VALUES (NULL,"test")
  $ordre=10;
  foreach ($cursos as $curs){
  $q = "INSERT INTO `curs`(`cursid`, `nom`, `ordre`) VALUES (NULL,\"$curs\",$ordre)";
    //echo $q."<br />\n";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r){
      echo "$curs instertat a la base de dades<br>";
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
    $ordre += 10;
  }

} else { //check admin
?>
  <p class="error">
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin
  
?>
</body>
</html>