<?php require_once("studentDB.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $sql = sprintf("INSERT INTO user(studentId,firstname,lastname,email,course) VALUES('%s','%s','%s','%s','%s')",
  $tilkobling->real_escape_string($_POST["studentId"]),
  $tilkobling->real_escape_string($_POST["firstname"]),
  $tilkobling->real_escape_string($_POST["lastname"]),
  $tilkobling->real_escape_string($_POST["email"]),
  $tilkobling->real_escape_string($_POST["course"]));
  $tilkobling->query($sql);
  header ("Location: index.php");
}

$sql = "SELECT * FROM course";
$datasett = $tilkobling->query($sql);

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
   <div class="dashboard">
     <h2> Add student </h2>


   </div>
   <div class="boxHolder">

     <div class="studBox" style="width: 100%; height: 60px;">
      <h3 >Information on this student:</h3>
      <?php
      echo "<table style='border: solid 1px black; width:100%; margin-top:5px;'>";
      echo "<tr><th>Student number</th><th>Firstname</th><th>Lastname</th><th>E-mail</th><th>Course</th></tr>";
      $stud = new studentDB();
      $stud->getStudent("0","s315309");
      ?>
    </table>
    <div>
      <h3 style="color:#000">To update, please change the fields you would like to update and press submit/enter.<h3>
    </div>
      <form action="edit-student.php" method="post">
        Student Number: <input type="text" name="studentId" value="s315309"><br>
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        E-mail: <input type="text" name="email"><br>
        Course: <select name="course">
                <?php
                $rad = $datasett->fetchAll();

                foreach($rad as $item) {?>
                <?php echo '<option value="'. $item['0'] . '">';  echo $item['1']; ?></option>
                <?php } ?><br>
              </select>
        <input name="submit" type="submit">
      </form>

     </div>

   </div>


</body>
<footer>
</footer>
</html>
