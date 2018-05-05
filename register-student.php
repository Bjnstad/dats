<?php
require_once("database.php");
require_once("includes/add_user.php");
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
         <a href="http://dats.vlab.cs.hioa.no:8002/">
         <p> Student information database </p>
       </a>
       </div>
   </div>
 </header>

 <div class="wraper">
    <?php require("includes/content_register_student.php"); ?>
 </div>

</body>
</html>
