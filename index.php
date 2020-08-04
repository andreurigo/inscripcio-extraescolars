<?php
require('inc-header.php');
define('TITLE',$title);
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
if ($_SERVER['REQUEST_METHOD']=='POST'){

$to = $_POST['correu'];
$subject = "Codi Inscripció";
$codi=rand(10000,99999);
$body = "Dear ".$_POST['nom']." aquest és el codi: ".$codi;
mail($to, $subject, $body);
  
  $_SESSION['nom']=$_POST['nom'];
  $_SESSION['correu']=$_POST['correu'];
  $_SESSION['codi']=$codi;
  
  redirect_user("validaciocodi.php");
  
} else {
  
  
?>

  <p>
    <?php
      if ($_SESSION['activat']) {
        echo "El procés d'inscripció està actualment obert";
      } else {
        echo "La inscripció s'activarà a les $hour:$minute el $day del $month de $year";
      }
    ?>
  </p>
  
<form method="POST" action="">
  <label>Nom: <input type="text" name="nom"></label><br />
  <label>Correu: <input type="email" name="correu"></label><br />
  <input type="submit">
</form>

<?php
}
?>
  
</body>
</html>