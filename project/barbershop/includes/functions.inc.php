<?php


function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat,$phone){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat) ||  empty($phone) ){
        $result=true;
    }
        else{
        $result=false;
    }
    return $result;
}// End of emptyInputSignup function 

// Check a Proper name
function invalidname($name){
    $result;
    if(!ctype_alpha(str_replace(' ', '', $name))){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}// End of invalidname function

// Check a Proper username
function invalidUid($username){
    $result;
    //  preg_match To Check certain type of char inside the username
    if(!preg_match("/^[a-zA-Z0-9]*{5}$/",$username )){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}// End of invalidUid function


function invalidEmail($email){
     $result;

     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}//End of invalidUid function

function invalidphone($phone){
    $result;
    if(!preg_match("/^(05)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/",$phone)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}// End of invalidUid function

function pwdMatch($pwd, $pwdrepeat){
    $result;
// Add ref For FILTER_VALIDATE_EMAIL
    if($pwd !== $pwdrepeat){
       $result=true;
   }
   else{
       $result=false;
   }
   return $result;
}// End of pwdMatch function 

function uidExists($conn, $username,$email){
    // Remember "users" is your table in DB
    //  Why "?" because write Prepare stat to avoid Sqlinjection
    //First ; to close sql stat Second ; to close php code****
    $sql="SELECT * FROM accounts WHERE username = ? OR Email= ?;";
    $stmt= mysqli_stmt_init($conn);// 1:18********************************************
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }
// if it is not failed
// ss   depend on the number of parameter you are submitting
    mysqli_stmt_bind_param($stmt, "ss",$username,$email);
// to execute 
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
//  for login  page
        return $row;
    }
    else{
        // false means that user signed in our website
        $result=false;
        return $result;
    }
            //close Prepare stat
        mysqli_stmt_close($stmt);
            
}// End of uidExists function

//***************************************************************** */
function createUser($conn, $name, $email, $username, $pwd ,$phone){

    $sql="INSERT INTO accounts (Name,Email,Username,password,phone) VALUES (?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);// 1:18
    if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
    }
            //lets hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss",$name,$email,$username,$pwd,$phone);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);//close Prepare stat
    header("location: ../signup.php?error=none");
    exit();
}// End of createUser function

/********************************
*******Login Functions************
********************************/

function emptyInputLogin( $username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result=true;
    }
        else{
        $result=false;
    }
    return $result;
}// End of emptyInputLogin function 

function loginUser($conn,$username, $pwd){
    $uidExists = uidExists($conn, $username,$email);

    if($uidExists === false){
    header("location: ../login.php?error=wronglogin");
    exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
    header("location: ../login.php?error=wronglogin");
    exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"]= $uidExists["usersId"];
        $_SESSION["useruid"]= $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }

}







