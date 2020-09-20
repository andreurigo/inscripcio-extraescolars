<?php
// Al hosting windows no funciona (de moment) l'escriptura de fitxers
// Per asegurar una sortida, faig aquesta versió que el treu per pantalla
// i permetrà descarregar-lo amb botó dret

require('inc-header.php');
$title="Descàrrega llistat inscripcions";
define('TITLE',$title);

//require('inc-html-head.php');
//htmltitle(TITLE);

  //require("functions.php");
if ($_SESSION['responsable']||$_SESSION['administrator']){ // check admin

  
//    if(!file_exists('output/inscripcions.csv')) {
//      touch ('output/inscripcions.csv');
//      if ($conf['debug']=='on') echo "File did not exist, so it has been created<br>\n";
//    } else {
//      if ($conf['debug']=='on') echo "File already existed<br>\n";  
//    }
  // The first write is without append option in order to delete the file
//  file_put_contents('output/inscripcions.csv',"inscid;nomresp;correuresp;alumneid;exescid;sessionid;data".PHP_EOL,LOCK_EX);
  //file_put_contents('output/inscripcions.csv',"Id;Extraescolar;Sessio;Nom;Llinatge1;Llinatge2;Classe;Nom responsable;Correu Responsable;Data inscripcio".PHP_EOL,LOCK_EX);
  echo "<table border=\"1\" style=\"border-collapse:collapse\">\n";
  echo "<tr><th>Id</th><th>Extraescolar</th><th>Sessio</th><th>Nom</th><th>Llinatge1</th><th>Llinatge2</th><th>Classe<th>Nom responsable</th><th>Correu Responsable</th><th>Data inscripcio</th></tr>\n";
  
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
 //Línea de dades
 $line="<tr><td>".$row['inscid']."</td><td>".$extraescolarname."</td><td>".$sessionname."</td><td>".$nomalumne."</td><td>".$llinatge1alumne."</td><td>".trim($llinatge2alumne)."</td><td>".$nomclasse."</td><td>".$row['nomresp']."</td><td>".$row['correuresp']."</td><td>".$row['data']."</td></tr>\n";

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
    echo $line;
     //file_put_contents('output/inscripcions.csv',$line,LOCK_EX | FILE_APPEND);
  }
    echo "</table>";
    
} else {
  if ($conf['debug']=='on') echo $q."<br>\n";
  echo "Error: ".mysqli_error($dbc)."<br>\n";
}
?>
<?php
  //htmlbuttontlink("Descarrega fitxer","output/inscripcions.csv");
} else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin

// El botó de tornar al menú s'ha de veure en tot moment
// Mogut a inc-html-foot.php
//htmlbuttonleftlink("Tornar al menú","validaciocodi.php"); 
  
require('inc-html-foot.php');
?>