<?php
if (isset($_POST["submit"]))
{
  $studentId = preg_replace('/[^0-9]/', '', $_POST["id"]);
  if(strlen($studentId) == 6 && strlen($_POST["firstname"])> 3 && strlen($_POST["lastname"])> 3 && strlen($_POST["email"])>3){
  $sql = sprintf("INSERT INTO user(id,firstname,lastname,email,course) VALUES(".$studentId .",'%s','%s','%s','%s')",
  $conn->real_escape_string($_POST["firstname"]),
  $conn->real_escape_string($_POST["lastname"]),
  $conn->real_escape_string($_POST["email"]),
  $conn->real_escape_string($_POST["course"]));
  $conn->query($sql);
  header ("Location: index.php");
}else{
  echo "Something is wrong with the input, please try again.";
}
}
