<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop</title>
    <link rel="stylesheet" href="css1/nav.css">
    <!-- <link rel="stylesheet" href="css/form.css"> -->
    <link rel="stylesheet" href="includes/contact/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="includes/contact/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="includes/contact/css/contact.css"/>
</head>
<body>
    <nav>
        <div class="nav"  style="   text-align:center;
float:center;">
                <a class="active" href="index.php">Home</a>
        
        
        <?php
            if(isset($_SESSION["useruid"])){
                echo "<a href='includes/profile.inc.php'>profile</a>";
                echo "<a href='includes/logout.inc.php'>Log out</a>";
            }
            else{
                echo "<a href='signup.php'>Sign up</a>";
                echo "<a href='login.php'>Log in</a>";


            }

        ?>
                <a  href="comment.php">survey </a>
                
                
        </div>
    </nav>

    <div class="main">