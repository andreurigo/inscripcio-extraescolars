<?php
require('inc-header.php');
?>
<?php
define('TITLE',"Confirmació Inscripció");
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
  if (!$_SESSION['autenticat']){
  redirect_user("index.php");
}
if (!isset($_GET['alumneid'])){
  //echo "get no definit";
  redirect_user("alumne.php");  
}

  $s=print_r($_SESSION,TRUE);
  echo nl2br($s);    
  
  require("connect.php");
  require("functions.php");

    
if ($_SERVER['REQUEST_METHOD']=='POST'){
 
$q="INSERT INTO `inscripcions`(`inscid`, `nomresp`, `correuresp`, `alumneid`, `extescid`, `sessionid`, `data`) VALUES (NULL,'{$_SESSION['nom']}','{$_SESSION['correu']}',{$_SESSION['alumneid']},{$_SESSION['extescid']},{$_SESSION['sessionid']},NOW())";
  echo $q."<br />";
    $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
        echo "Inscripció feta correctament<br />";
        echo "Fer enviament del correu <br />";
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
  
} else {

 echo "<h2>Dades inscripció</h2>";
 $_SESSION['alumneid']=$_GET['alumneid'];
 $nomresp=$_SESSION['nom'];
 $correuresp=$_SESSION['correu'];
 $alumneid=$_SESSION['alumneid'];
 $extescid=$_SESSION['extescid'];
 $sessionid=$_SESSION['sessionid'];
 
 echo "fer control de ja inscrit a la mateixa activitat I PRESENTACIO DE LA INSCRIPCIO";
  
 echo "nomresp $nomresp <br />";
 echo "correuresp $correuresp <br />";
 echo "alumneid $alumneid <br />";
 echo "extescid $extescid <br />";
 echo "sessionid $sessionid <br />";
 
 echo "<form action='' method='POST'>";
 echo "<input type='submit'>";
 echo "</form>";
  
}
?>
  
</body>
</html>