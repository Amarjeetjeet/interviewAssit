<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,700;1,300&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <!-- <a href="index.php" id="logo"><img src="images/news.jpg"></a> -->
                <p>Interview Assit</p>
                
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                <li><a href='index.php'>Home</a></li>
                    <li><a href='mcq-test.php?n=1'>Mcq-test</a></li>
                    <li><a href='question.php?lan=java'>Question answer</a></li>
                    <li><a href='blog.php'>Blog</a></li>
                    <li><a href='user_details.php'>user-details</a></li>
                    <?php 

                    session_start();

                    if(isset($_SESSION['username'])){
                    $str = $_SESSION['username'];
                    echo "<li><a href='logout.php'>$str  Logout</a></li>";
    
                    }
                else{

                      echo  "<li><a href='signup.php'>Login/signup</a></li>";

                    }
                    ?>


                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
