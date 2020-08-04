<?php
require('inc-header.php');
define('TITLE',"Descàrrega inscripcions");
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
  //require("functions.php");
if ($_SESSION['administrator']){ // check admin
?>
<!--   <table> -->
<?php  
   if(!file_exists('output/inscripcions.csv')) {
     touch ('output/inscripcions.csv');
     if ($conf['debug']=='on') echo "File did not exist, so it has been created<br>\n";
   } else {
     if ($conf['debug']=='on') echo "File already existed<br>\n";  
   }
  // The first write is without append option in order to delete the file
//  file_put_contents('output/inscripcions.csv',"inscid;nomresp;correuresp;alumneid;exescid;sessionid;data".PHP_EOL,LOCK_EX);
  file_put_contents('output/inscripcions.csv',"Extraescolar;Sessio;Nom;Llinatge1;Llinatge2;Classe".PHP_EOL,LOCK_EX);
  
  $q="SELECT * FROM `inscripcions`";
  $rr = mysqli_query($dbc, $q);
  if ($rr){
  if ($conf['debug']=='on') echo "$q executat amb èxit<br>\n";
  while ($row=mysqli_fetch_array($rr,MYSQLI_BOTH)){
     $line="";
//     $n=count($row);
//     for ($i=0;$i<($n-1);$i++){
//       $line.=$row[$i].";";
//     }
//     $line.=$row[$i].PHP_EOL;
    
 $fullinfo=getfullinfofromids($dbc,$row['sessionid'],$row['extescid'],$row['alumneid']);
 list($sessionname,$extraescolarname,$nomalumne,$llinatge1alumne,$llinatge2alumne,$nomclasse)=$fullinfo;
 $line=$extraescolarname."; ".$sessionname."; ".$nomalumne."; ".$llinatge1alumne."; ".trim($llinatge2alumne)."; ".$nomclasse;

//      // Obtenim el nom de l'extraescolar
//      $r=getfieldfromid($dbc,'extraescolars','extescid',$row['extescid'],'nom');
//      if ($r===FALSE) {
//        die("Error intentant obtenir el nom de l'extraescolar {$row['extescid']}'");
//      } else {
//        $line.=$r.";"; }
//      // Obtenim el nom de la sessió
//      $r=getfieldfromid($dbc,'sessions','sessionid',$row['sessionid'],'nom');
//      if ($r===FALSE) {
//        die("Error intentant obtenir el nom de la sessió {$row['sessionid']}");
//      } else {
//        $line.=$r.";"; }
//      // Obtenim el nom de l'alumne/a
//        $r=getfieldfromid($dbc,'alumnes','alumneid',$row['alumneid'],'nom');
//      if ($r===FALSE) {
//        die("Error intentant obtenir el nom de l'alumne {$row['alumneid']}");
//      } else {
//        $line.=$r.";"; }
//        $r=getfieldfromid($dbc,'alumnes','alumneid',$row['alumneid'],'llinatge1');
//      if ($r===FALSE) {
//        die("Error intentant obtenir el llinatge1 de {$row['alumneid']}");
//      } else {
//        $line.=$r.";"; }
//        $r=getfieldfromid($dbc,'alumnes','alumneid',$row['alumneid'],'llinatge2');
//      if ($r===FALSE) {
//        die("Error intentant obtenir el llinatge2 de  {$row['alumneid']}");
//      } else {
//        $line.=trim($r).";"; }    
//       // Obtenim la classe
//          $r=getfieldfromid($dbc,'alumnes','alumneid',$row['alumneid'],'classeid');
//      if ($r===FALSE) {
//        die("Error intentant obtenir la classe de {$row['alumneid']}");
//      } else {
//        $classeid=$r; }    
    
    
     // Escrivim la línia al fitxer
     $line.=PHP_EOL;
     file_put_contents('output/inscripcions.csv',$line,LOCK_EX | FILE_APPEND);
  }
    
} else {
  if ($conf['debug']=='on') echo $q."<br>\n";
  echo "Error: ".mysqli_error($dbc)."<br>\n";
}
?>
<a href="output/inscripcions.csv">Descarrega fitxer</a>
<!--   </table> -->
  
<?php  
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