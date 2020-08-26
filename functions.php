<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

  //define("DEBUG",TRUE);
  define("DEBUG",FALSE);

//Enviament de correus per SMTP tot fent server PHPMailer
function sendmailsmtp($to,$nameto,$subject,$bodyhtml,$bodytext,$bcc="") {
// CONF
   require('emailconf.php');
// CONF
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = SMTPSERVER;                             // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = USERNAME;                               // SMTP username
    $mail->Password   = PASSWORD;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom(FROMEMAIL, FROMNAME);
    $mail->addAddress($to, $nameto);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    if(!empty($bcc)){
       $mail->addBCC($bcc);
    }
    //$mail->addBCC('bcc@example.com');
    //$mail->addCC($bcc);

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $bodyhtml;
    $mail->AltBody = $bodytext;

    $mail->send();
    if (DEBUG) echo "<p>S'ha enviat el missatge de correu</p>";
    return TRUE;
} catch (Exception $e) {
    if (DEBUG) echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return FALSE;
}
}

  //Obtenim un array amb els id's de sessions de totes les sessions
  //a les que l'estudinat està inscrit
  function getinscriptionsfromstudent($con,$studentid) {
    $sessionids=array();
    //SELECT `sessionid` FROM `inscripcions` WHERE `alumneid`=800
    $q="SELECT `sessionid` FROM `inscripcions` WHERE `alumneid`=$studentid";
    $r = mysqli_query($con, $q);
    if ($r){ 
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $sessionids[]=$row[0];
      }
    } else {
      echo "Error(getinscriptionsfromstudent): ".mysqli_error($con);
    }
    return $sessionids;
  }

  //A partir d'una col·lecció d'ids obtenim tota la informació relevant per a presentar per pantalla
  //Information is returned in an array
  // 0=>Session name, 1=>Extraescolar name, 2=>Student name, 3=>Student Surname1, 4=>Student Surname2
  // 5=>Class name
  function getfullinfofromids($dbc,$sessionid,$extescid,$alumneid){
     $returnarray=[];
     // Obtenim el nom de la sessió
     $r=getfieldfromid($dbc,'sessions','sessionid',$sessionid,'nom');
     if ($r===FALSE) {
       echo("Error intentant obtenir el nom de la sessió $sessionid");
       return FALSE;
     } else {
       $returnarray[]=$r; }
     // Obtenim el nom de l'extraescolar
     $r=getfieldfromid($dbc,'extraescolars','extescid',$extescid,'nom');
     if ($r===FALSE) {
       echo("Error intentant obtenir el nom de la extraescolar $extescid");
       return FALSE;
     } else {
       $returnarray[]=$r; }
     // Obtenim el nom de l'alumne/a
     $r=getfieldfromid($dbc,'alumnes','alumneid',$alumneid,'nom');
     if ($r===FALSE) {
       echo("Error intentant obtenir el nom de l'alumne $alumneid");
       return FALSE;
     } else {
       $returnarray[]=$r; }
     // Obtenim el primer llinatge de l'alumne/a
       $r=getfieldfromid($dbc,'alumnes','alumneid',$alumneid,'llinatge1');
     if ($r===FALSE) {
       die("Error intentant obtenir el llinatge1 de $alumneid");
     } else {
       $returnarray[]=$r; }
     // Obtenim el segon llinatge de l'alumne/a
       $r=getfieldfromid($dbc,'alumnes','alumneid',$alumneid,'llinatge2');
     if ($r===FALSE) {
       die("Error intentant obtenir el llinatge2 de  $alumneid");
     } else {
       $returnarray[]=$r; }
      // Obtenim la classe
         $r=getfieldfromid($dbc,'alumnes','alumneid',$alumneid,'classeid');
     if ($r===FALSE) {
       die("Error intentant obtenir la classe de $alumneid");
     } else {
       $classeid=$r; }
       $r=getfieldfromid($dbc,'classe','classeid',$classeid,'nom');
     if ($r===FALSE) {
       die("Error intentant obtenir el nom de la $classeid");
     } else {
       $returnarray[]=$r; }
    
    // Un pic obtinguda tota la informació la retornam
    return $returnarray;
  }


  //Obtenim un camp a partir del camp id del registre
  function getfieldfromid($dbc,$table,$idfieldname,$idvalue,$fieldtoget) {
    $q="SELECT `$fieldtoget` FROM `$table` WHERE `$idfieldname`='$idvalue'";
    $r = mysqli_query($dbc, $q);
    if ($r){
      if (DEBUG) echo "$q executat amb èxit<br>\n";
      if (mysqli_num_rows($r)==1) {
        $row=mysqli_fetch_array($r,MYSQLI_NUM);
        $id=$row[0];
      } else {
        $id=FALSE;
      }
      return $id;
    } else {
      if (DEBUG) echo $q."<br>\n";
      echo "Error: ".mysqli_error($dbc)."<br>\n";
      return FALSE;
    }    
  }

  //Queries que no tornen informació. Per ex. INSERT o UPDATE
  function executequery($dbc,$q) {
    $r = mysqli_query($dbc, $q);
    if ($r){
      if (DEBUG) echo "$q executat amb èxit<br>\n";
      return TRUE;
    } else {
      if (DEBUG) echo $q."<br>\n";
      echo "Error: ".mysqli_error($dbc)."<br>\n";
      return FALSE;
    }
  }

  
  //Encapsulament de l'insert
  function insertitem($dbc,$table, $fields, $values){
    $q = "INSERT INTO `".$table."` (";
    // Camps
    if (!is_array($fields)){
      die('$fields is expected to be an array');
    }
    $n=count($fields);
    for ($i=0;$i<($n-1);$i++){ //El darrer element es tracta diferent per les comes
      $q.="`".$fields[$i]."`, ";
    }
    $q.="`".$fields[$i]."`) ";
    // Valors
    $q.=" VALUES (";
    if (!is_array($values)){
      die('$values is expected to be an array');
    }
    $n=count($values);
    for ($i=0;$i<($n-1);$i++){ //El darrer element es tracta diferent per les comes
      $q.="'".$values[$i]."', ";
    }
    $q.="'".$values[$i]."') ";
		$r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      if (DEBUG) echo "$q executat amb èxit<br>\n";
      return TRUE;
    } else {
      if (DEBUG) echo $q."<br>\n";
      echo "Error: ".mysqli_error($dbc)."<br>\n";
      return FALSE;
    }
  }


  //Troba l'id a partir d'un dels altres camps
  function findid($value,$table,$con,$idname="default"){
    if ($idname=="default"){
      $idname=$table."id";
    }
    //SELECT cursid FROM `curs` WHERE `nom`="PRIMER DE PRIMARIA"
    $q="SELECT ".$idname." FROM `$table` WHERE `nom`=\"$value\"";
    $r = mysqli_query($con, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r){
      if (mysqli_num_rows($r)==1) {
        $row=mysqli_fetch_array($r,MYSQLI_NUM);
        $id=$row[0];
      } else {
        $id=0;
      }
    } else {
      echo "Error: ".mysqli_error($con);
    }
  return $id;
  }


