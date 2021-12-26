<?php
include "header.php";
if(!isset($_SESSION['user_id'])){
  

    header("Location: http://localhost/project/login.php");

  
   }
   else{
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user -details</title>
</head>
<style>
    table,th,td {
        padding : 10px;
  border: 1px solid black;
}
</style>
<body>
    <p>User Results</p>

        <table >

            <tr>
                <th>Marks</th>
                <th>Time</th>
            </tr>
            <?php 

            include "connection.php";
            $sql = "SELECT * from result where id = {$_SESSION['user_id']}";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <td><?php echo $row['mark'] . "Out of " . $row['total_marks'] ?></td>
                <td><?php echo $row['time']; ?></td>
            </tr>

            <?php
                }
            }
            ?>
        </table>
    
</body>
</html>

<?php

        }

        ?>

