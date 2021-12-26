<?php 

include "header.php";
include "connection.php";
?>

<?php


$sql4 = "select * from language";

$result4 = mysqli_query($conn,$sql4);
echo "<div class='flex'>";
while($row4 = mysqli_fetch_assoc($result4)){
   echo "<div  class='subject wrapper'>";
   echo "<a href='question.php?lan={$row4['language_name']}'>{$row4['language_name']} </a>";
   echo "<br>";
   echo "</div>";
}
echo "</div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="question.css">
    <title>Question</title>
</head>
<body>

    <div class="wrapper">

        <p class="heading">Do you have what it takes to ace a <?php echo $lan = $_GET['lan']; ?>     Interview?
We are here to help you in consolidating your knowledge and 
concepts in  <?php echo $lan = $_GET['lan']; ?> . The following article will cover all the popular
<?php echo $lan = $_GET['lan']; ?>  interview questions for freshers in depth.</p>

<p class="heading"> Go through all the questions to enhance your chances 
of performing well in the interviews. The questions will revolve around the basic and core fundamentals  of  <?php echo $lan = $_GET['lan']; ?> .

</p>

<p class="heading">So, let’s dive deep into the plethora of useful interview questions on  <?php echo $lan = $_GET['lan']; ?> .

</p>
<br>
<p class="heading bold"><?php echo $lan = $_GET['lan']; ?> Basic Interview Question

</p>



    </div>
</body>
</html>
<?php

if(empty( $_GET['lan'])){
    echo "<p class='heading bold'>Select Language first  </p>";
    die();
    $lan = "java";
}
else{

    $lan = $_GET['lan'];
}
$sql = "SELECT * FROM {$lan}";

$result = mysqli_query($conn,$sql);

echo "<div class='wrapper'>";

if(mysqli_num_rows($result) < 0){
    
    echo "<p>No records found";
    
}
else{
    
    
    $n =1;
    while($row = mysqli_fetch_assoc($result)){
        echo "<p class = 'heading bold'>$n . " . "</p>";
        echo  "<p class = 'heading bold'> {$row['question']} </p>";
        echo "<br>";
        echo "<p class='answer'> {$row['answer']}</p>";
        echo "<br>";
        $n++;
        
    }
}

echo "</div>";


?> 