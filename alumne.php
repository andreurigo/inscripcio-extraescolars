<?php
session_start();
define('TITLE',"Selecció alumne/a");
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
  
  function printform(){
  ?>
  <form method="POST" action="">
  <p>
    Introdueixi el llinatge amb majúscules i sense accents.
    </p>
  <label>1r Llinatge: <input type="text" name="llinatge1"></label><br />
  <input type="submit">
</form>
  <?php
}
  
  require("connect.php");
  require("functions.php");
//   $s=print_r($_SESSION,TRUE);
//   echo nl2br($s);
    
if ($_SERVER['REQUEST_METHOD']=='POST'){

$llinatge1 = $_POST['llinatge1'];
//SELECT a.nom,a.llinatge1,a.llinatge2,cl.nom,a.alumneid FROM alumnes as a INNER JOIN curs AS cu USING (cursid) INNER JOIN classe as cl USING (classeid) WHERE a.llinatge1='MOLINA' AND cu.cursid=2 
$q="SELECT a.nom,a.llinatge1,a.llinatge2,cl.nom,a.alumneid FROM alumnes as a INNER JOIN curs AS cu USING (cursid) INNER JOIN classe as cl USING (classeid) WHERE a.llinatge1='$llinatge1' AND cu.cursid={$_SESSION['cursid']}";
  //echo $q."<br />";
    $r = mysqli_query($dbc, $q); // Run the query.
		if ($r){
      if(mysqli_num_rows($r)==0){
        echo "No hay ningún alumno con este primer apellido en este curso";
        printform();
      }else {
        echo "<form action='confirma.php' method='GET'>";
        echo "<table border=1>\n";
    while($row=mysqli_fetch_array($r,MYSQLI_NUM)){
        echo "<tr>";
        echo "<td>";
        $alumneid=$row[4];
        echo "<input type='radio' name='alumneid' value='$alumneid'>";
        echo "</td>";
        echo "<td>";
        $nom = $row[0];
        $llinatge1 = $row[1];
        $llinatge2 = $row[2];
        echo "$nom $llinatge1 $llinatge2";
        echo "</td>";
        echo "<td>";
        $classe = $row[3];
        echo "$classe";
        echo "</td>";
        echo "</tr>\n";
    }
        echo "</table>\n";
        echo "<input type='submit'>";
        echo "</form>";
      }
    } else {
      echo "Error: ".mysqli_error($dbc);
    }
  
} else {
  
printform();
  
}
?>
  
</body>
</html>