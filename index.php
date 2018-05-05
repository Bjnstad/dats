<?php require_once("database.php");


?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
 <header>
   <div class="topBar">
       <div class="credential">
         <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
         <p> Student information database </p>
       </a>
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
