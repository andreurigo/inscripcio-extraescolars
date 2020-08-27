<?php
require('inc-header.php');
define('TITLE',"Importació alumnes");

require('inc-html-head.php');
htmltitle(TITLE);


if ($_SESSION['administrator']){ // check admin
if ($_SERVER['REQUEST_METHOD']=='POST') {
    //Processam el fitxer pujat

	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		// Validate the type. Should be csv.
		$allowed = ['text/csv','application/vnd.ms-excel'];
		if (in_array($_FILES['upload']['type'], $allowed)) {

			// Move the file over.
			//if (move_uploaded_file ($_FILES['upload']['tmp_name'], "./input/{$_FILES['upload']['name']}")) {
      if (move_uploaded_file ($_FILES['upload']['tmp_name'], "./input/alumnes.csv")) { //El fitxer existent serà substituit
				echo '<p><em>Fitxer pujat correctament!</em></p>';
			} // End of move... IF.

		} else { // Invalid type.
			echo "<p class='error'>Només podeu pujar fitxers CSV. Heu pujat un fitxer {$_FILES['upload']['type']}</p>";
		}

	} // End of isset($_FILES['upload']) IF.  
  //die(); //Per depurar. S'ha de treure
    //Importació de dades propiament
    $data=file("./input/alumnes.csv");
    foreach($data as $line) {
      //echo $line."<br>\n";
      $fields=explode(",",$line);
      $curs=$fields[1];
      $classe=$fields[2];
      //echo "curs:".$curs."<br>\n";
      $cursid=findid($curs,"curs",$dbc);
      $classeid=findid($classe,"classe",$dbc);
      $nom=trim($fields[3]);
      $llinatge1=trim($fields[4]);
      $llinatge2=trim($fields[5]);
      //echo "cursid:".$cursid."<br>\n";
      //echo "classeid:".$classeid."<br>\n";
      // INSERT INTO `alumnes`(`alumneid`, `nom`, `llinatge1`, `llinatge2`, `cursid`, `classeid`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
      $q = "INSERT INTO `alumnes`(`alumneid`, `nom`, `llinatge1`, `llinatge2`, `cursid`, `classeid`) VALUES (NULL,'$nom','$llinatge1','$llinatge2','$cursid','$classeid')";
      $r = mysqli_query($dbc, $q); // Run the query.
      if ($r){
        echo "$line instertada a la base de dades<br>";
      } else {
        echo "Error: ".mysqli_error($dbc);
      }
    }
    //Final importació de dades
} else { //($_SERVER['REQUEST_METHOD']=='POST')
?>
    <form enctype="multipart/form-data" action="admin-importacio-alumnes.php" method="POST">
      <input type="hidden" name="MAX_FILE_SIZE" value="20971520">
      <p>Descarregau la plantilla i pujau un fitxer cvs de fins a 20MB:</p>
      <p><strong>File:</strong> <input type="file" name="upload"></p>
      
<!--       <div align="center"><input type="submit" name="submit" value="Submit"></div> -->
      <?php htmlbuttonsubmit("Pujar i processar fitxer"); ?>
    </form>
<?php  
  //Plantilla
  htmlbuttontlink("Descàrrega plantilla","templates/plantilla-alumnes.csv");
} //else ($_SERVER['REQUEST_METHOD']=='POST')  
  } else { //check admin
?>
  <p class="error">
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
  } // check admin
  //mogut al footer
  //htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
  require('inc-html-foot.php');
  ?>
