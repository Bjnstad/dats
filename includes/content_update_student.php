<?php
$sql = "SELECT * FROM course";
$courses = $conn->query($sql);

$sql = "SELECT * FROM user WHERE id =". $_GET["studId"];
$user = $conn->query($sql);

?>

<div class="dashboard">
        <h2 style="margin-left:15px;"> Updating entry with student number s<?php echo $_GET["studId"] ?> </h2>
      </div>
      <div class="boxHolder">
        <?php

        ?>

        <div class="studBox" style="width: 100%; height: 60px;">
         <h3 >Information on this student:</h3>
         <?php
         echo "<table style='border: solid 1px black; width:100%; margin-top:5px;'>";
         echo "<tr><th>Student number</th><th>Firstname</th><th>Lastname</th><th>E-mail</th><th>Course</th></tr>";

         $rad = $user->fetchAll();
         foreach($rad as $item) {
            echo $rad["id"];
         }
         ?>

       <div>
         <h3 style="color:#000">To update, please change the fields you would like to update and press submit/enter.<h3>
       </div>
       <?php
          while ($row = $user->fetchAll()) {
              echo    "test: ".        $row["id"];
          }
       ?>
         <form action="inc/edit-student.php" method="post">
           Student Number: <input type="text" name="studentId" value="s<?php echo $student['studentId'] ?>"<br>
           <input type="hidden" name="oldStudId" value="<?php echo $_GET["studId"] ?>"<br>
           Firstname: <input type="text" name="firstname" value="<?php echo $student['firstname'] ?>"<br>
           Lastname: <input type="text" name="lastname" value="<?php echo $student['lastname'] ?>"<br>
           E-mail: <input type="text" name="email" value="<?php echo $student['email'] ?>"<br>
           Course: <select name="course">
                   <?php
                   $rad = $courses->fetchAll();

                   foreach($rad as $item) {  ?>
                   <?php
                  if($student['courseId'] == $item['0']){
                   echo '<option selected value="'. $item['0']  . '">'; echo $item['1'];
                 }
                   if($student['courseId'] != $item['0']){
                      echo '<option value="'. $item['0'] . '">';  echo $item['1'];
                    }
                   ?>
                   </option>
                   <?php } ?><br>
                 </select>

           <input type="submit" name="submit" >
         </form>

        </div>

      </div>
