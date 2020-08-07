<?php
require('inc-header.php');
$title="Selecció extraescolars";
define('TITLE',$title);

require('inc-html-head.php');

htmltitle(TITLE);

if (!$_SESSION['autenticat']){
  redirect_user("index.php");
}
  
    
  //Obtenim els cursos de la base de dades
  $cursos=getcourses($dbc);
  //print_r($cursos);
  //$cursos=["PRIMER DE PRIMARIA","SEGON DE PRIMARIA","TERCER DE PRIMARIA","QUART DE PRIMARIA","CINQUE DE PRIMARIA","SISE DE PRIMARIA"];;
?>
  <p>Triï un curs i espitgi 'Refrescar'</p>
  <form action="./taula.php" method="POST">
    <select name="curs" id="selectcurs">
<?php
      echo "<option value=\"---\">---</option>\n";
      foreach ($cursos as $curs){
      echo "<option value=\"$curs\">$curs</option>\n";        
      }
?>
    </select>
    <input type="submit" value="Refrescar">
  </form>
<?php
  
// IMPRESSIÓ DE TAULA
if ($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset($_POST['curs']) && $_POST['curs']!="---") {
    $curstriat=$_POST['curs'];
    $curs=$curstriat;
    echo "curs triat: $curstriat <br>";
    echo "<p>Pulsi sobre una sessió per obtenir més informació</p>\n";
    
    //Obtenim l'id del curs triat ja que el necessitarem
    $cursid=findid($curstriat,'curs',$dbc);
    if ($conf['debug']=='on') echo "cursid: $cursid <br>";
    
    //Obtenim la llista d'extraescolars ofertades al curs triat
    $extraescolars=getextraescolarsbycourse($cursid,$dbc);
    if ($conf['debug']=='on') echo "extraescolars<br>";
    if ($conf['debug']=='on') print_r($extraescolars);
    
    //Obtenim la llista de sessions per a cada extraescolar
    //Feim un array asociatiu amb l'id de l'extraescolar com a clau
    //i un array amb la llista de sessions com a valor
    foreach ($extraescolars as $ee){
      $sessions[$ee]=getsessionsbyextraescolar($ee,$dbc);
    }
    if ($conf['debug']=='on') echo "<br>sessions<br>\n";
    if ($conf['debug']=='on') print_r($sessions);
    
    //Obtenim dia i hora de cada sessió
    //Com que n'hi podria haver més d'una es guarda a una array associatiu
    //Clau l'index de sessió
    //Valor un array associatiu amb els dies i hores. Dia clau i hora valor. Tants d'elements com hores hi hagi.
    foreach ($extraescolars as $ee){
      $eesessions=$sessions[$ee];
      foreach ($eesessions as $sessionid){
        $hours[$sessionid]=gethoursbysession($sessionid,$dbc);
      }
    }
    if ($conf['debug']=='on') echo "<br>hores<br>\n";
    if ($conf['debug']=='on') print_r($hours);
    
    //Muntam array d'hores i dies per mostrar la taula
    $dies=array();
    $hores=array();
      //Recorrem totes les hores de totes les sessions de totes les extraescolars
      foreach ($extraescolars as $ee){
        $eesessions=$sessions[$ee];
        foreach ($eesessions as $sessionid) {
          $sessionhours=$hours[$sessionid];
          foreach ($sessionhours as $day=>$hour){
            if (!in_array($hour,$hores))
              $hores[]=$hour;
            if (!in_array($day,$dies))
              $dies[]=$day;
          } 
        }
      }
      //Ordenam hores (fàcil, fàcil)
      sort($hores);
      //Ordenam dies (sí és una nyapa, però no se m'ocorr altra cosa)
      $weekdays=['DILLUNS','DIMARTS','DIMECRES','DIJOUS','DIVENDRES','DISSABTE','DIUMENGE'];
      $dies_ordenats=array();
      foreach ($weekdays as $weekday){
        if (in_array($weekday,$dies))
          $dies_ordenats[]=$weekday;          
      }
      if (count($dies)!=count($dies_ordenats)) {
        echo "ERROR Aquests 2 arrays haurien de tenir el mateix nombre d'elements i no és així<br>\n";
        print_r ($dies);
        print_r ($dies_ordenats);
      } else {
        $dies=$dies_ordenats;
      }
    if ($conf['debug']=='on') echo "<br>dies<br>\n";
    if ($conf['debug']=='on') print_r($dies);
    if ($conf['debug']=='on') echo "<br>hores<br>\n";
    if ($conf['debug']=='on') print_r($hores);
    
    //TODO: Marcar les sessions de las que ja no queden places
    
    // primera versió en la que no s'obtenia la informació de la base de dades
    //$dies=['DILLUNS','DIMARTS','DIMECRES','DIJOUS'];
    //$hores=[12,13,14,17];
    
  $numhores=count($hores);
  ?>
  <table border="1">    
  <?php
  // table headings
  echo "<tr><th></th>";
    foreach ($dies as $dia){
      echo "<th>$dia</th>";
    }
  echo "</tr>\n";
//  echo "<tr><th></th>";
//    foreach ($dies as $dia) {
//     foreach ($hores as $hora){
//       echo "<th>$hora</th>";
//     }
//    }
//  echo "</tr>\n";
    // table contents
  foreach($hores as $hora){
    echo "<tr>";
    echo "<th>";
      echo $hora;
    echo "</th>";
    foreach($dies as $dia){
      //foreach($hores as $hora){
        echo "<td>";
        $ss=getsessions($dia,$hora,$curs,$dbc);
        foreach ($ss as $s){
          //echo "n: ".$s['nom']." i: ".$s['id']."<br>";
          echo "&bull;<a href='./extraescolar.php/?id={$s['id']}' title='{$s['nomextesc']}'>".$s['nom']."</a><br />";
        }
        echo "</td>";
      //}
    }
    echo "</tr>\n";
  }
  ?>
  </table>
<?php
  }
}

require('inc-html-foot.php');
?>
