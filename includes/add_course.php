<?php

if (isset($_POST["submit"]))
{
  $sql = sprintf("INSERT INTO course(name) VALUES('%s')",
  $conn->real_escape_string($_POST["courseName"]));
  $conn->query($sql);
}
