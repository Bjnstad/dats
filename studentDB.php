<?php



// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}





$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dats";


class studentDB {

private $servername = "localhost";
private $username = "root";
private $password = "root";
private $dbname = "dats";


public function getStudents(){
  try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT COUNT(email) from user");
      $stmt->execute();
      $count = $stmt->fetch();


      echo "<h1>".$count[0]."</h1>";

  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

}

public function getStudent($studentId){
  try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT studentId, firstname, lastname, email, course FROM user where studentId = ?");
      $stmt->bindParam(1, $studentId, PDO::PARAM_STR);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $student = $stmt->fetch();
      //foreach ($students as $student) {
        echo "<tr>";
        echo "<td style='width: 150px; border: 1px solid black;'>" . $student['studentId']. " </td>";
        echo "<td style='width: 150px; border: 1px solid black;'>" . $student['firstname']. " </td>";
        echo "<td style='width: 150px; border: 1px solid black;'>" . $student['lastname']. " </td>";
        echo "<td style='width: 150px; border: 1px solid black;'>" . $student['email']. " </td>";
        echo "<td style='width: 150px; border: 1px solid black;'>" . $student['course']. " </td>";
        echo "</tr>" . "\n";
    //  }
          echo "</table>";

      $conn = null;
    }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

}

public function studentExist($studentId){
  try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT studentId FROM user where studentId = ?");
      $stmt->bindParam(1, $studentId, PDO::PARAM_STR);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $student = $stmt->fetchAll();
      if($stmt->rowCount() == 0){
        return 0;
      }else{
        return 1;
      }
      $conn = null;
    }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }

}


public function studentinfo(){
try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT studentId, firstname, lastname, email, course FROM user");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $students = $stmt->fetchAll();
    foreach ($students as $student) {
      echo "<tr>";
      echo "<td style='width: 150px; border: 1px solid black;'>" . $student['studentId']. " </td>";
      echo "<td style='width: 150px; border: 1px solid black;'>" . $student['firstname']. " </td>";
      echo "<td style='width: 150px; border: 1px solid black;'>" . $student['lastname']. " </td>";
      echo "<td style='width: 150px; border: 1px solid black;'>" . $student['email']. " </td>";
      echo "<td style='width: 150px; border: 1px solid black;'>" . $student['course']. " </td>";
      echo "
      <form action=\"update-student.php?studId=".$student['studentId'] ."\" method=\"post\">
      <td>
        <input type='submit' name='submit' value='Edit'>
        <input type='reset' name='submit' value='Delete'>
      </td>";
      echo "</tr>" . "\n";
    }
        echo "</table>";

    $conn = null;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


}

}



?>
