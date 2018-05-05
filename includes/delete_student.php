<?php
if(isset($_GET['studId'])){
  $sql = sprintf("DELETE FROM `user` WHERE id = ('%s')",
  $conn->real_escape_string($_GET['studId']));
  $conn->query($sql);
}
