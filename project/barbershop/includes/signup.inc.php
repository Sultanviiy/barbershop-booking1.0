<?php

if(isset($_POST["submit"])){
   // CHECK IT ****************************
    require('DB.php'); 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $name = htmlspecialchars( $name );
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $phone= $_POST['phone'];
    require_once 'functions.inc.php';
   if(emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat,$phone)!==false)
   { 
      header("location: ../signup.php?error=emptyinput");
      exit();
   }

   if(invalidname($name)!==false)
   { 
      header("location: ../signup.php?error=invalidname");
      exit();
   }

   if(invalidUid($username)!==false)
   { 
      header("location: ../signup.php?error=invaliduid");
      exit();
   }

   if(invalidEmail($email)!==false)
   { 
      header("location: ../signup.php?error=invalidemail");
      exit();
   }

      if(invalidphone($phone) !==false)
   { 

      header("location: ../signup.php?error=invalidphone");
      exit();
   }

   if(pwdMatch($pwd, $pwdrepeat)!==false)
   { 
      header("location: ../signup.php?error=passwordsdonotmatch");
      exit();

   }

 /*  
----------------------------------
| Note :Change $password to $pwd
-----------------------------------


$number = preg_match('@[0-9]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
 
if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
} else {
 echo "Your password is strong.";
}
      
      
      
      */
   if(uidExists($conn, $username, $email)!==false)
   { 
      header("location: ../signup.php?error=usernametaken");
      exit();
   }


      createUser($conn, $name, $email, $username, $pwd , $phone);
   }

   else
   {
      header("location: ../signup.php");
      exit();
   }