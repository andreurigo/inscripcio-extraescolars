<?php
require('inc-header.php');
define('TITLE',"Confirmació Inscripció");

require('inc-html-head.php');
htmltitle(TITLE);

  if (!$_SESSION['autenticat']){
  redirect_user("index.php");
}
if (!isset($_GET['alumneid'])){
  //echo "get no definit";
  redirect_user("alumne.php");  
}

  if ($conf['debug']=='on') {
    $s=print_r($_SESSION,TRUE);
    echo nl2br($s);    
  }
  
  //require("connect.php");
  //require("functions.php");

    
if ($_SERVER['REQUEST_METHOD']=='POST'){
if (!$_SESSION['prevent2inscription']) {
    $timeshift=$conf['correcciohoraservidor']/3600; //passam de segons a hores
    if ($conf['debug']=='on') echo "timeshift: $timeshift<br />\n";
    $q="INSERT INTO `inscripcions`(`inscid`, `nomresp`, `correuresp`, `alumneid`, `extescid`, `sessionid`, `data`) VALUES (NULL,'{$_SESSION['nom']}','{$_SESSION['correu']}',{$_SESSION['alumneid']},{$_SESSION['extescid']},{$_SESSION['sessionid']},DATE_ADD(NOW(), INTERVAL $timeshift HOUR))";
      if ($conf['debug']=='on') echo $q."<br />";
        $r = mysqli_query($dbc, $q); // Run the query.
        if ($r){
            echo "<strong>Inscripció feta correctament</strong><br />";
            $_SESSION['prevent2inscription']=TRUE;
            //echo "Rebrà un correu de confirmació <br />";
            //Envia correu de confirmació
            $to = $_SESSION['correu'];
            $subject="Inscripció #".mysqli_insert_id($dbc)." Extraescolars {$conf['nomcentre']}"; //mysqli_insert_id($dbc) Torna l'id de l'insert que s'acaba de fer
               $_SESSION['alumneid']=$_GET['alumneid'];
               $nomresp=$_SESSION['nom'];
               $correuresp=$_SESSION['correu'];
               $alumneid=$_SESSION['alumneid'];
               $extescid=$_SESSION['extescid'];
               $sessionid=$_SESSION['sessionid'];
               $fullinfo=getfullinfofromids($dbc,$sessionid,$extescid,$alumneid);
               $hores=gethoursbysession($sessionid,$dbc,1);
               list($sessionname,$extraescolarname,$nomalumne,$llinatge1alumne,$llinatge2alumne,$nomclasse)=$fullinfo;
               if ($conf['debug']=='on') print_r($fullinfo);
               if ($conf['debug']=='on') echo "<br>\n";
                $nomcompletalumne=$nomalumne." ".$llinatge1alumne." ".$llinatge2alumne;
                $cabeceras = "";
    //             $cabeceras  .= 'MIME-Version: 1.0' . "\r\n";
    //             $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
               $message = <<<MSG1
    Heu inscrit a l'alumne/a $nomcompletalumne
    de $nomclasse
    a l'extraescolar $extraescolarname
    a la sessió $sessionname 
MSG1;
                $n=count($hores);
                $message .= "(";
                for ($i=0;$i<($n-1);$i++) {
                  $message .= "{$hores[$i]['dia']}-{$hores[$i]['hora']}, ";
                }
                $message .= "{$hores[$i]['dia']}-{$hores[$i]['hora']})\n";
                $message .= <<<MSG2
    La persona que ha fet la inscripció és $nomresp
    amb correu $correuresp
MSG2;
              echo $subject."<br />";
              echo nl2br($message);
              echo "<br />";
              $rr=mail($to, $subject, $message, $cabeceras);
              if ($rr) {
        echo "<strong>S'ha enviat un correu de confirmació que pot tardar uns minuts a arribar.</strong><br>\n";
      } else {
        echo "<strong>Hi ha hagut un problema tot enviant el correu de confirmació de la inscripció. Es recomana que faci una captura de pantalla</strong>";
      }
        } else {
          echo "Error: ".mysqli_error($dbc);
        }
          //echo "<a href=\"./taula.php\">&lt;&lt; Tornar a la selecció d'extraescolars</a>";
} else {  //if (!$_SESSION['prevent2inscription'])
  echo "<h2>Ja heu fet la inscripció. Per favor no recarregueu la pàgina.</h2>";
}
  htmlbuttonleftlink("Tornar a la selecció d'extraescolars","taula.php");
  htmlbuttonrightlink("Finalitzar","logout.php");
} else { //if ($_SERVER['REQUEST_METHOD']=='POST')

 echo "<h2>Dades inscripció</h2>";
 $_SESSION['alumneid']=$_GET['alumneid'];
 $nomresp=$_SESSION['nom'];
 $correuresp=$_SESSION['correu'];
 $alumneid=$_SESSION['alumneid'];
 $extescid=$_SESSION['extescid'];
 $sessionid=$_SESSION['sessionid'];

 $fullinfo=getfullinfofromids($dbc,$sessionid,$extescid,$alumneid);
 list($sessionname,$extraescolarname,$nomalumne,$llinatge1alumne,$llinatge2alumne,$nomclasse)=$fullinfo;
 if ($conf['debug']=='on') print_r($fullinfo);
 if ($conf['debug']=='on') echo "<br>\n";
  $nomcompletalumne=$nomalumne." ".$llinatge1alumne." ".$llinatge2alumne;


// AIXÒ JA ESTAVA FET A FUNCTIONS I HO VAIG TORNAR A FER...  
  // Per obtenir les hores s'ha de fer d'una altra manera
//   $hores=[];
//   $q="SELECT * FROM `hores` WHERE `sessionid`=$sessionid";
//   $r = mysqli_query($dbc, $q);
//     if ($r){
//       if ($conf['debug']=='on') echo "$q executat amb èxit<br>\n";
//       while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
//         $hores[]=['dia'=>$row[2],'hora'=>$row[3]];
//       }
//     } else {
//       if ($conf['debug']=='on') echo $q."<br>\n";
//       echo "Error: ".mysqli_error($dbc)."<br>\n";
//     }
//     if ($conf['debug']=='on') print_r($hores);

$hores=gethoursbysession($sessionid,$dbc,1);  

 
// Comprovam que l'alumne no tingui una altra extraescolar a la mateixa hora
if ($conf['debug']=='on') echo "Comprovam que l'alumne no tingui una altra extraescolar a la mateixa hora<br>\n";
$sessionids=getinscriptionsfromstudent($dbc,$alumneid);
if (empty($sessionids)) { //Si l'array torna buit està clar que no coincideix
  $flagcoincidencia=FALSE;
  if ($conf['debug']=='on') echo "L'array d'altres sessions ha tornat buit<br>\n";
} else { //Si l'array no està buit hem de determinar si coincideix o no
  $flagcoincidencia=FALSE; //Suposam d'entrada que no coincideix
  foreach ($sessionids as $sessid) {
    $horessessio=gethoursbysession($sessid,$dbc,1);
    foreach ($horessessio as $hs) { //Les hores d'inscripcions previes
      foreach ($hores as $h) {//Les hores de la inscripció actual
        if ($conf['debug']=='on') echo "Previa:{$hs['dia']}-{$hs['hora']} Actual:{$h['dia']}-{$h['hora']} <br>\n";
        if ($hs['dia']==$h['dia'] && $hs['hora']==$h['hora']) $flagcoincidencia=TRUE;
      }
    }
  }
}

if (!$flagcoincidencia) { 
 // heredoc syntax
 echo <<<HEREDOC
   <p>Estau a punt d'inscriure a l'alumne/a</br>\n
   <strong>$nomcompletalumne</strong> de <strong>$nomclasse</strong></br>\n
   a la sessió <strong>$sessionname</strong> 
HEREDOC;
   
  $n=count($hores);
  echo "(";
  for ($i=0;$i<($n-1);$i++) {
    echo "<strong>{$hores[$i]['dia']}</strong>-<strong>{$hores[$i]['hora']}</strong>, ";
  }
  echo "<strong>{$hores[$i]['dia']}</strong>-<strong>{$hores[$i]['hora']}</strong>)</br>\n";
    
 echo <<<HEREDOC2
   de l'extraescolar <strong>$extraescolarname</strong></br>\n
   La persona que fa la inscripció és <strong>$nomresp</strong></br>\n
   amb correu <strong>$correuresp</strong></br>\n
   </p>
   <p>
   Si estau d'acord, feis clic al botó 'confirmar'.
   </p>
   <p>Si no, tornau a la selecció d'extraescolars</p>
HEREDOC2;
  

 
 echo "<form action='' method='POST'>";
 //echo "<input type='submit' value='Confirmar'>";
 htmlbuttonsubmit("Confirmar");
 echo "</form>";
} else { //if (!$flagcoincidencia) {
 echo "No pot inscriure aquest alumne a aquesta sessió perquè li coincideixen les hores amb inscripcions previes<br>\n";
 //echo "<a href=\"./taula.php\">&lt;&lt; Tornar a la selecció d'extraescolars</a>";
}
  htmlbuttonleftlink("Tornar a la selecció d'extraescolars","taula.php");
  
}

require('inc-html-foot.php');
?>
