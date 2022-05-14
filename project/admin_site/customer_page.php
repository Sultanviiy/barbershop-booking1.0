<?php
 require('DB.php');
 include 'session.php';
 require 'auth_check.php';

 if(!isset($_SESSION['uid']))
 {
 	header("location:../barbershop/login.php");
 }

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = 'SELECT * FROM accounts WHERE userID = '.$id;

//get result
$data = mysqli_query($conn, $query);

//fetch data
$result = mysqli_fetch_assoc($data);
echo "Wlecome ".$result['Name'];
echo "<br>";
echo "Your Email is: ".$result['Email'];
echo "<br>";
echo "user name is: ".$result['Username'];
echo "<br>";
echo "phone number is: ".$result['phone'];
echo "<br>";
echo "you are in the customer page";
?>

<body>
<a href="logout.php">logout</a>
</body>