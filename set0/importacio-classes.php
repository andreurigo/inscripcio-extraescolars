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
  if ($_SESSION['administrator']){ // check admin
  //$classes=["1R EP - A","1R EP - B","1R EP - C","2N EP - A","2N EP - B","2N EP - C","3R EP - A","3R EP - B","3R EP - C","4T EP - A","4T EP - B","4T EP - C","5E EP - A","5E EP - B","5E EP - C","6E EP - A","6E EP - B","6E EP - C"];
  $classes=["4T EI - A","4T EI - B","4T EI - C","5E EI - A","5E EI - B","5E EI - C","6E EI - A","6E EI - B","6E EI - C"];
  require("../connect.php");
// INSERT INTO `classe`(`nom`) VALUES ("test")
  foreach ($classes as $classe){
  $q = "INSERT INTO `classe`(`nom`) VALUES (\"$classe\")";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r){
      echo "$classe instertada a la base de dades<br>";
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
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