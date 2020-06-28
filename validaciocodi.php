<?php
require('inc-header.php');
define('TITLE',"Validació codi");
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
//echo $_SESSION['codi'];
if($_SERVER['REQUEST_METHOD']=='POST'){  
    if ($_POST['codi']==$_SESSION['codi']){
      echo "Usuari validat<br>\n";
      if ($_SESSION['correu']==$conf['correuadmin']){
        echo "Mode administrador activat<br>\n";
        $_SESSION['administrator']=TRUE;
      }
      $_SESSION['autenticat']=TRUE;
    } else {
      echo "Codi Incorrecte<br>\n";
      $_SESSION['autenticat']=TRUE;
    }
  echo "<a href='taula.php'>Següent</a>";
} else {
  
?>

<form method="POST" action="">
  <p>
    Benvolgut/da <?php echo $_SESSION['nom'] ?> introdueixi el codi que rebrà en el correu <?php echo $_SESSION['correu'] ?>
  </p>
  <p>Teniu en compte que el codi pot tardar uns minuts en arribar al correu.</p>
  <label>Codi: <input type="text" name="codi"></label><br />
  <input type="submit">
</form>

<?php
}    
?>
  
</body>
</html>