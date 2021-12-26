<?php
include "header.php";
if(isset($_FILES['fileToUpload'])){
    $error = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_temp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $tmp = explode('.', $file_name);
    $file_ext = strtolower(end($tmp));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)===false){
        $error[] = "This extension file is not allowed, please choose JPG or PNG file";

    }

    if($file_size > 2097152)
    {
    $error[] = "File size must be 2mb or lower.";
    }

    if(empty($error)==true){
        move_uploaded_file($file_temp,"upload/".$file_name);
    }
    else{
        print_r($error);
        echo "Error";
        die();
    }

}
if(isset($_POST['submit'])){
include "connection.php";
$userid = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = date("d,M,Y");
$category = $_POST['category'];

$sql = "INSERT into post(author,title,description,category,post_date,post_img)
                    values({$userid},'{$title}','{$description}','{$category}','{$date}','{$file_name}')" or die("Query Failed");
                     
if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/project/blog.php");
}
else{
    echo "Upload Failed";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload data</title>
</head>
<body>
    <div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    
    <label>Title</label>
    <input type="text" name="title" id="">
    <br>

    <label>Description</label>
    <textarea name="description" id="" cols="20" rows="10"></textarea>
    <!-- <input text="text" name="description" id=""> -->
    <br>

    <label>Category</label>
    <input type="text" name="category" id="">
    <br>
    
    <label>Image</label>
    <input type="file" name="fileToUpload" required>
    <br>

    <input type="submit" value="Submit" name="submit">
    
    </form>
    </div>
</body>
</html>