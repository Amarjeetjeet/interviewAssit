<?php

include "connection.php";

// echo "hello";

// $sql1 = "select * from quiz where qid = 1";
// $result = mysqli_query($conn,$sql1);
// $row = mysqli_fetch_assoc($result);
// echo "<br>";

$correct_ans = $row['ans'];
echo "<br>";
echo "<br>";

echo $correct_ans;

echo "<br>";
$selected_choice = $_POST['option'];
echo "<br>";
echo "<br>";

echo $selected_choice;

session_start();
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0 ;
}
$number = $_POST['num'];
$pre = $number - 1 ;
if($_POST['pre']){
    header("Location: http://localhost/project/mcq-test.php?n=". $pre);
}

if($_POST['next']){

    $selected_choice = $_POST['option'];
    $next = $number + 1 ;

    $sql = "select * from quiz";
    $total_que = mysqli_num_rows(mysqli_query($conn,$sql));
    

    $sql1 = "select * from quiz where qid = {$number}";
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($result);

    $correct_ans = $row['ans'];

    echo $selected_choice;
    echo $correct_ans;


    if($selected_choice == $correct_ans){
        $_SESSION['score'] +=1 ;
    }

    if($number == $total_que){
        $num = $_SESSION['score'];
        $sql2 = "INSERT INTO `result`(`id`, `mark`,total_marks) VALUES ('{$_SESSION['user_id']}','{$num}',{$total_que}) ";
        $result3 = mysqli_query($conn,$sql2);
        header("Location: http://localhost/project/final.php");
    }
    else{
        header("Location: http://localhost/project/mcq-test.php?n=". $next);
    }
    
    
}

?>