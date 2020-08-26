<?php
require('inc-header.php');
define('TITLE',"Incidència Alumnat");

require('inc-html-head.php');
htmltitle(TITLE);
    
function infoincidencia(){
  $string = "<p>Nom de l'usuari: {$_SESSION['nom']}</p>\n";
  $string .= "<p>Correu de l'usuari: {$_SESSION['correu']}</p>\n";
  $string .= "<p>Llinatge cercat de l'alumne/a: {$_SESSION['llinatge1']}</p>\n";
  $string .= "<p>Cursos on no s'ha trobat l'alumne:</p>\n<ul>\n";
  $arraycursos=$_SESSION['arraynomcursos'];
  foreach ($arraycursos as $nomcurs) {
    $string .= "<li>$nomcurs</li>\n";
  }  
  $string .= "</ul>\n";
  return $string;
}

if ($_SERVER['REQUEST_METHOD']=="POST"){
  // Enviam el correu de la incidència
  $to = $_SESSION['correu'];
  $subject="{$conf['nomcentre']}-Alumne no trobat-{$conf['tiquetcount']}";
  $newtiquetnumber=$conf['tiquetcount']+1;
  // UPDATE `configuracio` SET `valor`='999' where `clau`='tiquetcount'
  $q="UPDATE `configuracio` SET `valor`='$newtiquetnumber' where `clau`='tiquetcount'";
  $r=executequery($dbc,$q);
  if (!$r) echo "ERROR executing $q<br>\n";
  $message="<html><head><title>$subject</title></head><body>";
  $message.=infoincidencia();
  $message.="Nom alumne/a: ".strip_tags($_POST['nomalumne'])."<br>\n";
  $message.="Curs alumne/a: ".strip_tags($_POST['cursalumne'])."<br>\n";
  $message.="Observacions<br>\n".strip_tags($_POST['observacions']);
  $message.="</body></html>";
  $bodytext=strip_tags($message);
  $nameto=$_SERVER['nom'];
//   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
//   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//   $cabeceras .= 'Bcc: extraescolars@sjo.es' . "\r\n";
//  $r=mail($to, $subject, $message, $cabeceras);
  $rr=sendmailsmtp($to,$nameto,$subject,$message,$bodytext,"extraescolars@sjo.es");
  if ($rr) {
    echo "Incidència creada<br>\n";
  } else {
    echo "Hi ha hagut un problema tot enviant el correu de la incidència.<br>\n";
  }
} else {
    
?>

<p>Està a punt de reportar una incidència amb les següents dades:</p>
<?php echo infoincidencia(); ?>

<p>Ompli la informació que falta i enviï la incidència:</p>  
<form action="" method="POST">
<!--   <p>
  <label for="form-nomalumne">Nom sencer de l'alumne/a</label>
  <input type="text" name="nomalumne" id="form-nomalumne" >
  </p> -->
    <?php htmlinputtext('nomalumne',"Introdueixi el nom sencer de l'alumne/a","Nom sencer de l'alumne/a",'Escrigui aquí el nom');?>
<!--   <p>
  <label for="form-cursalumne">Curs que fa l'alumne</label>
  <input type="text" name="cursalumne" id="form-cursalumne" >
  </p> -->
    <?php htmlinputtext('cursalumne',"Introdueixi el curs de l'alumne/a","Curs de l'alumne/a",'Escrigui aquí el curs');?>
<!--   <p>
    <label for="form-observacions">Altres observacions</label><br>
    <textarea name="observacions" id="form-observacions" ></textarea>
  </p> -->
   <?php htmltextarea("observacions","","Altres observacions","Altre informació rellevant") ?>
  
<!--   <input type="submit" value="enviar"> -->
    <?php htmlbuttonsubmit('Enviar'); ?>
</form>

<?php
}
  htmlbuttonleftlink("Tornar a la selecció d'extraescolars","taula.php");
require('inc-html-foot.php');
?>
