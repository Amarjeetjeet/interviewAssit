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
  <link rel="stylesheet" href="mcq-test.css">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>mcq test</title>
</head>
<body>

<form action="quiz.php" method="post">
  <?php 
  include "connection.php";

  $n = $_GET['n'];
  $sql = "Select * from quiz where qid = {$n}";
  $sql1 = "Select * from quiz";
  $result = mysqli_query($conn,$sql);
  $result1 = mysqli_query($conn,$sql1);
  $total_que = mysqli_num_rows($result1);

  while($row = mysqli_fetch_assoc($result)){

  ?>


  <p class= "question_number_header"><?php echo $row['qid'] . " Question out of " . $total_que ; ?> </p>
  
  <p class="que"><?php echo $row['que'] . "?"; ?></p>
  <div class="radio-div">

    <input type="radio" name="option" value="<?php echo $row['o1']; ?>" class="radio">
    
    <label for="" class="option"><?php echo $row['o1']; ?></label>
  </div>
    <br>
    <div class="radio-div">
    <input type="radio" name="option" value="<?php echo $row['o2']; ?>" class="radio">
    <label for="" class="option"><?php echo $row['o2']; ?></label>
  </div>
  <br>
  <?php
  }
  if($n == 1){
    
    echo '<input type="hidden" name="pre" value="" >';
  }
  else{
    echo '<input type="submit" name="pre" value="previous" >';
    
  }
  ?>
  
  <input type="hidden" name="num" value="<?php echo $n; ?>" >
  
  <?php

if($n == $total_que){
  
  echo '<input  type="submit" name="next" value="submit">';
}
else{
  echo '<input  type="submit" name="next" value="next">';
  
}

?>
</form>

</body>
</html>

<?php

 }

 ?>