<?php
session_start();
define('TITLE',"Confirmació extraescolar");
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
//echo $_SESSION['codi'];
if (!$_SESSION['autenticat']){
  redirect_user("index.php");
}
if (!isset($_GET['id'])){
  //echo "get no definit";
  redirect_user("taula.php");  
}
    $_SESSION['sessionid']=$_GET['id'];
    //Informació de la sessio. $nomsessio, $extescid, $places
    $q="SELECT `nom`,`extescid`,`places` FROM `sessions` WHERE `sessionid`={$_GET['id']}";
    $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      if (mysqli_num_rows($r)==1){
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        //echo $row['nom']." ".$row['extescid']." ".$row['places'];
        $nomsessio = $row['nom'];
        $extescid = $row['extescid'];
        $_SESSION['extescid']=$extescid;
        $places = $row['places'];
      } else {
        echo "Error no s'ha trobat la sessió";
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($dbc);
    }
    //Informació de les hores. $hores[]['dia'], $hores[]['hora']
    $q="SELECT `dia`,`hora` FROM `hores` WHERE `sessionid`={$_GET['id']}";
    $r = mysqli_query($dbc, $q); // Run the query.
    $i=0;
		if ($r){
      while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
        $hores[$i]['dia']=$row['dia'];
        $hores[$i]['hora']=$row['hora'];
        $i++;
      }
      //print_r($hores);
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
    //Informació de l'extraescolar. $nomextesc, $nomcurs
    //SELECT e.nom,c.nom from extraescolars as e INNER JOIN curs as c USING (cursid) WHERE e.extescid=2
        $q="SELECT e.nom,c.nom,c.cursid from extraescolars as e INNER JOIN curs as c USING (cursid) WHERE e.extescid=$extescid";
    $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      if (mysqli_num_rows($r)==1){
      $row=mysqli_fetch_array($r,MYSQLI_NUM);
        //echo $row[0]." ".$row[1];
        $nomextesc = $row[0];
        $nomcurs = $row[1];
        $cursid = $row[2];
        $_SESSION['cursid']=$cursid;
      } else {
        echo "Error no s'ha trobat l'extraescolar";
      }
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
    //Presentació i enllaços
    
    //Places ocupades
    //SELECT COUNT(`inscid`) FROM `inscripcions` WHERE sessionid=7
    $q="SELECT COUNT(`inscid`) FROM `inscripcions` WHERE sessionid={$_SESSION['sessionid']}";
        $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      $row=mysqli_fetch_array($r,MYSQLI_NUM);
      $ocupades=$row[0];
    }else {
      echo "Error: ".mysqli_error($dbc);
      }

    
    echo "<h2>$nomextesc</h2>\n";
    echo "<p>Sessió: $nomsessio</p>";
    echo "<p>Curs: $nomcurs</p>";
    echo "<p>Núm places: $places - $ocupades</p>";
    echo "<p>Hora:</p>";
    foreach ($hores as $hora){
      echo "<p>{$hora['dia']} - {$hora['hora']}</p>";
    }
?>    

  <a href="../taula.php">&lt;&lt; Tornar a la selecció d'extraescolars</a>
  <a href="../alumne.php">Anar a la selecció de l'alumne/a &gt;&gt;</a>
  
</body>
</html>