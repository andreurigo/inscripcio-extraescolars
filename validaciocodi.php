<?php
require('inc-header.php');
define('TITLE',"Validació codi");

require('inc-html-head.php');

htmltitle(TITLE);


if($_SERVER['REQUEST_METHOD']=='POST'){  
    if ($_POST['codi']==$_SESSION['codi']){
      echo "<h2>Usuari validat</h2>\n";
      if ($_SESSION['correu']==$conf['correuadmin']){
        echo "<h2>Mode administrador activat</h2>\n";
        $_SESSION['administrator']=TRUE;
      }
      $_SESSION['autenticat']=TRUE;
      htmlbuttonrightlink("Següent","taula.php");
      //echo "<a href='taula.php'>Següent</a>";
    } else {
      echo "<h2 class='error'>Codi Incorrecte</h2>\n";
      $_SESSION['autenticat']=TRUE;
      htmlbuttonleftlink("Torna enrere","index.php");
    }
} else {
  
?>

<form method="POST" action="">
  <p>
    Benvolgut/da <?php echo $_SESSION['nom'] ?> introdueixi el codi que rebrà en el correu <?php echo $_SESSION['correu'] ?>
  </p>
  <p>Teniu en compte que el codi pot tardar uns minuts en arribar al correu.</p>
<!--   <label>Codi: <input type="text" name="codi"></label><br /> -->
  <?php htmlinputtext('codi','Introdueixi el codi rebut en el correu','Codi enviat per correu:','Escrigui aquí el codi');?>
  <?php htmlbuttonsubmit('Validar'); ?>
</form>

<?php
}    
?>
  
</body>
</html>