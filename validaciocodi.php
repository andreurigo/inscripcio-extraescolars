<?php
require('inc-header.php');
define('TITLE',"Validació codi");

require('inc-html-head.php');

htmltitle(TITLE);

function menuadministrador() {
        htmlbuttonrightlink("Llistat inscripcions (fitxer)","coord-llistat-inscripcions.php");
        htmlbuttonrightlink("Llistat inscripcions (pantalla)","coord-llistat-inscripcions-2.php");
        htmlbuttonrightlink("Esborrar una inscripció","coord-del-insc.php");
        htmlbuttonrightlink("Configuració","admin-configuracio.php");
        htmlbuttonrightlink("Importació alumnes","admin-importacio-alumnes.php");
        htmlbuttonrightlink("Importació extraescolars","admin-importacio-extraescolars.php");
        htmlbuttonrightlink("Esborrat base de dades","admin-reset-db.php");
        htmlbuttonrightlink("Esborrat alumnes","admin-delete-alumnes.php");
        htmlbuttonrightlink("Finalitzar","logout.php");  
}

function menuresponsable() {
        htmlbuttonrightlink("Llistat inscripcions (fitxer)","coord-llistat-inscripcions.php");
        htmlbuttonrightlink("Llistat inscripcions (pantalla)","coord-llistat-inscripcions-2.php");
        htmlbuttonrightlink("Esborrar una inscripció","coord-del-insc.php");
        htmlbuttonrightlink("Finalitzar","logout.php");
}

function triamenu() {
      if ($_SESSION['administrator']){
        menuadministrador();
      }
      if ($_SESSION['responsable']){
        menuresponsable();
      }  
}


if($_SERVER['REQUEST_METHOD']=='POST'){  
    if ($_POST['codi']==$_SESSION['codi']){
      echo "<h2>Usuari validat</h2>\n";
      if ($_SESSION['correu']==$conf['correuadmin']){
        echo "<h2>Mode administrador activat</h2>\n";
        $_SESSION['administrator']=TRUE;
      }
      if ($_SESSION['correu']==$conf['correuresponsable']){
        echo "<h2>Mode responsable activat</h2>\n";
        $_SESSION['responsable']=TRUE;
      }
      $_SESSION['autenticat']=TRUE;
      htmlbuttonrightlink("Selecció extraescolars","taula.php");
      //Presentam menús
      triamenu();
      //echo "<a href='taula.php'>Següent</a>";
    } else {
      echo "<h2 class='error'>Codi Incorrecte</h2>\n";
      $_SESSION['autenticat']=TRUE;
      htmlbuttonleftlink("Torna enrere","index.php");
    }
} else { //($_SERVER['REQUEST_METHOD']=='POST')
  
  if (!$_SESSION['autenticat']) { //Si és GET i ja estam autenticats, presentam menú i no formulari
?>
    <form method="POST" action="">
      <p>
        Benvolgut/da <?php echo $_SESSION['nom'] ?> introdueixi el codi que rebrà en el correu <?php echo $_SESSION['correu'] ?>
      </p>
      <p>Teniu en compte que el codi pot tardar uns minuts en arribar al correu.</p>
      <p>
        <strong>Si no rebeu el correu, revisau la safata de correu no desitjat o provau amb un altre correu.</strong>
      </p>
    <!--   <label>Codi: <input type="text" name="codi"></label><br /> -->
      <?php htmlinputtext('codi','Introdueixi el codi rebut en el correu','Codi enviat per correu:','Escrigui aquí el codi');?>
      <?php htmlbuttonsubmit('Validar'); ?>
    </form>
    <?php
      htmlbuttonleftlink("Tornar a enviar el correu","index.php");
  } else { //(!$_SESSION['autenticat']) Si és GET i ja estam autenticats, presentam menú i no formulari
    htmlbuttonrightlink("Selecció extraescolars","taula.php"); // Es mostra al moment de validar el codi a tot usuari
    triamenu();
  }
}   //($_SERVER['REQUEST_METHOD']=='POST') 

require('inc-html-foot.php');
?>
