<?php
 include 'session.php';
   if($_SESSION['uid']!="ASB" or $_SESSION['pass']!="123456!@#" )
  {
    header("location:../barbershop/login.php");
  }
	require('DB.php');
	$id=$_GET['bookId'];

	$query="DELETE FROM bookings where bookId='$id' ";

	$data=mysqli_query($conn,$query);

	if ($data)
	{
		?>
		<meta http-equiv="Refresh" content="0 ; URL = registartions_info.php">
		<?php
	}
	else
	{
		echo "<script> alert('record deleted from Database') </script>";
	}
?>