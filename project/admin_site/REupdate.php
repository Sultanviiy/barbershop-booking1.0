<?php
 include 'session.php';
   if($_SESSION['uid']!="ASB" or $_SESSION['pass']!="123456!@#" )
  {
    header("location:../barbershop/login.php");
  }
	require('DB.php');

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['bookId']);

	//create a query
 	$query = 'SELECT * FROM bookings WHERE bookId = '.$id;

 	//get result
 	$data = mysqli_query($conn, $query);

 	//fetch data
	$result = mysqli_fetch_assoc($data);


	if(isset($_POST['submit']))
	{

	$update_id = mysqli_real_escape_string($conn, $_GET['id']);	
 	$retime = mysqli_real_escape_string($conn, $_POST['retime']);
  $service = mysqli_real_escape_string($conn, $_POST['service']);
  
	$query=" UPDATE reservation set 
                    retime='$retime',
                    service='$service'
                    where re_id = {$update_id} ";


	$data=mysqli_query($conn,$query);


	if ($data)
	{
		?>
		<meta http-equiv="Refresh" content="0 ; URL = registartions_info.php">
		<?php
	}
	else
	{
		echo "<script> alert('fail to update') </script>";
	}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>CUTOMER UPDATE</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5); 
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7); 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <h1>UPDATE THE RESERVATION</h1>
        <p>This page for Updating Reservetion once you click submit the Reservetion will Updated</p>
      </div>

         <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>UPDATE HERE</h2>
        </div>
        <div class="info">
          <input type="text" name="retime" placeholder="Time" value="<?php echo $result['retime']; ?>">
          <input type="text" name="service" placeholder="service" value="<?php echo $result['service']; ?>">
           <input type="submit" name="submit" value="submit">
        </div>

      </form>
    </div>
  </body>
</html>

