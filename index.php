<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 require_once("database.php");?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
 <header>
	<?php require("includes/header.php");?>
 </header>

 <div class="wraper">
    <?php require("includes/content_index.php"); ?>
 </div>


</body>
<footer>
</footer>
</html>
