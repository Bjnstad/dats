<?php require_once("database.php");?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
 <header>
	<?php require("includes/header.php");?>
   <div class="topBar">
       <div class="credential">
         <p> Flict student information database </p>
       </div>
   </div>
 </header>

 <div class="wraper">
    <?php require("includes/content_index.php"); ?>
 </div>


</body>
<footer>
  <?php require("includes/footer.php"); ?>
</footer>
</html>
