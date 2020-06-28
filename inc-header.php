<?php
session_start();
// Llegeix conf
$conf=array();
require('connect.php');
    $q="SELECT * FROM configuracio";
    $r = mysqli_query($dbc, $q); // Run the query.
    //echo "mysqli_num_rows:".mysqli_num_rows($r)."<br>\n";
		if ($r){
     while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
       $conf[$row[0]]=$row[1];
      }
    } else {
      echo "Error: ".mysqli_error($con);
    }
if ($conf['debug']=='on') print_r($conf);
if ($conf['debug']=='on') echo "<br>";
if ($conf['debug']=='on'&& isset($_SESSION)) print_r($_SESSION);
$title="Inscripció Activitats Extraescolars {$conf['nomcentre']} {$conf['cursactual']}";
?>