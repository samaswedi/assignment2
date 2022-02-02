<?php

session_start();
$firstname = $_POST['first-name'];
$lastname = $_POST['last-name'];

$day = $_POST['birth-day'];
$month = $_POST['birth-month'];
$year = $_POST['birth-year'];
$password = $_POST['up-password'];
$email = $_POST['email-mobile'];
$passwordLen = strlen($password);
$firstnameLen = strlen($firstname);
$lastnameLen = strlen($lastname);
$errors =[]; //array for validtion errors


$dbemail="sama.swedi@gmail.com";
$dbPass = "123456789";


if(!isset($_POST['register'])){
header("location:sign.php");
}else{

//email validation
if(empty($email)){
    $errors[] = "Email Required";
} elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = "Email Invalid";
}

//password validation
if(empty($password)){
    $errors[]="Password Required";
} else if($passwordLen < 8 || $passwordLen > 30){
    $errors[]= "Password range should be between 8 - 30 letters";
}

//gender validation
if(empty($_POST['gen'])){
    $errors[] = "Gender Required";
}  elseif ($_POST['gen'] == "female") {
    $_POST['gen'] = 'female';
}elseif($_POST['gen'] == "male"){
    $_POST['gen'] ='male';
}else{
    $errors[]="invalid gender";
}

//first name validation

if (empty($firstname)){
    $errors[] = "First name Required";
}elseif($firstnameLen < 4 || $firstnameLen > 30){
    $errors[] = "First name range should be between 4 - 30 letters";
} elseif (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {//to make sure first name contains only alphabets
    $errors[] = "First name invalid. Only letters and white space allowed"; 
}



//last name validation
if (empty($lastname)){
    $errors[] = "Last name Required";
}elseif($lastnameLen < 4 || $lastnameLen > 30){
    $errors[] = "Last name range should be between 4 - 30 letters";
}elseif (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {//to make sure last name contains only alphabets
    $errors[] = "Last name invalid.Only letters and white space allowed"; 
}






if(empty($errors)){

   if($email == $dbemail){
       if($password == $dbPass){
           session_start();
           $_SESSION['username']="Sama' Swedi";
           $_SESSION['mail'] = $email;
           $_SESSION['password'] = $password;
          header("location:home.php");
       
       }
       else {
           $_SESSION['error'] = "Password Invalid";  //session for email and password errors
           header("location:sign.php");
       }
   }else {
       $_SESSION['error'] = "Email Invalid";
       header("location:sign.php");
   }

 
 }

 else{
     $_SESSION['errors'] = $errors;
     header("location:sign.php");
 
}

}

    
?>

