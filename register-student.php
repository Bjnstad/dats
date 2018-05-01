<?php


$tilkobling=mysqli_connect("localhost","root","root","dats");

if (true)
{
  $sql = sprintf("INSERT INTO user(studentId,firstname,lastname,email,course) VALUES('%s','%s','%s','%s','%s')",
  $tilkobling->real_escape_string($_POST["studentId"]),
  $tilkobling->real_escape_string($_POST["firstname"]),
  $tilkobling->real_escape_string($_POST["lastname"]),
  $tilkobling->real_escape_string($_POST["email"]),
  $tilkobling->real_escape_string($_POST["course"]));

  $tilkobling->query($sql);

  //header ("Location: index.php");
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

    <div>
      <h3 style="color:#000">Please fill the fields and press submit/enter.<h3>
    </div>
      <form action="#" method="post">
        Student Number: <input type="text" name="studentId" value="s315309"><br>
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        E-mail: <input type="text" name="email"><br>
        Course: <select name="course">
                <?php

                foreach( $datasett->fetch_all() as $row ) {
                 echo '<option value="'. $row['0'] . '">';  echo $row['1']; ?></option>
                <?php } ?><br>
              </select>
        <input name="submit" type="submit">
      </form>

     </div>

   </div>


<footer>
</footer>
</body>
</html>
