<?php
require_once("database.php");
require_once("add_course.php");
require_once("delete_student.php");

$sql = "SELECT user.id, user.firstname, user.lastname, user.email, course.name from user, course where user.course = course.id";
$allUsers = $conn->query($sql);

$countStudents= "SELECT COUNT(id) as antall from user";
$count = $conn->query($countStudents);
?>

<div class="dashboard">
    <h2> Dashboard </h2>
</div>
<div class="boxHolder">
    <div class="studBox">
        <h3>Total Students</h3>
        <img id="studBoxImg1" src="./assets/avatar2.png" alt="image of student" style="max-height: 60%">
        <?php $countObj = $count->fetch_object();
        echo "<h1>" . $countObj->antall ."</h1>" ?>
    </div>
    <div class="studBox" style="background-color:#39ce89">
      <a href="register-student.php">
       <h3>Register student</h3>
       <img id="studBoxImg2" src="./assets/add.png" /></a>
    </div>
    <div class="studBox" style="background-color:#e58d49">
   <h3>Register Course</h3>
   <form action="" method="post">
     <input type="text" name="courseName" placeholder="Course name" style="width: 85%;"><br>
     <input type="submit" value="Submit" name="submit">
   </form>

  </div>
  <?php
  if($countObj->antall > 0){
    echo "<div>
        <table style='border: solid 1px black; width:100%;'>
            <tr>
                <th>
                    Student number
                </th>
                <th>
                    Firstname
                </th>
                <th>
                    Lastname
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Course
                </th>
                <th>
                    Edit
                </th>
            </tr>";
  }else{
    echo "<h1>Please add a student</h1>";

  }

        ?>
        <?php
            foreach( $allUsers->fetch_all() as $row ) {
                echo "<tr>";
                echo "<td style='width: 150px; border: 1px solid black;'>s". $row['0']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['1']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['2']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['3']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['4']. " </td>";
                echo "<td>
                  <div class=\"flex\">
                    <a href=update-student.php?studId=".$row['0']." class=\"btn\">Edit</a>
                    <a href=index.php?studId=".$row['0']." class=\"btnDelete\">Delete</a>
                  </div>
                  </td>";
                  echo "</tr>" . "\n";
            }
        ?>
    </table>
  </div>
</div>
