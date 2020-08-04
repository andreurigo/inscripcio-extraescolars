<?php
session_start();
require("functions.php");
// Llegeix conf
$conf=array();
require('connect.php');
    $q="SELECT * FROM configuracio";
    $r = mysqli_query($dbc, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r){
     while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $conf[$row[0]]=$row[1];
      }
    } else {
      echo "Error: ".mysqli_error($con);
    }
// Check whether the application is active
list($year,$month,$day,$hour,$minute)=explode("-",$conf['activacio']);
if ($conf['debug']=='on') echo "year: $year month: $month day: $day hour: $hour minute: $minute <br />\n";
if ($conf['debug']=='on') echo "time: ".time()."<br />\n"; //Actual
if ($conf['debug']=='on') echo "activacio: ".mktime($hour,$minute,0,$month,$day,$year)."<br />\n"; //Activació de la configuració
if (time()>mktime($hour,$minute,0,$month,$day,$year)) {
  $_SESSION['activat']=TRUE;
} else {
  $_SESSION['activat']=FALSE;
}
// Prints de debug
if ($conf['debug']=='on') echo '$conf<br>'.nl2br(print_r($conf,TRUE))."<br>";
//if ($conf['debug']=='on') echo "<br>";
//if ($conf['debug']=='on'&& isset($_SESSION)) print_r($_SESSION);
if ($conf['debug']=='on'&& isset($_SESSION)) echo '$_SESSION<br>'.nl2br(print_r($_SESSION,TRUE))."<br>";
$title="Inscripció Activitats Extraescolars {$conf['nomcentre']} {$conf['cursactual']}";
// Per protecció de dades, esborram el fitxer d'exportació si existeix
if(file_exists('output/inscripcions.csv')) {
 unlink ('output/inscripcions.csv');
}
// Si l'aplicació no està activada redirigim a una altra pàgina (amb l'excepció de la de login i confirmació)
$filepatharray = explode("/",$_SERVER['PHP_SELF']);
$filename=$filepatharray[(count($filepatharray)-1)];
if ($conf['debug']=='on') echo "filename $filename<br />\n";
if ($filename!="index.php" && $filename!="validaciocodi.php" && $filename!="no-activat.php") {
  if (!$_SESSION['activat'] && 
      $_SESSION['correu']!=$conf['correuadmin'] && 
      $_SESSION['correu']!=$conf['correucontacte']) {
        redirect_user('no-activat.php');
  }
}
?>