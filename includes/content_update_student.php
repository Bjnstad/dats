<?php

$courseSql = "SELECT * FROM course";
$courses = $conn->query($courseSql);

$sql = "SELECT user.id, user.firstname, user.lastname, user.email, user.course, course.name from user, course where user.course = course.id and user.id =". $_GET["studId"];
$user = $conn->query($sql);
$obj = $user->fetch_object();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

         if(isset($obj)){
           echo "<table style='border: solid 1px black; width:100%; margin-top:5px;'>";
           echo "<tr><th>Student number</th><th>Firstname</th><th>Lastname</th><th>E-mail</th><th>Course</th></tr>";
           echo "<tr>";
           echo "<td style='width: 150px; border: 1px solid black;'>s" . $obj->id. " </td>";
           echo "<td style='width: 150px; border: 1px solid black;'>" . $obj->firstname. " </td>";
           echo "<td style='width: 150px; border: 1px solid black;'>" . $obj->lastname. " </td>";
           echo "<td style='width: 150px; border: 1px solid black;'>" . $obj->email. " </td>";
           echo "<td style='width: 150px; border: 1px solid black;'>" . $obj->name. " </td>";
           echo "</tr>" . "\n";
           echo "</table>";
         }else{
           echo "No student were found with this id";
         }
         ?>

       <div>
         <h3 style="color:#000">To update, please change the fields you would like to update and press submit/enter.<h3>
       </div>

         <form action="" method="post">
           Student Number: <input type="text" name="studentId" value="s<?php echo $obj->id ?>"<br>
           <input type="hidden" name="oldStudId" value="<?php echo $_GET["studId"] ?>"<br>
           Firstname: <input type="text" name="firstname" value="<?php echo $obj->firstname ?>"<br>
           Lastname: <input type="text" name="lastname" value="<?php echo $obj->lastname ?>"<br>
           E-mail: <input type="text" name="email" value="<?php echo $obj->email ?>"<br>
           Course: <select name="course">
                   <?php
                   $row = $courses->fetch_all();
                   foreach($row as $item) {  ?>
                   <?php
                  if($obj->course == $item['0']){
                   echo '<option selected value="'. $item['0']  . '">'; echo $item['1'];
                    }
                  if($obj->course != $item['0']){
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
