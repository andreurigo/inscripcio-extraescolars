<?php

  function findid($value,$table,$con){
    //SELECT cursid FROM `curs` WHERE `nom`="PRIMER DE PRIMARIA"
    $q="SELECT ".$table."id FROM `$table` WHERE `nom`=\"$value\"";
    $r = mysqli_query($con, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r && mysqli_num_rows($r)==1){
      $row=mysqli_fetch_array($r,MYSQLI_NUM);
      $id=$row[0];
    } else {
      echo "Error: ".mysqli_error($con);
    }
  return $id;
  }

  function getsessions($day,$hour,$year,$con){
  //SELECT sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid WHERE hores.dia='DILLUNS' AND hores.hora='13'
  //SELECT sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid INNER JOIN extraescolars ON extraescolars.extescid=sessions.extescid WHERE hores.dia='DILLUNS' AND hores.hora='13' AND extraescolars.cursid=2
    $sessions=array();
    $i=0;
    $yearid=findid($year,"curs",$con);
    //echo "yearid:".$yearid."<br>";
    //$q="SELECT sessions.sessionid,sessions.nom FROM sessions INNER JOIN hores ON hores.sessionid=sessions.sessionid WHERE hores.dia='$day' AND hores.hora='$hour'";
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