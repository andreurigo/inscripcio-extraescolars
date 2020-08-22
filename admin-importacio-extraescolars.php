<?php
require('inc-header.php');
define('TITLE',"Importació Extraescolars");

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
      if (move_uploaded_file ($_FILES['upload']['tmp_name'], "./input/extraescolars.csv")) { //El fitxer existent serà substituit
				echo '<p><em>Fitxer pujat correctament!</em></p>';
			} // End of move... IF.

		} else { // Invalid type.
			echo "<p class='error'>Només podeu pujar fitxers CSV. Heu pujat un fitxer {$_FILES['upload']['type']}</p>";
		}

	} // End of isset($_FILES['upload']) IF. 
    //Inici Codi importació
    //die(); //Per depurar. Pensar a llevar-ho
    $data=file("./input/extraescolars.csv");
    $linecount=1;
    foreach($data as $line) {
      if ($linecount!=1) { // skip first line
        $inserthourflag=TRUE; //En general volem inserir les hores
        if ($conf['debug']=='on') echo $line."<br>\n";
        $fields=explode(",",$line);
        // CURS
        $curs=trim($fields[0]);
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;curs:".$curs;
        $cursid=findid($curs,"curs",$dbc);
        if ($conf['debug']=='on') echo " cursid:".$cursid."<br>\n";
        // EXTRAESCOLAR
        $extraescolar=trim($fields[1]);
        $extraescolarid=findid($extraescolar,"extraescolars",$dbc,"extescid");
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;extraescolar:".$extraescolar." extraescolarid:".$extraescolarid."<br>\n";
        // Extraescolar: Si existeix, hem de comprovar si és que s'ofereix a un curs diferent per afegir una entrada a la taula 'altres-cursos-extraescolar'
        // SELECT `cursid` FROM `extraescolars` WHERE `extescid`='48'
        $q="SELECT `cursid` FROM `extraescolars` WHERE `extescid`='".$extraescolarid."'";
        $r = mysqli_query($dbc, $q);
          if ($r){
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;$q executat amb èxit<br>\n";
              while ($row=mysqli_fetch_array($r,MYSQLI_NUM)){
                 $curstemporalid=$row[0];
                 if ($curstemporalid!=$cursid) { //Només si el curs no coincideix s'ha d'afegir com a curs secundari
                    //INSERT INTO `altres-cursos-extraescolar` (`altcurext`, `extescid`, `cursid`) VALUES (NULL, '48', '4');
                    $camps=['extescid', 'cursid'];
                    $valors=[$extraescolarid,$cursid];
                    $rr=insertitem($dbc,"altres-cursos-extraescolar",$camps,$valors);
                    if ($conf['debug']=='on') echo "&nbsp;&nbsp;Afegit curs extra a $extraescolar<br>\n";
                    $inserthourflag=FALSE; //En aquest cas les hores ja s'han inserit abans
                 }
              }
          } else {
            if (DEBUG) echo $q."<br>\n";
            echo "Error: ".mysqli_error($dbc)."<br>\n";
          }
        // extraescolar: Si no existia es crea
        if ($extraescolarid==0){
          $camps=["nom","cursid"]; //extescid es crea tot sol
          $valors=[$extraescolar,$cursid]; // Si l'extraescolar no existia el primer curs és el principal
          $r=insertitem($dbc,"extraescolars",$camps,$valors);
          if ($r) {
            //Si ha anat bé agafam l'id
            $extraescolarid=findid($extraescolar,"extraescolars",$dbc,"extescid");
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;extraescolar:".$extraescolar." extraescolarid:".$extraescolarid."<br>\n";
          } else {
            //Si no ha anat bé, no té sentit seguir
            die("No s'ha pogut insertar l'extraescolar de la línea: $line");
          }
        }
        // SESSIO
        $sessio=trim($fields[2]);
        $places=trim($fields[3]);
        $nombrehores=$fields[4];
        if ($conf['debug']=='on') echo "&nbsp;&nbsp;curs:".$sessio;
        $sessioid=findid($sessio,"sessions",$dbc,"sessionid");
        if ($conf['debug']=='on') echo " sessioid:".$sessioid."<br>\n";
        // sessio: Si no existia es crea
        if ($sessioid==0){
          $camps=['nom','extescid','places','nombrehores'];
          $valors=[$sessio,$extraescolarid,$places,$nombrehores];
          $r=insertitem($dbc,"sessions",$camps,$valors);
          if ($r) {
            //Si ha anat bé agafam l'id
            $sessioid=findid($sessio,"sessions",$dbc,"sessionid");
            if ($conf['debug']=='on') echo "&nbsp;&nbsp;sessioid:".$sessioid."<br>\n";
          } else {
            //Si no ha anat bé, no té sentit seguir
            die("No s'ha pogut insertar la sessió de la línea: $line");
          }
        }
        // HORA
        // L'entrada a la taula hores només no pot existir previament si és una extraescolar que s'ofereix a més d'un curs. Això es controla amb el flag $inserthourflag
        if($inserthourflag) {
            $dia=trim($fields[5]);
            $hora=trim($fields[6]);
            $camps=['sessionid','dia','hora'];
            $valors=[$sessioid,$dia,$hora];
            $r=insertitem($dbc,"hores",$camps,$valors);
            if ($r){
              if ($conf['debug']=='on') echo "&nbsp;&nbsp;".$line." processada ok<br>\n";
            } else {
              die("No s'ha pogut processar l'hora de la línea $line");
            }
        }
        //exit (); //process only first register in order to test
      } // skip first line
      $linecount++;
    }
    //Final codi importació
} else { //($_SERVER['REQUEST_METHOD']=='POST')
?>
    <form enctype="multipart/form-data" action="admin-importacio-extraescolars.php" method="POST">
      <input type="hidden" name="MAX_FILE_SIZE" value="20971520">
      <p>Descarregau la plantilla i pujau un fitxer cvs de fins a 20MB:</p>
      <p><strong>File:</strong> <input type="file" name="upload"></p>
      
<!--       <div align="center"><input type="submit" name="submit" value="Submit"></div> -->
      <?php htmlbuttonsubmit("Pujar i processar fitxer"); ?>
    </form>
<?php  
  //Plantilla
  htmlbuttontlink("Descàrrega plantilla","templates/plantilla-extraescolars.csv");
} //else ($_SERVER['REQUEST_METHOD']=='POST') 
  } else { //check admin
?>
  <p>
    No estau autoritzats a veure aquesta pàgina.
  </p>
<?php
  } // check admin 
  htmlbuttonleftlink("Tornar al menú","validaciocodi.php");
require('inc-html-foot.php');
?>
