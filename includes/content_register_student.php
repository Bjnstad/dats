<?php

$sql = "SELECT * FROM course";
$courses = $conn->query($sql);

?>

<div class="dashboard">
    <h2> Add student </h2>
</div>
<div class="boxHolder">
    <div>
        <h3 style="color:#000">Please fill the fields and press submit/enter. <h3/>
    </div>
    <form action="#" method="post">
        Student Number: <input type="text" name="id"><br>
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        E-mail: <input type="text" name="email"><br>
        Course: <select name="course">
        <?php
            foreach( $courses->fetch_all() as $row ) {
                echo '<option value="'. $row['0'] . '">';  echo $row['1']; ?></option><?php
            }
        ?>
        </select>
        <input name="submit" type="submit">
    </form>
</div>