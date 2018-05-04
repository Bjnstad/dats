<?php
if (isset($_POST["email"]))
{

  $sql = sprintf("INSERT INTO user(id,firstname,lastname,email,course) VALUES(".$_POST["id"] .",'%s','%s','%s','%s')",
  $conn->real_escape_string($_POST["firstname"]),
  $conn->real_escape_string($_POST["lastname"]),
  $conn->real_escape_string($_POST["email"]),
  $conn->real_escape_string($_POST["course"]));

  $conn->query($sql);

  header ("Location: index.php");
}