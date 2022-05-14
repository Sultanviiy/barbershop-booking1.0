<?php
 include 'session.php';
 include 'auth_check.php';
 include('db.php');
	$id=$_GET['bookId'];

	$query="DELETE FROM bookings where bookId='$id' ";

	$data=mysqli_query($mysqli,$query);

	if ($data)
	{
		?>
		<meta http-equiv="Refresh" content="0 ; URL = index.php">
		<?php
	}

?>
