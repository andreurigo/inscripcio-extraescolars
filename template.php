<?php
require('inc-header.php');
define('TITLE',"template");



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
  
  function printform(){
  ?>
  <form method="POST" action="">
  <p>
    XXXXXXXXXXX
    </p>
  <label>Field: <input type="text" name="field"></label><br />
  <input type="submit">
</form>
  <?php
}
  

    
if ($_SERVER['REQUEST_METHOD']=='POST'){


  
} else {
  
printform();
  
}
?>
  
</body>
</html>