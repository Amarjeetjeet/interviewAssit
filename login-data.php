<?php

include "connection.php";


$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = md5($_POST['password']);


 $sql = "SELECT *  FROM users where username = '{$username}' AND password = '{$password}'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: http://localhost/project/index.php");
    }


}
else{
  echo "<p style = 'color:red; text-align:center;'> Login failed. </p>";

}





?>