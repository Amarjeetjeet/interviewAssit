<?php
include "header.php"; ?>
 <?php 

session_start();
if(isset($_SESSION['username'])){
    header("Location: http://localhost/project/index.php");
}
 ?>

<?php

// define variables and set to empty values

$fnameErr = $lnameErr = $usernameErr = $emailErr = $passwordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";
    $firstname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];
    
    if(strlen($password) <= 8){
        $passwordErr = "password should atleast 8 or more characters";
    }
    else{
        $password = md5($_POST['password']);

    }

    if(strlen($username) <= 5){
        $usernameErr = "Username should atleast 5 or more characters";

        
    }
    else{

        $sql = "SELECT username FROM users WHERE username = '{$username}'";
        
        $result = mysqli_query($conn,$sql) or die("Query yoyo failed");
        
        if(mysqli_num_rows($result) > 0 ){
            $usernameErr = "Username Already Exists.";
        }else{
            $sql1 = "INSERT into users(firstname,lastname,username,email,password)
        values('{$firstname}','{$lastname}','{$username}','{$email}','{$password}')" or die("Query failed");
        if(mysqli_query($conn,$sql1)){
            header("Location: http://localhost/project/login.php");
        }
    }
    
    
        
    }

  
}


?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}

.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

form{
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 90%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

.error{
    color :red;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
</head>
<body>  


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<h3>signup Here</h3>
<label for="exampleInputCategory">Firstname</label> 
    <input type="text" name="fname" id="" required>
    <span class="error">* <?php echo $fnameErr;?></span>
    <br>   

    <label for="exampleInputCategory">Lastname</label>    
    <input type="text" name="lname" id="" required>
    <span class="error">* <?php echo $lnameErr;?></span>
    <br>   

    <label for="exampleInputCategory">Username</label>    
    <input type="text" name="username" id="name" required>
    <span class="error">* <?php echo $usernameErr;?></span>
    <br>   

    <label for="exampleInputCategory">Email</label>    
    <input type="email" name="email" id="password" required> 
    <span class="error">* <?php echo $emailErr;?></span>
    <br>   

    <label for="exampleInputCategory">Password</label>     
    <input type="password" name="password" id="" required>
    <span class="error">* <?php echo $passwordErr;?></span>
    <br>   

    <input type="submit" name="submit" id="submit">
    <a href="login.php">Already a user Log in</a>

 
</form>
</body>
</html>
