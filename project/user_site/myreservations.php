<!DocType html>
	<html>
		<head>
			<style type="text/css">
				body {
	margin: 0;
	padding: 0;
	background: #1D1C1A
;
	font-family: 'Varela Round', 'Ionicons';
}
::selection { background: #1D1C1A; color: #1D1C1A; }
a { text-decoration: none; }

.download {
	position: absolute;
	top: calc(50% - 30px);
	right: calc(50% - 115px);
	width: 230px;
	height: 60px;
	background-image: -webkit-linear-gradient(bottom, rgba(0,0,0,0.9), rgba(0,0,0,0.9));
	background-image: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.9));
    box-shadow: inset 0 -1px 0 rgba(0,0,0,0.9),inset 0 1px 0 rgba(0,0,0,0.9), 0 0 1px rgba(0,0,0,0.9), 0 0 10px rgba(0,0,0,0.9);
	border-radius: 100px;
	color: rgba(255,255,255,.9);
	line-height: 60px;
	text-align: center;
	letter-spacing: 5px;
	overflow: hidden;
	transition: all .3s cubic-bezier(.67,.13,.1,.81), transform .15s cubic-bezier(.67,.13,.1,.81);
}
.download:hover {
	right: calc(50% - 200px);
	width: 400px;
}
.download:active {
	transform: translateY(3px);
}
.download:before, .download:after {
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	opacity: 1;
	transition: all .3s cubic-bezier(.67,.13,.1,.81);
}
.download:before {
	content: 'HOME';
}
.download:after {
	content: 'Click to Back to Home Page';
	top: -60px;
	opacity: 0;
}
.download:hover:after {
	top: 0px;
	opacity: 1;
}
.download:hover:before {
	top: 60px;
	opacity: 0;
}


				
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(0,0,0,0.9);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(0,0,0,0.9);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(0,0,0,0.9);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #1D1C1A, #1D1C1A);
  background: linear-gradient(to right, #1D1C1A, #1D1C1A);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9); 
}
			</style>


		</head>

		<body>
			<section>
  <h1>YOUR RESERVATIONS INFORMATION</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
			<tr>
				<th> Customer Name</th>
				<th> Phone Number</th>
				<th> date</th>
				<th> Time</th>
				<th> Serivces</th>
				<th> </th>
			</tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
<?php
require('db.php');
include 'session.php';
$id=$_SESSION['id'];
	$query="SELECT * FROM bookings INNER JOIN accounts on accounts.UserID=$id and bookings.userID=$id";

	$data=mysqli_query($mysqli, $query);	

	if ($result=mysqli_fetch_all($data, MYSQLI_ASSOC)) {
				foreach ($result as $re):		
			echo "
				<tr>
				<td>".$re["Name"]."</td>
				<td>".$re["phone"]."</td>
				<td>".$re["date"]."</td>
				<td>".$re["timeslots"]."</td>
				<td>".$re["services"]."</td>
				<td> <a href=' cancel.php?bookId=$re[bookId]'>Cancel the reservaion </td>

				</tr>
			";
		endforeach;
	}
	else
	{
		echo "You do not have any reservations";
	}
?>
      </tbody>
    </table>
  </div>
</section>
	<a class="download" href="index.php"></a>
			<script>
				$(window).on("load resize ", function() {
  				var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  				$('.tbl-header').css({'padding-right':scrollWidth});
				}).resize();
			</script>
		</body>
	</html>