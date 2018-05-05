<?php

if (isset($_POST["courseName"]))
{
  if(strlen($_POST["courseName"]) > 2){
  $sql = sprintf("INSERT INTO course(name) VALUES('%s')",
  $conn->real_escape_string($_POST["courseName"]));
  $conn->query($sql);
  }else{
      echo "Course name length needs at least 2 characthers";
  }
}
