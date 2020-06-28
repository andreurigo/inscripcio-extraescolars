<?php

  define("DEBUG",TRUE);
  //define("DEBUG",FALSE);

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

  function getcourses($con) {
    //Obté la llista de cursos de la base de dades i els torna ordenats dins un array (d'acord amb l'ordre definit a la base de dades)
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

  function gethoursbysession($sessionid,$con){
    //Retorna un array associatiu amb els dies i hores. Dia clau i hora valor. Tants d'elements com hores hi hagi.
    $hours=array();
    $q="SELECT dia, hora FROM hores WHERE sessionid=$sessionid";
    $r = mysqli_query($con, $q); // Run the query.
		if ($r){    
      while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $hours[$row[0]]=$row[1]; //$row[0] dia / $row[1] hora
      }
    } else {
      echo "Error(getsessions): ".mysqli_error($con);
    }
    return $hours; 
  }

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

?>