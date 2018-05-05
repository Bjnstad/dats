<?php
require_once("database.php");
require_once("includes/update_user.php");
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
 <header>
   <div class="topBar">
       <div class="credential">
         <p> Flict student information database </p>
       </div>
   </div>
 </header>

 <div class="wraper">
    <?php require("includes/content_update_student.php"); ?>
 </div>

</body>
<footer>
  <?php require("includes/footer.php"); ?>
</footer>
</html>
