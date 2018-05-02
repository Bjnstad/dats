<?php
$sql = "SELECT * FROM user";
$allUsers = $conn->query($sql);
?>
<div class="dashboard">
    <h2> Dashboard </h2>
</div>
<div class="boxHolder">
    <div class="studBox">
        <h3>Total Students</h3>

    </div>
    <div class="studBox" style="background-color:#39ce89">
        <a href="register-student.php">
            <h3 style="padding: 15px; width: 160px; background-color: red; margin: auto; margin-top: 30px">Register student</h3>

        </a>
    </div>

    <table style='border: solid 1px black;'>
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
        </tr>
        <?php
            foreach( $allUsers->fetch_all() as $row ) {
                echo "<tr>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['0']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['1']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['2']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['3']. " </td>";
                echo "<td style='width: 150px; border: 1px solid black;'>" . $row['4']. " </td>";
                echo "
                    <form action=\"update-student.php?studId=".$row['0'] ."\" method=\"post\">
                        <td>
                            <input type='submit' name='submit' value='Edit'>
                            <input type='reset' name='submit' value='Delete'>
                        </td>
                    </form>";
                echo "</tr>";
            }
        ?>
    </table>
</div>