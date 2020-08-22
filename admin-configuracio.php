<?php
require('inc-header.php');
define('TITLE',"Configuració");

require('inc-html-head.php');
htmltitle(TITLE);

if ($_SESSION['administrator']){ // check admin
  if($_SERVER['REQUEST_METHOD']=='POST'){  // check post
    if($_POST["confirmid"]=="x1123y"){
      foreach ($conf as $key=>$value) {
        if ($conf['debug']) echo "$key: ".$_POST[$key]."<br />\n";
        //UPDATE `configuracio` SET `valor`='off' WHERE `clau`='debug'
        $q="UPDATE `configuracio` SET `valor`='{$_POST[$key]}' WHERE `clau`='$key'";
        if ($conf['debug']) echo $q."<br />\n";
        executequery($dbc,$q);
      }
      echo "<p>Configuració actualitzada</p>";
    }
  } else { // check post
  
?>
<p>
Atenció: Si espitjau 'actualitzar', es guarden tots els valors mostrats. Teniu cura de no fer canvis no desitjats.
</p>

<form action="" method="POST">
  <input type="hidden" name='confirmid' value='x1123y'>
  <?php
  //htmlinputtextwithvalue($nom,$validacio,$etiqueta,$placeholder,$value)
  foreach ($conf as $key=>$value) {
    htmlinputtextwithvalue($key,'Introdueixi un string',$key,'',$value);
  }
  ?>
<!--   <input type="submit" value="Confirmar"> -->
    <?php htmlbuttonsubmit('Enviar'); ?>
</form>
  
<?php
  } // check post
          htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
} else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
} //check admin

require('inc-html-foot.php');
?>
