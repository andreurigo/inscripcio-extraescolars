<?php
require('inc-header.php');
$title="Inscripció Activitats Extraescolars<br />{$conf['nomcentre']}<br />{$conf['cursactual']}";
define('TITLE',$title);

require('inc-html-head.php');
htmltitle(TITLE);
?>


<?php
  //require("connect.php");
  //require("functions.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){

if (!empty($_POST['nom']) && !empty($_POST['correu'])) {
  
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
  echo "<h2 class='error'>Ni el nom ni el correu es poden deixar en blanc.</h2><p>Espitgi el botó per recarregar la pàgina.</p>";
  htmlbuttonleftlink('Recarrega',$filename);  
}
  
  
} else {
  
  
?>

  <h2>
    <?php
      if ($_SESSION['activat']) {
        echo "El procés d'inscripció està actualment obert";
      } else {
        echo "La inscripció s'activarà a les $hour:$minute el $day del $month de $year";
        if ($faltenminuts<600) echo "<br />Falten $faltenminuts minuts";
      }
    ?>
  </h2>
  
<form method="POST" action="<?php echo $filename;?>">
<!--   <label>Nom: <input type="text" name="nom"></label><br /> -->
  <?php htmlinputtext('nom','Introdueixi un nom','Nom i llinatges de qui fa la inscripció','Escrigui aquí el seu nom');?>
  <?php htmlinputtext('correu','Introdueixi un correu vàlid','Correu electrònic de qui fa la inscripció','Escrigui aquí el seu email');?>
<!--   <label>Correu: <input type="email" name="correu"></label><br /> -->
  <?php htmlbuttonsubmit('Enviar'); ?>
</form>

	<script src="js/main.js"></script>

<?php
}

require('inc-html-foot.php');
?>
  
