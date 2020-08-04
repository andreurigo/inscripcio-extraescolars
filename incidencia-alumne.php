<?php
require('inc-header.php');
define('TITLE',"Incidència Alumnat");



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
  //require("connect.php");
  //require("functions.php");
    
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
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $cabeceras .= 'Bcc: extraescolars@sjo.es' . "\r\n";
  $r=mail($to, $subject, $message, $cabeceras);
  if ($r) {
    echo "Incidència creada<br>\n";
    echo "<a href=\"./taula.php\">&lt;&lt; Tornar a la selecció d'extraescolars</a>";
  } else {
    echo "Hi ha hagut un problema tot enviant el correu de la incidència.";
  }
} else {
    
?>

<p>Ompli la informació que falta i enviï la incidència.</p>

<?php echo infoincidencia(); ?>
  
<form action="" method="POST">
  <p>
  <label for="form-nomalumne">Nom sencer de l'alumne/a</label>
  <input type="text" name="nomalumne" id="form-nomalumne" >
  </p>
  <p>
  <label for="form-cursalumne">Curs que fa l'alumne</label>
  <input type="text" name="cursalumne" id="form-cursalumne" >
  </p>
  <p>
    <label for="form-observacions">Altres observacions</label><br>
    <textarea name="observacions" id="form-observacions" ></textarea>
  </p>
  <input type="submit" value="enviar">
</form>

<?php
}
?>
  
</body>
</html>