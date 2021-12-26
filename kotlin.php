<html>
<head>
    <title></title>
</head>
<body>

<?php 
   include "connection.php";
    mysqli_select_db($conn,"project");
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    } 
    $conn->query("CREATE DATABASE IF NOT EXISTS `project`"); 
    $sql="CREATE TABLE IF NOT EXISTS `kotlin`(
                `qid` INT AUTO_INCREMENT PRIMARY KEY,
                `question` VARCHAR(500) NOT NULL,
                `answer` VARCHAR(1000) NOT NULL);";
        if($conn->query($sql))
        {
            echo 'table is created succssfully';
        }
       
    
        $conn->close();
?>
</body>