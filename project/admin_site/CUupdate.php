 <?php
  include 'session.php';
    if($_SESSION['uid']!="ASB" or $_SESSION['pass']!="123456!@#" )
  {
    header("location:../barbershop/login.php");
  }
  require('DB.php');

//get ID
$id = mysqli_real_escape_string($conn, $_GET['userID']);

//create a query
$query = 'SELECT * FROM accounts WHERE userID = '.$id;

//get result
$data = mysqli_query($conn, $query);

//fetch data
$result = mysqli_fetch_assoc($data);


	if(isset($_POST['submit']))
	{

	$update_id = mysqli_real_escape_string($conn, $_GET['userID']);	
	$Name = mysqli_real_escape_string($conn, $_POST['Name']);
 	$Email = mysqli_real_escape_string($conn, $_POST['Email']);
 	$Username = mysqli_real_escape_string($conn, $_POST['Username']);
 	$password = mysqli_real_escape_string($conn, $_POST['password']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);

	$query=" UPDATE accounts set 
					Name='$Name',
                    Email='$Email',
                    Username='$Username',
                    password='$password',
                    phone=$phone
                    where userID = {$update_id} ";

	$data=mysqli_query($conn,$query);


	if ($data)
	{
		?>
		<meta http-equiv="Refresh" content="0 ; URL = customers_info.php">
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
        <h1>UPDATE THE CUSTOMER</h1>
        <p>This page for Updating Cutomers once you click submit the Cutomer will Updated</p>
      </div>
         <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>UPDATE HERE</h2>
        </div>
        <div class="info">
          <input class="fname" type="text" name="Name" placeholder="Full name" value="<?php echo $result['Name']; ?>">
          <input type="text" name="Email" placeholder="Email" value="<?php echo $result['Email']; ?>">
          <input type="text" name="Username" placeholder="Username" value="<?php echo $result['Username']; ?>">
          <input type="text" name="phone" placeholder="phone" value="<?php echo $result['phone']; ?>">
          <input type="password" name="password" placeholder="password"  value="<?php echo $result['password']; ?>">
           <input type="submit" name="submit" value="submit">
        </div>
        <div class="checkbox">
        </div>
      </form>
    </div>
  </body>
</html>
