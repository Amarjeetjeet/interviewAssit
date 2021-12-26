<?php
    session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: http://localhost/project/login.php");
}
else{

    
    echo "Congratulations You got : ". $_SESSION['score'] . " Marks";
    
    echo "<p><a href='index.php'>Mcq test</a></p>";
    echo "<p><a href='user_details.php'>See your result</a></p>";
    
    ?>


<?php

unset($_SESSION['score']);

}
?>