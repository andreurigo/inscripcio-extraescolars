<?php
// Aquest fitxer està deprecat. Es podria esborrar. El deix de moment per si de cas...
session_start();
define('TITLE',"Inscripció Activitats Extraescolars SJO Primària 19-20");
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
  require("connect.php");
  require("functions.php");

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
    echo "curs triat: $curstriat <br>";
    
    //Obtenim l'id del curs triat ja que el necessitarem
    $cursid=findid($curstriat,'curs',$dbc);
    echo "cursid: $cursid <br>";
    
    //Obtenim la llista d'extraescolars ofertades al curs triat
    $extraescolars=getextraescolarsbycourse($cursid,$dbc);
    echo "extraescolars<br>";
    print_r($extraescolars);
    
    //Obtenim la llista de sessions per a cada extraescolar
    //Feim un array asociatiu amb l'id de l'extraescolar com a clau
    //i un array amb la llista de sessions com a valor
    foreach ($extraescolars as $ee){
      $sessions[$ee]=getsessionsbyextraescolar($ee,$dbc);
    }
    echo "<br>sessions<br>\n";
    print_r($sessions);
    
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
    echo "<br>hores<br>\n";
    print_r($hours);
    
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
    echo "<br>dies<br>\n";
    print_r($dies);
    echo "<br>hores<br>\n";
    print_r($hores);
    
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
      echo "<th colspan='$numhores'>$dia</th>";
    }
  echo "</tr>\n";
  echo "<tr><th></th>";
    foreach ($dies as $dia) {
    foreach ($hores as $hora){
      echo "<th>$hora</th>";
    }
    }
  echo "</tr>\n";
    // table contents
  foreach($cursos as $curs){
    echo "<tr>";
    echo "<th>";
      $ordinal=explode(" ",$curs);
      echo $ordinal[0];
    echo "</th>";
    foreach($dies as $dia){
      foreach($hores as $hora){
        echo "<td>";
        $ss=getsessions($dia,$hora,$curs,$dbc);
        foreach ($ss as $s){
          //echo "n: ".$s['nom']." i: ".$s['id']."<br>";
          echo "<a href='./extraescolar.php/?id={$s['id']}' title='{$s['nomextesc']}'>".$s['nom']."</a><br />";
        }
        echo "</td>";
      }
    }
    echo "</tr>\n";
  }
  ?>
  </table>
<?php
  }
}
?>
</body>
</html>