//Obté la llista de cursos de la base de dades i els torna ordenats dins un array (d'acord amb l'ordre definit a la base de dades)
  function getcourses($con) {
    $q="SELECT nom FROM curs ORDER BY ordre";
    $courses=array();
    $r = mysqli_query($con, $q);
    if ($r){ 
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $courses[]=$row[0];
       $i++;
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    return $courses;
  }


  // Donat un id de curs. Troba totes les extraescolars que tenen aquell curs com a principal
  // Alerta que no té en consideració els cursos secundaris
  function getextraescolarsbycourse($cursid, $con){
    // Primer obtenim la llista d'extraescolars oferides a aquell curs
    // Des de la taula extraescolars: SELECT extescid FROM extraescolars WHERE extraescolars.cursid=2
    // Des de la taula altres: SELECT `extescid` FROM `altres-cursos-extraescolar` WHERE `cursid`=2
    $extraescolars=array();
    $q="SELECT extescid FROM extraescolars WHERE extraescolars.cursid=$cursid";
    $r = mysqli_query($con, $q); // Run the query.
		if ($r){    
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $extraescolars[]=$row[0];
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    $q="SELECT `extescid` FROM `altres-cursos-extraescolar` WHERE `cursid`=$cursid";
    $r = mysqli_query($con, $q); // Run the query.
    if ($r){    
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $extraescolars[]=$row[0];
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    return $extraescolars;
  }


  // Donat un id d'extraescolar, retorna un array amb tots els ids de sessions d'aquella extraescolar
  function getsessionsbyextraescolar($extescid, $con){
    // Primer obtenim la llista d'extraescolars oferides a aquell curs
    // Des de la taula extraescolars: SELECT extescid FROM extraescolars WHERE extraescolars.cursid=2
    // Des de la taula altres: SELECT `extescid` FROM `altres-cursos-extraescolar` WHERE `cursid`=2
    $sessions=array();
    $q="SELECT sessionid FROM sessions WHERE extescid=$extescid";
    $r = mysqli_query($con, $q); // Run the query.
		if ($r){    
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $sessions[]=$row[0];
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    return $sessions;
  }


    //Donat un id de sessió, retorna un array associatiu amb els dies i hores. Tants d'elements com hores hi hagi.
    //Si outputmode és 0 (valor per defecte), el format és un array associatiu amb el dia com a clau i l'hora com a valor.
    //Si outputmode no és 0, el format és un array numéric on cada element és un array associatiu amb claus 'dia' i 'hora' i valors els que corresponguin. S'accedeix als elements com $hours[1]['dia'] per exemple
    function gethoursbysession($sessionid,$con,$outputmode=0){
    $hours=array();
    $q="SELECT dia, hora FROM hores WHERE sessionid=$sessionid";
    $r = mysqli_query($con, $q); // Run the query.
		if ($r){    
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
        if ($outputmode==0) {
          $hours[$row[0]]=$row[1]; //$row[0] dia / $row[1] hora
        } else {
          $hours[]=['dia'=>$row[0],'hora'=>$row[1]];
        }
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    return $hours; 
  }


// Donat un curs ($year) i una hora i un dia, retorna un array amb totes les sessions per aquell curs dia i hora
// Alerta que només té en consideració el curs principal. Els cursos secundaris es gestionen des del codi a taula.php
  function getsessions($day,$hour,$year,$con){
  //SELECT sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid WHERE hores.dia='DILLUNS' AND hores.hora='13'
  //SELECT sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid INNER JOIN extraescolars ON extraescolars.extescid=sessions.extescid WHERE hores.dia='DILLUNS' AND hores.hora='13' AND extraescolars.cursid=2
    $sessions=array();
    $i=0;
    $yearid=findid($year,"curs",$con);
    //echo "yearid:".$yearid."<br>";
    //$q="SELECT sessions.sessionid,sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid WHERE hores.dia='$day' AND hores.hora='$hour'";
    //Sessions des del curs de referència (columna dins la taula d'extraescolars)
    $q="SELECT sessions.sessionid,sessions.nom,extraescolars.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid INNER JOIN extraescolars ON extraescolars.extescid=sessions.extescid WHERE hores.dia='$day' AND hores.hora='$hour' AND extraescolars.cursid=$yearid";
    $r = mysqli_query($con, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r){ 
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $sessions[$i]['id']=$row[0];
       $sessions[$i]['nom']=$row[1];
       $sessions[$i]['nomextesc']=$row[2];
       $i++;
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    //Sessions des dels cursos secundaris (taula altres-cursos-extraescolar)
    //SELECT sessions.sessionid, sessions.nom FROM sessions INNER JOIN hores on hores.sessionid=sessions.sessionid INNER JOIN `altres-cursos-extraescolar` ON `altres-cursos-extraescolar`.extescid=sessions.extescid WHERE hores.dia="DIMARTS" AND hores.hora=12 AND `altres-cursos-extraescolar`.cursid="PRIMER DE PRIMARIA"
    $q="SELECT sessions.sessionid,sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid INNER JOIN `altres-cursos-extraescolar` ON `altres-cursos-extraescolar`.extescid=sessions.extescid WHERE hores.dia='$day' AND hores.hora='$hour' AND `altres-cursos-extraescolar`.cursid=$yearid";
    $r = mysqli_query($con, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r){ 
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $sessions[$i]['id']=$row[0];
       $sessions[$i]['nom']=$row[1];
       //TODO: Afegir nom de l'extraescolar
       $sessions[$i]['nomextesc']="";
       $i++;
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }    
    //print_r($sessions);
  return $sessions;
  }


//Funció auxiliar per a fer redireccions
function redirect_user($page = 'index.php') {

	// Start defining the URL...
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	// Remove any trailing slashes:
	$url = rtrim($url, '/\\');

	// Add the page:
	$url .= '/' . $page;

	// Redirect the user:
	header("Location: $url");
	exit(); // Quit the script.

} // End of redirect_user() function.

//Remove accents in an upper case string
function clearstring($string) {
  $accents=["Á","À","É","È","Í","Ì","Ó","Ò","Ú","Ù"];
  $vowels=["A","A","E","E","I","I","O","O","U","U"];
  $string=str_replace($accents,$vowels,$string);
  $accents=["á","à","é","è","í","ì","ó","ò","ú","ù"];
  $vowels=["a","a","e","e","i","i","o","o","u","u"];
  $string=str_replace($accents,$vowels,$string);
  $string=strtoupper($string);
  return $string;
}

?>