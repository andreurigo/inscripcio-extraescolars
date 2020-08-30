<?php
require('inc-header.php');
define('TITLE',"Esborrat inscripcions");

require('inc-html-head.php');
htmltitle(TITLE);
  //require("functions.php");
if ($_SESSION['responsable']||$_SESSION['admin']){ // check responsable
  if($_SERVER['REQUEST_METHOD']=='POST'){  // check post
    if($_POST["confirmid"]=="x1123y"){
      $q="SELECT * FROM `inscripcions` WHERE `inscid`={$_POST['inscid']}";
      $rr = mysqli_query($dbc, $q);
      if ($rr){
      if ($conf['debug']=='on') echo "$q executat amb èxit<br>\n";
        if(mysqli_num_rows($rr)==0) {
          echo "<p class='error'>No hi ha cap inscripció amb id={$_POST['inscid']}</p>";
        } else { //mysqli_num_rows($rr)==0
          //echo "<p>Estau a punt d'esborrar la inscripció #{$_POST['inscid']}</p>";
            $row=mysqli_fetch_array($rr,MYSQLI_BOTH);
            $fullinfo=getfullinfofromids($dbc,$row['sessionid'],$row['extescid'],$row['alumneid']);
            list($sessionname,$extraescolarname,$nomalumne,$llinatge1alumne,$llinatge2alumne,$nomclasse)=$fullinfo;
            $hores=gethoursbysession($row['sessionid'],$dbc,1);
            $nomcompletalumne=$nomalumne." ".$llinatge1alumne." ".trim($llinatge2alumne);
            $message = <<<MSG1
            <p>Estau a punt d'esborrar la inscripció #{$_POST['inscid']}<br/>
            que correspon a l'alumne/a $nomcompletalumne<br/>
            de $nomclasse<br/>
            a l'extraescolar $extraescolarname<br/>
            a la sessió $sessionname <br/>
MSG1;
                $n=count($hores);
                $message .= "(";
                for ($i=0;$i<($n-1);$i++) {
                  $message .= "{$hores[$i]['dia']}-{$hores[$i]['hora']}, ";
                }
                $message .= "{$hores[$i]['dia']}-{$hores[$i]['hora']})<br/>\n";
                $message .= <<<MSG2
            La persona que ha fet la inscripció és {$row['nomresp']}<br/>
            amb correu {$row['correuresp']}</p>
MSG2;
          echo $message;
          echo "<p>Espitjau confirmar per a continuar</p>";
          echo "<form action='' method='POST'>";
          echo "<input type='hidden' name='confirmid' value='x1123y2nd'>";
          echo "<input type='hidden' name='inscid' value='{$_POST['inscid']}'>";
          htmlbuttonsubmit('Confirmar');
          echo "</form>";
        } //else mysqli_num_rows($rr)==0
      } else { //$rr
        if ($conf['debug']=='on') echo $q."<br>\n";
        echo "Error: ".mysqli_error($dbc)."<br>\n";
      } //else $rr
    } elseif($_POST["confirmid"]=="x1123y2nd") { //check $_POST["confirmid"]
      //DELETE FROM `inscripcions` WHERE `inscid`=35 LIMIT 1
      $q="DELETE FROM `inscripcions` WHERE `inscid`={$_POST['inscid']} LIMIT 1";
      $rr=executequery($dbc,$q);
      if ($rr) {
        echo "<p>Inscripció #{$_POST['inscid']} esborrada</p>";
      } else {
        echo "<p>Hi ha hagut un problema esborrant la inscripció #{$_POST['inscid']}</p>";
      }
    } //elseif($_POST["confirmid"]=="x1123y2nd")
    //echo "<a href='taula.php'>Següent</a>";
  } else { // check post
  
?>

<p>
Consultau al llistat d'inscripcions l'identificador de la inscripció que volgueu esborrar i escriviu-lo a continuació.
</p>


<form action="" method="POST">
  <input type="hidden" name='confirmid' value='x1123y'>
<!--   <input type="submit" value="Confirmar"> -->
<?php 
  htmlinputtext('inscid','Introduiu un nombre d\'inscripció vàlid','Id de l\'inscripció a esborrar','Escriviu aquí l\'id');
  htmlbuttonsubmit("Confirmar"); 
  ?>
</form>
<?php
  } // check post
        //Mogut al footer
        //htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
} else { //check admin
?>
  <p class="error">
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check responsable

require('inc-html-foot.php');
?>
  
