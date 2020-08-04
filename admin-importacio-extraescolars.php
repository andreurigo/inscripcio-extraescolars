<?php
require('inc-header.php');
define('TITLE',"Importació Extraescolars");
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
  if ($_SESSION['administrator']){ // check admin
    $data=file("extraescolars.csv");
    $linecount=1;
    foreach($data as $line) {
      if ($linecount!=1) { // skip first line
        $inserthourflag=TRUE; //En general volem inserir les hores
        if ($conf['debug']=='on') echo $line."<br>\n";
        $fields=explode(",",$line);
        // CURS
        $curs=trim($fields[0]);
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;curs:".$curs;
        $cursid=findid($curs,"curs",$dbc);
        if ($conf['debug']=='on') echo " cursid:".$cursid."<br>\n";
        // EXTRAESCOLAR
        $extraescolar=trim($fields[1]);
        $extraescolarid=findid($extraescolar,"extraescolars",$dbc,"extescid");
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;extraescolar:".$extraescolar." extraescolarid:".$extraescolarid."<br>\n";
        // Extraescolar: Si existeix, hem de comprovar si és que s'ofereix a un curs diferent per afegir una entrada a la taula 'altres-cursos-extraescolar'
        // SELECT `cursid` FROM `extraescolars` WHERE `extescid`='48'
        $q="SELECT `cursid` FROM `extraescolars` WHERE `extescid`='".$extraescolarid."'";
        $r = mysqli_query($dbc, $q);
          if ($r){
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;$q executat amb èxit<br>\n";
              while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
                 $curstemporalid=$row[0];
                 if ($curstemporalid!=$cursid) { //Només si el curs no coincideix s'ha d'afegir com a curs secundari
                    //INSERT INTO `altres-cursos-extraescolar` (`altcurext`, `extescid`, `cursid`) VALUES (NULL, '48', '4');
                    $camps=['extescid', 'cursid'];
                    $valors=[$extraescolarid,$cursid];
                    $rr=insertitem($dbc,"altres-cursos-extraescolar",$camps,$valors);
                    if ($conf['debug']=='on') echo "&nbsp;&nbsp;Afegit curs extra a $extraescolar<br>\n";
                    $inserthourflag=FALSE; //En aquest cas les hores ja s'han inserit abans
                 }
              }
          } else {
            if (DEBUG) echo $q."<br>\n";
            echo "Error: ".mysqli_error($dbc)."<br>\n";
          }
        // extraescolar: Si no existia es crea
        if ($extraescolarid==0){
          $camps=["nom","cursid"]; //extescid es crea tot sol
          $valors=[$extraescolar,$cursid]; // Si l'extraescolar no existia el primer curs és el principal
          $r=insertitem($dbc,"extraescolars",$camps,$valors);
          if ($r) {
            //Si ha anat bé agafam l'id
            $extraescolarid=findid($extraescolar,"extraescolars",$dbc,"extescid");
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;extraescolar:".$extraescolar." extraescolarid:".$extraescolarid."<br>\n";
          } else {
            //Si no ha anat bé, no té sentit seguir
            die("No s'ha pogut insertar l'extraescolar de la línea: $line");
          }
        }
        // SESSIO
        $sessio=trim($fields[2]);
        $places=trim($fields[3]);
        $nombrehores=$fields[4];
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;curs:".$sessio;
        $sessioid=findid($sessio,"sessions",$dbc,"sessionid");
        if ($conf['debug']=='on') echo " sessioid:".$sessioid."<br>\n";
        // sessio: Si no existia es crea
        if ($sessioid==0){
          $camps=['nom','extescid','places','nombrehores'];
          $valors=[$sessio,$extraescolarid,$places,$nombrehores];
          $r=insertitem($dbc,"sessions",$camps,$valors);
          if ($r) {
            //Si ha anat bé agafam l'id
            $sessioid=findid($sessio,"sessions",$dbc,"sessionid");
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;sessioid:".$sessioid."<br>\n";
          } else {
            //Si no ha anat bé, no té sentit seguir
            die("No s'ha pogut insertar la sessió de la línea: $line");
          }
        }
        // HORA
        // L'entrada a la taula hores només no pot existir previament si és una extraescolar que s'ofereix a més d'un curs. Això es controla amb el flag $inserthourflag
        if($inserthourflag) {
            $dia=trim($fields[5]);
            $hora=trim($fields[6]);
            $camps=['sessionid','dia','hora'];
            $valors=[$sessioid,$dia,$hora];
            $r=insertitem($dbc,"hores",$camps,$valors);
            if ($r){
              if ($conf['debug']=='on') echo "&nbsp;&nbsp;".$line." processada ok<br>\n";
            } else {
              die("No s'ha pogut processar l'hora de la línea $line");
            }
        }
        //exit (); //process only first register in order to test
      } // skip first line
      $linecount++;
    }

  } else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
  } // check admin 
?>
</body>
</html>