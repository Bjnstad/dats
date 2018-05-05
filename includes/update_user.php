<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["email"]))
{
  $studentId = preg_replace('/[^0-9]/', '', $_POST["studentId"]);
  $sql = sprintf("UPDATE user SET id = '%s', firstname = '%s', lastname = '%s',email = '%s', course= '%s' WHERE id = '%s'",
  $conn->real_escape_string($studentId),
  $conn->real_escape_string($_POST["firstname"]),
  $conn->real_escape_string($_POST["lastname"]),
  $conn->real_escape_string($_POST["email"]),
  $conn->real_escape_string($_POST["course"]),
  $conn->real_escape_string($_POST["oldStudId"]));
  $conn->query($sql);
  header ("Location: index.php");
}
