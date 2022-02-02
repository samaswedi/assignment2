<?php
session_start();
echo "welcome".$_SESSION['username'] .'<br>';



//echo "your first name is:".$_SESSION['name'];

//echo "Your first name is :" .$firstname .'<br>';
    //echo "Your last name is :" .$lastname .'<br>';
    //echo "Your email or mobile is :" .$email .'<br>';
    //echo "Your password is :" .$password .'<br>';
    //echo "Your date of birth is : ".$day; echo "-" .$month; echo "-".$year .'<br>';
    //echo "Your gender is :".$gender;

?>
<a href ="logout.php"> logout </a>