<?php

include "connection.php";
$firstname = mysqli_real_escape_string($conn,$_POST['fname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lname']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = md5($_POST['password']);
if(isset($_POST['submit'])){
  if(empty($_POST['fname'])){
      echo "Firstname is empty";
  }
  else{
      echo htmlspecialchars($_POST['fname']);
  }
}
$sql = "SELECT username FROM users WHERE username = '{$username}'";

$result = mysqli_query($conn,$sql) or die("Query yoyo failed");

if(mysqli_num_rows($result) > 0 ){
    echo "<p style = 'color:red; text-align:center;'> Username already exists . </p>";
}else{
    $sql1 = "INSERT into users(firstname,lastname,username,email,password)
    values('{$firstname}','{$lastname}','{$username}','{$email}','{$password}')" or die("Query failed");


  if(mysqli_query($conn,$sql1)){
    header("Location: http://localhost/project/index.php");
}
}



?>