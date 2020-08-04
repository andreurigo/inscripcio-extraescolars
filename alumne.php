<?php
require('inc-header.php');
define('TITLE',"Selecció alumne/a");

function studentsfromcursid($cursid,$llinatge1,$dbc) {
  //Imprimeix files de la taula corresponents als estudiants que poden escollir la materia
  //SELECT a.nom,a.llinatge1,a.llinatge2,cl.nom,a.alumneid FROM alumnes as a INNER JOIN curs AS cu USING (cursid) INNER JOIN classe as cl USING (classeid) WHERE a.llinatge1='MOLINA' AND cu.cursid=2 
$q="SELECT a.nom,a.llinatge1,a.llinatge2,cl.nom,a.alumneid FROM alumnes as a INNER JOIN curs AS cu USING (cursid) INNER JOIN classe as cl USING (classeid) WHERE a.llinatge1='$llinatge1' AND cu.cursid=$cursid";
  //echo $q."<br />";
    $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
        if (mysqli_num_rows($r)==0) {
          return FALSE;
        } else {
          while($row=mysqli_fetch_array($r,MYSQLI_NUM)){
              echo "<tr>";
              echo "<td>";
              $alumneid=$row[4];
              echo "<input type='radio' name='alumneid' value='$alumneid'>";
              echo "</td>";
              echo "<td>";
              $nom = $row[0];
              $llinatge1 = $row[1];
              $llinatge2 = $row[2];
              echo "$nom $llinatge1 $llinatge2";
              echo "</td>";
              echo "<td>";
              $classe = $row[3];
              echo "$classe";
              echo "</td>";      
              echo "</tr>\n";
            }
            return TRUE;
        }
    } else {
    echo "Error: ".mysqli_error($dbc);
    } 
}

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
  
  function printform(){
  ?>
  <form method="POST" action="">
  <p>
    Introdueixi el llinatge amb majúscules i sense accents.
    </p>
  <label>1r Llinatge: <input type="text" name="llinatge1"></label><br />
  <input type="submit">
</form>
  <?php
}
  
  //require("connect.php");
  //require("functions.php");
//   $s=print_r($_SESSION,TRUE);
//   echo nl2br($s);
    
if ($_SERVER['REQUEST_METHOD']=='POST'){

$llinatge1 = clearstring($_POST['llinatge1']);
  if ($conf['debug']=='on') echo "llinatge1: $llinatge1<br>\n";

  //Muntam el formulari per triar entre tots els alumnes dels cursos on s'oferta l'extraescolar
  echo "<form action='confirma.php' method='GET'>";
  echo "<table border=1>\n";  
  
  $notfound=TRUE;
// Obtenim la llista d'alumnes amb aquest llinatge per al curs primàri
  if(studentsfromcursid($_SESSION['cursid'],$llinatge1,$dbc)) $notfound=FALSE;
  

    //Obtenim la llista d'alumnes amb aquest llinatge per als cursos secundaris
    $cursossecundaris=$_SESSION['altrescursosid'];
    foreach ($cursossecundaris as $curssecundariid) {
      if(studentsfromcursid($curssecundariid,$llinatge1,$dbc)) $notfound=FALSE;
    }  
      
    //Tancam la taula i el formulari  
      echo "</table>\n";
        echo "<input type='submit'>";
        echo "</form>";
//      } //else

  if ($notfound) {
?>
  <form action="./incidencia-alumne.php" method="GET">
    <p>No s'ha trobat cap alumne dels següents cursos amb aquest primer llinatge.</p>
    <ul>    
<?php
    $arraynomcursos=[];
    $nomcurs=getfieldfromid($dbc,'curs','cursid',$_SESSION['cursid'],'nom');
    echo "<li>$nomcurs</li>\n";
    $arraynomcursos[]=$nomcurs;
    $cursossecundaris=$_SESSION['altrescursosid'];
    foreach ($cursossecundaris as $curssecundariid) {
      $nomcurs=getfieldfromid($dbc,'curs','cursid',$curssecundariid,'nom');
      echo "<li>$nomcurs</li>\n";
      $arraynomcursos[]=$nomcurs;
    }
    $_SESSION['arraynomcursos']=$arraynomcursos;
    $_SESSION['llinatge1']=$llinatge1;
?>
    </ul>
    <p>Si creu que es tracta d'un error, pot reportar una incidència tot fent servir el botó d'abaix.</p>
    <input type="submit" value="Reportar incidència">
  </form>
  
    <a href="./taula.php">&lt;&lt; Tornar a la selecció d'extraescolars</a>
  
<?php    
      
  }
  
} else {
  
printform();
  
}
?>
  
</body>
</html>