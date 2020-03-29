<?php
session_start();
define('TITLE',"Inscripció Activitats Extraescolars SJO Primària 19-20");
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
  require("connect.php");
  require("functions.php");

if (!$_SESSION['autenticat']){
  redirect_user("index.php");
}
  
  $cursos=["PRIMER DE PRIMARIA","SEGON DE PRIMARIA","TERCER DE PRIMARIA","QUART DE PRIMARIA","CINQUE DE PRIMARIA","SISE DE PRIMARIA"];;
  $dies=['DILLUNS','DIMARTS','DIMECRES','DIJOUS'];
  $hores=[12,13,14,17];
  $numhores=count($hores);
  ?>
  <table border="1">    
  <?php
  // table headings
  echo "<tr><th></th>";
    foreach ($dies as $dia){
      echo "<th colspan='$numhores'>$dia</th>";
    }
  echo "</tr>\n";
  echo "<tr><th></th>";
    foreach ($dies as $dia) {
    foreach ($hores as $hora){
      echo "<th>$hora</th>";
    }
    }
  echo "</tr>\n";
    // table contents
  foreach($cursos as $curs){
    echo "<tr>";
    echo "<th>";
      $ordinal=explode(" ",$curs);
      echo $ordinal[0];
    echo "</th>";
    foreach($dies as $dia){
      foreach($hores as $hora){
        echo "<td>";
        $ss=getsessions($dia,$hora,$curs,$dbc);
        foreach ($ss as $s){
          //echo "n: ".$s['nom']." i: ".$s['id']."<br>";
          echo "<a href='./extraescolar.php/?id={$s['id']}' title='{$s['nomextesc']}'>".$s['nom']."</a><br />";
        }
        echo "</td>";
      }
    }
    echo "</tr>\n";
  }
  ?>
  </table>

</body>
</html>