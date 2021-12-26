<?php
include "connection.php";
$post_id = $_GET['id'];

$sql = "DELETE FROM `post` WHERE post_id = {$post_id} ";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/project/blog.php");
}
else{
    echo "Upload Failed";
}
?>