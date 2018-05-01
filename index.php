<?php require_once("studentDB.php");?>
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
   <div class="dashboard">
     <h2> Dashboard </h2>
   </div>
   <div class="boxHolder">

     <div class="studBox">
      <h3>Total Students</h3>
      <?php
      $stud = new studentDB();
      $stud->getStudents();
      ?>

     </div>
        <div class="studBox" style="background-color:#39ce89">
          <a href="register-student.php">
           <h3 style="padding: 15px; width: 160px; background-color: red; margin: auto; margin-top: 30px">Register student</h3>
          </div>

          <?php
          echo "<table style='border: solid 1px black;'>";
          echo "<tr><th>Student number</th><th>Firstname</th><th>Lastname</th><th>E-mail</th><th>Course</th><th>Edit</th></tr>";
          $stud = new studentDB();
          $stud->studentinfo();

          ?>
   </div>


</body>
<footer>
</footer>
</html>
